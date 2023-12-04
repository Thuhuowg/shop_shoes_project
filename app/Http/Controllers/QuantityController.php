<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Exception;

class QuantityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $products = Product::paginate(5);
        $finds = DB::table('product_sizes')->get();
        $sizes= Size::all();
        return view('list.quantity-list',compact('products','finds','sizes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Category::all();
        $products = Product::all();
        $sizes = Size::all();
        return view('add.add-quantity', compact('categories', 'products', 'sizes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
