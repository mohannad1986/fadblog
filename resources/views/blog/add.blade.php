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
                <div class="alert alert-success" id="success_msg" style="display: none;">
                     تم اضافة الخبر بنجاح
                </div>

                {{-- ++++++++++++++++++++++++++++++++++++++++ --}}

                <span class="text-danger" id="file-input-error"></span>


                <div class="col-xs-12">
                    <div class="col-md-12">
                        <br>
                        <form action="{{route('storeblog')}}"  id="file-upload"  method="post" autocomplete="off"  enctype="multipart/form-data">
                            @csrf

                            <div class="form-row">
                                <div class="col">
                                    <label for="title">title</label>
                                    <input type="text" name="title" class="form-control">
                                </div>

                            </div>
                            <br>

                            <div class="form-row">

                                <div class="form-group col">
                                    <label for="inputState">content </label>
                                    <input type="text" name="conten" class="form-control">

                                </div>
                            </div>
                            <div class="form-row">

                                <div class="form-group col">
                                    <label for="inputState">choose publish date : </label>
                                    <input type="date" name="published_at">

                                </div>
                            </div>

                            <div class="form-row">

                                <div class="form-group col">
                                    <label for="inputState">image </label>
                                    <input type="file" name="image" class="form-control">

                                </div>
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
{{-- // +++++++++++++++++++++++++الاجاكسسس++++++++++++++++++++++++++++++++++++++++++++ --}}


<script type="text/javascript">

    $.ajaxSetup({
       headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       }
    });

   $('#file-upload').submit(function(e) {
       e.preventDefault();
       let formData = new FormData(this);

       $('#file-input-error').text('');

       $.ajax({
           type:'post',
           url: "{{ route('storeblog') }}",
           data: formData,
           contentType: false,
           processData: false,

           success: function (data) {

                   if(data.status == true){
                       $('#success_msg').show();




                   }

                   this.reset();

               },
           error: function(response){
               $('#file-input-error').text(response.responseJSON.message);

           }
      });
   });

   </script>

   {{-- ++++++++++++++++++++++++++++++  اجاكسسالتعديل +++++++++++++++++++++++++++++++++++++++++++++++++++++ --}}

<script>

    @toastr_js
    @toastr_render

    </script>
@endsection
