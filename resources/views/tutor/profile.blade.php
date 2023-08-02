@extends('layouts/peserta')
@section('badan')
<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
          <style>
              .rounded-image{
    border-radius: 200px;
    -webkit-border-radius: 200px;
    -moz-border-radius: 200px;
}
          </style>
<center>
<img src="{{ asset('storage/'.auth()->user()->pic) }}" alt="" title="" style="width: 250px; height:250px" class="rounded-image"><br><br>
<div class="col-lg-4 mx-auto">
    <center><ul class="list-group list-group-flush">
  <li class="list-group-item">{{ auth()->user()->name }}</li>
  <li class="list-group-item">{{ auth()->user()->email }}</li>
</ul></center></div>

</center>
      </div>
    </div>
</div>

@endsection