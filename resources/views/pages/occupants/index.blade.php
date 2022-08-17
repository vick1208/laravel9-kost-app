@extends('layout')

@section('main')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Penghuni</h1>
</div>

<a href="/occupants/create" class="btn btn-sm btn-primary">Buat Baru</a>
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
        <td>{{ ucfirst($occupant->gender) }}</td>
        <td>{{ $occupant->phone_number }}</td>
        <td>
          <a href="/occupants/{{ $occupant->id }}" class="badge text-bg-primary text-decoration-none">Detail</a>
          <a href="/occupants/{{ $occupant->id }}/edit" class="badge text-bg-warning text-decoration-none">Ubah</a>
          <form action="/occupants/{{ $occupant->id }}" class="d-inline" method="post">
            @csrf
            @method('delete')
              <button href="/occupants/{{ $occupant->id }}" class="badge text-bg-danger text-decoration-none border-0" onclick="return confirm('Apakah Anda yakin ingin melanjutkan ?');">Hapus</button>
            </form>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
@endsection