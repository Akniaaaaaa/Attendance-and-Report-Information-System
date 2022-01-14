@extends('layouts/app')
@section('content')
<nav class="sidebar sidebar-offcanvas" id="sidebar">
   
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
                                    {{-- <form method="get" action="{{route('simpanjawaban',([$paket,$id_kategori,$tes,$nomor_soal]))}}" enctype="multipart/form-data"> --}}
                                        <form wire:submit.prevent="simpanjawaban">
                                        @csrf
                                        <input type="hidden" name="nomor_soal" value="{{$nomor_soal}}">
                                        <input type="hidden" name="paket" value="{{$paket}}">
                                    {!!$soal->soal!!} <br>
                                    @if($soal->soal_file!="Tidak Ada Gambar" && $soal->soal_file!=null)
                                        <img src="{{ asset('storage/'.$soal->soal_file) }}" alt="" title="" style="width: 200px; height:200px" class="card-img-top mt-5"><br>
                                        <br>
                                    @else
                                        <br>
                                    @endif
                                    {{-- @if(!empty($jawaban->jawaban))
                                    @if($jawaban->jawaban == 'A')
                                    <input type="radio"  name="pilihan" value="A" required checked="checked"><label for="Pilihan_a" style="color: black" class="ml-2"> A. {{$soal->pilgan_a}}</label><br>
                                    <input type="radio"  name="pilihan" value="B" required ><label for="Pilihan_a" style="color: black" class="ml-2"> B. {{$soal->pilgan_b}}</label><br>
                                    <input type="radio"  name="pilihan" value="C" required ><label for="Pilihan_a" style="color: black" class="ml-2"> C. {{$soal->pilgan_c}}</label><br>
                                    <input type="radio"  name="pilihan" value="D" required ><label for="Pilihan_a" style="color: black" class="ml-2"> D. {{$soal->pilgan_d}}</label><br>
                                    <input type="radio"  name="pilihan" value="E" required ><label for="Pilihan_a" style="color: black" class="ml-2"> E. {{$soal->pilgan_e}}</label><br>
                                    @elseif($jawaban->jawaban == 'B')
                                    <input type="radio"  name="pilihan" value="A" required ><label for="Pilihan_a" style="color: black" class="ml-2"> A. {{$soal->pilgan_a}}</label><br>
                                    <input type="radio"  name="pilihan" value="B" required checked="checked"><label for="Pilihan_a" style="color: black" class="ml-2"> B. {{$soal->pilgan_b}}</label><br>
                                    <input type="radio"  name="pilihan" value="C" required ><label for="Pilihan_a" style="color: black" class="ml-2"> C. {{$soal->pilgan_c}}</label><br>
                                    <input type="radio"  name="pilihan" value="D" required ><label for="Pilihan_a" style="color: black" class="ml-2"> D. {{$soal->pilgan_d}}</label><br>
                                    <input type="radio"  name="pilihan" value="E" required ><label for="Pilihan_a" style="color: black" class="ml-2"> E. {{$soal->pilgan_e}}</label><br>
                                    @elseif($jawaban->jawaban=='C')
                                    <input type="radio"  name="pilihan" value="A" required ><label for="Pilihan_a" style="color: black" class="ml-2"> A. {{$soal->pilgan_a}}</label><br>
                                    <input type="radio"  name="pilihan" value="B" required ><label for="Pilihan_a" style="color: black" class="ml-2"> B. {{$soal->pilgan_b}}</label><br>
                                    <input type="radio"  name="pilihan" value="C" required checked="checked"><label for="Pilihan_a" style="color: black" class="ml-2"> C. {{$soal->pilgan_c}}</label><br>
                                    <input type="radio"  name="pilihan" value="D" required ><label for="Pilihan_a" style="color: black" class="ml-2"> D. {{$soal->pilgan_d}}</label><br>
                                    <input type="radio"  name="pilihan" value="E" required ><label for="Pilihan_a" style="color: black" class="ml-2"> E. {{$soal->pilgan_e}}</label><br>
                                    @elseif($jawaban->jawaban=='D')
                                    <input type="radio"  name="pilihan" value="A" required ><label for="Pilihan_a" style="color: black" class="ml-2"> A. {{$soal->pilgan_a}}</label><br>
                                    <input type="radio"  name="pilihan" value="B" required ><label for="Pilihan_a" style="color: black" class="ml-2"> B. {{$soal->pilgan_b}}</label><br>
                                    <input type="radio"  name="pilihan" value="C" required ><label for="Pilihan_a" style="color: black" class="ml-2"> C. {{$soal->pilgan_c}}</label><br>
                                    <input type="radio"  name="pilihan" value="D" required checked="checked"><label for="Pilihan_a" style="color: black" class="ml-2"> D. {{$soal->pilgan_d}}</label><br>
                                    <input type="radio"  name="pilihan" value="E" required ><label for="Pilihan_a" style="color: black" class="ml-2"> E. {{$soal->pilgan_e}}</label><br>
                                    @elseif($jawaban->jawaban=='E')
                                    <input type="radio"  name="pilihan" value="A" required ><label for="Pilihan_a" style="color: black" class="ml-2"> A. {{$soal->pilgan_a}}</label><br>
                                    <input type="radio"  name="pilihan" value="B" required ><label for="Pilihan_a" style="color: black" class="ml-2"> B. {{$soal->pilgan_b}}</label><br>
                                    <input type="radio"  name="pilihan" value="C" required ><label for="Pilihan_a" style="color: black" class="ml-2"> C. {{$soal->pilgan_c}}</label><br>
                                    <input type="radio"  name="pilihan" value="D" required ><label for="Pilihan_a" style="color: black" class="ml-2"> D. {{$soal->pilgan_d}}</label><br>
                                    <input type="radio"  name="pilihan" value="E" required checked="checked"><label for="Pilihan_a" style="color: black" class="ml-2"> E. {{$soal->pilgan_e}}</label><br>
                                     @endif
                                    @else
                                    <input type="radio"  name="pilihan" value="A" required ><label for="Pilihan_a" style="color: black" class="ml-2"> A. {{$soal->pilgan_a}}</label><br>
                                    <input type="radio"  name="pilihan" value="B" required ><label for="Pilihan_a" style="color: black" class="ml-2"> B. {{$soal->pilgan_b}}</label><br>
                                    <input type="radio"  name="pilihan" value="C" required ><label for="Pilihan_a" style="color: black" class="ml-2"> C. {{$soal->pilgan_c}}</label><br>
                                    <input type="radio"  name="pilihan" value="D" required ><label for="Pilihan_a" style="color: black" class="ml-2"> D. {{$soal->pilgan_d}}</label><br>
                                    <input type="radio"  name="pilihan" value="E" required ><label for="Pilihan_a" style="color: black" class="ml-2"> E. {{$soal->pilgan_e}}</label><br>
                                    @endif

                                    <a>
                                        <button type="submit" class="btn btn-primary" style="size: 5px; color: black"><label style="color: white">SIMPAN & LANJUTKAN</label></button>
                                    </a>
                                    <button type="button"  class="btn btn-danger" style= "color: black" data-toggle="modal" data-target="#selesai"><label style="color: white">SELESAI</label></button> --}}
                                    <center>
                                    <div class="row">
                                        <div class="col-2 ml-3">
                                            <a>
                                                <input type="submit" class="btn btn-info mr-2" style="size: 5px; color: black" name="pilihan" value="A"><label style="color: black"></label></input>
                                            </a>
                                        </div>
                                        <div class="col-2 ml-3">
                                            <a>
                                                <input type="submit" class="btn btn-info mr-2" style="size: 5px; color: black" name="pilihan" value="B"><label style="color: black"></label></input>
                                            </a>
                                        </div>
                                        <div class="col-2 ml-3">
                                            <a>
                                                <input type="submit" class="btn btn-info mr-2" style="size: 5px; color: black" name="pilihan" value="C"><label style="color: black"></label></input>
                                            </a>
                                        </div>
                                        <div class="col-2 ml-3">
                                            <a>
                                                <input type="submit" class="btn btn-info mr-2" style="size: 5px; color: black" name="pilihan" value="D"><label style="color: black"></label></input>
                                            </a>
                                        </div>
                                        <div class="col-2 ml-3">
                                            <a>
                                                <input type="submit" class="btn btn-info mr-2" style="size: 5px; color: black" name="pilihan" value="E"><label style="color: black"></label></input>
                                            </a>  
                                        </div>                                                          
                                    </div>
                                    </center>
                                    </form>    
                                </div>
                             </div>
                 

                                <div class="col-md-6 mr-3 mb-4 stretch-card transparent ml-5" style="width: 300px; height:110px;">
                                    <div class="card card-dark-blue">
                                      <div class="card-body">
                                          <center>
                                            <p class="mb-4">Waktu Tersisa</p>
                                         <p class="fs-30 mb-2" id="demo"></p>
                                         {{-- <p id="timer">______</p> --}}
                                          </center>
                                      </div>
                                    </div>
                                  </div>
                             
                            </div>
                        </div>
                    </div>
                </div>
            </div>   
        </div>
    </div>
