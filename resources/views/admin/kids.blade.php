@extends('layout_admin/dashboard')
@section('badan')
<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12 grid-margin">
      <div class="row">
        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
          <h3 class="font-weight-bold">Data Anak</h3>
          <h6 class="font-weight-normal mb-0">Berisi Kategori dari Tiap Tes yang Ada.</h6>
        </div>
      </div>
    </div>
  </div>

  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <a href="{{route('add_kids')}}">
          <button type="submit" class="btn btn-outline-primary btn-icon-text btn-sm">
            <i class="ti-plus btn-icon-prepend"></i>Adding Kids</button>
        </a>

        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th class="text-center">No</th>
                <th class="text-center">Individu</th>
                <th class="text-center">Image</th>
                <th class="text-center">Level</th>
                <th class="text-center" colspan="2">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @php
              $no=1;
              @endphp
              @foreach ($kids as $item)
              <tr>
                <td class="text-center">{{$no++}} </td>
                <td>
                  Name : {{$item->name}}<br>
                  Age : {{$item->age}}<br>
                  <!-- Level :  {{$item->level}}  -->
                  Academic Year : {{$item->ac_year}}<br>
                  Guardian : {{$item->wali_murid}}<br>
                  Address : {{$item->address}}
                </td>
                <td class="text-center"><img src="{{ asset('storage/'.$item->pic) }}" alt=""></td>
                <td class="text-center">{!!$item->level!!} </td>
                @csrf
                <td class="text-center"><a href="{{route('edit_kids',$item->id)}}" class="btn btn-warning btn-sm">Ubah</a>
                  @method('delete')
                  @csrf
                  <a href="/admin/hapus/{{$item->id}}" class="btn btn-danger btn-sm delete" onclick="return confirm('Apakah Ingin Menghapus Data Kategori ini ?')">Hapus</a>
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