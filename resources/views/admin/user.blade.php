@extends('layout_admin/dashboard')

@section('badan')

<div class="content-wrapper">

          <div class="row">

            <div class="col-md-12 grid-margin">

              <div class="row">

                <div class="col-12 col-xl-8 mb-4 mb-xl-0">

                  <h3 class="font-weight-bold">Data Pengguna</h3>

                  <h6 class="font-weight-normal mb-0">Berisi Data Pribadi dari Setiap Peserta yang Telah Melakukan Registrasi Akun.</h6>

                </div>

              </div>

            </div>

          </div>



<div class="col-lg-12 grid-margin stretch-card">

              <div class="card">

                <div class="card-body">

                  <div class="table-responsive">

                    <table class="table table-striped">

                      <thead>

                        <tr>

                          <th class="text-center">No</th>

                          <th class="text-center">Nama Peserta</th>

                          <th class="text-center">Email</th>

                          <th class="text-center">Foto Profile</th>

                          <th class="text-center">Aksi</th>

                        </tr>

                      </thead>

                      @php $no = 1; @endphp

			        @foreach($pengguna as $item)

			            <tbody>

			            <tr>

			         @if($item->role == 1)

			                <td class="text-center">{{ $no++ }}</td>

			                <td class="text-center">{{$item->name}}</td>

			                <td class="text-center">{{$item->email}}</td>

                      @if($item->pic == null)

                      <td class="text-center">

                      <img src="{{asset('admin/images/faces/1.png')}}" height="100px" width="100px" alt="profile"/></td>

                      @else

                      <td class="text-center">

                      <img src="{{ asset('storage/'.$item->pic) }}" height="100px" width="100px" alt="profile"/></td>

                      @endif

                      @method('delete')

                      @csrf

                      <td class="text-center"><a href="/admin/hapus_pengguna/{{$item->id_pengguna}}" class="btn btn-danger btn-sm delete" 

                      onclick="return confirm('Apakah Ingin Menghapus Data Peserta ini ?')">Hapus</a></td>

			            </tr>

			        @endif

			        @endforeach

			          </tbody>

                    </table>

                    {{-- <div class="pagging text-center"><nav><ul class="pagination justify-content-center">

    {{ $pengguna->links() }}

  </ul></nav></div> --}}

                  </div>

                </div>

              </div>

            </div>

        <!-- content-wrapper ends -->

        @endsection

        

        @section('search')

<ul class="navbar-nav mr-lg-2">

      <li class="nav-item nav-search d-none d-lg-block">

        <div class="input-group">

          <div class="input-group-prepend hover-cursor" id="navbar-search-icon">

            <span class="input-group-text" id="search">

              <i class="icon-search"></i>

            </span>

          </div>

          <form method="GET" action="{{ url()->current() }}">

          <input name="cari" type="text" class="form-control" id="navbar-search-input" placeholder="Search..." 

          aria-label="search" aria-describedby="search">

        </div>

      </li>

          </form>

    </ul>

@endsection