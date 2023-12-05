<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Size;
use App\Models\Category;
use App\Models\Type;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;
use Illuminate\Pagination\Paginator;
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
        $products_pag = Product::orderBy('id','desc')->paginate(5)->withQueryString();;
        return view('list.products-list', compact('products_pag'));
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
    public function show(string $slug)
    {
        //
        $pro=Product::where('slug',$slug)->first();
        $image=$pro->image_list;
        $str_1=str_replace('[', '', $image);
        $str_2=str_replace(']', '', $str_1);
        $str_3=explode ( "," , $str_2);
        $image_arr=str_replace('"', '', $str_3);
//        foreach ($test4 as $value) {
//            var_dump($value);
//        }
        return view('client.product-detail',compact('pro','image_arr'));

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
//        $product=Product::find($id);
//        dd($product);
        Product::find($id)->delete();
        return redirect()->back();
    }
    public function trash(Request $r){
        $pro_trashs= Product::onlyTrashed()->paginate(5);
        if($r->key){
            $pro_trash=Product::where('name','LIKE','%'.$r->key.'%')->paginate(5);
        }
        return view('trash.trash-product',compact('pro_trashs'));
    }
    public function restore (string $id) {
        $pro_restore=Product::withTrashed()->find(($id));
        $pro_restore->restore();
        return redirect()->route('list.products');
    }
}
