<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Doctor;

class AdminController extends Controller
{
    public function createview(){
        return view('admin.add_doctor');
    }

    public function upload(Request $request){
        $doctor=new doctor;
        $image=$request->file;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->file->move('doctorimage',$imagename);
        $doctor->image=$imagename;
        $doctor->name=$request->Name;
        $doctor->phone=$request->Number;
        $doctor->office=$request->Office;
        $doctor->speciality=$request->Speciality;

        $doctor->save();
        return redirect()->back()->with('message', 'Complete');
    }
}