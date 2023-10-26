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
                                <a href="{{route('addblog')}}" class="btn btn-success btn-sm" role="button"
                                   aria-pressed="true"> Add Blog</a><br><br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>العنوان </th>
                                            <th>بعض المحتوى</th>
                                            <th>تاريخ لنشر</th>

                                            <th>الحالة</th>
                                            <th>عمليات</th>



                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ( $blogs as $blog )
                                            <tr>
                                            <td></td>
                                            <td>{{$blog->title}}</td>
                                            <td>{{$blog->content}}</td>
                                            <td>{{$blog->published_at}}</td>
                                            <td>{{$blog->status}}</td>



                                                <td>
                                                    <div class="dropdown show">
                                                        <a class="btn btn-success btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            العمليات
                                                        </a>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                            {{-- <a class="dropdown-item" href="{{route('Students.show',$student->id)}}"><i style="color: #ffc107" class="far fa-eye "></i>&nbsp;  عرض بيانات الطالب</a> --}}
                                                            <a class="dropdown-item" href="{{route('editblog',[$blog->id])}}"><i style="color:green" class="fa fa-edit"></i>&nbsp;  تعديل  </a>
                                                            {{-- <a class="dropdown-item" href="{{route('receipt_students.show',$student->id)}}"><i style="color: #9dc8e2" class="fas fa-money-bill-alt"></i>&nbsp; &nbsp;سند قبض</a> --}}
                                                            {{-- <a class="dropdown-item" href="{{route('ProcessingFee.show',$student->id)}}"><i style="color: #9dc8e2" class="fas fa-money-bill-alt"></i>&nbsp; &nbsp; استبعاد رسوم</a> --}}
                                                            <a class="dropdown-item"data-toggle="modal"data-target="#exampleModal5" data-id="{{$blog->id}}" title="حذف"><i style="color: red" class="fa fa-trash"></i>&nbsp;  حذف  </a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                         @endforeach
                                        {{-- ++++++++++++++++++++++++++++++++++++ --}}
{{-- ============ بداية مودل الحذف للمنتج ======== --}}
<div class="modal fade" id="exampleModal5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        {{-- _______ --}}
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;"
                    class="modal-title"
                    id="">
                    {{trans('city.delet city')}}
                </h5>
                <button type="button" class="close"
                        data-dismiss="modal"
                        aria-label="Close">
                <span
                    aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger" id="delete_msg" style="display: none;">
                  تم حذف الخبر بنجاح
                </div>

                <span class="text-danger" id="file-input-error"></span>

                <form


                    id="file-Delete"
                     >


                    @csrf
                    {{trans('city.Are you sure?')}}
                    <input id="id" type="text"
                           name="id"
                           class="form-control"
                           value="">
                    <div class="modal-footer">
                        <button type="button"
                                class="btn btn-secondary"
                                data-dismiss="modal">{{ trans('city.close') }}</button>
                        <button type="submit"
                                class="btn btn-danger">{{ trans('city.delet city') }}</button>
                    </div>
                </form>
            </div>
        </div>
        {{-- _________ --}}

    </div>


</div>

  {{-- ===================نهاية مودل الحذف للمنتج ========= --}}

                                        {{-- +++++++++++++++++++++++ --}}
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
<script>

    // سكربت الحذف

  $('#exampleModal5').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id')

    var modal = $(this)
    modal.find('.modal-body  #id').val(id)

  })
  </script>


{{-- // ++++++++++++++++++++++++++اجاكس الحذف+++++++++++++++++++++++++++++++++++++++++++++++++++++ --}} --}}
<script type="text/javascript">

    $.ajaxSetup({
       headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       }
    });

   $('#file-Delete').submit(function(e) {
       e.preventDefault();
       let formData = new FormData(this);

       $('#file-input-error').text('');

       $.ajax({
           type:'POST',
           url: "{{ route('deletblog',['D'])}}",
           data: formData,
           contentType: false,
           processData: false,

           success: function (data) {

                   if(data.status == true){

                    var id=data.id;
                       $('#delete_msg').show();
                       $('#'+id).hide();


                   }

                   this.reset();

               },
           error: function(response){
               $('#file-input-error').text(response.responseJSON.message);

           }
      });
   });

   </script>
{{-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ --}}


@endsection
