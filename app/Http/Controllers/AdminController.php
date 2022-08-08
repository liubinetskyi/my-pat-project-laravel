<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Notifications\SendEmailNotification;
use Illuminate\Http\Request;
use App\Models\Doctor;
use Illuminate\Support\Facades\Auth;
use Notification;


class AdminController extends Controller
{
    public function createview(){
        if(Auth::id())
        {
            if(Auth::user()->usertype==1)
            {
                return view('admin.add_doctor');
            }
            else
            {
                return redirect()->back();
            }
        }
        else
        {
            return redirect('login');
        }
    }

    public function upload(Request $request){
        $doctor=new doctor;
        $image=$request->file;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->file->storeAs('/public/doctorimage', $imagename);
        $doctor->image=$imagename;
        $doctor->name=$request->Name;
        $doctor->phone=$request->Number;
        $doctor->office=$request->Office;
        $doctor->speciality=$request->specialty;

        $doctor->save();
        return redirect()->back()->with('message', 'Complete');
    }

    public function showappointment(){
        if(Auth::id())
        {
            if(Auth::user()->usertype==1)
            {
                $data=Appointment::all();
                return view('admin.showappointment', compact('data'));
            }
            else
            {
                return redirect()->back();
            }
        }
        else
        {
            return redirect('login');
        }
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

    public function delete($id){
        $data=Appointment::find($id);
        $data->delete();
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
        $request->file->storeAs('/public/doctorimage', $imagename);
        $doctor->image=$imagename;

        }

        $doctor->save();

        return redirect()->back()->with('message', 'Doctor Updated');
    }
    public function emailview($id){

        $data=appointment::find($id);
        return view('admin.email_view', compact('data'));
    }
    public function sendemail(Request $request, $id){

        $data = appointment::find($id);
        $details = [
            'greeting' => $request->greeting,
            'maintext' => $request->maintext,
            'linktext' => $request->linktext,
            'link' => $request->link,
            'end' => $request->end
        ];

        Notification::send($data, new SendEmailNotification($details));

        return redirect()->back()->with('message', 'Mail Send!');
    }
}
