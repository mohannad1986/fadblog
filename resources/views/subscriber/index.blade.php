@extends('layouts.master')
@section('css')

@section('title')
    empty
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> ncvlxcnvxcnvxcv</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                <li class="breadcrumb-item active">Page Title</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                {{-- ++++++++++++++++++++ --}}
                 <!-- row -->

                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                {{-- <a href="{{route('Students.create')}}" class="btn btn-success btn-sm" role="button"
                                   aria-pressed="true">{{trans('main_trans.add_student')}}</a><br><br> --}}
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>name </th>
                                            <th> user name</th>
                                            <th>status </th>

                                            <th>action</th>



                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ( $subscribers as $subscriber )
                                            <tr>
                                            <td></td>
                                            <td>{{$subscriber->name}}</td>
                                            <td>{{$subscriber->user_name}}</td>
                                            <td>{{$subscriber->status}}</td>



                                                <td>
                                                    <div class="dropdown show">
                                                        <a class="btn btn-success btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            العمليات
                                                        </a>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                            {{-- <a class="dropdown-item" href="{{route('Students.show',$student->id)}}"><i style="color: #ffc107" class="far fa-eye "></i>&nbsp;  عرض بيانات الطالب</a> --}}
                                                            <a class="dropdown-item" href="{{route('show_subscriber',[$subscriber->id])}}"><i style="color:green" class="fa fa-edit"></i>&nbsp;  تعديل  </a>
                                                            {{-- <a class="dropdown-item" href="{{route('receipt_students.show',$student->id)}}"><i style="color: #9dc8e2" class="fas fa-money-bill-alt"></i>&nbsp; &nbsp;سند قبض</a> --}}
                                                            {{-- <a class="dropdown-item" href="{{route('ProcessingFee.show',$student->id)}}"><i style="color: #9dc8e2" class="fas fa-money-bill-alt"></i>&nbsp; &nbsp; استبعاد رسوم</a> --}}
                                                            {{-- <a class="dropdown-item" data-target="#Delete_Student{{ $student->id }}" data-toggle="modal" href="##Delete_Student{{ $student->id }}"><i style="color: red" class="fa fa-trash"></i>&nbsp;  حذف بيانات الطالب</a> --}}
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                         @endforeach
                                        {{-- @include('pages.Students.Delete')
                                        @endforeach --}}
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>


                {{-- ++++++++++++++++++++++++++ --}}
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
