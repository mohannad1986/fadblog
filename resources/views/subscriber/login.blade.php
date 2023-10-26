@extends('layouts.master')
@section('css')
@toastr_css

@section('title')
    empty
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> login sub</h4>
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
                @if(session()->has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ session()->get('error') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">



                    </button>
                </div>
            @endif


                 <span class="text-danger" id="file-input-error-u"></span>
                {{-- ++++++++++++++++++++++++++++++++++++++++ --}}
                <div class="col-xs-12">
                    <div class="col-md-12">
                        <br>
                        <form action="{{route('login_subscriber')}}"   method="post" autocomplete="off"  enctype="multipart/form-data">
                            @csrf

                            <br>

                            <div class="form-row">

                                <div class="form-group col">
                                    <label for="inputState">user name </label>
                                    <input type="text" name="name" class="form-control">

                                </div>
                            </div>

                            <div class="form-row">

                                <div class="form-group col">
                                    <label for="inputState">password </label>
                                    <input type="password" name="password" class="form-control">

                                </div>
                            </div>







                            <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">ADD POST </button>
                        </form>
                    </div>
                </div>

                {{-- ++++++++++++++++++++++++++++++ --}}
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
{{-- <script> --}}
@toastr_js
@toastr_render

{{-- </script> --}}


@endsection
