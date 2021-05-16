<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class ProductController extends Controller
{
    const SELLING = 1;
    const STOP_SELL = 2;
   
    public function index(Request $request){
       
        $sort = $request->query('product_sort', "");
        $searchKeyword = $request->query('product_name', "");
        $productStatus = (int) $request->query('product_status', "");
        $category_id = (int) $request->query('category_id', 0);
        $allProductStatus = [1,2];

        $queryORM = Product::where('name', "LIKE", "%".$searchKeyword."%");

        if (in_array($productStatus, $allProductStatus)) {
            $queryORM = $queryORM->where('status',$productStatus);
        }

        if ($sort == "price_asc") {
            $queryORM->orderBy('price_sell', 'asc');
        }
        if ($sort == "price_desc") {
            $queryORM->orderBy('price_sell', 'desc');
        }
        if ($sort == "quantity_asc") {
            $queryORM->orderBy('quantity', 'asc');
        }
        if ($sort == "quantity_desc") {
            $queryORM->orderBy('quantity', 'desc');
        }
        $products = $queryORM->paginate(10);
        $data = [];
        $data["products"] = $products;
        $data["searchKeyword"] = $searchKeyword;
        $data["productStatus"] = $productStatus;
        $data["category_id"] = $category_id;
        $data["sort"] = $sort;
        $data["selling"] = self::SELLING;
        $data["stop_sell"] = self::STOP_SELL;
        $categories = DB::table('categories')->get();
        $data["categories"] = $categories;

        return view("backend.products.index", $data);
    }
    public function create(){
        $data = [];
        $categories = DB::table('categories')->get();
        $data["categories"] = $categories;
        return view("backend.products.create", $data);
    }
    public function edit($id){
        $product = Product::findOrFail($id);
        $data = [];
        $data["product"] = $product;
        $categories = DB::table('categories')->get();
        $data["categories"] = $categories;
        return view("backend.products.edit", $data);
    }
    public function delete($product_id){
        $product = Product::findOrFail($product_id);
        return view("backend.products.delete", compact('product'));
    }
    public function store(StoreProductRequest $request) {
        $product = new Product();
        $product->name = $request->input('product_name');
        $product->category_id = $request->input('category_id', 1);
        $product->category_parent_id = $request->input('category_id', 1);
        $product->brand_id = $request->input('category_id', 1);
        $product->status = $request->input('product_status', 1);
        $product->description = $request->input('product_desc');
        $product->image = $request->input('product_name', '');
        $product->quantity = $request->input('product_quantity');
        $product->quantity_sold = 0;
        $product->sell_price = $request->input('sell_price');
        $product->orginal_price = $request->input('price_core');
        $product->expired_date = now();
        $product->is_hot = $request->input('product_hot', 1);
        $product->save();

        return redirect("products/index")->with('status', 'Create product success !');
    }

    public function update(UpdateProductRequest $request, $id) {
        $product = Product::findOrFail($id);
        $product->name = $request->input('product_name');
        $product->category_id = (int) $request->input('category_id', 1);
        $product->status = $request->input('product_status', 1);
        $product->description = $request->input('product_desc');
        $product->quantity = $request->input('product_quantity');
        $product->sell_price = $request->input('sell_price');
        $product->save();
        return redirect("products/index")->with('status', 'Update product success !');

    }
    public function destroy($id) {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect("products/index")->with('status', 'Delete product success !');
    }
}
