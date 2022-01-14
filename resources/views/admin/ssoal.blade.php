@extends('layout_admin/dashboard')
@section('badan')
<div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Bank Soal 
                  <h6 class="font-weight-normal mb-0">Berisi Soal dari Tiap Kategori yang Ada.</h6>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    <a href="{{route('tambah_soal')}}">
                      <button type="submit" class="btn btn-outline-primary btn-icon-text btn-sm">
                        <i class="ti-plus btn-icon-prepend"></i>Tambah</button>
                    </a>
                    <a>
                      <button type="submit" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn btn-outline-success btn-icon-text btn-sm">
                        <i class="ti-upload btn-icon-prepend"></i>Import</button>
                    </a>
                    
                    <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Soal</th>
                        <th class="text-center">Keterangan</th>
                        <th class="text-center" colspan="2">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php 
                $no=1;                 
                @endphp
                
             @foreach ($soal as $item)
             <tr>
               <td class="text-center">{{$no++}} </td>
               <td class="text-center">
                   {!!$item->soal!!} <br>
                   @if($item->soal_file!="Tidak Ada Gambar" && $item->soal_file!=null)
                   <img src="{{ asset('storage/'.$item->soal_file) }}" alt="" title="" style="width: 200px; height:200px" class="card-img-top mt-5"><br>
                       {{-- <img src="{{ asset('storage/'.$soal->soal_file) }}" alt="" title="" style="width: 200px; height:200px" class="card-img-top mt-5"><br> --}}
                        <br>
                    @else
                        <br>
                    @endif
                    {{$item->pilgan_a}}<br> 
                    {{$item->pilgan_b}}<br> 
                    {{$item->pilgan_c}}<br> 
                    {{$item->pilgan_d}}<br> 
                    {{$item->pilgan_e}}<br> 
               </td>
               <td class="text-center">
                    Kategori {{$item->kategori->nama_kategori}}<br>
                    Kunci Jawaban {{$item->kunci_jawaban}}<br>
                    Bobot <br>{{$item->bobot}}<br>
                    Paket {{$item->paket}}<br>
               </td>
                @csrf
                <td class="text-center"><a href="{{route('ubah_soal',$item->id_soal)}}" class="btn btn-warning btn-sm">Ubah</a> </td>                 
                @method('delete')
                @csrf
                <td class="text-center"><a href="{{route('hapus_soal',$item->id_soal)}}" class="btn btn-danger btn-sm delete" 
                      onclick="return confirm('Apakah Ingin Menghapus Data Soal ini ?')">Hapus</a></td>
			            </tr>
              @endforeach
            </tbody>
          </form>
          </table>
        </div>
      </div>
    </div>
  </div>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Masukkan File Excel Anda</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{route('soal_import')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
          <div class="form-group">
            <input type="file" name="file" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Import</button>
        </div>
    </form>
    </div>
  </div>
</div>
@endsection