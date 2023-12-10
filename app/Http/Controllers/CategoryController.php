<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categories=Category::all();
        return view('list.categories-list',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
       return view('add.add-category');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        Category::create([
            'name'=>$request->name,
            'image'=>$request->image,
        ]);
        try
        {
            return redirect()->route('admin');
        }catch(\Throwable $th){
            dd($th);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $name)
    {
        //
        $cate=Category::where('name',$name)->first();
        $pros=Product::where('category_id',$cate->id)->paginate(12);
        $productSizes=DB::table('product_sizes')->where('quantity','>',0)->get();
        return view('client.product-list',compact('cate','pros','productSizes'));
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
