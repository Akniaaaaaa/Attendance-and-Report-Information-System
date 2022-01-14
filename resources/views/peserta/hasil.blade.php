@extends('layouts/peserta')
@section('badan')
<div class="row" align="center">
    @foreach ($collection as $item)
    <div class="col">
        <div class="card text-dark bg-info mb-3" style="max-width: 18rem;">
            <div class="card-header"style="color:white">HASIL UJIAN PAKET {{$item->paket}}</div>
            <div class="card-body">
                <h3 class="card-title"></h3>
                <a href="{{route('lihat_hasil', [$id_peserta,$item->paket])}}" 
                class="btn btn-sm btn-light">
                <span>LIHAT</span></a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection