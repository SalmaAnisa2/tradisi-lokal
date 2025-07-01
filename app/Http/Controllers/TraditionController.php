<?php

namespace App\Http\Controllers;

use App\Models\Tradition;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class TraditionController extends Controller
{
    // Homepage
    public function homepage()
    {
        $traditions = Tradition::latest()->paginate(4);
        return view('homepage', compact('traditions'));
    }

    // Show detail tradition
    public function show($id)
    {
        $tradition = Tradition::with('category')->findOrFail($id);
        return view('show', compact('tradition'));
    }

    // Form create
    public function create()
    {
        $categories = Category::all();
        return view('create-tradition', compact('categories'));
    }

    // Store tradition
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'synopsis' => 'nullable',
            'category_id' => 'required|exists:categories,id',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Upload cover
        $coverName = null;
        if ($request->hasFile('cover')) {
            $coverName = time() . '.' . $request->cover->extension();
            $request->cover->move(public_path('covers'), $coverName);
        }

        // Simpan data
        Tradition::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'synopsis' => $request->synopsis,
            'category_id' => $request->category_id,
            'cover_image' => $coverName,
        ]);

        return redirect('/')->with('success', 'Tradition berhasil ditambahkan!');
    }

    // Edit form
    public function edit($id)
    {
        $tradition = Tradition::findOrFail($id);
        $categories = Category::all();
        return view('edit-tradition', compact('tradition', 'categories'));
    }

    // Update tradition
    public function update(Request $request, $id)
    {
        $tradition = Tradition::findOrFail($id);

        $request->validate([
            'title' => 'required|max:255',
            'synopsis' => 'nullable',
            'category_id' => 'required|exists:categories,id',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('cover')) {
            $coverName = time() . '.' . $request->cover->extension();
            $request->cover->move(public_path('covers'), $coverName);
            $tradition->cover_image = $coverName;
        }

        $tradition->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'synopsis' => $request->synopsis,
            'category_id' => $request->category_id,
            'cover_image' => $tradition->cover_image,
        ]);

        return redirect('/')->with('success', 'Tradition berhasil diperbarui!');
    }

    // Hapus tradition
    public function destroy($id)
    {
        if (Gate::allows('delete')) {
            $tradition = Tradition::findOrFail($id);

            // Hapus file cover jika ada
            if ($tradition->cover_image && file_exists(public_path('covers/' . $tradition->cover_image))) {
                unlink(public_path('covers/' . $tradition->cover_image));
            }

            $tradition->delete();
            return redirect('/')->with('success', 'Tradition berhasil dihapus!');
        } else {
            abort(403);
        }
    }
}
