@extends('layouts/peserta')
@section('badan')
<div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Halaman Hasil Ujian</h3>
                  <h6 class="font-weight-normal mb-0">Berikut Ini Merupakan Rekap Nilai Hasil Ujian</h6>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
        <p>
        <button class="btn btn-info" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            Grafik Kecermatan
        </button>
        </p>
        <div class="collapse" id="collapseExample">
        <div class="row">
        <center><div class="col-lg-6 grid-margin stretch-card">
        <div class="card card-body">
        <canvas id="myChart"></canvas>
        </div>
        </div>
        </div></center>
        </div>

        <div class="table-responsive">
            <table class="table table-striped">
            <thead>
                <tr>
                <th class="text-center">No </th>
                <th class="text-center">Nama Kategori </th>
                <th class="text-center">Benar </th>
                <th class="text-center">Salah </th>
                <th class="text-center">Jumlah Jawaban </th>

                </tr>
            </thead>
            <tbody>
                @php $no=1;@endphp
                    @foreach ($kt as $item)
                        <tr>
                            <td class="text-center">{{$no++}} </td>
                            <td class="text-center">{{$item->kategori->nama_kategori}} </td>
                            <td class="text-center">{{$item->hasil}}</td>
                            <td class="text-center">{{$item->salah}}</td>
                            <td class="text-center">{{$item->sum_jawaban}}</td>
                           
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<link rel="stylesheet" type="text/css" href="{{ url('admin/js/Chart.min.css')}}">
<script type="text/javascript" src="{{ url('admin/js/Chart.min.js')}}"> </script>

<script>
//deklarasi chartjs untuk membuat grafik 2d di id mychart 
var ctx = document.getElementById('myChart').getContext('2d');

var myChart = new Chart(ctx, {
 //chart akan ditampilkan sebagai bar chart
    type: 'bar',
    data: {
     //membuat label chart
        labels: ['K1','K2','K3','K4','K5','K6','K7','K8','K9','K10'],
        datasets: [{
            label: 'Jumlah',
            //isi chart
            data: [{{$name1}},{{$name2}},{{$name3}},{{$name4}},{{$name5}},{{$name6}},{{$name7}},{{$name8}},{{$name9}},{{$name10}}],
            //membuat warna pada bar chart
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(153, 102, 255, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(153, 102, 255, 1)',
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>
@stop