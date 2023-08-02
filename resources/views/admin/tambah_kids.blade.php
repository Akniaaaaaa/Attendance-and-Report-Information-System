@extends('layout_admin/dashboard')
@section('badan')
<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12 grid-margin">
      <div class="row">
        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
          <h3 class="font-weight-bold">Adding Kids Data</h3>
          <h6 class="font-weight-normal mb-0">Fill out this form below!</h6>
        </div>
      </div>
    </div>
  </div>

  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <form method="post" action="/admin/store_kids " enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="name">Name</label>
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Name">
            @error('name')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-group">
            <label for="age">Age</label>
            <input id="age" type="number" class="form-control @error('age') is-invalid @enderror" name="age" value="{{ old('age') }}" required autocomplete="age" placeholder="Age">
            @error('age')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <?php
          // echo '<label>Admission Year:</label><br><select name="admission_year" data-component="date">';
          $years = [];
          for ($year = 2015; $year <= date('Y'); $year++) {
            // array_push($years);
            $years[] = $year;
            // echo '<option value="' . $year . '">' . $year . '</option>';
          }
          ?>
          <div class="form-group">
            <label for="id_kategori">Academic Year</label>
            <select class="form-control @error('ac_year') is-invalid @enderror" id="inputGroupSelect01" name="ac_year" required autocomplete="ac_year" autofocus>
              <option value="{{ old('ac_year') }}" selected>Choose Academic Year</option>
              @foreach ($years as $item)
              <option value="{{$item}}">{{$item}}</option>
              @endforeach
            </select>
            @error('paket')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-group">
            <label for="address">
              <Address> Address </Address>
            </label>
            <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" placeholder="address">
            @error('address')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $messaddress }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-group">
            <label for="level">Level</label>
            <select class="form-control @error('subject') is-invalid @enderror" id="inputGroupSelect01" name="level" required autocomplete="level" autofocus>
              <option value="{{ old('level') }}" selected> Choose Level</option>
              <option value="Level 0">Level 0</option>
              <option value="Level 1">Level 1</option>
              <option value="Level 2">Level 2</option>
              <option value="Level 3">Level 3</option>
            </select>
            @error('level')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-group">
            <label for="level">Picture</label>
            <input id="pic" type="file" name="pic" class="form-control form-control-lg @error('pic') is-invalid @enderror" required autocomplete="pic">
            @error('pic')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-group">
            <label for="wali_murid">Student Guardian</label>
            <input id="wali_murid" type="text" class="form-control @error('wali_murid') is-invalid @enderror" name="wali_murid" value="{{ old('wali_murid') }}" required autocomplete="wali_murid" placeholder="Student Guardian">
            @error('wali_murid')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <!-- <div class="form-group">
            <label for="paket">{{ __('Petunjuk Pengerjaan ') }}</label>
            {{-- <div class="col-6" id="summernote"> --}}
            <textarea name="petunjuk" cols="100" rows="10" id="summernote" value="{{ old('petunjuk') }}">
            {{ old('nama_kategori') }}
            </textarea>
          </div> -->
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