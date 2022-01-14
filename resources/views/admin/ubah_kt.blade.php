@extends('layout_admin/dashboard')
@section('badan')
<div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Halaman Ubah Kategori</h3>
                  <h6 class="font-weight-normal mb-0">Silahkan Ubah Kategori di Bawah Ini!</h6>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
        
            <form  method="post" action="{{route('ubah_kategori', $id)}} "  enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                  <label for="paket">{{ __('Nama Kategori ') }}</label>
                  <input id="nama_kategori" type="nama_kategori" class="form-control @error('nama_kategori') is-invalid @enderror" name="nama_kategori" value="{{ $tb_kat->nama_kategori }}" required autocomplete="nama_kategori" placeholder="Masukan Kategori Soal">
                  @error('nama_kategori')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="paket">{{ __('Petunjuk Pengerjaan ') }}</label>
                    {{-- <div class="col-6" id="summernote"> --}}
                     <textarea name="petunjuk" cols="100" rows="10" id="summernote" value="{{!$tb_kat->petunjuk}}">
                        {!!($tb_kat->petunjuk)!!}
                        </textarea>
                     </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                    </form>
                </div>

                </div>
            </div></div></div></div>

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