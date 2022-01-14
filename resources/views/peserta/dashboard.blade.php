@extends('layouts/peserta')
@section('badan')

      <!-- partial -->
      <div class="content-wrapper">
  <div class="row">
    <div class="col-md-12 grid-margin">
      <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Selamat Datang "{{auth()->user()->name}}"</h3><br>
                </div>
                <div class="col-12 col-xl-4">
         <div class="justify-content-end d-flex">
          <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
            <button class="btn btn-sm btn-light bg-white" type="button" >
             <i class="mdi mdi-calendar"></i> Today ({{Carbon\Carbon::now()->isoFormat('D MMM Y')}})
            </button>
          </div>
         </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-8 grid-margin stretch-card">
      <div class="card tale-bg">
        <div class="card-people mt-auto">
          <img src="{{asset('admin/images/dashboard/people.svg')}}" alt="people">
        </div>
      </div>
    </div>

    <div class="col-md-4 mb-4 mb-lg-0" align="center">
                <div class="card text-white bg-info mb-4" style="max-width: 18rem; background-color: indigo;">
                    <div class="card-header mb-2">Ujian</div>
                    <div class="card-tale">
                      <h1 class="card-title mt-1" style="color: rgb(243, 230, 131)">Pastikan Jaringan Stabil</h1>
                      <a href="{{route('paket')}}" 
                      class="btn btn-sm btn-light mb-4">
                      <span>MULAI</span></a>
                    </div>
                  </div>

                <div class="card text-white bg-info mb-4" style="max-width: 18rem; background-color: indigo;">
                    <div class="card-header mb-2">Hasil</div>
                    <div class="card-tale">
                      <h1 class="card-title mt-1" style="color: rgb(243, 230, 131)">Silahkan Lihat Hasil</h1>
                      <a href="{{route('hasil_peserta', Auth::user()->id)}}" 
                      class="btn btn-sm btn-light mb-4">
                      <span>LIHAT</span></a>
                    </div>
                  </div>
              </div>
@endsection