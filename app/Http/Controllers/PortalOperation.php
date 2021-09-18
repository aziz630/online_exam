<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\Exam;


class PortalOperation extends Controller
{
    public function Portal_Dashboard()
    {

        if(!Session::get('portal_session'))
        {
            return redirect(url('portal/signIn'));
        }
        
        $data['page_title'] = 'Portal Dashboard';

            // $data['exams'] = Exam::select('exams.*', 'exam_subjects.name as subject_name')
            // ->join('exam_subjects', 'exams.subject', '=', 'exam_subjects.id' )
            // ->orderBy('id', 'desc')
            // ->where('exams.status', 1)->get()->toArray();

            $data['exams'] = Exam::orderBy('id', 'desc')->where('exams.status', 1)->get()->toArray();

            // dd($data['exams']);
            return view('portal.portal_dashboard', $data);
    }
}
