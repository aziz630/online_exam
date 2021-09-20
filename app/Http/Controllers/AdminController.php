<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exam;
use App\Models\Student;
use App\Models\Portal;
use App\Models\ExamSubject;
use App\Models\ExamQuestionMaster;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{


    /*******************************
     * 
     * 
     * Dashboard View
     */

    public function index()
    {
        $page_title = 'Admin Dashboard';
        
        $TotalExam = Exam::where('status', true)->count();
        $TotalStudents = Student::where('status', true)->count();
        $TotalPortal = Portal::where('status', true)->count();

        return view('admin.dashboard', compact('page_title', 'TotalExam', 'TotalStudents', 'TotalPortal'));

    }


    /******************************
     * 
     * 
     * Exam Subject list
     */

    public function Exam_Subject()
    {
        $page_title = 'Subject';

        $allData = ExamSubject::all();

        return view('admin.exam_subject', compact('page_title', 'allData'));
    }


    /******
     * 
     * 
     * Add Subject 
     */

    public function Add_New_Subject(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
        ]);

        $data = new ExamSubject();
        $data->name = $request->name;
        $data->status = '1';
        $data->save();

        return redirect()->back()->with('success', 'Subject Added Successfully.');

    }

    
    /******
     * 
     * 
     * update Subject
     */
    public function Update_Subject(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required',
        ]);

        $data = ExamSubject::find($id);
        $data->name = $request->name;
        $data->status = 1;
        $data->save();

        return redirect()->back()->with('success', 'Subject Updated Successfully.');

    }


    /******
     * 
     * 
     * delete Subject
     */

    public function Delete_Subject($id)
    {
        $data = ExamSubject::find($id);
        $data->delete();

        return redirect()->back()->with('success', 'Subject Delete Successfully.');

    }


    /******
     * 
     * 
     * change Subject status
     */

    public function Subject_Status($id)
    {
        // echo $id; 
        $data = ExamSubject::where('id', $id)->get()->first();
        if($data->status == 1)
            $status = 0;
        else
            $status = 1;

        $data = ExamSubject::where('id', $id)->get()->first();
        $data->status = $status;
        $data->save();
    }




    /******************************
     * 
     * 
     * Exam list 
     */

    public function Exam_List()
    {
        $page_title = 'Manage Exam';

        $subject = ExamSubject::where('status', 1)->get();
        // $data = Exam::select(['exams.*','exam_subjects.name as sub_name'])->orderBy('id', 'desc')->join('exam_subjects', 'exams.subject','=','exam_subjects.id')->get();
        $data = Exam::Where('status', true)->get();
        // dd($data);
        return view('admin.manage_exam', compact('subject', 'page_title', 'data'));
    }

    /******
     * 
     * 
     * Add Exam 
    */

    public function Add_New_Exam(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'date' => 'required',
            // 'subject' => 'required',
        ]);

        $data = new Exam();
        $data->title = $request->title;
        $data->date = $request->date;
        // $data->subject = $request->subject;
        $data->status = 1;
        $data->save();

        return redirect()->back()->with('success', 'Exam Created Successfully.');

    }

    
    /******
     * 
     * 
     * Update Exam
     */

    public function Update_Exam(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required',
            'date' => 'required',
            // 'subject' => 'required',
        ]);

        $data = Exam::find($id);
        $data->title = $request->title;
        $data->date = $request->date;
        // $data->subject = $request->subject;
        $data->status = 1;
        $data->save();

        return redirect()->back()->with('success', 'Exam updated Successfully.');
    }

    /******
     * 
     * 
     * Delete Exam 
     */

    public function Delete_Exam($id)
    {
        
        $data = Exam::where('id',$id)->first();

        if ($data != null) {
            $data->delete();

            return redirect()->back()->with('success', 'Exam Deleted Successfully.');
        }

        return redirect()->back()->with('success', 'Wrong Id.');

    }
    
    /******
     * 
     * 
     * Change Exam Status
     */
    public function Exam_Status($id)
    {
        // echo $id; 
        $data = Exam::where('id', $id)->get()->first();
        if($data->status == 1)
            $status = 0;
        else
            $status = 1;

        $data = Exam::where('id', $id)->get()->first();
        $data->status = $status;
        $data->save();
    }





    /********************************
     * 
     * 
     * Student list 
    */

     public function Student_List()
    {
        $page_title = 'Manage Student';


        $exams = Exam::where('status', 1)->get();
        $students = Student::select(['students.*','exams.title as exam_name'])
        ->join('exams','students.exam', '=', 'exams.id')->get();


        return view('admin.manage_student', compact('students', 'page_title', 'exams'));
    } 




    public function Add_New_Student(Request $request)
    {
        
        $data = new Student();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->dob = $request->date;
        $data->exam = $request->exam;
        $data->password = $request->password;
        $data->status = 1;
        $data->save();

        return redirect()->back()->with('success', 'Student Added Successfully.');
    
    }

    public function Edit_Student($id)
    {
        $page_title = 'Edit Student';
        $students = Student::find($id);
        $exams = Exam::where('status', 1)->get();


        return view('admin.edit_student', compact('students', 'page_title', 'exams'));

    }


    public function Update_Student(Request $request, $id)
    {
        $data = Student::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->dob = $request->date;
        $data->exam = $request->exam;
        $data->password = $request->password;
        $data->status = 1;
        $data->save();

        return redirect(url('student'))->with('success', 'Student Added Successfully.');
    }


    public function Delete_Student($id)
    {
        $data = Student::find($id);

        if ($data != null) {
            $data->delete();

            return redirect()->back()->with('success', 'Student Deleted Successfully.');
        }

        return redirect()->back()->with('success', 'Wrong Id.');

    }


     /******
     * 
     * 
     * Change Student Status
     */

    public function Student_Status($id)
    {
        // echo $id; 
        $data = Student::where('id', $id)->get()->first();
        if($data->status == 1)
            $status = 0;
        else
            $status = 1;

        $data = Student::where('id', $id)->get()->first();
        $data->status = $status;
        $data->save();
    }




    /********************************
     * 
     * 
     * Portal list 
     */

    public function Portal_List()
    {
        $page_title = 'Manage Portal';

        $portals = Portal::all();

        return view('admin.manage_portal', compact('portals', 'page_title'));
    } 



    /***
     * 
     * 
     * Add new Portal
     */

    public function Add_New_Portal(Request $request)
    {

        $validated = $request->validate([
            'name'      => 'required',
            'email'     => 'required|email|unique:portals|max:255',
            'phone'     => 'required',
            'password'  => 'required',
            
        ]);

        if($validated)

        $data = new Portal();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->password = $request->password;
        $data->status = 1;
        $data->save();
    
        return redirect()->back()->with('success', 'Data Added Successfully.');

    }


    /***
     * 
     * Update Portal
     * 
     */


    public function Update_Portal($id)
    {

        $validated = $request->validate([
            'name'       => 'required',
            'email'      => 'required|email|unique:portals|max:255',
            'phone'      => 'required',
            'password'   => 'required',
            
        ]);
        
        $data = Portal::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);
        $data->status = 1;
        $data->save();

        return redirect(url('portal'))->with('success', 'Data Updated Successfully.');

    }


     /******
     * 
     * 
     * Change Portal Status
     */

    public function Portal_Status($id)
    {
        // echo $id; 
        $data = Portal::where('id', $id)->get()->first();
        if($data->status == 1)
            $status = 0;
        else
            $status = 1;

        $data = Portal::where('id', $id)->get()->first();
        $data->status = $status;
        $data->save();
    }


     /******
     * 
     * 
     * Exam Question List
     */

    public function Exam_Question($id)
    {
        $data['page_title'] = 'Question List';
        $data['subjects'] = ExamSubject::where('status', 1)->get();
        
        // dd( $data['subjects']);

        $data['questions'] = ExamQuestionMaster::where('exam_id', $id)->orderBy('id', 'DESC')->get()->toArray();
        // dd( $data['questions']);

       return view('admin.add_question', $data);
    }


 
    /******
     * 
     * 
     * Add New Question
    */

    public function Add_New_Question(Request $request)
    {

        $validated = $request->validate([
            'question' => 'required',
            'option1'   => 'required',
            'option2'   => 'required',
            'option3'   => 'required',
            'option4'   => 'required',
            'answer'    => 'required',
            'subjects'  => 'required',
        ],
        [
            'subjects.required' => 'please assign subject to your question'
        ]);


        $question = new ExamQuestionMaster();
        $question->exam_id = $request->exam;
        $question->questions = $request->question;
        $question->ans = $request->answer;
        $question->options = json_encode(array(
        'option1'=>$request->option1,
        'option2'=>$request->option2,
        'option3'=>$request->option3,
        'option4'=>$request->option4,
        ));
        $question->status = true;
        $question->subject = $request->subjects;
        $question->save();
        // if($question->save()){
        //     $question->ExamSubject()->sync($request->subjects);
        // }
        

        return redirect(url('exam/question/'.$request->exam))->withSuccess('New Question added Successfully.');
    }


    /******
     * 
     * 
     * Change Exam Question Status
    */

    public function Exam_Question_Status($id)
    {
        // echo $id; 
        $data = ExamQuestionMaster::where('id', $id)->get()->first();
        if($data->status == 1)
            $status = 0;
        else
            $status = 1;

        $data = ExamQuestionMaster::where('id', $id)->get()->first();
        $data->status = $status;
        $data->save();
    }



    /******
     * 
     * 
     * Edit Exam Question page
    */

    public function Edit_Exam_Question($id)
    {
        $data['page_title'] = 'Edit Exam Question';

        $data['editQuestion'] = ExamQuestionMaster::where('id', $id)->get()->toArray();

        return view('admin.edit_exam_question', $data);
    }



    /******
     * 
     * 
     * Update Exam Question 
     */

    public function Update_Exam_Question(Request $request)
    {

        // echo "<pre>";
        // print_r($request->all());

        $validated = $request->validate([
            'question'  => 'required',
            'option1'   => 'required',
            'option2'   => 'required',
            'option3'   => 'required',
            'option4'   => 'required',
            'answer'    => 'required',
        ]);

        $question = ExamQuestionMaster::where('id', $request->id)->get()->first();

        $question->questions = $request->question;
        $question->ans = $request->answer;
        $question->options = json_encode(array(
        'option1'=>$request->option1,
        'option2'=>$request->option2,
        'option3'=>$request->option3,
        'option4'=>$request->option4,
        ));
        $question->status = true;
        $question->update();
            
        // echo json_encode(array('status'=> 'true', 'message'=> 'Question Updated Successfully', 'reload'=> url('exam/question/'.$question->exam_id)));
        return redirect(url('exam/question/'.$question->exam_id))->withSuccess('Question Updated Successfully.');
    }



    /******
     * 
     * 
     * Delete Exam Question
     */

    public function Delete_Exam_Question($id)
    {
        $data = ExamQuestionMaster::find($id);

        if ($data != null) {
            $data->delete();
 
            return redirect()->back()->with('success', 'Exam Question Deleted Successfully.');
        }

        return redirect()->back()->with('success', 'Wrong Id.');

    }
}
