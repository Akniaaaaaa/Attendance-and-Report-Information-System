@extends('layout_admin/dashboard')
@section('badan')
<div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Halaman Ubah Jadwal</h3>
                  <h6 class="font-weight-normal mb-0">Silahkan Ubah Jadwal "{{$tb_jadwal->peserta->name}}" di Bawah Ini!</h6>
                </div>
              </div>
            </div>
          </div>

<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                <form  method="post" action="{{route('update_jadwal', $tb_jadwal->id_jadwal)}} "  enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="tanggal_tes">Tanggal Tes</label>
                    <input id="tanggal_tes" type="date" class="form-control @error('tanggal_tes') is-invalid @enderror" 
                    name="tanggal_tes" value="{{ $tb_jadwal->tanggal_tes }}" required autocomplete="tanggal_tes" 
                    placeholder="Masukan Tanggal Tes">
                    @error('tanggal_tes')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="jam_mulai">Jam Mulai</label>
                    <input id="jam_mulai" type="time" class="form-control @error('jam_mulai') is-invalid @enderror" 
                    name="jam_mulai" value="{{ $tb_jadwal->jam_mulai }}" required autocomplete="jam_mulai" 
                    placeholder="Masukan Jam Mulai">
                    @error('jam_mulai')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="jam_selesai">Jam Selesai</label>
                    <input id="jam_selesai" type="time" class="form-control @error('jam_selesai') is-invalid @enderror" 
                    name="jam_selesai" value="{{ $tb_jadwal->jam_selesai }}" required autocomplete="jam_selesai" 
                    placeholder="Masukan Jam Selesai">
                    @error('jam_selesai')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="status_ujian">Status Ujian</label>
                    <select class="form-control @error('status_ujian') is-invalid @enderror" id="inputGroupSelect01" 
                    name="status_ujian" required autocomplete="status_ujian" autofocus>
                        <option value="Belum Ujian" selected>Belum Ujian</option>
                        <option value="Selesai">Selesai</option>
                    </select>
                    @error('status_ujian')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <input type="hidden" name="id_peserta" value="{{$id_peserta}}">
                <div class="form-group">
                    <label for="id_kategori">Paket</label>
                    <select class="form-control @error('paket') is-invalid @enderror" id="inputGroupSelect01" 
                    name="paket" required autocomplete="paket" autofocus>
                        <option value="{{ $tb_jadwal->paket }}" selected>{{ $tb_jadwal->paket }}</option>
                        @foreach ($soal as $item)
                        <option value="{{$item->paket}}">{{$item->paket}}</option>
                        @endforeach
                    </select>
                    @error('paket')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="id_kategori">Kategori</label>
                    <select class="form-control @error('id_kategori') is-invalid @enderror" id="inputGroupSelect01" 
                    name="id_kategori" required autocomplete="id_kategori" autofocus>
                        <option value="{{ $tb_jadwal->id_kategori }}" selected>{{ $tb_jadwal->kategori->nama_kategori }}</option>
                            @foreach ($kt as $item)
                        <option value="{{$item->id_kategori}}">{{$item->nama_kategori}}</option>
                        @endforeach
                    </select>
                    @error('id_kategori')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                {{-- <div class="form-group">
                    <label for="tes_ke">Tes Ke</label>
                    <input id="tes_ke" type="number" class="form-control @error('tes_ke') is-invalid @enderror" 
                    name="tes_ke" value="{{ $tb_jadwal->tes_ke }}" required autocomplete="tes_ke" 
                    placeholder="Masukan Tes Ke">
                    @error('tes_ke')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div> --}}

                {{-- <div class="form-group">
                    <label for="id_peserta">Nama Peserta</label>
                    <select class="form-control @error('id_peserta') is-invalid @enderror" id="inputGroupSelect01" 
                    name="id_peserta" required autocomplete="id_peserta" autofocus>
                        <option value="{{ $tb_jadwal->id_peserta }}" selected> </option>
                            @foreach ($user as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                    @error('id_peserta')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div> --}}

                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <a href="/admin/jadwal" class="btn btn-light">Cancel</a>
                    </form>
                </div>
              </div>
            </div>
        <!-- content-wrapper ends -->
        @endsection