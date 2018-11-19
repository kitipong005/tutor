@extends('layouts.main')
@section('content')
@if (Session::has('success'))
<script>
    alert(Session::get('success'));
    </script>
@endif
@foreach ($detail as $d)
<h2 style="margin-left:3%;" class="mt-3 mb-3">ข้อมูลนักเรียนคอร์สเรียน {{$d->detail}}</h2>
@endforeach
<center>
    <form method="post" action="{{ route('get-name-conf') }}">
        {{ csrf_field() }}
      
            <div class="row mr-1">
                <div class="col" id="show_course">
                    @if (!$subject->isEmpty())
                    @foreach ($subject as $sj)
                    {{-- <input type="hidden" value="{{$sj->id}}" name="subject_id"> --}}
                    <button type="button" class="btn btn-danger" onclick="AddDatacourse({{$sj->id}});" style="width:100%; border-color:white"
                        value="" id="btn-subj">{{$sj->detail}} </button>
                    {{-- <button type="submit" class="btn btn-danger" style="width:100%; border-color:white" id="btn-subj">{{$sj->detail}}
                    </button> --}}
                    @endforeach
                    @endif

                </div>
                <div class="col" style="display:none;" id="show">

                    <table class="table table-hover" style="text-align:center;">
                        <thead>
                            <tr>
                                <th scope="col">ลำดับที่</th>
                                <th scope="col">ชื่อ</th>
                                <th scope="col">นามสกุล</th>
                                <th scope="col">ชื่อเล่น</th>
                                <th scope="col">ชั้น</th>
                                <th scope="col">สถานะการชำระเงิน</th>
                                <th scope="col">ใบเสร็จรับเงิน</th>
            
                            </tr>
                        </thead>
                        <tbody id="course"></tbody>
                        <tfoot>
            
                        </tfoot>
                    </table>
                    <button type="button" class="btn btn-danger" id="close" onclick="CloseTab();">Close</button>
                </div>
            </div>
  
    </form>
    


</center>


@endsection
@section('scripts')
<script>
        function AddDatacourse(subject_id) {
            console.log(subject_id)
            //  setTimeout(() => {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
    
    
    
            $.ajax({
                //type: "post",
                url: "{{route('get-name-conf')}}",
                method: "POST",
                data: {
                    'subject_id': subject_id
                },
                dataType: "json",
                async: false,
                success: function (data) {
                    console.log(data);
                    $('#course').html(
                        data.map((data_in, index) =>
                            `<tr  class="table-danger">
                                        <th scope="row">${ index + 1}</td>
                                        <td>${ data_in.FirstName_Std}</td>
                                        <td>${ data_in.LastName_Std}</td>
                                        <td>${ data_in.NickName_Std}</td>
                                        <td>${ data_in.Class_Std}</td>
                                        if(${ data_in.Status } == 'no'){
                                            <td style="color:#00CC00;">ชำระเงินแล้ว</td>
                                        }
                                        
                                        <td><button type="button" class="btn btn-info"><a href="{{route('reportbill')}}?id=${data_in.id}">ออกใบเสร็จรับเงิน</button></td>
    
                             </tr>`
                        )
                    )
                    OpenTab();
                },
                error: function (data) {
                    console.log(data)
                    alert('Dont have data');
                    CloseTab();
                },
            });
    
    
        }
    
        function CloseTab() {
            $('#show_course').removeClass("col-5").addClass("col");
            $('#show').css('display', 'none');
        }
    
        function OpenTab() {
            $('#show_course').removeClass("col").addClass("col-5");
            $('#show').css('display', 'inline');
        }
    </script>
@endsection
