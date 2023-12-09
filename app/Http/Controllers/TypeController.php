<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $types = Type::all();
        return view('list.types-list', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('add.add-type');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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

    /**
     * Display the specified resource.
     */
    public function show(string $name,string $slug)
    {
        //
        $cate=Category::where('name',$name)->first();
        $type=Type::where('slug',$slug)->first();
        $pros=DB::table('products')
            ->where('category_id',$cate->id)
            ->where('type_id',$type->id)
            ->paginate(12);
        return view('client.product-list',compact('pros'));
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
