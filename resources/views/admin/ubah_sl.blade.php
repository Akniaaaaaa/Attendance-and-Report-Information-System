@extends('layout_admin/dashboard')
@section('badan')
<div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Halaman Ubah Soal</h3>
                  <h6 class="font-weight-normal mb-0">Silahkan Ubah Soal di Bawah Ini!</h6>
                </div>
              </div>
            </div>
          </div>

<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
            <form  method="post" action="{{route('update_soal',$soal->id_soal)}} "  enctype="multipart/form-data">
                @csrf
                <div class="form-group row ml-3">
                    <label for="id_kategori">{{ __('Kategori Soal') }}</label><br>
                    <div class="col-md-12">
                        <select class="form-control @error('id_kategori') is-invalid @enderror" id="inputGroupSelect01" name="id_kategori" required autocomplete="id_kategori" autofocus>
                            <option value="{{ $soal->kategori->id_kategori }}" selected>{{ $soal->kategori->nama_kategori }}</option>
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
                </div>
              
                <div class="form-group row ml-3">
                    <div class="col-1">
                        <label for="paket">{{ __('Soal ') }}</label>
                    </div>
                    <div class="col-md-12">
                        <!-- {{-- <div class="col-12" id="summernote"> --}} -->
                         <textarea name="soal" cols="100" rows="10" id="summernote" value="{{!$soal->soal}}">
                            {!!($soal->soal)!!}
                            </textarea>
                         </div></div>
                
                <div class="form-group row ml-3">
                    <label for="soal_file">{{ __('File Soal ') }}</label>
                    <div class="col-md-12">
                    <input id="soal_file" type="file" class="form-control @error('soal_file') is-invalid @enderror" name="soal_file" value="{{$soal->soal}}" placeholder="Tempat Lahir" autofocus>
                    @error('soal_file')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                </div>
                <div class="form-group row ml-3">
                    <label for="pilgan_a">{{ __('Pilih Ganda  A  ') }} </label>
                    <div class="col-md-12">
                    <input id="pilgan_a" type="text" class="form-control @error('pilgan_a') is-invalid @enderror" name="pilgan_a" value="{{$soal->pilgan_a}}" required autocomplete="pilgan_a" placeholder="Pilihan A" autofocus>
                    @error('pilgan_a')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                </div>
                <div class="form-group row ml-3">
                    <label for="filepilgan_a">{{ __('File Pilihan A ') }}</label>
                    <div class="col-md-12">
                    <input id="filepilgan_a" type="file" class="form-control @error('filepilgan_a') is-invalid @enderror" name="filepilgan_a" value="{{$soal->filepilgan_a}}" placeholder="Tempat Lahir" autofocus>
                    @error('filepilgan_a')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                </div>
                <div class="form-group row ml-3">
                    <label for="pilgan_b">{{ __('Pilih Ganda  B  ') }} </label>
                    <div class="col-md-12">
                    <input id="pilgan_b" type="text" class="form-control @error('pilgan_b') is-invalid @enderror" name="pilgan_b" value="{{$soal->pilgan_b}}" required autocomplete="pilgan_b" placeholder="Pilihan B" autofocus>
                    @error('pilgan_b')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                </div>
                <div class="form-group row ml-3">
                    <label for="filepilgan_b">{{ __('File Pilihan B ') }}</label>
                    <div class="col-md-12">
                    <input id="filepilgan_b" type="file" class="form-control @error('filepilgan_b') is-invalid @enderror" name="filepilgan_b" value="{{$soal->filepilgan_b}}" placeholder="Tempat Lahir" autofocus>
                    @error('filepilgan_b')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                </div>
                <div class="form-group row ml-3">
                    <label for="pilgan_c">{{ __('Pilih Ganda  C  ') }} </label>
                    <div class="col-md-12">
                    <input id="pilgan_c" type="text" class="form-control @error('pilgan_c') is-invalid @enderror" name="pilgan_c" value="{{$soal->pilgan_c}}" required autocomplete="pilgan_c" placeholder="Pilihan C" autofocus>
                    @error('pilgan_c')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                </div>
                <div class="form-group row ml-3">
                    <label for="filepilgan_c">{{ __('File Pilihan C ') }}</label>
                    <div class="col-md-12">
                    <input id="filepilgan_c" type="file" class="form-control @error('filepilgan_c') is-invalid @enderror" name="filepilgan_c" value="{{$soal->filepilgan_c}}" placeholder="Tempat Lahir" autofocus>
                    @error('filepilgan_c')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                </div>
                <div class="form-group row ml-3">
                    <label for="pilgan_d">{{ __('Pilih Ganda  D  ') }} </label>
                    <div class="col-md-12">
                    <input id="pilgan_d" type="text" class="form-control @error('pilgan_d') is-invalid @enderror" name="pilgan_d" value="{{$soal->pilgan_d}}" required autocomplete="pilgan_d" placeholder="Pilihan D" autofocus>
                    @error('pilgan_d')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                </div>
                <div class="form-group row ml-3">
                    <label for="filepilgan_d">{{ __('File Pilihan D ') }}</label>
                    <div class="col-md-12">
                    <input id="filepilgan_d" type="file" class="form-control @error('filepilgan_d') is-invalid @enderror" name="filepilgan_d" value="{{$soal->filepilgan_d}}"  placeholder="Tempat Lahir" autofocus>
                    @error('filepilgan_d')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                </div>
                <div class="form-group row ml-3">
                    <label for="pilgan_e">{{ __('Pilih Ganda  E  ') }} </label>
                    <div class="col-md-12">
                    <input id="pilgan_e" type="text" class="form-control @error('pilgan_e') is-invalid @enderror" name="pilgan_e" value="{{$soal->pilgan_e}}" required autocomplete="pilgan_e" placeholder="Pilihan E" autofocus>
                    @error('pilgan_e')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                </div>
                <div class="form-group row ml-3">
                    <label for="filepilgan_e">{{ __('File Pilihan E ') }}</label>
                    <div class="col-md-12">
                    <input id="filepilgan_e" type="file" class="form-control @error('filepilgan_e') is-invalid @enderror" name="filepilgan_e" value="{{$soal->filepilgan_e}}" placeholder="Tempat Lahir" autofocus>
                    @error('filepilgan_e')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                </div>
                <div class="form-group row ml-3">
                    <div class="text-center col-3">
                    <label for="kunci_jawaban">{{ __('Kunci Jawaban ') }}</label>
                    <div class="col-md-12">
                    <input id="kunci_jawaban" type="text" class="form-control @error('kunci_jawaban') is-invalid @enderror" name="kunci_jawaban" value="{{$soal->kunci_jawaban}}" required autocomplete="kunci_jawaban" placeholder="Kunci" autofocus>
                    @error('kunci_jawaban')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                </div>
                    <div class="text-center col-3">
                    <label for="bobot">{{ __('Bobot Nilai ') }}</label>
                    <div class="col-md-12">
                    <input id="bobot" type="number" class="form-control @error('bobot') is-invalid @enderror" name="bobot" value="{{$soal->bobot}}" required autocomplete="bobot" placeholder="Bobot" autofocus>
                    @error('bobot')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                </div>
                <div class="text-center col-3">
                    <label for="nomor_soal">{{ __('Nomor ') }}</label>
                    <div class="col-md-12">
                    <input id="nomor_soal" type="number" class="form-control @error('nomor_soal') is-invalid @enderror" name="nomor_soal" value="{{ $soal->nomor_soal }}" required autocomplete="nomor_soal" placeholder="Nomor" autofocus>
                    @error('nomor_soal')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                </div>
                    <div class="text-center col-3">
                    <label for="paket">{{ __('Paket ') }}</label>
                    <div class="col-md-12">
                    <input id="paket" type="text" class="form-control @error('paket') is-invalid @enderror" name="paket" value="{{$soal->paket}}" required autocomplete="paket" placeholder="Paket" autofocus>
                    @error('paket')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                </div>
                </div>
                <br>
                    <button type="submit" class="btn btn-primary mr-2 ml-4">Submit</button>
                    <a href="/admin/soal" class="btn btn-light">Cancel</a>
                    </form>
                </div>
                </div>
            </div></div>
                </div>
            </div>

@endsection

@section('script')
<script>
   $(document).ready(function() {
  $('#summernote').summernote();
});
  </script>    
@endsection