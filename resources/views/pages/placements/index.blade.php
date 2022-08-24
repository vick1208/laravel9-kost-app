@extends('layout')

@section('main')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Penempatan</h1>
</div>

{{-- <a href="/placements/create" class="btn btn-sm btn-primary">Buat Baru</a> --}}
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
        <td>{{ $placement->occupant ? $placement->occupant->name : '' }}</td>
        <td>{{ $placement->room->code }}</td>
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
          {{-- <a href="/placements/{{ $placement->id }}/edit" class="badge text-bg-warning text-decoration-none">Ubah</a> --}}
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