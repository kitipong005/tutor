@extends('layouts.main')
@section('content')
<div class="row mt-5">
    <div class="col-3">
    </div>
    <div class="col-7">
    @if (Session::has('status'))
        <div class="alert alert-danger text-center">{{ Session::get('status') }}</div>
    @endif
        <div class="w3-quarter w3-margin-bottom w-100">
            <ul class="w3-ul w3-border w3-hover-shadow">
                <li style="background-color:#eae119;">
                    <p class="w3-xlarge" style="color:#000;"><i class="fa fa-book"></i>&nbsp;&nbsp;ลบรายชื่อเทอม</p>
                </li>
                <li>
                    <table class="table">
                        <thead class="thead-dark text-center">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Term Name</th>
                                <th scope="col">Term Detail</th>
                                <th scope="col">action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 0; $i < count($term); $i++)
                            <tr class="text-center">
                                <th scope="row">{{$i+1}}</th>
                                <td>{{$term[$i]->term_id}}</td>
                                <td>{{$term[$i]->detail}}</td>
                            <td>
                                <form action="{{action('CourseController@destroy_Term',['id'=>$term[$i]->term_id])}}" method="post">
                                        {!! method_field('delete') !!}
                                        {!! csrf_field() !!}
                                    <button button="button"  onclick="confDel()" class="w3-button w3-padding-large w3-hover-white" style="background-color:#b20606;color:white; width:120px;">ลบเทอม</button></td>
                                </form>
                            </tr>
                            @endfor
                        </tbody>
                    </table>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function test() {
        var e = document.getElementById("course");
        var strUser = e.options[e.selectedIndex].value;

        console.log(strUser)
    }

    function confDel(){
        confirm('Confirm Delete Term? !!!');
    }
</script>


@endsection