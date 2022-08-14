@extends('layout')

@section('main')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Penghuni</h1>
</div>

<a href="/occupants/form" class="btn btn-sm btn-primary">Buat Baru</a>
<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th>No.</th>
      <th>Nama</th>
      <th>Jenis Kelamin</th>
      <th>Nomor Handphone</th>
      <th>Aksi</th>
    </tr>
  </thead>

  <tbody>
    @foreach ($occupants as $occupant)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $occupant->name }}</td>
        <td>{{ $occupant->gender }}</td>
        <td>{{ $occupant->phone_number }}</td>
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