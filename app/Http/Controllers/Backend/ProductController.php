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
    //Nên tách ra 1 tầng repositories để xử lý các vấn đề liên quan tới database vì như thế này code đang tương dối dài ở controllers
    // Repository chỉ làm việc với query
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
        $product_name = $request->input('product_name');
        $category_id = $request->input('category_id', 1);
        $category_parent_id = $request->input('category_id', 1);
        $brand_id = $request->input('category_id', 1);
        $product_status = $request->input('product_status', 1);
        $product_desc = $request->input('product_desc');
        $image = $request->input('product_name', '');
        $product_quantity = $request->input('product_quantity');
        $quantity_sold = 0;
        $price_sell = $request->input('price_sell');
        $price_core = $request->input('price_core');
        $product_hot = $request->input('product_hot', 2);
        //Có 1 cách khác là get các request all mình cần sử  dụng
        $product = new Product();

        $product->name = $product_name;
        $product->category_id = $category_id;
        $product->category_parent_id = $category_parent_id;
        $product->brand_id = $brand_id;
        $product->status = $product_status;
        $product->description = $product_desc;
        $product->image = $image;
        $product->quantity = $product_quantity;
        $product->quantity_sold = $quantity_sold;
        $product->price_sell = $price_sell;
        $product->price_core = $price_core;
        $product->expired = now();
        $product->product_hot = $product_hot;
        $product->save();

        return redirect("products/index")->with('status', 'Create product success !');
    }

    public function update(UpdateProductRequest $request, $id) {
        $validatedData = $request->validate();

        $product_name = $request->input('product_name');
        $category_id = (int) $request->input('category_id', 1);
        $product_status = $request->input('product_status', 1);
        $product_desc = $request->input('product_desc');
        $product_quantity = $request->input('product_quantity');
        $product_price = $request->input('price_sell');
        //Có 1 cách khác là get các request all mình cần sử  dụng
        // Nên đẩy find or Fail lên trước sẽ giúp tăng performance
        $product = Product::findOrFail($id);
       
        $product->name = $product_name;
        $product->category_id = $category_id;
        $product->status = $product_status;
        $product->description = $product_desc;
        $product->quantity = $product_quantity;
        $product->price_sell = $product_price;
        $product->save();
        return redirect("products/index")->with('status', 'Update product success !');

    }
    public function destroy($id) {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect("products/index")->with('status', 'Delete product success !');
    }
}
