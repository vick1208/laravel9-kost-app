@extends('layout')

@section('main')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Penempatan</h1>
</div>

<a href="/placements/create" class="btn btn-sm btn-primary">Buat Baru</a>
<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th>No.</th>
      <th>Penghuni</th>
      <th>Kamar</th>
      <th>Tanggal Masuk</th>
      <th>Tanggal Keluar</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($placements as $placement)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $placement->occupant->name }}</td>
        <td>{{ $placement->room->code }}</td>
        <td>{{ $placement->check_in_date }}</td>
        <td>{{ $placement->check_out_date }}</td>
        <td>
          <a href="#" class="badge text-bg-primary text-decoration-none">Detail</a>
          <a href="#" class="badge text-bg-warning text-decoration-none">Ubah</a>
          <a href="#" class="badge text-bg-danger text-decoration-none">Hapus</a>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
@endsection