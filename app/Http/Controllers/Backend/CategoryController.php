<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index(Request $request){
        $category_name = $request->input('category_name', "");
        $data = [];
        $categories = Category::where('name', 'LIKE', "%".$category_name."%")->paginate(10);
        $categories_parent = DB::table('categories')->get();
        $data['categories_parent'] = $categories_parent;
        $data['category_name'] = $category_name;
        $data['categories'] = $categories;
        return view("backend.categories.index", $data);
    }
    public function create(){
        $categories_parent = DB::table('categories')->get();
        return view("backend.categories.create", compact('categories_parent'));
    }
    public function edit($id){
        $category = Category::findOrFail($id);
        $categories_parent = DB::table('categories')->get();
        $data = [];
        $data['category'] = $category;
        $data['categories_parent'] = $categories_parent;
        return view("backend.categories.edit", $data);
    }
    public function delete($id){
        $category = Category::findOrFail($id);
        return view("backend.categories.delete", compact('category'));
    }
    public function store(StoreCategoryRequest $request){
        $category = new Category();
        $category->name = $request->input('name');
        $category->description =$request->input('description');
        $category->parent_id = $request->input('parent_id');
        $category->save();
        return redirect("categories/index")->with('status', "Create category success!");
    }
    public function update(UpdateCategoryRequest $request, $id){
        $category = Category::findOrFail($id);
        $category->name = $request->input('name');
        $category->description =$request->input('description');
        $category->parent_id = $request->input('parent_id');
        $category->save();
        return redirect("categories/edit/$id")->with('status', 'Update category success!');
    }
    public function destroy($id){
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect("categories/index") ->with('status', 'Delete category seccess!');
    }
}
