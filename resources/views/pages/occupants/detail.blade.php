@extends('layout')

@section('main')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Detail Penghuni</h1>
</div>


<div class="row">
  <label for="name" class="col-sm-2 col-form-label">Name</label>
  <div class="col-sm-3">
    <input class="form-control-plaintext form-control-sm" value="{{ $occupant->name }}">
  </div>
</div>
<div class="row">
  <label for="gender" class="col-sm-2 col-form-label">Jenis Kelamin</label>
  <div class="col-sm-3">
    <div class="col-sm-3">
      <input class="form-control-plaintext form-control-sm" type="text" value="{{ ucfirst($occupant->gender) }}">
    </div>
  </div>
</div>
<div class="row">
  <label for="birth_place" class="col-sm-2 col-form-label">Tempat Lahir</label>
  <div class="col-sm-3">
    <input class="form-control-plaintext form-control-sm" type="text" value="{{ $occupant->birth_place }}">
  </div>
</div>
<div class="row">
  <label for="birth_date" class="col-sm-2 col-form-label">Tanggal Lahir</label>
  <div class="col-sm-3">
    @if(!empty($occupant->birth_date))
      <input class="form-control-plaintext form-control-sm" type="text" value="{{ date('d/m/Y', strtotime($occupant->birth_date)) }}">
    @endif
  </div>
</div>
<div class="row">
  <label for="origin_place" class="col-sm-2 col-form-label">Daerah Asal</label>
  <div class="col-sm-3">
    <input class="form-control-plaintext form-control-sm" type="text" value="{{ $occupant->origin_place }}">
  </div>
</div>
<div class="row">
  <label for="education" class="col-sm-2 col-form-label">Pendidikan</label>
  <div class="col-sm-3">
    <input class="form-control-plaintext form-control-sm" type="text" value="{{ $occupant->education }}">
  </div>
</div>
<div class="row">
  <label for="occupation" class="col-sm-2 col-form-label">Pekerjaan</label>
  <div class="col-sm-3">
    <input class="form-control-plaintext form-control-sm" type="text" value="{{ $occupant->occupation }}">
  </div>
</div>
<div class="row">
  <label for="phone_number" class="col-sm-2 col-form-label">Nomor Handphone</label>
  <div class="col-sm-3">
    <input class="form-control-plaintext form-control-sm" type="text" value="{{ $occupant->phone_number }}">
  </div>
</div>
<div class="mb-3 row gap-2">
  <div class="col-form-label">
    <a href="/occupants/{{ $occupant->id }}/edit" class="btn btn-sm btn-warning col-sm-1">Ubah</a>
    <form action="/occupants/{{ $occupant->id }}" class="d-inline" method="post">
      @csrf
      @method('delete')
      <button class="btn btn-sm btn-danger col-sm-1 text-decoration-none" onclick="return confirm('Apakah Anda yakin ingin melanjutkan ?');">Hapus</button>
    </form>
  </div>
</div>
@endsection