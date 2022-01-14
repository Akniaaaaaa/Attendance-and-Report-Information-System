@extends('layouts/jawab_soal')
@section('isi')
<nav class="sidebar sidebar-offcanvas" id="sidebar">
  @php $no=1; @endphp
@foreach ($kt as $item)
@if ($item->jawabanDiisi($paket,$id_kategori,$item->nomor_soal,$tes))
  <a href="{{route('soal_kt',[$paket,$item->id_kategori,$tes,$item->nomor_soal])}}" 
    class="btn btn-sm btn-info mt-2 ml-2" style="color: white; cursor: pointer;">
    <?php $tesjawaban = App\Models\Jawaban::where(['id_user'=> auth()->user()->id,'id_soal'=> $item->nomor_soal,'id_kategori'=>$id_kategori,'paket'=>$paket,'tes_ke'=>$jadwal->tes_ke])->first(); ?>
    <i class="fas fa-info">{{$no++}} . {{$tesjawaban->jawaban}} </i></a>
  @else
    <a href="{{route('soal_kt',[$paket,$item->id_kategori,$tes,$item->nomor_soal])}}" 
      class="btn btn-sm btn-secondary mt-2 ml-2" style="color: black; cursor: pointer;">
      <i class="fas fa-info">{{$no++}} </i></a>
  @endif
