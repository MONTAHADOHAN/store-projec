<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class ProductController extends Controller
{
 
    public function index(){
        // $products = Product::all();
        $products = Product::with('category')->get();
        return view('admin.products.index', compact('products'));
    }


    public function create(){
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }


    public function store(Request $request){
        // $product = new Product;        
        // $product->name = $request->name;
        // $product->quantity = $request->quantity;
        // $product->price = $request->price;
        // $product->category_id = $request->category_id;
        // $product->description = $request->description;
        // $product->save();
        // return redirect()->back();
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'price'       => 'required|numeric',
            'quantity'    => 'required|integer',
            'category_id' => 'nullable|exists:categories,id',
            'image_url'       => 'required|image|mimes:png,jpg,peg,gif,svg|max:2048',

        ]);

        // $imagePath = $request->file('image')->store('products','public');
        // $Validated['image_url']= $imagePath;
        if ($request->hasFile('image_url')) {
            $imagePath = $request->file('image_url')->store('images', 'public');
            $validated['image_url'] = basename($imagePath);  // تخزين اسم الصورة فقط
        }
        Product::create($validated);
        return redirect()->route('products.index')->with('success', 'تمت إضافة المنتج بنجاح');
        
    }

    public function show($id){
        $product = Product::find($id);  // العثور على المنتج بناءً على المعرف
        return view('admin.products.show', compact('product'));  // تمرير المنتج للـ view
    }

    public function edit($id){
        $product = Product::find($id);   
        $categories = Category::all();             
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'price'       => 'required|numeric',
            'quantity'    => 'required|integer',
            'category_id' => 'nullable|exists:categories,id',
            'image_url'       => 'required|image|mimes:png,jpg,peg,gif,svg|max:2048',

        ]);

        $product = Product::findOrFail($id);
        $product->update($validated);

        return redirect()->route('products.index')->with('success', 'تم تحديث المنتج بنجاح');
    }

    //     $id){
    //     $product = Product::find($id);        
    //     $product->name = $request->name;
    //     $product->quantity = $request->quantity;
    //     $product->price = $request->price;
    //     $product->category_id = $request->category_id;
    //     $product->description = $request->description;

    //     $product->save();
    //     return redirect('products');
    // }

    public function destroy($id){
        Product::find($id)->delete();
        return redirect()->back()->with('success', 'تم حذف المنتج');

    }
}
