<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFeedbackRequest;
use App\Http\Requests\UpdateFeedbackRequest;
use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index(Request $request){
        $search_name = $request->input('name', "");
        $data = [];
        $feedbacks = Feedback::where('name', 'LIKE', "%".$search_name."%")->paginate(10);
        $data['search_name'] = $search_name;
        $data['feedbacks'] = $feedbacks;
        return view("backend.feedbacks.index", $data);
    }
    public function create(){
        return view("backend.feedbacks.create");
    }
    public function edit($id){
        $feedback = Feedback::findOrFail($id);
        return view("backend.feedbacks.edit", compact('feedback'));
    }
    public function delete($id){
        $feedback = Feedback::findOrFail($id);
        return view("backend.feedbacks.delete", compact('feedback'));
    }
    public function store(StoreFeedbackRequest $request){
        $feedback = new Feedback();
        $feedback->name = $request->input('name');
        $feedback->description =$request->input('description');
        $feedback->email = $request->input('email');
        $feedback->address = $request->input('address');
        $feedback->phone = $request->input('phone');
        $feedback->content = $request->input('content');
        $feedback->save();
        return redirect("feedbacks/index")->with('status', "Create feedback success!");
    }
    public function update(UpdateFeedbackRequest $request, $id){
        $feedback = Feedback::findOrFail($id);
        $feedback->name = $request->input('name');
        $feedback->description =$request->input('description');
        $feedback->email = $request->input('email');
        $feedback->address = $request->input('address');
        $feedback->phone = $request->input('phone');
        $feedback->content = $request->input('content');
        $feedback->save();
        return redirect("feedbacks/edit/$id")->with('status', 'Update feedback success!');
    }
    public function destroy($id){
        $feedback = Feedback::findOrFail($id);
        $feedback->delete();
        return redirect("feedbacks/index") ->with('status', 'Delete feedback seccess!');
    }
}
