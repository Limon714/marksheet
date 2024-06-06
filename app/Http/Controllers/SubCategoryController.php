<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function subcategories(Category $category)
    {
        $subcategories = $category->subcategories;       
        return view('pages.subcategories.index', compact('category', 'subcategories'));
    }
    public function create(Request $request)
    {
        $category = $request->category_id;
        //dd($category);
        $categories = Category::where('id','=',$category)->get();
        return view('pages.subcategories.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        }

        SubCategory::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'image' => $imageName
        ]);

        return redirect()->route('categories.subcategories', $request->category_id)
            ->with('success', 'SubCategory created successfully.');
    }

    public function edit(SubCategory $subcategory)
    {
        $categories = Category::all();
        return view('pages.subcategories.edit', compact('subcategory', 'categories'));
    }

    public function update(Request $request, SubCategory $subcategory)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $imageName = $subcategory->image;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        }

        $subcategory->update([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'image' => $imageName
        ]);

        return redirect()->route('categories.subcategories', $request->category_id)
            ->with('success', 'SubCategory updated successfully.');
    }

    public function destroy(SubCategory $subcategory)
    {
        if ($subcategory->image && file_exists(public_path('images/' . $subcategory->image))) {
            unlink(public_path('images/' . $subcategory->image));
        }
        $category = $subcategory->category_id;
        $subcategory->delete();
        return redirect()->route('categories.subcategories', $category)
            ->with('success', 'SubCategory deleted successfully.');
    }
}
