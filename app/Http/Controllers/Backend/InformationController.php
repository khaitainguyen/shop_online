<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreInformationRequest;
use App\Models\Information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class InformationController extends Controller
{
    public function index(){
        $information = DB::table('information')->get()->first();
        return view("backend.informations.index", compact('information'));
    }
    public function create(){
        return view("backend.informations.create");
    }
    public function store (StoreInformationRequest $request){
        $information = new Information();
        $information->shop_name = $request->input('shop_name');
        $information->company_name =$request->input('company_name');
        $information->description = $request->input('description');
        $information->shop_image = $request->input('shop_image');
        $information->phone = $request->input('phone');
        $information->hotline = $request->input('hotline');
        $information->email = $request->input('email');
        $information->address = $request->input('address');
        $information->facebook = $request->input('facebook');
        $information->youtube = $request->input('youtube');
        $information->twitter = $request->input('twitter');
        $information->employee = $request->input('employee');
        $information->employee_image = $request->input('employee_image');
        $information->save();
        return redirect("information")->with('status', 'Create infirmation success!');
    }
    public function update(Request $request, $id){
        $information = Information::findOrFail($id);
        $information->shop_name = $request->input('shop_name');
        $information->company_name =$request->input('company_name');
        $information->description = $request->input('description');
        $information->shop_image = $request->input('shop_image');
        $information->phone = $request->input('phone');
        $information->hotline = $request->input('hotline');
        $information->email = $request->input('email');
        $information->address = $request->input('address');
        $information->facebook = $request->input('facebook');
        $information->youtube = $request->input('youtube');
        $information->twitter = $request->input('twitter');
        $information->employee = $request->input('employee');
        $information->employee_image = $request->input('employee_image');
        $information->save();
        return redirect("information")->with('status', 'Update information success!');
    }
}
