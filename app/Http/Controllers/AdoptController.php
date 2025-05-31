<?php

namespace App\Http\Controllers;

use App\Models\Adopt;
use Illuminate\Http\Request;
use App\Models\AdoptForm;

class AdoptController extends Controller
{
    // 1. Overview kategori
    public function showAllCategories()
    {
        $counts = Adopt::selectRaw('category_id, COUNT(*) as total')
                       ->where('status','available')
                       ->groupBy('category_id')
                       ->pluck('total','category_id');
        return view('adopt.categories', compact('counts'));
    }

    // 2. List per kategori
    public function category($type)
    {
        $animals = Adopt::where('category_id',$type)
                        ->where('status','available')
                        ->get(['id','animal_name','image']);
        return view('adopt.category', compact('animals','type'));
    }

    // 3. Search
    public function search(Request $request)
    {
        $q = $request->input('q');
        $animals = Adopt::where('status','available')
            ->where(function($b) use ($q) {
                $b->where('animal_name','like',"%{$q}%")
                  ->orWhere('shelter_address','like',"%{$q}%");
            })
            ->get(['id','animal_name','image','category_id']);
        return view('adopt.search', compact('animals','q'));
    }

    // 4. Status adopsi
    public function adoptionStatus()
    {
        $adopted = Adopt::where('status','adopted')
                        ->get(['id','animal_name','image']);
        return view('adopt.status', compact('adopted'));
    }

    // 5. Help me find home (available)
    public function helpMeAFindHome()
    {
        $available = Adopt::where('status','available')
                          ->get(['id','animal_name','image']);
        return view('adopt.help', compact('available'));
    }

    // 6. Detail hewan
    public function show($id)
    {
        $animal = Adopt::findOrFail($id);
        return view('adopt.detail', compact('animal'));
    }

    // 7. Tampilkan form apply (AdoptForm)
    // public function showForm($id)
    // {
    //     $animal = Adopt::findOrFail($id);
    //     return view('adopt.form', compact('animal'));
    // }

    public function showGeneralForm()
    {
        // logic / view jika form umum
        return view('adopt.form');
    }

    // 8. Proses submit form
    // public function submitForm(Request $request, $id)
    // {
    //     $request->validate([
    //         'full_name'      => 'required|string|max:255',
    //         'age'            => 'required|integer|min:1',
    //         'address'        => 'required|string',
    //         'house_type'     => 'required|string|max:100',
    //         'daily_activity' => 'required|string',
    //         'reason'         => 'required|string',
    //     ]);

    //     AdoptForm::create([
    //         'user_id'        => $request->user()->id,
    //         'adopt_id'       => $id,
    //         'full_name'      => $request->full_name,
    //         'age'            => $request->age,
    //         'address'        => $request->address,
    //         'house_type'     => $request->house_type,
    //         'daily_activity' => $request->daily_activity,
    //         'reason'         => $request->reason,
    //     ]);

    //     return redirect()->route('adopt.thankyou');
    // }

    // 9. Thank you page
    public function thankYou()
    {
        return view('adopt.thankyou');
    }
    public function submitGeneralForm(Request $request)
    {
        $request->validate([
            'full_name'      => 'required|string|max:255',
            'age'            => 'required|integer|min:1',
            'address'        => 'required|string',
            'house_type'     => 'required|string|max:100',
            'daily_activity' => 'required|string',
            'reason'         => 'required|string',
        ]);

        try {
            AdoptForm::create([
                'user_id'        => auth()->id(),
                'adopt_id'       => null, // Form umum tidak terkait dengan hewan spesifik
                'full_name'      => $request->full_name,
                'age'            => $request->age,
                'address'        => $request->address,
                'house_type'     => $request->house_type,
                'daily_activity' => $request->daily_activity,
                'reason'         => $request->reason,
                'status'        => 'pending'
            ]);

            return redirect()->route('adopt.thankyou')->with('success', 'Form pengajuan adopsi berhasil dikirim!');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan. Silakan coba lagi.')->withInput();
        }
    }
}