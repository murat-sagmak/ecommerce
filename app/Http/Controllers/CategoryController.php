<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
       /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::with('category:id,cat_up,name')->get();
        return view("category.index", compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();

        return view("category.edit", compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        if($request->hasFile("image")){
            $image = $request->file("image");
            $extension = $image->getClientOriginalExtension();
            $filename = time().'-'.Str::slug($request->name);
            
            $uploadFile = 'images/category/';

            if($extension == 'pdf' || $extension == 'svg' || $extension == 'webp' || $extension == 'jiff'){
                $image ->move(public_path($uploadFile), $filename.'.'.$extension);

                $imageUrl = $uploadFile.$filename.'.'.$extension;
            }else{
                $image = Image::make($image);
                $image->encode('webp', 75)->save(public_path($uploadFile.$filename.'.webp'));
                $imageUrl = $uploadFile.$filename.'.webp';
            }

        }
        Category::create([
            'name'=> $request->name,
            'cat_up'=> $request->cat_up,
            'status' => $request->status,
            'content' => $request->content,
            'image' => $imageUrl ?? NULL,
        ]);
        return back()->with('success', 'Operation was successful!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::where("id", $id)->first();

        $categories = Category::get();
        return view("category.edit", compact('category',"categories"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {   
        $category = Category::where("id", $id)->first();
        
        if($request->hasFile("image")){
            $image = $request->file("image");
            $extension = $image->getClientOriginalExtension();
            $filename = time().'-'.Str::slug($request->name);
            
            $uploadFile = 'images/category/';

            if($extension == 'pdf' || $extension == 'svg' || $extension == 'webp' || $extension == 'jiff'){
                $image ->move(public_path($uploadFile), $filename.'.'.$extension);

                $imageUrl = $uploadFile.$filename.'.'.$extension;
            }else{
                $image = Image::make($image);
                $image->encode('webp', 75)->save(public_path($uploadFile.$filename.'.webp'));
                $imageUrl = $uploadFile.$filename.'.webp';
            }

            
        }
        $category->update([
            'name'=> $request->name,
            'cat_up'=> $request->cat_up,
            'status' => $request->status,
            'content' => $request->content,
            'image' => $imageUrl ?? $category->image,
        ]);
        return back()->with('success', 'Operation was successful!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category=Category::where('id', $id)->firstOrFail();

        if(file_exists($category->image)){
            if(!empty($category->image)){
                unlink($category->image);
            }
        }
        $category->delete();
        return back()->with('success', 'Operation was successful!');
    }
}
