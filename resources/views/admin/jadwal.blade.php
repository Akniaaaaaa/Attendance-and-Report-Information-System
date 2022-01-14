@extends('layout_admin/dashboard')
@section('badan')
<div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Data Jadwal</h3>
                  <h6 class="font-weight-normal mb-0">Berisi Jadwal dari Tiap Tes yang Ada.</h6>
                </div>
              </div>
            </div>
          </div>

<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    <a href="{{route('tambah_jadwal')}}">
                      <button type="submit" class="btn btn-outline-primary btn-icon-text btn-sm">
                        <i class="ti-plus btn-icon-prepend"></i>Tambah</button>
                    </a>
                    <a href="{{route('jadwal_kecermatan')}}">
                      <button type="submit" class="btn btn-outline-warning btn-icon-text btn-sm">
                        <i class="ti-plus btn-icon-prepend"></i>Tambah Jadwal Kecermatan</button>
                    </a>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th class="text-center">Pilih</th>
                          <th class="text-center">No</th>
                          <th class="text-center">Tanggal Tes</th>
                          <th class="text-center">Jam Mulai</th>
                          <th class="text-center">Jam Selesai</th>
                          <th class="text-center">Status Ujian</th>
                          <th class="text-center">Paket</th>
                          <th class="text-center">Kategori</th>
                          {{-- <th class="text-center">Tes Ke</th> --}}
                          <th class="text-center">Peserta</th>
                          <th class="text-center" colspan="2">Aksi</th>
                        </tr>
                      </thead>
                      @php $no = 1; @endphp
			        @foreach($jadwall as $item)
			            <tbody>
			            <tr>
                    <td>
                      <center>
                          <form method="get" action="{{route('admin/hapus_jadwal', $item->id_jadwal)}}"  enctype="multipart/form-data">
                              @method('delete')
                              @csrf
                              <input type="checkbox" class="mt-2" name="hapus[]" value="{{ $item->id_jadwal}}">
                          
                      </center>
                  </td>
			                <td class="text-center">{{ $no++ }}</td>
			                <td class="text-center">{{$item->tanggal_tes}}</td>
			                <td class="text-center">{{$item->jam_mulai}}</td>
			                <td class="text-center">{{$item->jam_selesai}}</td>
			                <td class="text-center">{{$item->status_ujian}}</td>
			                <td class="text-center">{{$item->paket}}</td>
			                <td class="text-center">{{$item->id_kategori}}</td>
			                {{-- <td class="text-center">{{$item->tes_ke}}</td> --}}
			                <td class="text-center">{{$item->peserta->name}}</td>
			                @csrf
                      <td class="text-center"><a href="{{route('admin/ubah_jadwal',$item->id_jadwal)}}" class="btn btn-warning btn-sm">Ubah</a> </td>
			            </tr>
			        @endforeach
			        @foreach($cek_kecermatanp as $item)
			            <tbody>
			            <tr>
                    <td>
                      <center>
                          <form method="get" action="{{route('admin/hapus_jadwal', $item->id_jadwal)}}"  enctype="multipart/form-data">
                              @method('delete')
                              @csrf
                              <input type="checkbox" class="mt-2" name="hapus[]" value="{{ $item->id_jadwal}}">
                          
                      </center>
                  </td>
			                <td class="text-center">{{ $no++ }}</td>
			                <td class="text-center">{{$item->tanggal_tes}}</td>
			                <td class="text-center">{{$item->jam_mulai}}</td>
			                <td class="text-center">{{$item->jam_selesai}}</td>
			                <td class="text-center">{{$item->status_ujian}}</td>
			                <td class="text-center">{{$item->paket}}</td>
			                <td class="text-center">Kecermatan</td>
			                {{-- <td class="text-center">{{$item->tes_ke}}</td> --}}
			                <td class="text-center">{{$item->peserta->name}}</td>
			                @csrf
                      <td class="text-center"><a href="{{route('Ejadwal_kecermatan',$item->id_peserta)}}" class="btn btn-warning btn-sm">Ubah</a> </td>
			                {{-- @method('delete')
                      @csrf
                      <td class="text-center"><a href="/admin/hapus_jadwal/{{$item->id_jadwal}}" class="btn btn-danger btn-sm delete" 
                      onclick="return confirm('Apakah Ingin Menghapus Data Jadwal Peserta ini ?')">Hapus</a></td> --}}
			            </tr>
			        @endforeach
			          </tbody>
                    </table>
                    <div  align="right">
                      <button type="submit" class="btn btn-danger mr-4"  onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data  ini ? Semua data yang dipilih akan terhapus ')"><i class="fas fa-trash-alt mr-1"></i>HAPUS</button>
  
                      @method('delete')
                      @csrf
                   </div>
                  </form>
                  </div>
                </div>
              </div>
            </div>
        <!-- content-wrapper ends -->
        @endsection