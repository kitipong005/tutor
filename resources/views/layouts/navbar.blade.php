
<!--navbar -->
<nav class="navbar navbar-expand-lg navbar-dark" id="bg" style="font-size: 16px;">
  <a class="navbar-brand" href="{{route('index')}}">
    <img src="{{ asset('img/LOGO.jpg') }}" alt="tutorforhome" style="width:50px; height:auto;"></a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{route('index')}}">Home</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{route('term.add')}}">เพิ่มเทอม</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{route('term.del')}}">ลบเทอม</a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto mr-5">
      <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
          aria-expanded="false">{{Auth::user()->firstname}} {{Auth::user()->lastname}}</a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Separated link</a>
        </div>
      </li>
    </ul>
  </div>
</nav>
<!--end navbar -->