</div> 
@endsection
@section('script')
<?php
    $jadwal = App\Models\Jadwal::where('id_peserta', Auth::user()->id)
    ->where('id_jadwal',$id_jadwal)->first();
    $id_kategori = $jadwal->id_kategori;
    $tanggal = $jadwal->tanggal_tes;
    $jam_mulai = $jadwal->jam_mulai;
    $jam_selesai = $jadwal->jam_selesai;
    $mulai = $tanggal . ' ' . $jam_mulai;
    $selesai = $tanggal . ' ' . $jam_selesai;
    
    $m = strtotime($mulai);
    $s = strtotime($selesai);
    ?>
    @if($id_kategori==3)
    <script type="text/javascript">
        var count_id = '<?php echo $selesai?>';
        var countDownDate = new Date(count_id).getTime();
        var x = setInterval(function() {    
            var count_id = '<?php echo $selesai?>';
            var now = new Date().getTime(); 
            var date1 = new Date();
            date1.setMinutes(date1.getMinutes()+9);
            var distance = countDownDate - date1;
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
    @elseif($id_kategori==4)
    <script type="text/javascript">
        var count_id = '<?php echo $selesai?>';
        var countDownDate = new Date(count_id).getTime();
        var x = setInterval(function() {    
            var count_id = '<?php echo $selesai?>';
            var now = new Date().getTime(); 
            var date1 = new Date();
            date1.setMinutes(date1.getMinutes()+8);
            var distance = countDownDate - date1;
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
    @elseif($id_kategori==5)
    <script type="text/javascript">
        var count_id = '<?php echo $selesai?>';
        var countDownDate = new Date(count_id).getTime();
        var x = setInterval(function() {    
            var count_id = '<?php echo $selesai?>';
            var now = new Date().getTime(); 
            var date1 = new Date();
            date1.setMinutes(date1.getMinutes()+7);
            var distance = countDownDate - date1;
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
    @elseif($id_kategori==6)
    <script type="text/javascript">
        var count_id = '<?php echo $selesai?>';
        var countDownDate = new Date(count_id).getTime();
        var x = setInterval(function() {    
            var count_id = '<?php echo $selesai?>';
            var now = new Date().getTime(); 
            var date1 = new Date();
            date1.setMinutes(date1.getMinutes()+6);
            var distance = countDownDate - date1;
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
    @elseif($id_kategori==7)
    <script type="text/javascript">
        var count_id = '<?php echo $selesai?>';
        var countDownDate = new Date(count_id).getTime();
        var x = setInterval(function() {    
            var count_id = '<?php echo $selesai?>';
            var now = new Date().getTime(); 
            var date1 = new Date();
            date1.setMinutes(date1.getMinutes()+5);
            var distance = countDownDate - date1;
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
    @elseif($id_kategori==8)
    <script type="text/javascript">
        var count_id = '<?php echo $selesai?>';
        var countDownDate = new Date(count_id).getTime();
        var x = setInterval(function() {    
            var count_id = '<?php echo $selesai?>';
            var now = new Date().getTime(); 
            var date1 = new Date();
            date1.setMinutes(date1.getMinutes()+4);
            var distance = countDownDate - date1;
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
    @elseif($id_kategori==9)
    <script type="text/javascript">
        var count_id = '<?php echo $selesai?>';
        var countDownDate = new Date(count_id).getTime();
        var x = setInterval(function() {    
            var count_id = '<?php echo $selesai?>';
            var now = new Date().getTime(); 
            var date1 = new Date();
            date1.setMinutes(date1.getMinutes()+3);
            var distance = countDownDate - date1;
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
    @elseif($id_kategori==10)
    <script type="text/javascript">
        var count_id = '<?php echo $selesai?>';
        var countDownDate = new Date(count_id).getTime();
        var x = setInterval(function() {    
            var count_id = '<?php echo $selesai?>';
            var now = new Date().getTime(); 
            var date1 = new Date();
            date1.setMinutes(date1.getMinutes()+2);
            var distance = countDownDate - date1;
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
    @elseif($id_kategori==11)
    <script type="text/javascript">
        var count_id = '<?php echo $selesai?>';
        var countDownDate = new Date(count_id).getTime();
        var x = setInterval(function() {    
            var count_id = '<?php echo $selesai?>';
            var now = new Date().getTime(); 
            var date1 = new Date();
            date1.setMinutes(date1.getMinutes()+1);
            var distance = countDownDate - date1;
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
    @elseif($id_kategori==12)
    <script type="text/javascript">
        var count_id = '<?php echo $selesai?>';
        var countDownDate = new Date(count_id).getTime();
        var x = setInterval(function() {    
            var count_id = '<?php echo $selesai?>';
            var now = new Date().getTime(); 
            var date1 = new Date();
            date1.setMinutes(date1.getMinutes()+0);
            var distance = countDownDate - date1;
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
    @endif
@endsection