@endforeach
</nav>
<div class="main-panel">
<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12 grid-margin">
      <div class="row">
        <div class="col-lg-8 grid-margin stretch-card">
            <div class="card">
              <div class="card-body ">
                <h1 class="card-title"> Soal </h1>
                <form method="get" action="{{route('simpanjawaban',([$paket,$id_kategori,$tes,$nomor_soal]))}}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="nomor_soal" value="{{$nomor_soal}}">
                    <input type="hidden" name="paket" value="{{$paket}}">
                {{$soal->soal}} <br>
                @if($soal->soal_file!="Tidak Ada Gambar" && $soal->soal_file!=null)
                    <img src="{{ asset('storage/'.$soal->soal_file) }}" alt="" title="" style="width: 200px; height:200px" class="card-img-top mt-5"><br>
                    <br>
                @else
                    <br>
                @endif
                @if(!empty($jawaban->jawaban))
                  @if($jawaban->jawaban == "A")
                  <input type="radio"  name="pilihan" value="A" required checked="checked"><label for="Pilihan_a" style="color: black" class="ml-2"> A. {{$soal->pilgan_a}}</label><br>
                  <input type="radio"  name="pilihan" value="B" required ><label for="Pilihan_a" style="color: black" class="ml-2"> B. {{$soal->pilgan_b}}</label><br>
                  <input type="radio"  name="pilihan" value="C" required ><label for="Pilihan_a" style="color: black" class="ml-2"> C. {{$soal->pilgan_c}}</label><br>
                  <input type="radio"  name="pilihan" value="D" required ><label for="Pilihan_a" style="color: black" class="ml-2"> D. {{$soal->pilgan_d}}</label><br>
                  <input type="radio"  name="pilihan" value="E" required ><label for="Pilihan_a" style="color: black" class="ml-2"> E. {{$soal->pilgan_e}}</label><br>
                  {{-- <img src="{{ asset('storage/'.$soal->filepilgan_a) }}" alt="" title="" style="width: 200px; height:200px" class="card-img-top mt-5"><br> --}}
                  @elseif($jawaban->jawaban == 'B')
                  <input type="radio"  name="pilihan" value="A" required ><label for="Pilihan_a" style="color: black" class="ml-2"> A. {{$soal->pilgan_a}}</label><br>
                  <input type="radio"  name="pilihan" value="B" required checked="checked"><label for="Pilihan_a" style="color: black" class="ml-2"> B. {{$soal->pilgan_b}}</label><br>
                  <input type="radio"  name="pilihan" value="C" required ><label for="Pilihan_a" style="color: black" class="ml-2"> C. {{$soal->pilgan_c}}</label><br>
                  <input type="radio"  name="pilihan" value="D" required ><label for="Pilihan_a" style="color: black" class="ml-2"> D. {{$soal->pilgan_d}}</label><br>
                  <input type="radio"  name="pilihan" value="E" required ><label for="Pilihan_a" style="color: black" class="ml-2"> E. {{$soal->pilgan_e}}</label><br>
                  {{-- <img src="{{ asset('storage/'.$soal->filepilgan_b) }}" alt="" title="" style="width: 200px; height:200px" class="card-img-top mt-5"><br> --}}
                  @elseif($jawaban->jawaban=='C')
                  <input type="radio"  name="pilihan" value="A" required ><label for="Pilihan_a" style="color: black" class="ml-2"> A. {{$soal->pilgan_a}}</label><br>
                  <input type="radio"  name="pilihan" value="B" required ><label for="Pilihan_a" style="color: black" class="ml-2"> B. {{$soal->pilgan_b}}</label><br>
                  <input type="radio"  name="pilihan" value="C" required checked="checked"><label for="Pilihan_a" style="color: black" class="ml-2"> C. {{$soal->pilgan_c}}</label><br>
                  <input type="radio"  name="pilihan" value="D" required ><label for="Pilihan_a" style="color: black" class="ml-2"> D. {{$soal->pilgan_d}}</label><br>
                  <input type="radio"  name="pilihan" value="E" required ><label for="Pilihan_a" style="color: black" class="ml-2"> E. {{$soal->pilgan_e}}</label><br>
                  {{-- <img src="{{ asset('storage/'.$soal->filepilgan_c) }}" alt="" title="" style="width: 200px; height:200px" class="card-img-top mt-5"><br> --}}
                  @elseif($jawaban->jawaban=='D')
                  <input type="radio"  name="pilihan" value="A" required ><label for="Pilihan_a" style="color: black" class="ml-2"> A. {{$soal->pilgan_a}}</label><br>
                  <input type="radio"  name="pilihan" value="B" required ><label for="Pilihan_a" style="color: black" class="ml-2"> B. {{$soal->pilgan_b}}</label><br>
                  <input type="radio"  name="pilihan" value="C" required ><label for="Pilihan_a" style="color: black" class="ml-2"> C. {{$soal->pilgan_c}}</label><br>
                  <input type="radio"  name="pilihan" value="D" required checked="checked"><label for="Pilihan_a" style="color: black" class="ml-2"> D. {{$soal->pilgan_d}}</label><br>
                  <input type="radio"  name="pilihan" value="E" required ><label for="Pilihan_a" style="color: black" class="ml-2"> E. {{$soal->pilgan_e}}</label><br>
                  {{-- <img src="{{ asset('storage/'.$soal->filepilgan_d) }}" alt="" title="" style="width: 200px; height:200px" class="card-img-top mt-5"><br> --}}
                  @elseif($jawaban->jawaban=='E')
                  <input type="radio"  name="pilihan" value="A" required ><label for="Pilihan_a" style="color: black" class="ml-2"> A. {{$soal->pilgan_a}}</label><br>
                  <input type="radio"  name="pilihan" value="B" required ><label for="Pilihan_a" style="color: black" class="ml-2"> B. {{$soal->pilgan_b}}</label><br>
                  <input type="radio"  name="pilihan" value="C" required ><label for="Pilihan_a" style="color: black" class="ml-2"> C. {{$soal->pilgan_c}}</label><br>
                  <input type="radio"  name="pilihan" value="D" required ><label for="Pilihan_a" style="color: black" class="ml-2"> D. {{$soal->pilgan_d}}</label><br>
                  <input type="radio"  name="pilihan" value="E" required checked="checked"><label for="Pilihan_a" style="color: black" class="ml-2"> E. {{$soal->pilgan_e}}</label><br>
                  {{-- <img src="{{ asset('storage/'.$soal->filepilgan_e) }}" alt="" title="" style="width: 200px; height:200px" class="card-img-top mt-5"><br> --}}
                  @endif
                @else
                  <input type="radio"  name="pilihan" value="A" required ><label for="Pilihan_a" style="color: black" class="ml-2"> A. {{$soal->pilgan_a}}</label><br>
                  <input type="radio"  name="pilihan" value="B" required ><label for="Pilihan_a" style="color: black" class="ml-2"> B. {{$soal->pilgan_b}}</label><br>
                  <input type="radio"  name="pilihan" value="C" required ><label for="Pilihan_a" style="color: black" class="ml-2"> C. {{$soal->pilgan_c}}</label><br>
                  <input type="radio"  name="pilihan" value="D" required ><label for="Pilihan_a" style="color: black" class="ml-2"> D. {{$soal->pilgan_d}}</label><br>
                  <input type="radio"  name="pilihan" value="E" required ><label for="Pilihan_a" style="color: black" class="ml-2"> E. {{$soal->pilgan_e}}</label><br>
                @endif

                <a>
                    <button type="submit" class="btn btn-info" style="size: 5px; color: black"><label style="color: white">SIMPAN & LANJUTKAN</label></button>
                </a>
                {{--  --}}
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                  SELESAI
                </button>
                </form>    
            </div>
            </div>
            <div class="col-md-6 mr-3 mb-4 stretch-card transparent ml-5" style="width: 300px; height:70px;">
              <div class="card card-dark-blue">
                <div class="card-body">
                    <center>
                      <p class="mb-4">Waktu Tersisa</p>
                   <p class="fs-30 mb-2" id="demo"></p>
                    </center>
                </div>
              </div>
            </div>
      </div>
    </div>
  </div>
