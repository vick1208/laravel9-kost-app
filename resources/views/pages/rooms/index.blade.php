@extends('layout')

@section('main')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Kamar</h1>
</div>

<a href="/rooms/create" class="btn btn-sm btn-primary">Buat Baru</a>
@if (session('success'))
  <div class="alert alert-success alert-dismissible fade show my-4 col-6" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif
<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th>No.</th>
      <th>Kode Kamar</th>
      <th>Lokasi</th>
      <th>Kapasitas</th>
      <th>Aksi</th>
    </tr>
  </thead>

  <tbody>
    @foreach ($rooms as $room)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $room->code }}</td>
        <td>{{ $room->location ? $room->location->name : '' }}</td>
        <td>{{ $room->capacity }}</td>
        <td>
          <a href="/rooms/{{ $room->id }}" class="badge text-bg-primary text-decoration-none">Detail</a>
          <a href="/rooms/{{ $room->id }}/edit" class="badge text-bg-warning text-decoration-none">Ubah</a>
          <form action="/rooms/{{ $room->id }}" class="d-inline" method="post">
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