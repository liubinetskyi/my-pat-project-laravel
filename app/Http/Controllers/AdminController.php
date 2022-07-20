<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
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

    public function showappointment(){
        $data=Appointment::all();
        return view('admin.showappointment', compact('data'));
    }

    public function approve($id){
        $data=Appointment::find($id);
        $data->status='Approved';
        $data->save();

        return redirect()->back();
    }

    public function cancel($id){
        $data=Appointment::find($id);
        $data->status='Canceled';
        $data->save();

        return redirect()->back();
    }

    public function showdoctor(){
        $data=Doctor::all();
        return view('admin.showdoctor', compact('data'));
    }

    public function updatedoctor($id){
        $data=Doctor::find($id);
        return view('admin.update_doctor', compact('data'));
    }

    public function deletedoctor($id){
        $data=Doctor::find($id);
        $data->delete();

        return redirect()->back();
    }
    
    public function editdoctor(Request $request, $id){
        $doctor=Doctor::find($id);

        $doctor->name=$request->name;
        $doctor->phone=$request->phone;
        $doctor->speciality=$request->specialty;
        $doctor->office=$request->office;
        $image=$request->file;
        
        if($image)
        {

        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->file->move('doctorimage', $imagename);
        $doctor->image=$imagename;
        
        }

        $doctor->save();
        
        return redirect()->back()->with('message', 'Doctor Updated');
    }
}