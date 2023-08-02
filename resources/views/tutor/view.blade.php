<!DOCTYPE html>
<html>



<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CetakRapor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<style>
    @media print {
        @page {
            size: landscape;
        }

        LC {
            transform: rotate(90deg);
            transform-origin: left top;
            width: 100vw;
            height: 100vh;
            overflow: hidden;
            position: absolute;
            top: 0;
            left: 0;
        }
    }
</style>

<body>
    <div class="content-wrapper">
        <div class="row">
            <!-- <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">Scoring "{{$detail_kids->name}}"</h3>
                </div>
                <div class="col-12 col-xl-4">
                    <div class="justify-content-end d-flex">
                        <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                            <button class="btn btn-sm btn-light bg-white" type="button">
                                <i class="mdi mdi-calendar"></i> Today ({{Carbon\Carbon::now()->isoFormat('D MMM Y')}})
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        </div>
        <!-- recap -->
        <div class="col-lg-12 grid-margin stretch-card" style="break-after:page">

            <div class="card">
                <div class="card-body">

                    <div class="brand-logo">
                        <center> <img style="width:150px; height:150px;" src="{{asset('admin/images/logoo.png')}}" alt="logo"> </center>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-6">
                            <div class="div">

                                <p>
                                    <img src="{{ asset('storage/'.$detail_kids->pic) }}" style="width:200px;height:300px;" alt="">
                            </div>
                            </p>
                        </div>
                        <div class="col-6">
                            Name &emsp;&emsp; &emsp; &nbsp; : {{$detail_kids->name}}<br>
                            Meeting &emsp; &emsp;&nbsp;&nbsp; : {{$tot_absen}}<br>
                            <!-- Note&emsp;&emsp;&emsp;&emsp;&emsp; &emsp;&nbsp;: {{$detail_kids->level}}<br> -->
                            Absen &emsp;&emsp; &emsp; &nbsp; : {{$Hadir}}<br>
                            Sick&emsp;&emsp;&emsp;&emsp;&emsp;: {{$Sakit}}<br>
                            Aggreement&emsp;&nbsp; : {{$Izin}}<br>

                        </div>
                    </div>

                </div>
            </div>

        </div>
        <!-- Scoring 1 -->
        <div class="col-lg-12 grid-margin stretch-card" style="break-after:page">

            <div class="card">
                <div class="card-body">

                    <div class="brand-logo">
                        <center> <img style="width:150px; height:150px;" src="{{asset('admin/images/logoo.png')}}" alt="logo"> </center>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-6">
                            <p>
                                Name &emsp;&emsp;&emsp;&emsp;&emsp; &nbsp; : {{$detail_kids->name}}<br>
                                Student's Number &nbsp; : {{$detail_kids->id}}<br>
                                Level&emsp;&emsp;&emsp;&emsp;&emsp; &nbsp;: {{$detail_kids->level}}<br>
                            </p>
                        </div>
                        <div class="col-6">
                            Age &emsp;&emsp;&emsp;&emsp;&emsp; &nbsp; : {{$detail_kids->age}}<br>
                            Academic Years &nbsp; &nbsp;: {{$detail_kids->ac_year}}<br>
                            Address &emsp;&emsp;&emsp;&emsp; : {{$detail_kids->address}}<br>

                        </div>
                    </div>
                    <form method="post" action="{{route('save_score1',[$level,$id_anak])}} " enctype="multipart/form-data">
                        @csrf
                        <?php $no = 1; ?>
                        <div class="table-responsive pt-3">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th align="center">
                                            No.
                                        </th>
                                        <th align="center">
                                            Subject
                                        </th>
                                        <th align="center">
                                            Minimum Standard Score
                                        </th>
                                        <th align="center">
                                            Score
                                        </th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach ($rapor_sis as $item)
                                        <td>
                                            {{$no++}}
                                        </td>
                                        <td>
                                            {{$item->subject->subject}}
                                        </td>
                                        <td>
                                            {{$item->subject->min_score}}
                                        </td>
                                        <!-- {{ $id_anak }}
                                    {{ $item->id }} -->
                                        <td>
                                            {{ $item->score }}
                                        </td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <center><b>Comments</b></center>
                            {!!$cek->catatan!!}
                        </div>
                    </form>
                </div>
                <div class="row" style="text-align: center;">
                    <div class="col-6">
                        Wali Murid,
                        <br>
                        <br>
                        <br>
                        <br>
                        ({{$detail_kids->wali_murid}})
                    </div>
                    <div class="col-6">
                        Tutor,
                        <br>
                        <br>
                        <br>
                        <br>
                        ({{$user->name}})
                    </div>
                </div>
            </div>

        </div>
        <!-- Scoring 2 -->
        <div class="col-lg-12 grid-margin stretch-card" class="landscape">
            <div class="card">
                <div class="card-body">

                    <div class="brand-logo">
                        <center> <img style="width:150px; height:150px;" src="{{asset('admin/images/logoo.png')}}" alt="logo"> </center>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-6">
                            <p>
                                Studen/Level &emsp;: {{$detail_kids->name}}/{{$detail_kids->level}}
                            </p>
                        </div>
                        <div class="col-6">
                            Tutor &emsp;: {{$user->name}}
                        </div>
                    </div>
                    <form method="post" action="{{route('save_score2',[$level,$id_anak])}} " enctype="multipart/form-data">
                        @csrf
                        <?php $no = 1; ?>
                        <div class="table-responsive pt-3">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th align="center">
                                            No.
                                        </th>
                                        <th align="center">
                                            Date
                                        </th>
                                        <th align="center">
                                            TopiC
                                        </th>
                                        <th align="center">
                                            Activities
                                        </th>
                                        <th align="center">
                                            Goal
                                        </th>
                                        <th align="center">
                                            Evaluation
                                        </th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach ($rapor2 as $item)
                                        <td>
                                            {{$no++}}
                                        </td>
                                        <td>
                                            {{ \Carbon\Carbon::parse($item->date)->format('l,d F Y')}}

                                        </td>
                                        <td>
                                            {{ $item->topic }}

                                        </td>
                                        <td>
                                            {{ $item->activities }}
                                        </td>
                                        <td>
                                            {{ $item->goal }}
                                        </td>
                                        <td>
                                            {{ $item->evaluation }}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </form>
                    <div class="row" style="text-align: center;">
                        <div class="col-6">
                            Wali Murid,
                            <br>
                            <br>
                            <br>
                            <br>
                            ({{$detail_kids->wali_murid}})
                        </div>
                        <div class="col-6">
                            Tutor,
                            <br>
                            <br>
                            <br>
                            <br>
                            ({{$user->name}})
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            window.print();
        </script>
</body>

</html>