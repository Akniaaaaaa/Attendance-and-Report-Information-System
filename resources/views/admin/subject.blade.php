@extends('layout_admin/dashboard')
@section('badan')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">Data Subject</h3>
                    <h6 class="font-weight-normal mb-0">Standarization Subject.</h6>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <button type="submit" class="btn btn-outline-primary btn-icon-text btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="ti-plus btn-icon-prepend"></i>Adding Subject</button>

                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Subject</th>
                                <th class="text-center">Min</th>
                                <th class="text-center" colspan="2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no=1;
                            @endphp
                            @foreach ($subject as $item)
                            <tr>
                                <td class="text-center">{{$no++}} </td>
                                <td>
                                    {{$item->subject}}

                                </td>
                                <td class="text-center">{!!$item->min_score!!} </td>
                                @csrf
                                <td class="text-center"><a href="{{route('edit_subject',$item->id)}}" class="btn btn-warning btn-sm">Ubah</a>
                                    @method('delete')
                                    @csrf
                                    <a href="/admin/hapus/{{$item->id}}" class="btn btn-danger btn-sm delete" onclick="return confirm('Apakah Ingin Menghapus Data Kategori ini ?')">Hapus</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        </form>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Adding Subject</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{route('save_subject')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="subject">Subject</label>
                            <input id="subject" type="text" class="form-control @error('subject') is-invalid @enderror" name="subject" value="{{ old('subject') }}" required autocomplete="subject" placeholder="Subject">
                            @error('subject')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="min_score">Minimal Score</label>
                            <input id="min_score" type="number" class="form-control @error('min_score') is-invalid @enderror" name="min_score" value="{{ old('min_score') }}" required autocomplete="min_score" placeholder="Minimal Score">
                            @error('min_score')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    @endsection