<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

use Illuminate\Routing\Controller;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');  // تأمين جميع الدوال في هذا الـ controller
    }

    public function index()
    {
        $categories = Category::all();  // جلب جميع التصنيفات
        $products = Product::take(8)->get();     // جلب جميع المنتجات
        return view('home.index', compact('categories', 'products'));  // تمرير التصنيفات والمنتجات للـ view
    }

    // لعرض المنتجات حسب التصنيف
    public function showCategory($categoryId)
    {
        $categories = Category::all();  // جلب جميع التصنيفات لتكون موجودة في الـ dropdown
        $category = Category::find($categoryId);  // العثور على التصنيف بناءً على المعرف
        $products = Product::where('category_id', $categoryId)->get();  // جلب المنتجات الخاصة بهذا التصنيف
        return view('home.index', compact('categories', 'category', 'products'));  // تمرير التصنيفات والمنتجات للـ view
    }
    public function loadMoreProducts(Request $request) {
        $count = $request->get('count'); // عدد المنتجات التي تم عرضها
        $products = Product::skip($count)->take(8)->get(); // جلب 8 منتجات جديدة
    
        return response()->json([
            'products' => $products
        ]);
    }
    
    

}