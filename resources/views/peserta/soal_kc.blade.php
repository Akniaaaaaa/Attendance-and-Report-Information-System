@extends('layouts.app')
@section('content')
@livewire('kecermatan', ['soal' => $soal,'paket' => $paket,'id_kategori' => $id_kategori,'tes' => $tes,'nomor_soal' => $nomor_soal, 'jadwal' => $jadwal,'kategori' => $kategori,'id_jadwal' => $id_jadwal])
@endsection