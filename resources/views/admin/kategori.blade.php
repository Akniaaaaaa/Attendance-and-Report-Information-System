@extends('layout_admin/dashboard')
@section('badan')
<div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Data Kategori</h3>
                  <h6 class="font-weight-normal mb-0">Berisi Kategori dari Tiap Tes yang Ada.</h6>
                </div>
              </div>
            </div>
          </div>

             <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    <a href="{{route('tambah_kategori')}}">
                      <button type="submit" class="btn btn-outline-primary btn-icon-text btn-sm">
                        <i class="ti-plus btn-icon-prepend"></i>Tambah</button>
                    </a>
                    
                    <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Nama Kategori</th>
                        <th class="text-center">Petunjuk</th>
                        <th class="text-center" colspan="2">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php 
                $no=1;                 
                @endphp
             @foreach ($kt as $item)
             <tr>
               <td class="text-center">{{$no++}} </td>
               <td class="text-center">{{$item->nama_kategori}} </td>
               <td class="text-center">{!!$item->petunjuk!!} </td>
                @csrf
                  <td class="text-center"><a href="{{route('admin/edit',$item->id_kategori)}}" class="btn btn-warning btn-sm">Ubah</a> </td>
                {{-- @method('delete')
                @csrf
                <td class="text-center"><a href="/admin/hapus/{{$item->id_kategori}}" class="btn btn-danger btn-sm delete" 
                      onclick="return confirm('Apakah Ingin Menghapus Data Kategori ini ?')">Hapus</a></td>
			            </tr> --}}
              @endforeach
            </tbody>
          </form>
          </table>
        </div>
      </div>
    </div>
  </div>
    
@endsection