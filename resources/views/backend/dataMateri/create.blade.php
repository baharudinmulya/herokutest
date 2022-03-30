@extends('partials.master')
@section('content')
<nav aria-label="breadcrumb" role="navigation">
    <ol class="breadcrumb adminx-page-breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="{{route('indexDataMateri')}}">Data Materi</a> </li>
      <li class="breadcrumb-item active" aria-current="page">Create Data Materi</li>
    </ol>
  </nav>

  <div class="pb-3">
    <h1>Create Data Materi</h1>
  </div>

  @include('common.alert')

  <div class="card mb-grid">
    <div class="card-header">
      <div class="card-header-title">Horizontal form</div>
    </div>
    <div class="card-body">
      <form method="POST" action="{{route('storeDataMateri')}}" enctype="multipart/form-data" >
        @csrf
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label form-label">Materi</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="nama_materi" placeholder="Nama Materi">
            </div>
          </div>
        
        <div class="form-group row">
          <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  @endsection