<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class BrandController extends Controller
{
    public function index(Request $request){
        $brand_name = $request->input('brand_name', "");
        $data = [];
        $brands = Brand::where('name', 'LIKE', "%".$brand_name."%")->paginate(10);
        $data['brand_name'] = $brand_name;
        $data['brands'] = $brands;
        return view("backend.brands.index", $data);
    }
    public function create(){
        return view("backend.brands.create");
    }
    public function edit($id){
        $brand = Brand::findOrFail($id);
        return view("backend.brands.edit", compact('brand'));
    }
    public function delete($id){
        $brand = Brand::findOrFail($id);
        return view("backend.brands.delete", compact('brand'));
    }
    public function store(StoreBrandRequest $request){
        $brand = new Brand();
        $brand->name = $request->input('brand_name');
        $brand->desciption =$request->input('brand_desc');
        $brand->image = $request->input('brand_image');
        $brand->address = $request->input('brand_add');
        $brand->save();
        return redirect("brands/index")->with('status', "Create brand success!");
    }
    public function update(UpdateBrandRequest $request, $id){
        $brand = Brand::findOrFail($id);
        $brand->name = $request->input('brand_name');
        $brand->desciption =$request->input('brand_desc');
        $brand->image = $request->input('brand_image');
        $brand->address = $request->input('brand_add');
        $brand->save();
        return redirect("brands/edit/$id")->with('status', 'Update brand success!');
    }
    public function destroy($id){
        $brand = Brand::findOrFail($id);
        $brand->delete();
        return redirect("brands/index") ->with('status', 'Delete brand seccess!');
    }
}
