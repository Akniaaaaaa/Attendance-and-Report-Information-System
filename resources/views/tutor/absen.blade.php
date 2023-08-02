@extends('layout_admin/dashboard')
@section('badan')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">Absen Here "{{$tutor->name}}"</h3>
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
                <h4 class="card-title">Attandance Class</h4>
                <p class="card-description">
                    Choose one of Attandance
                </p>
                <form method="post" action="{{route('save_absen',$level)}} " enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="tgl_absen">Date</label>
                                <input id="tgl_absen" type="date" class="form-control @error('tgl_absen') is-invalid @enderror" name="tgl_absen" value="{{ old('tgl_absen') }}" required autocomplete="tgl_absen" placeholder="Date">
                                @error('tgl_absen')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="subject">Subject</label>
                                <select class="form-control @error('subject') is-invalid @enderror" id="inputGroupSelect01" name="nm_subject" required autocomplete="nm_subject" autofocus>
                                    <option value="{{ old('nm_subject') }}" selected> Choose Subject</option>
                                    @foreach ($subject as $item)
                                    <option value="{{$item->subject}}">{{$item->subject}}</option>
                                    @endforeach
                                </select>
                                @error('level')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="jam_mulai">Jam Mulai</label>
                                <input id="jam_mulai" type="time" class="form-control @error('jam_mulai') is-invalid @enderror" name="jam_mulai" value="{{ old('jam_mulai') }}" required autocomplete="jam_mulai" placeholder="Masukan Jam Mulai">
                                @error('jam_mulai')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="jam_selesai">Jam Selesai</label>
                                <input id="jam_selesai" type="time" class="form-control @error('jam_selesai') is-invalid @enderror" name="jam_selesai" value="{{ old('jam_selesai') }}" required autocomplete="jam_selesai" placeholder="Masukan Jam Selesai">
                                @error('jam_selesai')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <?php $no = 1; ?>
                    <div class="table-responsive pt-3">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>
                                        No.
                                    </th>
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        KETERANGAN
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach ($kids as $item)
                                    <td>
                                        {{$no++}}
                                    </td>
                                    <td>
                                        {{$item->name}}
                                    </td>
                                    <td>
                                        <input type="hidden" class="btn-check" name="id_anak[]" value="{{$item->id}}">
                                        <!-- <div class="form-group">
                                            <select class="form-control @error('keterangan') is-invalid @enderror" id="inputGroupSelect01" name="keterangan[]" required autocomplete="keterangan" autofocus>
                                                <option value="{{ old('keterangan') }}" selected> Detail</option>
                                                <option value="Hadir">Hadir</option>
                                                <option value="Sakit">Sakit</option>
                                                <option value="Izin">Izin</option>
                                            </select>
                                            @error('keterangan')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div> -->
                                        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                            <input type="radio" class="btn-check" name="keterangan[{{$item->id}}]" id="btnradio1{{$item->id}}" value="hadir" autocomplete="off" checked>
                                            <label class="btn btn-outline-primary" for="btnradio1{{$item->id}}"> Hadir</label>

                                            <input type="radio" class="btn-check" name="keterangan[{{$item->id}}]" id="btnradio2{{$item->id}}" value="sakit" autocomplete="off">
                                            <label class="btn btn-outline-primary" for="btnradio2{{$item->id}}">Sakit</label>

                                            <input type="radio" class="btn-check" name="keterangan[{{$item->id}}]" id="btnradio3{{$item->id}}" value="izin" autocomplete="off">
                                            <label class="btn btn-outline-primary" for="btnradio3{{$item->id}}">Izin</label>

                                        </div>

                                        <!-- <input id="a" type="check-" name="keterangan[]" value="alfa" required> -->
                                    </td>
                                    <!-- <td>
                                    <input id="b" type="radio" name="keterangan[]" value="sakit" required>
                                </td>
                                <td>
                                    <input id="c" type="radio" name="keterangan[]" value="izin" required>
                                </td> -->
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