<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\SubSubCategory;

class SubSubCategoryController extends Controller
{
    public function subsubcategories(SubCategory $subCategory)
    {
        $category = $subCategory->category_id;
        $subsubcategories = $subCategory->subsubcategories;                
        return view('pages.subsubcategories.index', compact('category','subCategory', 'subsubcategories'));
    }   

    public function create(Request $request)
    {
        $subcategory = $request->sub_category_id;
        $subcategories = SubCategory::where('id','=',$subcategory)->get();
        return view('pages.subsubcategories.create', compact('subcategories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'sub_category_id' => 'required|exists:sub_categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        }

        SubSubCategory::create([
            'name' => $request->name,
            'sub_category_id' => $request->sub_category_id,
            'image' => $imageName
        ]);

        return redirect()->route('subcategories.subsubcategories', $request->sub_category_id)
            ->with('success', 'SubSubCategory created successfully.');
    }

    public function edit(SubSubCategory $subsubcategory)
    {
        $subcategories = SubCategory::all();
        return view('pages.subsubcategories.edit', compact('subsubcategory', 'subcategories'));
    }

    public function update(Request $request, SubSubCategory $subsubcategory)
    {
        $request->validate([
            'name' => 'required',
            'sub_category_id' => 'required|exists:sub_categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $imageName = $subsubcategory->image;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        }

        $subsubcategory->update([
            'name' => $request->name,
            'sub_category_id' => $request->sub_category_id,
            'image' => $imageName
        ]);

        return redirect()->route('subcategories.subsubcategories', $request->sub_category_id)
            ->with('success', 'SubSubCategory updated successfully.');
    }

    public function destroy(SubSubCategory $subsubcategory)
    {
        if ($subsubcategory->image && file_exists(public_path('images/' . $subsubcategory->image))) {
            unlink(public_path('images/' . $subsubcategory->image));
        }
        $subcategory = $subsubcategory->sub_category_id;
        $subsubcategory->delete();
        return redirect()->route('subcategories.subsubcategories', $subcategory)
            ->with('success', 'SubSubCategory deleted successfully.');
    }
}
