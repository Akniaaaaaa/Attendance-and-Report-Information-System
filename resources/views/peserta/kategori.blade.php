@extends('layouts/peserta')
@section('badan')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body ">
        <h1 class="card-title">Kategori Soal</h1>
        Kategori soal dalam Paket {{$paket}}
        <div class="table-responsive">
            <table class="table table-striped">
            <thead>
                <tr>
                <th>No. </th>
                <th>Nama Kategori </th>
                <th>Aksi </th>
                </tr>
            </thead>
            <tbody>
                @php $no=1;@endphp
                    @foreach ($kt as $item)
                        <tr>
                            <td >{{$no++}} </td>
                            <td >{{$item->kategori->nama_kategori}} </td>
                            <td>
                            <!-- {{-- <a href="{{route('soal_kt',[$paket,$item->id_kategori,1])}}"  --}} -->
                            <a href="{{route('petunjuk',[$paket,$item->id_kategori])}}" 
                                class="btn btn-sm btn-primary">
                                <span>MULAI</span></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        </div>
    </div>
</div>
@endsection