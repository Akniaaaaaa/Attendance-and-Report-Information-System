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
                                <tr>
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
                                        @if($cek->total <= 0) <div class="form-group">
                                            <input id="score" type="number" class="form-control @error('score') is-invalid @enderror" name="score[]" value="{{ old('score') }}" required autocomplete="score" placeholder="Score">
                                            @error('score')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                    </div>
                    @else
                    pp
                    <!-- <div class="form-group">
                                            <input id="score" type="number" class="form-control @error('score') is-invalid @enderror" name="score[]" value="{{$cek->score}}" required autocomplete="score" placeholder="Score">
                                            @error('score')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div> -->
                    @endif
                    </td>

                    </tr>
                    @endforeach
                    </tbody>
                    </table>

                    <div class="form-group row ml-1 mr-1">
                        <label for="soal"><b>{{ __('Comments') }}</b></label><br>
                        <!-- {{-- <div class="col-6" id="summernote"> --}} -->
                        <textarea name="catatan" cols="75" rows="8" id="summernote"></textarea>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save </button>
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>
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
                                    Date
                                </th>
                                <th align="center">
                                    Topik
                                </th>
                                <th align="center">
                                    Evaluation
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach ($absen as $item)
                                <td>
                                    {{$no++}}
                                </td>
                                <td>
                                    {{ \Carbon\Carbon::parse($item->tgl_absen)->format('l,d F Y')}}

                                </td>
                                <td>
                                    Topikkk
                                </td>
                                <td>
                                    <div class="form-group row ml-1 mr-1">
                                        <textarea name="catatan" cols="75" rows="8" id="summernote"></textarea>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
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