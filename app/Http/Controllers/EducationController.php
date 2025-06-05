<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Models\EducationNews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;

class EducationController extends Controller
{
    public function index()
    {
        $articles = Education::published()
            ->latest()
            ->paginate(6);
            
        $featuredNews = EducationNews::featured()
            ->latest()
            ->first();
            
        $latestNews = EducationNews::latest()
            ->paginate(6);

        // Fetch news from external API
        $this->fetchLatestNews();
            
        return view('education.education', compact('articles', 'featuredNews', 'latestNews'));
    }

    private function fetchLatestNews()
    {
        try {
            // Menggunakan NewsAPI untuk mendapatkan berita terkini
            $response = Http::get('https://newsapi.org/v2/everything', [
                'q' => 'pet care OR animal health OR veterinary',
                'language' => 'id',
                'sortBy' => 'publishedAt',
                'apiKey' => env('NEWS_API_KEY'),
                'pageSize' => 10
            ]);

            if ($response->successful()) {
                $news = $response->json()['articles'];
                
                foreach ($news as $item) {
                    EducationNews::updateOrCreate(
                        ['title' => $item['title']],
                        [
                            'content' => $item['description'] ?? $item['content'],
                            'source_url' => $item['url'],
                            'source_name' => $item['source']['name'],
                            'thumbnail' => $item['urlToImage'],
                            'category' => $this->categorizeNews($item['title'] . ' ' . $item['description']),
                            'published_at' => $item['publishedAt'],
                            'is_featured' => false
                        ]
                    );
                }
            }
        } catch (\Exception $e) {
            \Log::error('Error fetching news: ' . $e->getMessage());
        }
    }

    private function categorizeNews($text)
    {
        $text = strtolower($text);
        
        if (str_contains($text, ['anjing', 'dog', 'puppy'])) {
            return 'anjing';
        } elseif (str_contains($text, ['kucing', 'cat', 'kitten'])) {
            return 'kucing';
        } elseif (str_contains($text, ['burung', 'bird', 'parrot'])) {
            return 'burung';
        }
        
        return 'umum';
    }

    public function show($slug)
    {
        $article = Education::published()
            ->where('slug', $slug)
            ->firstOrFail();
            
        return view('education.show', compact('article'));
    }

    public function category($category)
    {
        $articles = Education::published()
            ->category($category)
            ->latest()
            ->paginate(9);
            
        return view('education.category', compact('articles', 'category'));
    }

    // Admin methods
    public function create()
    {
        return view('education.admin.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'category' => 'required',
            'thumbnail' => 'nullable|image|max:2048',
            'reading_time' => 'nullable|integer|min:1',
            'is_published' => 'boolean'
        ]);

        if ($request->hasFile('thumbnail')) {
            $path = $request->file('thumbnail')->store('education', 'public');
            $validated['thumbnail'] = $path;
        }

        Education::create($validated);

        return redirect()
            ->route('education.index')
            ->with('success', 'Artikel berhasil ditambahkan!');
    }

    public function edit(Education $education)
    {
        return view('education.admin.edit', compact('education'));
    }

    public function update(Request $request, Education $education)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'category' => 'required',
            'thumbnail' => 'nullable|image|max:2048',
            'reading_time' => 'nullable|integer|min:1',
            'is_published' => 'boolean'
        ]);

        if ($request->hasFile('thumbnail')) {
            // Hapus thumbnail lama jika ada
            if ($education->thumbnail) {
                Storage::disk('public')->delete($education->thumbnail);
            }
            
            $path = $request->file('thumbnail')->store('education', 'public');
            $validated['thumbnail'] = $path;
        }

        $education->update($validated);

        return redirect()
            ->route('education.index')
            ->with('success', 'Artikel berhasil diperbarui!');
    }

    public function destroy(Education $education)
    {
        if ($education->thumbnail) {
            Storage::disk('public')->delete($education->thumbnail);
        }
        
        $education->delete();

        return redirect()
            ->route('education.index')
            ->with('success', 'Artikel berhasil dihapus!');
    }
} 