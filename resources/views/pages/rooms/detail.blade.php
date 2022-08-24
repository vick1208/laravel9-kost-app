@extends('layout')
@include('wizards.create_room_placement')

@section('main')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Detail Kamar</h1>
</div>

<div class="row">
  <label for="code" class="col-sm-2 col-form-label">Kode Kamar</label>
  <div class="col-sm-3">
    <input class="form-control-plaintext" readonly type="text" id="code" value="{{ $room->code }}">
  </div>
</div>
<div class="row">
  <label for="location_id" class="col-sm-2 col-form-label">Lokasi</label>
  <div class="col-sm-3">
    <input class="form-control-plaintext" readonly type="text" id="location" value="{{ $room->location ? $room->location->name : '' }}">
  </div>
</div>
<div class="row">
  <label for="capacity" class="col-sm-2 col-form-label">Kapasitas</label>
  <div class="col-sm-3">
    <input class="form-control-plaintext" readonly type="text" id="location" value="{{ $room->capacity }}">
  </div>
</div>
<div class="row gap-2">
  <div class="col-form-label">
    <button type="button" class="btn btn-sm btn-success col-sm-2" data-bs-toggle="modal" data-bs-target="#create_room_placement_wizard">
      Tempatkan Penghuni
    </button>
    <a href="/rooms/{{ $room->id }}/edit" class="btn btn-sm btn-warning col-sm-1">Ubah</a>
    <form action="/rooms/{{ $room->id }}" class="d-inline" method="post">
      @csrf
      @method('delete')
      <button class="btn btn-sm btn-danger col-sm-1 text-decoration-none" onclick="return confirm('Apakah Anda yakin ingin melanjutkan ?');">Hapus</button>
    </form>
  </div>
</div>

<h3 class="mt-3">Daftar penghuni</h3>
@if (session('success'))
  <div class="alert alert-success alert-dismissible fade show my-4 col-6" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif
<table class="mt-3 table table-striped table-hover">
  <thead>
    <tr>
      <th>No.</th>
      <th>Penghuni</th>
      <th>Tanggal Masuk</th>
      <th>Tanggal Keluar</th>
      <th>Aksi</th>
    </tr>
  </thead>

  <tbody>
    @foreach ($room->placements as $placement)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $placement->occupant->name }}</td>
        <td>
          @if (!empty($placement->check_in_date))  
            {{ date('d/m/Y', strtotime($placement->check_in_date)) }}
          @endif
        </td>
        <td>
          @if (!empty($placement->check_out_date))  
            {{ date('d/m/Y', strtotime($placement->check_out_date)) }}
          @endif
        </td>
        <td>
          <a href="/placements/{{ $placement->id }}" class="badge text-bg-primary text-decoration-none">Detail</a>
          <a href="/placements/{{ $placement->id }}/edit" class="badge text-bg-warning text-decoration-none">Ubah</a>
          <form action="/placements/{{ $placement->id }}" class="d-inline" method="post">
          @csrf
          @method('delete')
            <button class="badge text-bg-danger text-decoration-none border-0" onclick="return confirm('Apakah Anda yakin ingin melanjutkan ?');">Hapus</button>
          </form>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
@endsection