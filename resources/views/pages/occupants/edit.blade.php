@extends('layout')

@section('main')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Ubah Penghuni</h1>
</div>

<form action="/occupants/{{ $occupant->id }}" method="POST">
  @csrf
  @method('put')
  <div class="mb-3 row">
    <label for="name" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-3">
      <input class="form-control form-control-sm" type="text" id="name" name="name" value="{{ old('name', $occupant->name) }}">
      @error('name')  
        <div class="form-text text-danger">{{ $message }}</div>
      @enderror
    </div>
  </div>
  <div class="mb-3 row">
    <label for="gender" class="col-sm-2 col-form-label">Jenis Kelamin</label>
    <div class="col-sm-3">
      <select class="form-select form-select-sm" name="gender">
        <option value="" @selected(!old('gender',$occupant->gender))>Pilih jenis kelamin</option>
        <option value="male" @selected(old('gender',$occupant->gender) == 'male')>Pria</option>
        <option value="female" @selected(old('gender',$occupant->gender) == 'female')>Wanita</option>
      </select>
      @error('gender')  
        <div class="form-text text-danger">{{ $message }}</div>
      @enderror
    </div>
  </div>
  <div class="mb-3 row">
    <label for="birth_place" class="col-sm-2 col-form-label">Tempat Lahir</label>
    <div class="col-sm-3">
      <input class="form-control form-control-sm" type="text" id="birth_place" name="birth_place" value="{{ old('birth_place', $occupant->birth_place) }}">
      @error('birth_place')  
        <div class="form-text text-danger">{{ $message }}</div>
      @enderror
    </div>
  </div>
  <div class="mb-3 row">
    <label for="birth_date" class="col-sm-2 col-form-label">Tanggal Lahir</label>
    <div class="col-sm-3">
      <input class="form-control form-control-sm" type="date" id="birth_date" name="birth_date" value="{{ old('birth_date', $occupant->birth_date) }}">
      @error('birth_date')  
        <div class="form-text text-danger">{{ $message }}</div>
      @enderror
    </div>
  </div>
  <div class="mb-3 row">
    <label for="origin_place" class="col-sm-2 col-form-label">Daerah Asal</label>
    <div class="col-sm-3">
      <input class="form-control form-control-sm" type="text" id="origin_place" name="origin_place" value="{{ old('origin_place', $occupant->origin_place) }}">
      @error('origin_place')  
        <div class="form-text text-danger">{{ $message }}</div>
      @enderror
    </div>
  </div>
  <div class="mb-3 row">
    <label for="education" class="col-sm-2 col-form-label">Pendidikan</label>
    <div class="col-sm-3">
      <input class="form-control form-control-sm" type="text" id="education" name="education" value="{{ old('education', $occupant->education) }}">
      @error('education')  
        <div class="form-text text-danger">{{ $message }}</div>
      @enderror
    </div>
  </div>
  <div class="mb-3 row">
    <label for="occupation" class="col-sm-2 col-form-label">Pekerjaan</label>
    <div class="col-sm-3">
      <input class="form-control form-control-sm" type="text" id="occupation" name="occupation" value="{{ old('occupation', $occupant->occupation) }}">
      @error('occupation')  
        <div class="form-text text-danger">{{ $message }}</div>
      @enderror
    </div>
  </div>
  <div class="mb-3 row">
    <label for="phone_number" class="col-sm-2 col-form-label">Nomor Handphone</label>
    <div class="col-sm-3">
      <input class="form-control form-control-sm" type="text" id="phone_number" name="phone_number" value="{{ old('phone_number', $occupant->phone_number) }}">
      @error('phone_number')  
        <div class="form-text text-danger">{{ $message }}</div>
      @enderror
    </div>
  </div>
  <div class="mb-3 row gap-2">
    <div class="col-form-label">
      <button class="btn btn-sm btn-primary col-sm-1" type="submit">Simpan</button>
      <a href="/occupants" class="btn btn-sm btn-danger col-sm-1">Batal</a>
    </div>
  </div>
</form>
@endsection