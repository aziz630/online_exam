@extends('layouts.app')

@section('content')

<div class="card card-custom mb-7">
    <div class="card-header">
        <div class="card-title">
            <span class="card-icon">
                <i class="flaticon-search text-primary"></i>
            </span>
            <h3 class="card-label">
                {{ __("Exam Subject") }} <small>Filteration enabled</small>
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
                class="btn btn-primary font-weight-bolder" data-toggle="modal" data-target="#exampleModal"
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
                >Add New Subject</a
            >
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
                <th width="15%">SL No.</th>
                <th>Name</th>
                <th>Status</th>
                <th width="25%">Action</th>
                <!-- <th>Actions</th> -->
            </tr>
        </thead>
        <tbody>

        @foreach($allData as $key => $value)
                <tr>
                <td>{{$key+1}}</td>
                   <td>{{ $value->name }}</td>
                   <td><label class="checkbox checkbox-outline checkbox-outline-2x checkbox-primary">
                    <input class="subject_status" data-id="<?php echo $value->id?>" <?php if($value->status == 1) { echo "checked"; } ?> type="checkbox" name="Checkboxes15"  />
                    <span></span></label></td>
                    <td> 
                        <a href="#" class="btn btn-sm btn-success btn-pill edit" title="Edit details">Edit</a>
                        <a href="#" class="btn btn-sm btn-danger btn-pill delete" title="Delete">Delete</a>
                    </td>
                   
                </tr>
            @endforeach

            </tbody>
        </table>

        <!--end: Datatable-->
     

    </div>
  
</div>


<!-- create Subject modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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



<!-- edit modal -->

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Subject</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/subject" method="post" id="editForm">
            @csrf
            {{ method_field('PUT') }}
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Subject Name:</label>
            <input type="text" class="form-control" id="name" name="name" id="recipient-name" required="required" placeholder="Enter subject name">
            <span class="form-text text-muted">Please enter subject name</span>
          </div>
          <div class="form-group">
              <button type="submit" class="btn btn-primary btn-pill">Update</button>
              <button type="button" class="btn btn-secondary btn-pill" data-dismiss="modal">Back</button>
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
        <form action="/delete" method="post" id="deleteForm">
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
 
        var table = $('#table_id').DataTable();

        // start edit record
        table.on('click','.edit', function(){
            $tr = $(this).closest('tr');
            if($($tr).hasClass('child')){
                $tr = $tr.prev('.parent');
            }
            var data = table.row($tr).data();
            console.log(data);

            $('#name').val(data[1]);

            $('#editForm').attr('action', '/subject/'+data[0]);
            $('#editModal').modal('show');
        });


         // delete record
         table.on('click','.delete', function(){
            $tr = $(this).closest('tr');
            if($($tr).hasClass('child')){
                $tr = $tr.prev('.parent');
            }
            var data = table.row($tr).data();
            console.log(data);

            $('#deleteForm').attr('action', '/delete/'+data[0]);
            $('#deleteModal').modal('show');
        });
    });
    
</script>

@endsection