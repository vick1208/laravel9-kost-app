@extends('layout')

@section('main')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Dashboard</h1>
</div>

<div class="row">
  <div class="card text-bg-primary mx-3 col">
    <div class="card-header">Jumlah kamar</div>
    <div class="card-body">
      <h5 class="card-title">{{ $num_of_rooms }} kamar</h5>
    </div>
  </div>
  
  <div class="card text-bg-primary mx-3 col">
    <div class="card-header">Jumlah penghuni</div>
    <div class="card-body">
      <h5 class="card-title">{{ $num_of_occupants }} orang</h5>
    </div>
  </div>
  
  <div class="card text-bg-success mx-3 col">
    <div class="card-header">Kamar yang terisi</div>
    <div class="card-body">
      <h5 class="card-title">{{ $num_of_rooms_unavailable }} kamar</h5>
    </div>
  </div>
  
  <div class="card text-bg-danger mx-3 col">
    <div class="card-header">Kamar yang masih kosong</div>
    <div class="card-body">
      <h5 class="card-title">{{ $num_of_rooms - $num_of_rooms_unavailable }} kamar</h5>
    </div>
  </div>
</div>

<h3 class="mt-5">Penempatan Terbaru</h3>
<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th>No.</th>
      <th>Penghuni</th>
      <th>Kamar</th>
      <th>Tanggal Masuk</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($latest_placements as $placement)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $placement->occupant ? $placement->occupant->name : '' }}</td>
        <td>{{ $placement->room->code }}</td>
        <td>
          @if(!empty($placement->check_in_date))
            {{ date('d/m/Y', strtotime($placement->check_in_date)) }}
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