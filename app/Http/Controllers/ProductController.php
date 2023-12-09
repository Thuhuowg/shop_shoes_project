<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Size;
use App\Models\Category;
use App\Models\ProductSize;
use App\Models\Type;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Carbon;
use function App\Helpers\function\price_sale;

class ProductController extends Controller
{


    /**
     * Display a listing of the resource.
     */
    public function home (){
        $search = request()->search ?? "";
        $pros = Product::where('name', 'like', "%$search%")->paginate(12)->withQueryString();
        $quantities=DB::table('product_sizes')
            ->get();
        return view('home',compact('pros','search','quantities'));
    }
    public function index()
    {
        //
        $search = request()->search ?? "";
        $pros = Product::where('name', 'like', "%$search%")->paginate(12)->withQueryString();
        return view('client.product-list',compact('pros','search'));
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
        $price=intval($request->price_default);
        $discount=intval($request->voucher_sale);
        $price_sale=price_sale($price,$discount);
        Product::create([
            'name' => $request->name,
            'type_id' => $request->type_id,
            'category_id' => $request->category_id,
            'slug' => $request->slug,
            'description' => $request->description,
            'price_default' => $request->price_default,
            'price_sale' => $price_sale,
            'voucher_sale' => $request->voucher_sale,
            'image' => $request->image,
            'image_list' => $request->image_list
        ]);
        try {
            return redirect()->back();
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
        $image_arr=json_decode($pro->image_list);

        $sizes=Size::all();
//        foreach ($test4 as $value) {
//            var_dump($value);
//        }
        return view('client.product-detail',compact('pro','image_arr','sizes'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $pro=Product::find($id);
        $cate=Category::where('id',$pro->category_id)->first();
        $type_edit=Type::where('id',$pro->type_id)->first();
        $image_arr=json_decode($pro->image_list);
        return view('edit.edit-product',compact('pro','cate','type_edit','image_arr'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->offsetUnset('_token');
        $price=intval($request->price_default);
        $discount=intval($request->voucher_sale);
        $price_sale=price_sale($price,$discount);
        Product::where(['id'=>$id])->update([
            'name' => $request->name,
            'type_id' => $request->type_id,
            'category_id' => $request->category_id,
            'slug' => $request->slug,
            'description' => $request->description,
            'price_default' => $request->price_default,
            'price_sale' => $price_sale,
            'voucher_sale' => $request->voucher_sale,
            'image' => $request->image,
            'image_list' => $request->image_list
        ]);
        try {
            return redirect()->route('list.products');
        } catch (Exception $e) {
            echo 'Message:' . $e->getMessage();
        }
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
    public function inventory(){
        $products_pag = Product::paginate(5)->withQueryString();
        // $productId=Product::find(1)->productSizes->sum('quantity');
        // dd($productId);
        $productSizes=ProductSize::all();
        // dd($productSizes);
        return view('admin.statistic.inventory',compact('products_pag'));
    }
    public function revenue(){
        return view('admin.statistic.revenue');
    }
}
