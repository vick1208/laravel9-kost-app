@extends('layout')

@section('main')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Dashboard</h1>
</div>

<div class="row">
  <div class="card text-bg-primary mx-3 col">
    <div class="card-header">Jumlah kamar</div>
    <div class="card-body">
      <h5 class="card-title">18 kamar</h5>
    </div>
  </div>
  
  <div class="card text-bg-primary mx-3 col">
    <div class="card-header">Jumlah penghuni</div>
    <div class="card-body">
      <h5 class="card-title">15 orang</h5>
    </div>
  </div>
  
  <div class="card text-bg-success mx-3 col">
    <div class="card-header">Kamar yang terisi</div>
    <div class="card-body">
      <h5 class="card-title">16 kamar</h5>
    </div>
  </div>
  
  <div class="card text-bg-danger mx-3 col">
    <div class="card-header">Kamar yang masih kosong</div>
    <div class="card-body">
      <h5 class="card-title">2 kamar</h5>
    </div>
  </div>
</div>
@endsection