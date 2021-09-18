@extends('layouts.student_app')

@section('content')

<div class="card card-custom mb-7">
    <div class="card-header">
        <div class="card-title">
            <span class="card-icon">
                <i class="flaticon-search text-primary"></i>
            </span>
            <h3 class="card-label">
                {{ __("Your Exams") }} <small>Filteration enabled</small>
            </h3>
        </div>
        <div class="card-toolbar">
            {{--
            <a
                href="#"
                class="btn btn-icon btn-sm btn-primary mr-1"
                data-card-tool="toggle"
                data-toggle="tooltip"
                data-placement="top"
                title="Toggle Card"
            >
                <i class="ki ki-arrow-down icon-nm"></i>
            </a>
            --}}
            <!--begin::Dropdown-->
        
           
            <!--end::Button-->
        </div>
        
    </div>
    <div class="card-body">
        @include('alerts.alerts')
        <!--begin: Datatable-->
        
       
        <table
            class="table table-bordered table-hover table-checkable"
            id="table_id"
            style="margin-top: 13px !important"
        >
        <thead class="thead-light">
            <tr>
                <th>SL No.</th>
                <th>Exam Title</th>
                <th>Exam Date</th>
                <th>Status</th>
                <th>Result</th>                
                <th>Action</th>
            </tr>
        </thead>

        <tbody>

           <tr>
               <td>1</td>
               <td>{{ $student_info->title }}</td>
               <td>{{ $student_info->date }}</td>
               <td> <?php 
                if(strtotime($student_info->date) < strtotime(date('m/d/y'))) 
               {
                   echo "Completed";

               }
               else if(strtotime($student_info->date) == strtotime(date('m/d/y')))
               {
                   echo "running";
               }
               else 
               {
                   echo "pending";
               }
               ?>
               </td>
               <td>
                <?php
                    if($exam_result)
                    {
                        echo $exam_result->yes_ans.'/'. ($exam_result->yes_ans+$exam_result->no_ans);
                    }
                ?>
               </td>
               <td>
                <?php 
                   if(strtotime($student_info->date) == strtotime(date('m/d/y')))
                   {
                       if(!$exam_result) {
                ?>
               <a href="{{ url('join/exam', $student_info->exam) }}" class="btn btn-sm btn-info btn-pill" title="Edit details">Join Exam</a>
                <?php
                   } }
                ?>
            </td>
           </tr>

        </tbody>
        </table>

        <!--end: Datatable-->
     

    </div>
  
</div>


<!-- Add Student modal -->





<!-- edit modal -->




<!-- delete Modal -->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>

<!-- <script type="text/javascript">
    $(document).ready(function () {
        var table = $('#table_id').DataTable();
});
</script> -->
@endsection