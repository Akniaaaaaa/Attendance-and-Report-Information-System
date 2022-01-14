@extends('layouts/peserta')
@section('badan')
<div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Halaman Kategori Soal</h3>
                  <h6 class="font-weight-normal mb-0">Berikut Ini Merupakan Kategori Soal Dalam Paket {{$paket}}</h6>
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
                <th class="text-center">Nama Kategori </th>
                <th class="text-center">Tanggal Tes </th>
                <th class="text-center">Waktu Mulai </th>
                <th class="text-center">Aksi </th>
                </tr>
            </thead>
            <tbody>
                @php $no=1;
                $now = Carbon\Carbon::now()->toDateTimeString();@endphp

                    @foreach ($jadwal as $item)
                   
                        <tr>
                            <td  class="text-center">{{$no++}} </td>
                            <td  class="text-center">{{$item->kategori->nama_kategori}} </td>
                            <td  class="text-center">{{date('d/m/Y',strtotime($item->tanggal_tes))}} </td>
                            <td  class="text-center">{{$item->jam_mulai}} </td>
                            <td  class="text-center">
                            <a href="{{route('petunjuk',[$paket,$item->id_kategori,$item->tes_ke])}}" 
                                class="btn btn-info btn-sm ">
                                <span>MULAI</span></a>
                            </td>
                            </tr>
                            @endforeach
                            @if($cek_kecermatan!=null)
                            <tr>
                              <td></td>
                                    <td  class="text-center">Tes Kecermatan </td>
                                    <td  class="text-center">{{date('d/m/Y',strtotime($cek_kecermatan->tanggal_tes))}} </td>
                                    <td  class="text-center">{{$cek_kecermatan->jam_mulai}} </td>
                                    <td  class="text-center">
                                    <a href="{{route('petunjuk',[$paket,$cek_kecermatan->id_kategori,$cek_kecermatan->tes_ke])}}" 
                                        class="btn btn-info btn-sm ">
                                        <span>MULAI</span></a>
                                    </td>
                                    </tr>
                                    @endif
                </tbody>
            </table>
        </div>
        </div>
    </div>
</div>
@endsection