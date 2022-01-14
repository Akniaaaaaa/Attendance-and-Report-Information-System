@extends('layout_admin/dashboard')
@section('badan')
<div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Halaman Hasil Peserta</h3>
                  <h6 class="font-weight-normal mb-0">Berikut Ini Merupakan Rekap Nilai Hasil Tes Peserta!</h6>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th class="text-center">No</th>
                          <th class="text-center">Nama Peserta</th>
                          <th class="text-center">Benar</th>
                          <th class="text-center">Salah</th>
                          <th class="text-center">Jumlah Jawaban</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php 
                $no=1;                 
                @endphp
             @foreach ($hasil as $item)
             <tr>
               <td class="text-center">{{$no++}} </td>
               <td class="text-center">{{$item->kategori->nama_kategori}} </td>
               <td class="text-center">{{$item->hasil}}</td>
               <td class="text-center">{{$item->salah}}</td>
               <td class="text-center">{{$item->sum_jawaban}}</td>
              @endforeach
            </tbody>
          </form>
          </table>
        </div>
      </div>
    </div>
  </div>
    
@endsection