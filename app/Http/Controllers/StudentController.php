<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Session;

class StudentController extends Controller
{
    public function Student_SignIn()
    {
        return view('student.sign_in');

    }
    


     /****
     * 
     * Student login and Check Student Email And Password
     */

    public function Check_Student_SignIn(Request $request)
    {
        $check =  Student::where('email', $request->email)->where('password', $request->password)->get()->toArray();

        if($check)
        {
            if($check[0]['status'] == 1 ){

                $request->session()->put('student_session', $check[0]['id']);
                return redirect(url('student_dashboard')); 
            }
            else{
                return redirect()->back()->withErrors('Your account is Deactive! Contact with admin.'); 
            }
        }
        else{
            return redirect()->back()->withErrors('Email and Password Not Match!'); 
        }
    }
    
  
}
