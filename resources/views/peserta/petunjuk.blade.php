@extends('layouts/peserta')
@section('badan')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body ">
        <h1 class="card-title">PETUNJUK PENGERJAAN</h1>
        {!!$petunjuk->petunjuk!!}
        <!-- {{-- @if ($selisihmenit > 0 && $selisihmenit <= 15)
        <a>
        <button type="button" class="btn btn-info mb-3" data-toggle="modal" data-target="#konfirmasi">Mulai</button>
        </a>
        @elseif($selisihmenit >= 15 )
        <a>
        <button type="button" class="btn btn-secondary mb-3" data-toggle="modal" >Selesai</button>
        </a>
      @endif --}} -->
      @if($id_kategori >=3 && $id_kategori<=12)
      @if ($selisihdetik > 0 && $selisihmenit <= 15)
              <center>
              <a href="{{route('soal_kc',[$paket, $petunjuk->id_kategori, $tes, 1])}}" 
                  class="btn btn-sm btn-info" style="color: white; cursor: pointer;">
                  <i class="fas fa-info">Mulai</i></a>
              </center>
          @elseif($selisihmenit >= 15 )
              <center>
              <a href="#" 
                  class="btn btn-sm btn-info" style="color: white; cursor: pointer;">
                  <i class="fas fa-info">Waktu Habis</i></a>
              </center>
          @endif
      
      @else
      @if (($selisihmenit > 0 || $selisihdetik > 0) && $selisihmenit <= 15)
         <center>
         <a href="{{route('soal_kt',[$paket,$petunjuk->id_kategori,$tes,1])}}" 
             class="btn btn-sm btn-info" style="color: white; cursor: pointer;">
             <i class="fas fa-info">Mulai</i></a>
         </center>
         @elseif($selisihmenit > 15 )
             <center>
             <a href="#" 
                 class="btn btn-sm btn-info" style="color: white; cursor: pointer;">
                 <i class="fas fa-info">Waktu Habis</i></a>
             </center>
         @endif
          
      @endif
        </div>
    </div>
</div>
@endsection