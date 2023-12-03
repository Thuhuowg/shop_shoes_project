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
    public function add_size()
    {
        $categories = Category::all();
        return view('add.add-size', compact('categories'));
    }

    public function post_add_size(Request $request)
    {
        Size::create([
            'category_id' => $request->category_id,
            'size_number' => $request->size_number
        ]);
        try {
            dd($request);
            return redirect()->route('list.sizes');
        } catch (Exception $exception) {
            echo "Message: " . $exception->getMessage();
        }
    }

    public function list_size()
    {
        $categories = Category::all();
        $sizes = Size::orderBy('size_number', 'ASC')->select('id', 'size_number', 'category_id')->get();

//        $sizes = Size::get()->sortBy('sizes.id')->all();
        return view('list.size-list', compact('sizes', 'categories'));
    }

    public function create_type()
    {
        return view('add.add-type');
    }

    public function post_create_type(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'name_vn' => 'required',
            'image' => 'required',
        ], [
            'name.required' => 'Không được để trống',
            'name_vn.required' => 'Tên thay thế không được để trống',
            'image.required' => 'Yêu cầu nhập hình ảnh ',
        ]);


        try {
            Type::create([
                'name' => $request->name,
                'name_vn' => $request->name_vn,
                'image' => $request->image,
                'slug' => $request->slug
            ]);
            return redirect()->route('list.types');
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function list_types()
    {
        $types = Type::all();
        return view('list.types-list', compact('types'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function index_admin()
    {
        //
        $categories = Category::all();
//        dd($categories);
        $products = Product::paginate(5);
        $finds = DB::table('product_sizes')->get();
//        dd($finds);
        $types = Type::all();
        return view('list.products-list', compact('categories', 'products', 'finds', 'types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create_quantity()
    {
        //
        $categories = Category::all();
        $products = Product::all();
        $sizes = Size::all();
        return view('add.add-quantity', compact('categories', 'products', 'sizes'));
    }

    public function store_quantity(Request $request)
    {
        try {
            DB::beginTransaction();

            // code xử lý
            DB::table('product_sizes')->insert([
                'product_id' => $request->product_id,
                'size_id' => $request->size_id,
                'quantity' => $request->quantity
            ]);
            // nếu bạn muốn check lỗi attach thì sẽ dùng
            DB::commit(); // nếu code xử lý thành công thì mới commit dữ liệu

            return redirect()->route('admin');
        } catch (Exception $e) {
            DB::rollBack(); // nếu code phía trên xẩy ra lỗi thì sẽ được rollback

            return;
        }
    }

    public function list_quantities()
    {

        $products = Product::paginate(5);
        $finds = DB::table('product_sizes')->get();
        $sizes= Size::all();
        return view('list.quantity-list',compact('products','finds','sizes'));
    }

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
