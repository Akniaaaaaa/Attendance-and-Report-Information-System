@extends('layout_admin/dashboard')
@section('badan')
<div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Data Hasil</h3>
                  <h6 class="font-weight-normal mb-0">Berisi Hasil dari Tiap Tes yang Ada.</h6>
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
                        <th class="text-center">Nama Peserta</th>
                        <th class="text-center">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php 
                $no=1;                 
                @endphp
             @foreach ($hasil as $item)
             <tr>
               <td class="text-center">{{$no++}} </td>
               <td class="text-center">{{$item->peserta->name}} </td>
                @csrf
                <td class="text-center"><a href="{{route('info_hasil',$item->id_user)}}" class="btn btn-info btn-sm">Info</a> </td>
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