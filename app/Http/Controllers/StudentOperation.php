<?php

namespace App\Http\Controllers;
use Session;
use App\Models\Student;
use App\Models\ExamQuestionMaster;
use App\Models\ExamResult;
use App\Models\Exam;
use Illuminate\Http\Request;

class StudentOperation extends Controller
{
    public function Student_Dashboard()
    {

        /****
         * 
         * Student Dashboard
        */

        if(!Session::get('student_session'))
        {
            return redirect(url('student/signIn'));
        }
        $page_title = 'Student Dashboard';
        return view('student.student_dashboard', compact('page_title'));
    }


    /****
     * 
     * Student Selected Exam 
    */

    public function Student_exam()
    {
        $page_title = 'Student Dashboard';

        $student_info = Student::select(['students.*','exams.title','exams.date'])->join('exams','students.exam','=','exams.id')->where('students.id', Session::get('student_session'))->get()->first();
        
         // echo "<pre>";
        // print_r($student_info);
        $exam_result = ExamResult::where('exam_id',$student_info->exam)->where('user_id', Session::get('student_session'))->get()->first();

        return view('student.exam', compact('page_title', 'student_info', 'exam_result'));
    }


     /****
     * 
     * Student Session Distroy or logOut
     */

    public function Student_LogOut(Request $request)
    {
        $request->session()->forget('student_session');
        
        return redirect(url('student/signIn'));
    }


    /****
     * 
     * Student Join Exam function
    */

    public function Join_Exam($id)
    { 
        $data['page_title'] = 'Start Exam';
        $data['allQuestion1'] = ExamQuestionMaster::where('exam_id', $id)->orderBy('exam_question_masters.subject', 'ASC')->get()->random(9)->paginate(2);
        

       return view('student.join_exam', $data);
    }


    public function Submit_Student_Question(Request $request)
    {

        // echo "<pre>";
        // print_r($request->all());
        // die();
        $yes_ans = 0;
        $no_ans = 0;
        $data = $request->all();
        $result = array();
        for ($i=1; $i <= $request->index; $i++) { 
            if(isset($data['question'.$i]))
            {
                $question = ExamQuestionMaster::where('id', $data['question'.$i])->get()->first();
                if($question->ans == $data['ans'.$i])
                {
                    $result[$data['question'.$i]]='Yes';
                    $yes_ans++;
                }
                else
                {
                    $result[$data['question'.$i]]='NO';
                    $no_ans++;
                }
            }
        }

       $examResult = new ExamResult();
       $examResult->exam_id = $request->exam_id;
       $examResult->user_id = Session::get('student_session');
       $examResult->yes_ans = $yes_ans;
       $examResult->no_ans = $no_ans;
       $examResult->result_json = json_encode($result);
       $examResult->save();

       return redirect(url('student/show_result',$examResult->id));

    }

    public function Show_Exam_Result($id)
    {
        
        $page_title = 'Your Result';
        $result_info = ExamResult::where('id', $id)->get()->first();
        $student_info = Student::select(['students.*','exams.title','exams.date'])->join('exams','students.exam','=','exams.id')->where('students.id', Session::get('student_session'))->get()->first();
        // // dd($data['result_info']);
        $obtandmarks = $result_info->yes_ans;
        $total = $result_info->yes_ans+$result_info->no_ans;
        $persentage = $obtandmarks/$total*100;
        // dd($persentage);

        return view('student.show_result', compact('result_info', 'page_title', 'persentage', 'student_info'));
    }

}