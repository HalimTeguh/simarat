<?php

namespace App\Http\Controllers;

use App\Models\categories;
use App\Models\letters;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class LetterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.letters.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = categories::all();
        return view('pages.letters.addEditLetter', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'no_letter' => 'required|unique:letters,number_of_letters|max:255',
            'category_letter_id' => 'required|exists:categories,id',
            'title' => 'required|max:255',
            'file_letter' => 'required|mimetypes:application/pdf|max:5120',
            'note' => 'nullable|string',
        ]);

        $category = categories::find($validated['category_letter_id']);
        if (!$category) {
            return redirect()->back()->with('error', 'Kategori surat tidak ditemukan')->withInput();
        }

        $directory = 'letters';

        if (!Storage::disk('public')->exists($directory)) {
            Storage::disk('public')->makeDirectory($directory);
        }

        $file = $request->file('file_letter');
        $filePath = $directory . '/' . $file->getClientOriginalName();
        $fileSize = $file->getSize();

        letters::create([
            'number_of_letters' => $validated['no_letter'],
            'category_id' => $category->id,
            'title' => $validated['title'],
            'date' => now(),
            'file_path' => $filePath,
            'file_size' => $fileSize,
            'notes' => $validated['note'],
        ]);

        Storage::disk('public')->put($filePath, file_get_contents($file));

        return redirect()->route('letters.index')->with('success', 'Surat berhasil diarsipkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $letter = letters::findOrFail($id);

        if (!$letter) {
            return redirect()->back()->with('error', 'Surat tidak ditemukan');
        }

        $categories = categories::all();

        return view('pages.letters.view', [
            'letter' => $letter,
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //

        if (Auth::user()->role != 'admin' && Auth::user()->role != 'staff') {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses untuk mengedit surat');
        }

        $letter = letters::findOrFail($id);

        if (!$letter) {
            return redirect()->back()->with('error', 'Surat tidak ditemukan');
        }

        $categories = categories::all();
        return view('pages.letters.addEditLetter', [
            'letter' => $letter,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        if (Auth::user()->role != 'admin' && Auth::user()->role != 'staff') {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses untuk mengedit surat');
        }

        // Cari data surat lama
        $letter = letters::findOrFail($id);

        // Validasi
        $validated = $request->validate([
            'no_letter' => 'required|max:255|unique:letters,number_of_letters,' . $letter->id,
            'category_letter_id' => 'required|exists:categories,id',
            'title' => 'required|max:255',
            'file_letter' => 'nullable|mimetypes:application/pdf|max:5120',
            'note' => 'nullable|string',
        ]);

        $category = categories::find($validated['category_letter_id']);
        if (!$category) {
            return redirect()->back()->with('error', 'Kategori surat tidak ditemukan')->withInput();
        }

        $filePath = $letter->file_path; // default tetap file lama
        $fileSize = $letter->file_size;

        // Kalau ada file baru di-upload
        if ($request->hasFile('file_letter')) {
            $directory = 'letters';

            if (!Storage::disk('public')->exists($directory)) {
                Storage::disk('public')->makeDirectory($directory);
            }

            // Hapus file lama biar tidak numpuk
            if ($letter->file_path && Storage::disk('public')->exists($letter->file_path)) {
                Storage::disk('public')->delete($letter->file_path);
            }

            $file = $request->file('file_letter');
            $filePath = $directory . '/' . uniqid() . '_' . $file->getClientOriginalName();
            $fileSize = $file->getSize();

            Storage::disk('public')->put($filePath, file_get_contents($file));
        }

        // Update data surat
        $letter->update([
            'number_of_letters' => $validated['no_letter'],
            'category_id' => $category->id,
            'title' => $validated['title'],
            'date' => now(),
            'file_path' => $filePath,
            'file_size' => $fileSize,
            'notes' => $validated['note'],
        ]);

        return redirect()->route('letters.index')->with('success', 'Surat berhasil diperbarui');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        if (Auth::user()->role != 'admin' && Auth::user()->role != 'staff') {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses untuk menghapus surat');
        }
        
        $letter = letters::findOrFail($id);

        if (!$letter) {
            return redirect()->back()->with('error', 'Surat tidak ditemukan');
        }

        $letter->delete();

        return redirect()->route('letters.index')->with('success', 'Surat berhasil dihapus');
    }
}
