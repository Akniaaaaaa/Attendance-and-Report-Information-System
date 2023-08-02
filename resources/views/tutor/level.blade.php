@extends('layout_admin/dashboard')
@section('badan')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">Absen Here "{{$tutor->name}}"</h3>
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
    <div class="col-md-12 grid-margin transparent">
        <div class="row">
            @foreach($level as $item)
            <div class="col-md-3 mb-2 stretch-card transparent">
                <div class="card card-dark-blue" style="box-shadow:5px 5px">
                    <div class="card-body">
                        <a href="{{route('absen',$item->level)}}">
                            <p class="btn btn-light bg-white btn-sm mb-4">{{$item->level}}</p>
                        </a>
                        <p class="fs-30 mb-2">{{$item->total}}</p>
                        <p></p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>

    <!-- content-wrapper ends -->

    @endsection