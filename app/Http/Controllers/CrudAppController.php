<?php

namespace App\Http\Controllers;

use App\Models\CrudApp;
// use Illuminate\Http\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
// use Session;
use File;

class CrudAppController extends Controller
{
    public function all_records()
    {
        $all_records = CrudApp::latest()->simplePaginate(5);
        return view('all_records',compact('all_records'));
    }

    public function add_new_record()
    {
        return view('add_new_record');
    }

    public function store_new_record(Request $request)
    {
        $request->validate([
            'name'=>'required|regex:/^[\pL\s\-]+$/u|max:50',
            'email'=>'required|regex:/(.+)@(.+)\.(.+)/i|email|max:50',
            'gender'=>'required',
            'age'=>'required|integer|min:1|between:1,100',
            'occupation'=>'required',
            'image'=>'required|mimes:jpg,jpeg,png,bmp',
            'date'=>'required',
            'color'=>'required',
            'about'=>'required|max:300',
            'check_me'=>'required'
        ]);

        $imageName = '';
        if ($image = $request->file('image')){
            $imageName = time().'-'.uniqid().'.'.$image->getClientOriginalExtension();
            $image->move('images/profile', $imageName);
        }
        CrudApp::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'gender'=>$request->gender,
            'age'=>$request->age,
            'occupation'=>$request->occupation,
            'image'=>$imageName,
            'date'=>$request->date,
            'color'=>$request->color,
            'about'=>$request->about,
            'check_me'=>$request->check_me,
        ]);
        Session::flash('message', 'New record added success.'); 
        Session::flash('alert-class', 'alert-success'); 
        return redirect()->back();
    }

    public function edit_record($id)
    {
        $record = CrudApp::findOrFail($id);
        return view('edit_record',compact('record'));
    }

    public function update_record(Request $request,$id)
    {
        $record = CrudApp::findOrFail($id);
        $request->validate([
            'name'=>'required|regex:/^[\pL\s\-]+$/u|max:50',
            'email'=>'required|regex:/(.+)@(.+)\.(.+)/i|email|max:50',
            'gender'=>'required',
            'age'=>'required|integer|min:1|between:1,100',
            'occupation'=>'required',
            'date'=>'required',
            'color'=>'required',
            'about'=>'required|max:300',
            'check_me'=>'required'
        ]);

        $imageName = '';
        $deleteOldImg =  'images/profile/'.$record->image;
        if ($image = $request->file('image')){
            if(file_exists($deleteOldImg)){
                File::delete($deleteOldImg);
            }
            $imageName = time().'-'.uniqid().'.'.$image->getClientOriginalExtension();
            $image->move('images/profile', $imageName);
        }else{
            $imageName = $record->image;
        }
        CrudApp::where('id',$id)->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'gender'=>$request->gender,
            'age'=>$request->age,
            'occupation'=>$request->occupation,
            'image'=>$imageName,
            'date'=>$request->date,
            'color'=>$request->color,
            'about'=>$request->about,
            'check_me'=>$request->check_me,
        ]);
        Session::flash('message', 'Record updated success.'); 
        Session::flash('alert-class', 'alert-success'); 
        return redirect()->back();
    }

    public function delete_record($id)
    {
        $record = CrudApp::find($id);
        $deleteImg =  'images/profile/'.$record->image;
        if (file_exists($deleteImg)) {
            File::delete($deleteImg);
        }
      $record->delete();
      Session::flash('message', 'Record deleted success.'); 
      Session::flash('alert-class', 'alert-danger'); 
      return redirect()->back();
    }
}