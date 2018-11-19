@extends('layouts.main')
@section('content')

<div class="row mt-5">
  <div class="col-3">
  </div>
  <div class="col-7">
    @if (Session::has('message'))
    <div class="alert alert-danger text-center">{{ Session::get('message') }}</div>
    @endif
    @if (Session::has('success'))
    <div class="alert alert-success text-center">{{ Session::get('success') }}</div>
    @endif
    @if ($errors->any())
    <div class="alert alert-danger text-center">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif
    <form method="post" action="{{ action('CourseController@TermAdd') }}">
      {{ csrf_field() }}
      <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Name Course</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="inputEmail3" placeholder="Term1-2561" name="term_id" value="{{ old('term_id') }}">
          <span style="color:#b20606;">*** don't have use backslash(/)</span>
          @foreach(Session::get('data_user') as $d)
          <input type="hidden" class="form-control" id="inputEmail3" name="user_id" value="{{$d->id}}">
          @endforeach
          {{-- <input type="hidden" class="form-control" id="inputEmail3" name="user_id" value=""> --}}
        </div>
        {{-- <div class="alert alert-danger">
            <span>{{ $errors->first() }}</span>
        </div> --}}
      </div>
      <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Detail Course</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="inputEmail3" placeholder="คอร์สเทอม1/2561" name="detail" value="{{ old('detail') }}">
          @foreach(Session::get('data_user') as $d)
          <input type="hidden" class="form-control" id="inputEmail3" name="province" value="{{$d->province}}">
          @endforeach
        </div>
      </div>
      <div class="form-group" id="copy_list">
        <div class="row mt-3" id="src">
          <label for="inputEmail3" class="col-sm-2 col-form-label">List subjects</label>
          <div class="col-7" id="subjects">
            <input type="text" class="form-control" name="subject[]" placeholder="Detail">
          </div>
          <div class="col-3">
            <input type="text" class="form-control" name="price[]" placeholder="price">
          </div>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-2">

        </div>
        <div class="col-sm-6">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        <div class="col text-right">
          <button type="button" class="btn btn-warning" onclick="add_subjects();">+</button>
          <button type="button" class="btn btn-danger" onclick="del_subjects()">-</button>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection
@section('scripts')
<script>
  function add_subjects() {
    //alert('hello');
    var cln = $("#src").clone();
    let last = $('#copy_list')
    console.log(cln, last)
    console.log(last.append(cln).children(':last').find('input').map(function () {
      return $(this).val('')
    }));
    //$("#copy").append(clone);
    get_data()
  }

  function get_data() {
    let data = $('#copy_list #src').map(function () {
      return {
        subj: $(this).find('input.subj').val(),
        price: $(this).find('input.price').val()
      }
    })
    return data;
  }

  function del_subjects() {
    let ch = $('#copy_list').children()
    if (ch.length > 1)
      ch.last().remove();
  }
</script>
@endsection