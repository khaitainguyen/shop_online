<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    const ADMIN = 1;
    const USER = 2;

    public function index(Request $request){
        $user_name = $request->query('user_name', "");
        $user_email = $request->query('user_email', "");
        $type = $request->query('type', 0);
        $queryORM = User::where('name', "LIKE", "%".$user_name."%");
        if(!empty($user_email)){
            $queryORM->where('email', $user_email);
        }
        if(!empty($type)){
            $queryORM->where('type', $type);
        }
        $users = $queryORM->paginate(10);
        $data = [];
        $data['admin'] = self::ADMIN;
        $data['user'] = self::USER;
        $data['users'] = $users;
        $data['user_name'] = $user_name;
        $data['user_email'] = $user_email;
        $data['type'] = $type;
        return view("backend.users.index", $data);
    }
    public function create(){
        $data = [];
        $data['admin'] = self::ADMIN;
        $data['user'] = self::USER;
        return view("backend.users.create", $data);
    }
    public function edit($id){
        $user_edit = User::findOrFail($id);
        $data = [];
        $data['user_edit'] = $user_edit;
        $data['admin'] = self::ADMIN;
        $data['user'] = self::USER;
        return view("backend.users.edit", $data);
    }
    public function delete($id){
        $user = User::findOrFail($id);
        return view("backend.users.delete", compact('user'));
    }
    public function store(StoreUserRequest $request){
        $user = new User();
        $user->name = $request->input('user_name');
        $user->email = $request->input('user_email');
        $user->password = $request->input('user_password');
        $user->image = $request->input('user_image', "");
        $user->phone = $request->input('user_phone');
        $user->address = $request->input('user_address');
        $user->note = $request->input('note', "");
        $user->type = $request->input('user_type', 2);
        $user->save();
        return redirect("users/index")->with('status', 'Create user success !');
    }
    public function update(UpdateUserRequest $request, $id){
        $user = User::findOrFail($id);
        $user->name = $request->input('user_name');
        $user->email = $request->input('user_email');
        $user->password = $request->input('user_password');
        $user->image = $request->input('user_image');
        $user->phone = $request->input('user_phone');
        $user->address = $request->input('user_address');
        $user->note = $request->input('note');
        $user->type = $request->input('user_type');
        $user->save();
        return redirect("users/edit/$id")->with('status', 'Update user success !');
    }
    public function destroy($id){
        $product = User::findOrFail($id);
        $product->delete();
        return redirect("users/index")->with('status', 'Delete user success !');
    }
}
