<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePartnerRequest;
use App\Http\Requests\UpdatePartnerRequest;
use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    const IN_RELATIONSHIP = 1;
    const OUT_RELATIONSHIP = 2;
    public function index(Request $request){
        $partner_name = $request->input('partner_name', "");
        $data = [];
        $partners = Partner::where('name', 'LIKE', "%".$partner_name."%")->paginate(10);
        $data['in_rel'] = self::IN_RELATIONSHIP;
        $data['out_rel'] = self::OUT_RELATIONSHIP;
        $data['partner_name'] = $partner_name;
        $data['partners'] = $partners;
        return view("backend.partners.index", $data);
    }
    public function create(){
        $data = [];
        $data['in_rel'] = self::IN_RELATIONSHIP;
        $data['out_rel'] = self::OUT_RELATIONSHIP;
        return view("backend.partners.create", $data);
    }
    public function edit($id){
        $partner = Partner::findOrFail($id);
        $data = [];
        $data['in_rel'] = self::IN_RELATIONSHIP;
        $data['out_rel'] = self::OUT_RELATIONSHIP;
        $data['partner'] = $partner;
        return view("backend.partners.edit", $data);
    }
    public function delete($id){
        $partner = Partner::findOrFail($id);
        return view("backend.partners.delete", compact('partner'));
    }
    public function store(StorePartnerRequest $request){
        $partner = new Partner();
        $partner->name = $request->input('partner_name');
        $partner->image = $request->input('partner_image');
        $partner->status = $request->input('partner_status');
        $partner->save();
        return redirect("partners/index")->with('status', "Create partner success!");
    }
    public function update(UpdatePartnerRequest $request, $id){
        $partner = Partner::findOrFail($id);
        $partner->name = $request->input('partner_name');
        $partner->image = $request->input('partner_image');
        $partner->status = $request->input('partner_status');
        $partner->save();
        return redirect("partners/edit/$id")->with('status', 'Update partner success!');
    }
    public function destroy($id){
        $partner = Partner::findOrFail($id);
        $partner->delete();
        return redirect("partners/index") ->with('status', 'Delete partner seccess!');
    }
}
