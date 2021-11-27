<?php

namespace App\Http\Controllers;

use App\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\ApiController;

class ProductsController extends ApiController
{
    public function index()
    {
        $categories = Products::all();
        return $this->showAll($categories);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $data['slug'] = Str::slug($request->name);
        // if ($request->image != null) {
        //     $file = $request->file('image');

        //     $nameValue = Str::slug($request->name);
        //     $file_old = public_path('products\\') . $request->image;
        //     if (file_exists($file_old) != null && $request->image != 'no-img.jpg') {
        //         $nameImageValue = $nameValue . '-' . Str::random(10) . '.' . $file->extension();
        //     } else {
        //         $nameImageValue = $nameValue . '.' . $file->extension();
        //     }
        //     $destinationPath = public_path('products\\');
        //     $file->move($destinationPath, $nameImageValue);
        //     $data['image'] = $nameImageValue;
        //     $data['image'] = 'no-img.jpg';
        // } else {
        //     $data['image'] = 'no-img.jpg';
        // }
        $data['image'] = $request->image;
        // dd($data);
        $product = Products::create($data);
        return $this->showOne($product);
    }
    public function show($id)
    {
        $product = Products::find($id);
        return $this->showOne($product);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $product = Products::find($id);
        $product->slug = Str::slug($request->name);
        // if ($request->image != null) {
        //     $file_old = public_path('products\\') . $product->image;
        //     if (file_exists($file_old) != null && $product->image != 'no-img.jpg') {
        //         unlink($file_old);
        //     }
        //     $file = $request->file('image');
        //     $nameValue = Str::slug($request->name);
        //     $nameImageValue = $nameValue . '-' . Str::random(10) . '.' . $file->extension();
        //     $destinationPath = public_path('products\\');
        //     $file->move($destinationPath, $nameImageValue);
        //     $data['image'] = $nameImageValue;
        // } else {
        //     $data['image'] = $product->image;

        // }
        $data['image'] = $request->image;
        $product->update($data);
        // return response()->json(['data' => $user], 200);
        return $this->showOne($product);
    }

    public function destroy($id)
    {
        $product = Products::find($id);
        $product->delete();
        return $this->showOne($product);
    }
    // public function saveFile(Request $request)
    // {
    //     if ($request->image != null) {
    //         $file_old = public_path('products\\') . $product->image;
    //         if (file_exists($file_old) != null && $product->image != 'no-img.jpg') {
    //             unlink($file_old);
    //         }
    //         $file = $request->file('image');
    //         $nameValue = Str::slug($request->name);
    //         $nameImageValue = $nameValue . '-' . Str::random(10) . '.' . $file->extension();
    //         $destinationPath = public_path('products\\');
    //         $file->move($destinationPath, $nameImageValue);
    //         $data['image'] = $nameImageValue;
    //     } else {
    //         $data['image'] = $product->image;
    //     }
    // }
}