</div>    

<!-- Button trigger modal -->

@endsection
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><center>PERHATIAN!</center></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       Anda Yakin Ingin Selesai Mengerjakan Soal?
      </div>
      <div class="modal-footer">
        <a href=" {{route('detail_hasil',[Auth::user()->id,$paket,$tes,$id_kategori])}}"><button type="button" class="btn btn-danger mt-4"  data-toggle="modal" data-target="#batal">Selesai</button></a>
        <!-- {{-- <button type="button" class="btn btn-secondary mt-1" data-bs-dismiss="modal">Close</button> --}}
        {{-- <button type="button" class="btn btn-primary">Save changes</button> --}} -->
      </div>
    </div>
  </div>
</div>
@section('script')
<?php
    $jadwal = App\Models\Jadwal::where('id_peserta', Auth::user()->id)
    ->where('id_jadwal',$id_jadwal)->first();
    $tanggal = $jadwal->tanggal_tes;
    $jam_mulai = $jadwal->jam_mulai;
    $jam_selesai = $jadwal->jam_selesai;
    $mulai = $tanggal . ' ' . $jam_mulai;
    $selesai = $tanggal . ' ' . $jam_selesai;
    $m = strtotime($mulai);
    $s = strtotime($selesai);
    ?>
    <script type="text/javascript">
        var count_id = '<?php echo $selesai?>';
        var countDownDate = new Date(count_id).getTime();
        var x = setInterval(function() {    
            var count_id = '<?php echo $selesai?>';
            var now = new Date().getTime(); 
            var distance = countDownDate - now;
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);   
            document.getElementById("demo").innerHTML = hours + " : "
            + minutes + " : " + seconds + "";      
            console.log(hours + ": "+ minutes + ":" + seconds + ":");
            if (distance < 0) {
                clearInterval(x);                          
                window.location.href = "{{route('detail_hasil',[Auth::user()->id,$paket,$tes,$id_kategori])}}";                              
                document.getElementById("demo").innerHTML = "EXPIRED";
            }
        }, 1000);
    </script>
@endsection