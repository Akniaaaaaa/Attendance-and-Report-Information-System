@extends('layout_admin/dashboard')
@section('badan')
<div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Halaman Tambah Kategori</h3>
                  <h6 class="font-weight-normal mb-0">Silahkan Isi Form di Bawah Ini!</h6>
                </div>
              </div>
            </div>
          </div>
        
          <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
            <form  method="post" action="/admin/store_kategori "  enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                <label for="nama_kategori">Nama Kategori</label>
                    <input id="nama_kategori" type="nama_kategori" class="form-control @error('nama_kategori') is-invalid @enderror" name="nama_kategori" value="{{ old('nama_kategori') }}" required autocomplete="nama_kategori" placeholder="Masukan Nama Kategori Soal">
                    @error('nama_kategori')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="paket">{{ __('Petunjuk Pengerjaan ') }}</label>
                    {{-- <div class="col-6" id="summernote"> --}}
                     <textarea name="petunjuk" cols="100" rows="10" id="summernote" value="{{ old('petunjuk') }}">
                        {{ old('nama_kategori') }}
                        </textarea>
                     </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <a href="/admin/kategori" class="btn btn-light">Cancel</a>
                    </form>
                </div>
                </div>
            </div>
            </div>
                </div>
            </div>

@endsection
@section('script')
    <script>
      $('#summernote').summernote({
        placeholder: 'Petunjuk Kategori',
        tabsize: 2,
        height: 100
      });
    </script>
@endsection