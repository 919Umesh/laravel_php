<?php
namespace App\Http\Controllers\Embed;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProdudctFrontController extends Controller
{
   
       public function product_list()
       {
           $product = Product::get();
           return view('welcome', compact('product'));
       }

       public function store_product(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'image_url' => 'nullable|string',
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->image_url = $request->image_url;
        $product->save();

        return redirect('/')->with('success', 'Product added successfully!');
    }
}
