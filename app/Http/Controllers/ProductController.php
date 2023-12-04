<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Size;
use App\Models\Category;
use App\Models\Type;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('client.product-list');
    }

    public function index_admin()
    {
        //
        $products = Product::paginate(5);
        $categories = Category::all();
//        dd($categories);
//        dd($finds);
        $types = Type::all();
        return view('list.products-list', compact('categories', 'products', 'types'));
    }

    /**
     * Show the form for creating a new resource.
     */


    public function create()
    {
        //
        $categories = Category::all();
        $types = Type::all();
        return view('add.add-product', compact('categories', 'types'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
            'image_list' => 'required',
            'image' => 'required',
            'category_id' => 'required'
        ], [
            'name.required' => 'Không được để trống',
            'image_list.required' => 'Tên thay thế không được để trống',
            'image.required' => 'Yêu cầu nhập hình ảnh ',
            'category_id.required' => 'Yêu cầu chọn danh mục'
        ]);

        Product::create([
            'name' => $request->name,
            'type_id' => $request->type_id,
            'category_id' => $request->category_id,
            'slug' => $request->slug,
            'description' => $request->description,
            'price_default' => $request->price_default,
            'price_sale' => $request->price_sale,
            'voucher_sale' => $request->voucher_sale,
            'image' => $request->image,
            'image_list' => $request->image_list
        ]);
        try {
            return redirect()->route('admin');
        } catch (Exception $e) {
            echo 'Message:' . $e->getMessage();
        }
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
