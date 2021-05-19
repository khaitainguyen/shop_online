<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreIntroduceRequest;
use App\Http\Requests\UpdateIntroduceRequest;
use App\Models\Introduce;
use App\Models\IntroduceDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IntroduceController extends Controller
{
    const NEWS = 1;
    const INTRODUCE = 2;
   
    public function index(Request $request)
    {
        $introduce_type = (int) $request->query('introduce_type', '');
        $queryORM = DB::table('introduces');
        if (!empty($introduce_type)) {
            $queryORM = $queryORM->where('type', $introduce_type);
        }
        $introduces = $queryORM->paginate(10);
        $data = [];
        $data["introduces"] = $introduces;
        $data["introduce_type"] = $introduce_type;
        $data["NEWS"] = self::NEWS;
        $data["INTRODUCE"] = self::INTRODUCE;
        return view("backend.introduces.index", $data);
    }
    public function create(){
        $data = [];
        $data["NEWS"] = self::NEWS;
        $data["INTRODUCE"] = self::INTRODUCE;
        return view("backend.introduces.create", $data);
    }
    public function edit($id){
        $introduce = Introduce::findOrFail($id);
        $data = [];
        $data["introduce"] = $introduce;
        $data["NEWS"] = self::NEWS;
        $data["INTRODUCE"] = self::INTRODUCE;
        return view("backend.introduces.edit", $data);
    }
    public function delete($introduce_id){
        $introduce = Introduce::findOrFail($introduce_id);
        return view("backend.introduces.delete", compact('introduce'));
    }
    public function store(StoreIntroduceRequest $request) {
        $introduce = new Introduce();
        $introduce->name = $request->input('introduce_name');
        $introduce->desciption = $request->input('description');
        $introduce->type = $request->input('type');
        $introduce->save();
        return redirect("introduces/index")->with('status', 'Create product success !');
    }

    public function update(UpdateIntroduceRequest $request, $id) {
        $introduce = Introduce::findOrFail($id);
        $introduce->name = $request->input('introduce_name');
        $introduce->desciption = $request->input('description');
        $introduce->type = $request->input('type');
        $introduce->save();
        return redirect("introduces/index")->with('status', 'Update product success !');

    }
    public function destroy($id) {
        $introduce = Introduce::findOrFail($id);
        $introduce->delete();
        return redirect("introduces/index")->with('status', 'Delete product success !');
    }
}
