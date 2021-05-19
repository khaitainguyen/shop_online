<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreIntroduceDetailRequest;
use Illuminate\Http\Request;
use App\Http\Requests\StoreIntroduceRequest;
use App\Http\Requests\UpdateIntroduceDetailRequest;
use App\Http\Requests\UpdateIntroduceRequest;
use App\Models\Introduce;
use App\Models\IntroduceDetail;
use Illuminate\Support\Facades\DB;

class IntroduceDetailController extends Controller
{
    const NEWS = 1;
    const INTRODUCE = 2;
   
    public function index(Request $request)
    {
        $searchKeyword = $request->query('introduce_name', '');
        $introduce_type = (int) $request->query('introduce_type', '');
        $intro_select_id = (int) $request->query('intro_select_id', '');
        $queryORM = IntroduceDetail::where('introduce_details.name', "LIKE", "%".$searchKeyword."%")
            ->join('introduces', 'introduce_details.introduce_id', '=', 'introduces.id')
            ->select('introduce_details.*',
            'introduces.name as introduce_name',
            'introduces.id as introduce_id',
            'introduces.type as type'
            );
        if (!empty($introduce_type)) {
            $queryORM = $queryORM->where('introduces.type', $introduce_type);
        }
        if (!empty($intro_select_id)){
            $queryORM = $queryORM->where('introduces.id', $intro_select_id);
        }
        $introduce_names = DB::table('introduces')->get();
        $introduces = $queryORM->paginate(10);
        $data = [];
        $data["introduces"] = $introduces;
        $data["searchKeyword"] = $searchKeyword;
        $data["introduce_type"] = $introduce_type;
        $data["intro_select_id"] = $intro_select_id;
        $data["NEWS"] = self::NEWS;
        $data["INTRODUCE"] = self::INTRODUCE;
        $data["introduce_names"] = $introduce_names;
        return view("backend.introduce_detail.index", $data);
    }
    public function create(){
        $data = [];
        $introduces = DB::table('introduces')->get();
        $data["introduces"] = $introduces;
        $data["NEWS"] = self::NEWS;
        $data["INTRODUCE"] = self::INTRODUCE;
        return view("backend.introduce_detail.create", $data);
    }
    public function edit($id){
        $introduce = IntroduceDetail::findOrFail($id);
        $data = [];
        $data["introduce"] = $introduce;
        $data["NEWS"] = self::NEWS;
        $data["INTRODUCE"] = self::INTRODUCE;
        $introduce_selects = DB::table('introduces')->get();
        $data["introduce_selects"] = $introduce_selects;
        return view("backend.introduce_detail.edit", $data);
    }
    public function delete($detail_id){
        $introduce = IntroduceDetail::findOrFail($detail_id);
        return view("backend.introduce_detail.delete", compact('introduce'));
    }
    public function store(StoreIntroduceDetailRequest $request) {
        $introduce = new IntroduceDetail();
        $introduce->introduce_id = $request->input('introduce_id');
        $introduce->name = $request->input('detail_name');
        $introduce->desciption = $request->input('detail_desc');
        $introduce->image = $request->input('detail_image');
        $introduce->save();
        return redirect("introducedetail/index")->with('status', 'Create Introduce Detail success !');
    }

    public function update(UpdateIntroduceDetailRequest $request, $id) {
        $introduce = IntroduceDetail::findOrFail($id);
        $introduce->introduce_id = $request->input('introduce_id');
        $introduce->name = $request->input('detail_name');
        $introduce->desciption = $request->input('detail_desc');
        $introduce->image = $request->input('detail_image');
        $introduce->save();
        return redirect("introducedetail/index")->with('status', 'Update Introduce Detail success !');

    }
    public function destroy($id) {
        $introduce = IntroduceDetail::findOrFail($id);
        $introduce->delete();
        return redirect("introducedetail/index")->with('status', 'Delete Introduce Detail success !');
    }
}
