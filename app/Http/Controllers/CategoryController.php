<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // insert category
    public function insert(Request $request){
        try{
            $request->validate([
                'name' => 'required',
            ]);

            $name = $request->input('name');
            $image = $request->file('image');

            $time = time();

            if($image){
                $image_name = $time.'.'.$image->extension();
                $image->move(public_path('images'),$image_name);
                $image_url = 'images/'.$image_name;
            }else{
                $image_url = 'default.png';
            }

            Category::create([
                'name' => $name,
                'image' => $image_url
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Category created successfully'
            ]);
        }catch(\Exception $e){
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    // get all category
    public function getCategories(){
        $data = Category::orderBy('name')->get();
        return view('category.categories',['categories' => $data]);
    }

    // delete category
    public function delete(Request $request){
        $id =  $request->input('id');
        $data = Category::find($id);
        if($data){
            $data->delete();
            // image delete
            $image_path = public_path($data->image);
            if(file_exists($image_path)){
                unlink($image_path);
            }
            return response()->json([
                'success' => true,
                'message' => 'Category deleted successfully'
            ]);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Category not found'
            ]);
        }
    }


    // update category
    public function update(Request $request){
        $id = $request->input('id');
        $data = Category::find($id);
        if($data){
            if($request->file('image')){
                $image = $request->file('image');
                $time = time();
                $image_name = $time.'.'.$image->extension();
                $image->move(public_path('images'),$image_name);
                $image_url = 'images/'.$image_name;

                // image delete
                $image_path = public_path($data->image);
                if(file_exists($image_path)){
                    unlink($image_path);
                }

               $data->update([
                'name' => $request->input('name'),
                'image' => $image_url
                ]);
            }else{
                $data->update([
                    'name' => $request->input('name')
                ]);
            }

            return response()->json([
                'success' => true,
                'message' => 'Category updated successfully'
            ]);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Category not found'
            ]);
        }
    }

    // get category
    public function getCategory($id){
        $data = Category::find($id);
        if($data){
            return response()->json([
                'success' => true,
                'data' => $data
            ]);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Category not found'
            ]);
        }
    }
}
