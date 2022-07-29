<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest('id')->paginate(12);

        return view('product.index',compact('products'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('product.create',compact('categories'));
    }

    public function store(StoreProductRequest $request)
    {
        $product = Product::create($request->only(['title','description','price']));

        foreach($request->file('images') as $file){
            $filename = time().'_'.$file->getClientOriginalName();
            $dir = 'upload/images';
            $path = $file->storeAs($dir,$filename);

            $product->images()->create([
                'path' => $path,
            ]);
        }

        $product->categories()->attach($request->categories);

        return redirect(route('product.index'));
    }

    public function show($id)
    {
        $product = Product::find($id);

        return view('product.show',compact('product'));
    }

    public function edit($id)
    {
        $product = Product::find($id);

        $categories = Category::all();
        $oldCategories = $product->categories->pluck('id')->toArray();

        return view('product.edit',compact('product','categories','oldCategories'));
    }

    public function update(UpdateProductRequest $request, $id)
    {
        $product = Product::find($id);

        if($request->file('images')){
            foreach( $product->images as $image){
                Storage::delete($image->path);
                Image::where('imageable_id', $product->id)->where('imageable_type', Product::class)->delete();
            }

            foreach($request->file('images') as $file){
                $filename = time().'_'.$file->getClientOriginalName();
                $dir = 'upload/images';
                $path = $file->storeAs($dir,$filename);
    
                $product->images()->create([
                    'path' => $path,
                ]);
            }            
        }

        $product->update([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price
        ]);

        $product->categories()->sync($request->categories);

        return redirect(route('product.show',$product->id));
    }

    public function destroy($id)
    {
        $product = Product::find($id);

        foreach( $product->images as $image){
            Storage::delete($image->path);
            Image::where('imageable_id', $product->id)->where('imageable_type', Product::class)->delete();
        }

        $product->delete();

        return redirect(route('product.index'));
    }
}
