@extends('layout_admin/dashboard')
@section('badan')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">Data Tutor </h3>
                    <h6 class="font-weight-normal mb-0">Berisi Data Tutor yang mengajar.</h6>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('filter') }}" method="GET">
                    <div class="row">
                        <div class="col-5">
                            <label for="tgl_absen">Start Date</label>
                            <input id="tgl_absen" type="date" class="form-control @error('tgl_absen') is-invalid @enderror" name="start_date" value="{{ old('tgl_absen') }}" required autocomplete="tgl_absen" placeholder="Start Date">
                        </div>
                        <div class="col-5">
                            <label for="tgl_absen">End Date</label>
                            <input id="tgl_absen" type="date" class="form-control @error('tgl_absen') is-invalid @enderror" name="end_date" value="{{ old('tgl_absen') }}" required autocomplete="tgl_absen" placeholder="End Date">

                        </div>
                        <div class="col-2">
                            <br>
                            <button type="submit" class="btn btn-outline-primary btn-icon-text btn-sm" style="padding: 10px;">
                                <i class="ti-search btn-icon-search"></i>FILTER</button>
                        </div>
                    </div>
                </form>
                <!-- <a href="{{route('add_kids')}}">
                    <button type="submit" class="btn btn-outline-primary btn-icon-text btn-sm">
                        <i class="ti-plus btn-icon-prepend"></i>Adding Kids</button>
                </a> -->

                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Tutor's Name</th>
                                <th class="text-center">Date</th>
                                <th class="text-center">Level</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no=1;
                            @endphp
                            @foreach ($tutor as $item)
                            <tr>
                                <td class="text-center">{{$no++}} </td>
                                <td>
                                    {{$item->nm_tutor}}
                                </td>
                                <td>
                                    {{$item->tgl_absen}}
                                </td>
                                <td>
                                    {{$item->level}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        </form>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @endsection