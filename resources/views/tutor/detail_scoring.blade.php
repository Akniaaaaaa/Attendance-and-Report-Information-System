@extends('layout_admin/dashboard')
@section('badan')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
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
        </div>
    </div>
    <!-- recap -->
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <a href="{{route('view',[$level,$id_anak])}}" target="_BLANK">
                    <button type="submit" class="btn btn-outline-primary btn-icon-text btn-sm">
                        <i class="ti-download btn-icon-prepend"></i>Download</button>
                </a>

                <div class="brand-logo">
                    <center> <img style="width:150px; height:150px;" src="{{asset('admin/images/logoo.png')}}" alt="logo"> </center>
                </div>
                <hr>
                <div class="row">
                    <div class="col-6">
                        <div class="div">

                            <p>
                                <img src="{{ asset('storage/'.$detail_kids->pic) }}" style="width:200px;height:300px;" class="ml-5" alt="">
                        </div>
                        </p>
                    </div>
                    <div class="col-6">
                        Name &emsp;&emsp; &emsp; &nbsp; : {{$detail_kids->name}}<br>
                        Meeting &emsp; &emsp;&nbsp;&nbsp; : {{$tot_absen}}<br>
                        <!-- Note&emsp;&emsp;&emsp;&emsp;&emsp; &emsp;&nbsp;: {{$detail_kids->level}}<br> -->
                        Absen &emsp;&emsp; &emsp; &nbsp; : {{$Hadir}}<br>
                        Sick &emsp;&emsp;&emsp;&emsp;&emsp;: {{$Sakit}}<br>
                        Aggreement&emsp;&nbsp; : {{$Izin}}<br>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Scoring 1 -->
    <div class="col-lg-12 grid-margin stretch-card">
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
                            Level&emsp;&emsp;&emsp;&emsp;&emsp; &emsp;&nbsp;: {{$detail_kids->level}}<br>
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
                                @if($tot == 0 ) <tr>
                                    @foreach ($subject as $item)
                                    <td>
                                        {{$no++}}
                                    </td>
                                    <td>
                                        {{$item->subject}}
                                    </td>
                                    <td>
                                        {{$item->min_score}}
                                    </td>
                                    <input id="score" type="hidden" class="form-control @error('score') is-invalid @enderror" name="id_anak" value="{{ $id_anak }}" required autocomplete="score" placeholder="Score">
                                    <input id="score" type="hidden" class="form-control @error('score') is-invalid @enderror" name="id_subject[]" value="{{ $item->id }}" required autocomplete="score" placeholder="Score">
                                    <td>
                                        <div class="form-group">
                                            <input id="score" type="number" class="form-control @error('score') is-invalid @enderror" name="score[]" value="{{ old('score') }}" required autocomplete="score" placeholder="Score">
                                            @error('score')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </td>

                                </tr>
                                @endforeach
                                @else
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
                                    <input id="score" type="hidden" class="form-control @error('score') is-invalid @enderror" name="id_anaku" value="{{ $id_anak }}" required autocomplete="score" placeholder="Score">
                                    <input id="score" type="hidden" class="form-control @error('score') is-invalid @enderror" name="id_subjectu[]" value="{{ $item->id_subject }}" required autocomplete="score" placeholder="Score">
                                    <td>
                                        <div class="form-group">
                                            <input id="score" type="number" class="form-control @error('score') is-invalid @enderror" name="scoreu[]" value="{{ $item->score }}" required autocomplete="score" placeholder="Score">
                                            @error('score')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </td>

                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                        @if($tot == 0)
                        <div class="form-group row ml-1 mr-1">
                            <label for="soal"><b>{{ __('Comments') }}</b></label><br>
                            <!-- {{-- <div class="col-6" id="summernote"> --}} -->
                            <textarea name="catatan" cols="75" rows="8" id="summernote"></textarea>
                        </div>
                        @else
                        <div class="form-group row ml-1 mr-1">
                            <label for="soal"><b>{{ __('Comments') }}</b></label><br>
                            <!-- {{-- <div class="col-6" id="summernote"> --}} -->
                            <textarea name="catatan" value="{!!$cek->catatan!!}" cols="75" rows="8" id="summernote">{!!$cek->catatan!!}</textarea>

                        </div>
                        @endif
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Scoring 2 -->
    <div class="col-lg-12 grid-margin stretch-card">
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
                                @if($tot2 == 0)
                                <tr>
                                    @foreach ($absen as $item)
                                    <td>
                                        {{$no++}}
                                    </td>
                                    <td>
                                        {{ \Carbon\Carbon::parse($item->tgl_absen)->format('l,d F Y')}}
                                        <input id="date" type="hidden" class="form-control @error('date') is-invalid @enderror" name="date" value="{{ $item->tgl_absen }}" required autocomplete="date" placeholder="date">

                                    </td>
                                    <td>
                                        <div class="form-group row ml-1 mr-1">
                                            <textarea name="topic[]" cols="75" rows="8" id="summernote"></textarea>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group row ml-1 mr-1">
                                            <textarea name="activities[]" cols="75" rows="8" id="summernote"></textarea>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group row ml-1 mr-1">
                                            <textarea name="goal[]" cols="75" rows="8" id="summernote"></textarea>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group row ml-1 mr-1">
                                            <textarea name="evaluation[]" cols="75" rows="8" id="summernote"></textarea>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    @foreach ($rapor2 as $item)
                                    <td>
                                        {{$no++}}
                                    </td>
                                    <td>
                                        {{ \Carbon\Carbon::parse($item->date)->format('l,d F Y')}}
                                        <input id="date" type="hidden" class="form-control @error('date') is-invalid @enderror" name="date" value="{{ $item->date }}" required autocomplete="date" placeholder="date">

                                    </td>
                                    <td>
                                        <div class="form-group row ml-1 mr-1">
                                            <textarea name="topicU[]" cols="75" rows="8" id="summernote2">{!!$item->topic!!}</textarea>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group row ml-1 mr-1">
                                            <textarea name="activitiesU[]" cols="75" rows="8" id="summernote3">{!!$item->activities!!}</textarea>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group row ml-1 mr-1">
                                            <textarea name="goalU[]" cols="75" rows="8" id="summernote4">{!!$item->goal!!}</textarea>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group row ml-1 mr-1">
                                            <textarea name="evaluationU[]" cols="75" rows="8" id="summernote5">{!!$item->evaluation!!}</textarea>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection
    @section('script')
    <script>
        $('#summernote').summernote({
            placeholder: 'Comments Here',
            tabsize: 2,
            height: 150
        });
    </script>
    @endsection