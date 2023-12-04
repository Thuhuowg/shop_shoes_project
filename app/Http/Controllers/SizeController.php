<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Size;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categories = Category::all();
        $sizes = Size::orderBy('size_number', 'ASC')->select('id', 'size_number', 'category_id')->get();

//        $sizes = Size::get()->sortBy('sizes.id')->all();
        return view('list.size-list', compact('sizes', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view('add.add-size', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
