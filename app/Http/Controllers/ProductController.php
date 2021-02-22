<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        return view('pages.products.index');
    }

    public function list()
    {
        echo json_encode(datatables()->of(Product::query())->toJson());
        // return datatables()->of(Product::query())->toJson();
    }

    public function create()
    {
        return view('pages.products.create');
    }

    public function store(Request $request)
    {
        $data =  $request->all();
        $request->validate([
            'name' => 'required',
            'quantity' => 'required | numeric',
            'price' => 'required | numeric',
        ]);

        $data['image'] = 'sample.png';
        Product::create($data);

        return redirect()->back()->with(['message' => 'Successfully Added.']);
    }

    public function edit(Request $request)
    {
        $product = Product::find($request->id);

        return view('pages.products.edit', compact('product'));
    }

    public function update(Request $request)
    {
        $data = $request->all();
        $request->validate([
            'name' => 'required',
            'quantity' => 'required | numeric',
            'price' => 'required | numeric',
        ]);
        $data['image'] = 'sample.png';
        Product::find($request->id)->update($data);

        return redirect()->back()->with(['message' => 'Successfully Updated.']);
    }

    
}
