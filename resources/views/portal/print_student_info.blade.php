
@extends('layouts.portal_app')

@section('content')
@include('alerts.alerts')
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
        <!-- begin::Card-->
        <div class="card card-custom overflow-hidden">
            <div class="card-body p-0">
                <!-- begin: Invoice-->
                <!-- begin: Invoice header-->
                <div class="row justify-content-center py-2 px-2 py-md-10 px-md-0">
                    <div class="col-md-9">
                        <div class="d-flex justify-content-between pb-10 pb-md-20 flex-column flex-md-row">
                            <h1 class="display-4 font-weight-boldest mb-10">{{ $exam_title }}</h1>
                            <div class="d-flex flex-column align-items-md-end px-0">
                                <!--begin::Logo-->
                                    <img src="assets/media/logos/logo-dark.png" alt="" />
                                <a href="#" class="mb-5">
                                </a>
                                <!--end::Logo-->
                                <span class="d-flex flex-column align-items-md-end opacity-70">
                                    <span>Exam Date</span>
                                    <span>{{ date('d M,Y', strtotime($exam_date)) }}</span>
                                </span>
                            </div>
                        </div>
                        <p class="text-primary"><b>Note:</b> Use the following credentials to access exam</p>
                        <div class="border-bottom w-100"></div>
                            <div class="d-flex justify-content-between pt-6">
                                <div class="d-flex flex-column flex-root">
                                    <span class="font-weight-bolder mb-2">NAME</span>
                                    <span class="opacity-70">{{ $prnt_Info->name }}</span>
                                </div>
                                <div class="d-flex flex-column flex-root">
                                    <span class="font-weight-bolder mb-2">EMAIL</span>
                                    <span class="opacity-70">{{ $prnt_Info->email }}</span>
                                </div>
                                <div class="d-flex flex-column flex-root">
                                    <span class="font-weight-bolder mb-2">Passwprd</span>
                                    <span class="opacity-70">{{ $prnt_Info->password }}</span>
                                </div>
                                <div class="d-flex flex-column flex-root">
                                    <span class="font-weight-bolder mb-2">Phone Number</span>
                                    <span class="opacity-70">{{ $prnt_Info->phone }}
                                    <br /></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center py-2 px-2 py-md-10 px-md-0">
                        <div class="col-md-9">
                            <div class="border-bottom w-100"></div>
                            <div class="d-flex justify-content-between pt-6">
                                <div class="d-flex flex-column flex-root">
                                    <span class="font-weight-bolder mb-2 text-primary">SinIn with this link </span>
                                    <span class="opacity-70"><a href="http://127.0.0.1:8000/student/signIn"> http://127.0.0.1:8000/student/signIn </a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end: Invoice header-->
                    <!-- begin: Invoice body-->
                
                    <!-- begin: Invoice action-->
                    <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0">
                        <div class="col-md-9">
                            <div class="d-flex justify-content-between">
                                <button type="button" class="btn btn-light-primary font-weight-bold" onclick="window.print();">Download Form</button>
                                <button type="button" class="btn btn-primary font-weight-bold" onclick="window.print();">Print Form</button>
                            </div>
                        </div>
                    </div>
                    <!-- end: Invoice action-->
                    <!-- end: Invoice-->
            </div>
        </div>
        <!-- end::Card-->
    </div>
    <!--end::Container-->
</div>

@endsection