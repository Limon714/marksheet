<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function viewcategory()
{
    $categories = Category::with('subcategories.subsubcategories')->get();
    return view('pages.categories.viewcategories', compact('categories'));
}
    public function index()
    {
        $categories = Category::get();
        return view('pages.categories.index', compact('categories'));        
    }
    public function show(Category $category)
    {
        $subcategories = $category->subcategories;
        return view('pages.categories.show', compact('category', 'subcategories'));
    }

    public function create()
    {
        return view('pages.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        }

        Category::create([
            'name' => $request->name,
            'image' => $imageName
        ]);

        return redirect()->route('categories.index')
            ->with('success', 'Category created successfully.');
    }

    public function edit(Category $category)
    {
        return view('pages.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $imageName = $category->image;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        }

        $category->update([
            'name' => $request->name,
            'image' => $imageName
        ]);

        return redirect()->route('categories.index')
            ->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category)
    {
        if ($category->image && file_exists(public_path('images/' . $category->image))) {
            unlink(public_path('images/' . $category->image));
        }
        $category->delete();
        return redirect()->route('categories.index')
            ->with('success', 'Category deleted successfully.');
    }
}
