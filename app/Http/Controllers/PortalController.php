<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portal;
use App\Models\Student;
use App\Models\Exam;
use Illuminate\Support\Facades\Hash;
use Session;
use Illuminate\Support\Facades\Auth;

class PortalController extends Controller
{

    public function Portal_signUp()
    {
        if(Session::get('portal_session'))
        {
            return redirect(url('portal_dashboard'));
        }
        return view('portal.signup');
    }

    public function Portal_SignIn()
    {
        if(Session::get('portal_session'))
        {
            return redirect(url('portal_dashboard'));
        }
        return view('portal.portal_login');
    }


    public function Save_Portal_SignUp(Request $request)
    {
         $validated = $request->validate([
            'name' => 'required', 
            'email' => 'required', 
            'phone' => 'required', 
            'password' => 'required', 
            
        ]);


        $data = new Portal();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->password = $request->password;
        $data->status = false;
        $data->save();

        return redirect(url('portal/signIn'))->withSuccess('We receive your Application.. Admin will approve soon.');
    }


    /***
     * 
     *  check user email and password to login 
     */

    public function Check_Login(Request $request)
    {

        $email = $request->email;
        $password = $request->password;
// dd($request->all());
        $check = Portal::where('email', $email)->where('password', $password)->get()->toArray();

        if($check)
        {
            if($check[0]['status'] == 1 ){

                $request->session()->put('portal_session', $check[0]['id']);
                return redirect(url('portal_dashboard')); 
            }
            else{
                return redirect()->back()->withErrors('Your account is Deactive!');
                // return redirect()->back()->with('error', 'Your account is Deactive!.'); 
            }
        }
        else{
            return redirect()->back()->withErrors('Email and Password Not Match!'); 

        }
    } 

    public function Student_Exam_form($id)
    {
        $data['page_title'] = 'Test Application Form';
        $data['id'] = $id;
        // $students = Student::where('id', $id)->get()->first();
        $exam_info = Exam::where('id', $id)->get()->first();
        $data['exam_title'] = $exam_info->title;
        $data['exam_date'] = $exam_info->date;
        // $data['email'] = Auth::email(); 
 
        return view('portal.student_exam_form', $data);
    }

    public function Save_Student_Exam_Form(Request $request)
    {
        $data = new Student();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->dob = $request->dob;
        $data->exam = $request->id;
        $data->password = $request->password;
        $data->status = false;
        $data->save();

        return redirect(url('student/info/print',$data->id))->withSuccess('Your Form is Submited for your Exam,, Admin will approve you soon');
    } 

    public function Print_Info($id)
    {
        $page_title = 'Print Your Information';
        $prnt_Info = Student::where('id', $id)->get()->first();
        $exam_info = Exam::where('id', $prnt_Info->exam)->get()->first();
        $exam_title = $exam_info->title;
        $exam_date = $exam_info->date;

       return view('portal.print_student_info', compact('page_title', 'prnt_Info', 'exam_info', 'exam_title', 'exam_date'));
    }

    public function LogOut(Request $request)
    {
        $request->session()->forget('portal_session');

        return redirect(url('portal/signIn'));
    }
}
