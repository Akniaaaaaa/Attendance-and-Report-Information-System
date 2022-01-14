@extends('layouts/peserta')
@section('badan')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body ">
        <h1 class="card-title">Hasil Tes</h1>
        Hasil Tes dalam Paket {{$paket}}
        <div class="table-responsive">
            <table class="table table-striped">
            <thead>
                <tr>
                <th>No. </th>
                <th>Nama Kategori </th>
                <th>NILAI </th>
                </tr>
            </thead>
            <tbody>
                @php $no=1;@endphp
                    @foreach ($kt as $item)
                        <tr>
                            <td >{{$no++}} </td>
                            <td >{{$item->kategori->nama_kategori}} </td>
                            <td>
                            
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