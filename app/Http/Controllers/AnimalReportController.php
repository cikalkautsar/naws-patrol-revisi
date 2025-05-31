<?php

namespace App\Http\Controllers;

use App\Models\AnimalReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AnimalReportController extends Controller
{
    public function showReportForm()
    {
        return view('AnimalReport.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'reporter_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'address' => 'required|string',
            'report_reason' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('report-images', 'public');
            $validated['image'] = $imagePath;
        }

        $validated['user_id'] = auth()->id();
        $validated['status'] = 'pending';

        $report = AnimalReport::create($validated);

        return redirect()->route('reports.thankyou')->with('success', 'Laporan berhasil dikirim!');
    }

    public function thankYou()
    {
        return view('AnimalReport.thankyou');
    }

    public function showUserReports()
    {
        $reports = AnimalReport::where('user_id', auth()->id())
                              ->latest()
                              ->paginate(5);
                              
        return view('AnimalReport.process', compact('reports'));
    }

    // Admin methods below
    public function index()
    {
        $reports = AnimalReport::latest()->paginate(10);
        return view('admin.reports.index', compact('reports'));
    }

    public function show(AnimalReport $report)
    {
        return view('admin.reports.show', compact('report'));
    }

    public function updateStatus(Request $request, AnimalReport $report)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,verified,completed'
        ]);

        $report->update($validated);

        return back()->with('success', 'Status laporan berhasil diperbarui!');
    }
} 