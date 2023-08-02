@extends('layout_admin/dashboard2')
@section('badan')
<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12 grid-margin">
      <div class="row">
        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
          <h3 class="font-weight-bold">Selamat Datang "{{$peserta->name}}"</h3>
        </div>
        <div class="col-12 col-xl-4">
          <div class="justify-content-end d-flex">
            <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
              <button class="btn btn-sm btn-light bg-white" type="button">
                <i class="mdi mdi-calendar"></i> Today ({{Carbon\Carbon::now()->isoFormat('D MMM Y')}})
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6 grid-margin stretch-card">
      <div class="card tale-bg">
        <div class="card-people mt-auto">
          <img src="{{asset('admin/images/dashboard/people.svg')}}" alt="people">
        </div>
      </div>
    </div>
    <div class="col-md-6 grid-margin transparent">
      <div class="row">
        <div class="col-md-6 mb-4 stretch-card transparent">
          <div class="card card-tale">
            <div class="card-body">
              <a href="/admin/kategori">
                <p class="btn btn-light bg-white btn-sm mb-4">KIDS</p>
              </a>
              <p class="fs-30 mb-2">{{$kids}}</p>
              <p></p>
            </div>
          </div>
        </div>
        <div class="col-md-6 mb-4 stretch-card transparent">
          <div class="card card-dark-blue">
            <div class="card-body">
              <a href="/admin/soal">
                <p class="btn btn-light bg-white btn-sm mb-4">SUBJECT</p>
              </a>
              <p class="fs-30 mb-2">{{$subject}}</p>
              <p></p>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
          <div class="card card-light-blue">
            <div class="card-body">
              <a href="{{route('tutor')}}">
                <p class="btn btn-light bg-white btn-sm mb-4">TUTOR</p>
              </a>
              <p class="fs-30 mb-2">{{$tutor}}</p>
              <p></p>
            </div>
          </div>
        </div>
        <div class="col-md-6 stretch-card transparent">
          <div class="card card-light-danger">
            <div class="card-body">
              <a href="/admin/pengguna">
                <p class="btn btn-light bg-white btn-sm mb-4">LEVEL</p>
              </a>
              <p class="fs-30 mb-2">{{$level}}</p>
              <p></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- content-wrapper ends -->

  @endsection