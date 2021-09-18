@extends('layouts.app')

@section('content')

<div class="card card-custom mb-7">
    <div class="card-header">
        <div class="card-title">
            <span class="card-icon">
                <i class="flaticon-search text-primary"></i>
            </span>
            <h3 class="card-label">
                {{ __("Questions") }} <small>Filteration enabled</small>
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
           
            <!--end::Dropdown-->
            <!--begin::Button-->
            <a
                href="#"
                class="btn btn-primary font-weight-bolder" data-toggle="modal" data-target="#questionModal"
            >
                <span class="svg-icon svg-icon-md">
                    <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink"
                        width="24px"
                        height="24px"
                        viewBox="0 0 24 24"
                        version="1.1"
                    >
                        <g
                            stroke="none"
                            stroke-width="1"
                            fill="none"
                            fill-rule="evenodd"
                        >
                            <rect x="0" y="0" width="24" height="24" />
                            <circle fill="#000000" cx="9" cy="15" r="6" />
                            <path
                                d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z"
                                fill="#000000"
                                opacity="0.3"
                            />
                        </g>
                    </svg>
                    <!--end::Svg Icon--> </span
                >Add Question</a
            >
            <!--end::Button-->
        </div>
        
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
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
                <th width="8%">SL No.</th>
                <th>Question</th>
                <th width="20%">Answer</th>
                <th width="10%">Status</th>
                <th width="20%">Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach($questions as $key => $question)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{ $question['questions'] }}</td>
                    <td>{{ $question['ans'] }}</td>
                    <td><label class="checkbox checkbox-outline checkbox-outline-2x checkbox-primary">
                    <input class="exam_Qn_status" data-id="<?php echo $question['id']?>" <?php if($question['status'] == 1) { echo "checked"; } ?> type="checkbox" name="Checkboxes15"  />
                    <span></span></label></td>
                    <td> 
                        <a href="{{ url('edit/exam/question', $question['id'] ) }}" class="btn btn-sm btn-success btn-pill" title="Edit details">Edit</a>
                        <a href="#" class="btn btn-sm btn-danger btn-pill delete" title="Delete">Delete</a>
                    </td>
                    
                </tr>
              @endforeach
        </tbody>
        </table>

        <!--end: Datatable-->
     

    </div>
  
</div>




 <!-- Add Question Model -->

 <div class="modal fade" id="questionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Question</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form action="{{ url('add/new/question')}}" method="post">
            @csrf
                <div class="container-fluid">
                    @if(count($subjects))
                    <div class="form-group row">
                        <div class="col-lg-12">
                            <label>Assign Subject:</label>
                            <div class="radio-inline">
                                @php $i = 1; @endphp
                                @foreach($subjects as $key => $subject)
                                <label class="radio radio-solid">
                                    <input type="checkbox" name="subjects"
                                    
                                    value="{{ $subject->id }}" /> <span></span>
                                    {{ $subject->name }}</label
                                >
                                @php $i++; @endphp @endforeach
                            </div>
                            <span class="form-text text-muted"
                                >Select atleast one subject for this Question</span
                            >
                        </div>
                    
                    </div>


                    <div class="row">
                        <input type="hidden" name="exam" value="{{ Request::segment(3) }}">
                        <div class="col-sm-12">
                            <label for="recipient-name" class="col-form-label">Enter Question:</label>
                            <input type="text" class="form-control" name="question" placeholder="Enter Exam Name"
                            value="">
                            
                            <span class="form-text text-muted">Please enter Question</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="recipient-name" class="col-form-label">Enter Option 1:</label>
                            <input type="text" class="form-control" name="option1" placeholder="Enter Option 1"
                            value="">
                            
                            <span class="form-text text-muted">Please enter exam name</span>
                        </div>
                        <div class="col-sm-6">
                            <label for="recipient-name" class="col-form-label">Enter Option 2:</label>
                            <input type="text" class="form-control" name="option2" placeholder="Enter Option 2"
                            value="">
                            
                            <span class="form-text text-muted">Please enter Option 2</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="recipient-name" class="col-form-label">Enter Option 3:</label>
                            <input type="text" class="form-control" name="option3" placeholder="Enter Option 3"
                            value="">
                        
                            <span class="form-text text-muted">Please enter Option 3</span>
                        </div>
                        <div class="col-sm-6">
                            <label for="recipient-name" class="col-form-label">Enter Option 4:</label>
                            <input type="text" class="form-control" name="option4" placeholder="Enter Option 4"
                            value="">
                            
                            <span class="form-text text-muted">Please enter Option 4</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <label for="recipient-name" class="col-form-label">Enter Right Answer:</label>
                            <input type="text" class="form-control" name="answer" placeholder="Enter Right Answer"
                            value="">
                        
                            <span class="form-text text-muted">Please enter Right Answer</span>
                        </div>
                    </div>
                    @elseif(!count($subjects))
                    <h3>Subject not found</h3>
                    <p>Please created subject first.</p>
                    @endif
                    <br>
                    @if(!count($subjects))
                        <div class="row">
                            <div class="col-lg-6">
                                <a
                                    href="#"
                                    class="btn btn-primary" data-toggle="modal" data-target="#subjectModal"
                                >
                                    Create Subjects
                                </a>
                            </div>
                        </div>
                    @elseif(count($subjects))
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-pill">Save</button>
                        <button type="button" class="btn btn-secondary btn-pill" data-dismiss="modal">cancle</button>
                    </div>
                    @endif
                </div>   
            </form>
        </div>
    </div>
  </div>
</div>






<!-- delete Modal -->


<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Subject</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/deleteExamStatus" method="post" id="deleteForm">
            @csrf
            {{ method_field('DELETE') }}

            <input type="hidden" name="_method" value="DELETE">
          <p>Are You Sure? ..You want to Delete Data</p>
          <br>
          <div class="form-group">
              <button type="submit" class="btn btn-danger btn-pill">Yes! Delete</button>
              <button type="button" class="btn btn-secondary btn-pill" data-dismiss="modal">cancle</button>
          </div>
        </form>
        </div>
    </div>
  </div>
</div>



<!-- create subject model -->

<div class="modal fade" id="subjectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create New Subject</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ url('add_new_subject') }}" method="post">
            @csrf
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Subject Name:</label>
            <input type="text" class="form-control" name="name" id="recipient-name" required="required" placeholder="Enter subject name">
            <span class="form-text text-muted">Please enter subject name</span>
          </div>
          <div class="form-group">
              <button type="submit" class="btn btn-primary btn-pill add_subject">Save</button>
              <button type="button" class="btn btn-secondary btn-pill" data-dismiss="modal">Back</button>
          </div>
        </form>
        </div>
    </div>
  </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
 
        var table = $('#table_id').DataTable();
        });


         // delete record
         table.on('click','.delete', function(){
            $tr = $(this).closest('tr');
            if($($tr).hasClass('child')){
                $tr = $tr.prev('.parent');
            }
            var data = table.row($tr).data();
            console.log(data);

            $('#deleteForm').attr('action', '/deleteExamStatus/'+data[0]);
            $('#deleteModal').modal('show');
        });
    });
    
</script>

@endsection