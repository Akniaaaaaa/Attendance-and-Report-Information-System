@extends('layout_admin/dashboard')
@section('badan')
<div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Halaman Tambah Jadwal</h3>
                  <h6 class="font-weight-normal mb-0">Silahkan Isi Form di Bawah Ini!</h6>
                </div>
              </div>
            </div>
          </div>

<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                <form  method="post" action="{{route('Sjadwal_kecermatan')}}"  enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="tanggal_tes">Tanggal Tes</label>
                    <input id="tanggal_tes" type="date" class="form-control @error('tanggal_tes') is-invalid @enderror" 
                    name="tanggal_tes" value="{{ old('tanggal_tes') }}" required autocomplete="tanggal_tes" 
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
                    name="jam_mulai" value="{{ old('jam_mulai') }}" required autocomplete="jam_mulai" 
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
                    name="jam_selesai" value="{{ old('jam_selesai') }}" required autocomplete="jam_selesai" 
                    placeholder="Masukan Jam Selesai">
                    @error('jam_selesai')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

            
            <div class="form-group">
                <label for="id_kategori">Paket</label>
                <select class="form-control @error('paket') is-invalid @enderror" id="inputGroupSelect01" 
                name="paket" required autocomplete="paket" autofocus>
                    <option value="{{ old('paket') }}" selected>Pilih Paket</option>
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
           
                {{-- <div class="form-group"> --}}
                    {{-- <select class="form-control @error('id_kategori') is-invalid @enderror" id="inputGroupSelect01" 
                    name="id_kategori" required autocomplete="id_kategori" autofocus>
                    <option value="{{ old('id_kategori') }}" selected>Pilih Kategori</option>
                    @foreach ($kt as $item)
                    <option value="{{$item->id_kategori}}">{{$item->nama_kategori}}</option>
                    @endforeach
                </select>
                @error('id_kategori')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div> --}}
            {{-- <label for="id_kategori">Kategori</label> --}}
            {{-- <div class="row ml-2"> --}}
                    @foreach ($kt as $item)
                    {{-- <div class="col-3">
                        <div class="form-check"> --}}
                            <input class="form-check-input" name="kategori[]" type="hidden" value="{{$item->id_kategori}}" id="flexCheckDefault" checked>
                            {{-- <label class="form-check-label" for="flexCheckDefault"> --}}
                              {{-- {{$item->nama_kategori}} --}}
                            {{-- </label>
                          </div>
                    </div> --}}
                    @endforeach
                {{-- </div> --}}
               
                <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>No. </th>
                          <th>Nama Peserta </th>
                          <th>Aksi </th>
                        </tr>
                      </thead>
                      <tbody>
                        @php 
                $no=1;                 
                @endphp
             @foreach ($user as $item)
             <tr>
               <td >{{$no++}} </td>
               <td >{{$item->name}} </td>
               <td>
                    <input type="checkbox" class="mt-2" name="jadwal[]" value="{{ $item->id}}" >
                </td>                
              </tr>
              @endforeach
              
            </tbody>
          </form>
          </table>
        </div>

                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <a href="/admin/jadwal" class="btn btn-light">Cancel</a>
                    </form>
                </div>
              </div>
            </div>
        <!-- content-wrapper ends -->
        @endsection