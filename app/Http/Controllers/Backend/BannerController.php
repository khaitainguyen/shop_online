<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBannerRequest;
use App\Http\Requests\UpdateBannerRequest;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    const WAIT = 1;
    const RUN = 2;
    const STOP = 3;
    public function index(Request $request){
        $banner_name = $request->input('banner_name', "");
        $data = [];
        $banners = Banner::where('name', 'LIKE', "%".$banner_name."%")->paginate(10);
        $data['banner_name'] = $banner_name;
        $data['banners'] = $banners;
        $data['wait'] = self::WAIT;
        $data['run'] = self::RUN;
        $data['stop'] = self::STOP;
        return view("backend.banners.index", $data);
    }
    public function create(){
        return view("backend.banners.create");
    }
    public function edit($id){
        $banner = Banner::findOrFail($id);
        $data = [];
        $data['wait'] = self::WAIT;
        $data['run'] = self::RUN;
        $data['stop'] = self::STOP;
        $data['banner'] = $banner;
        return view("backend.banners.edit", $data);
    }
    public function delete($id){
        $banner = Banner::findOrFail($id);
        return view("backend.banners.delete", compact('banner'));
    }
    public function store(StoreBannerRequest $request){
        $banner = new Banner();
        $banner->name = $request->input('name');
        $banner->image =$request->input('image');
        $banner->status = self::WAIT;
        $banner->save();
        return redirect("banners/index")->with('status', "Create banner success!");
    }
    public function update(UpdateBannerRequest $request, $id){
        $banner = Banner::findOrFail($id);
        $banner->name = $request->input('name');
        $banner->image =$request->input('image');
        $banner->status = $request->input('status');
        $banner->save();
        return redirect("banners/edit/$id")->with('status', 'Update banner success!');
    }
    public function destroy($id){
        $banner = Banner::findOrFail($id);
        $banner->delete();
        return redirect("banners/index") ->with('status', 'Delete banner seccess!');
    }
}
