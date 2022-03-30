@extends('partials.master')
@section('content')
<nav aria-label="breadcrumb" role="navigation">
    <ol class="breadcrumb adminx-page-breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="{{route('indexDataAss')}}">Asisten</a> </li>
      <li class="breadcrumb-item active" aria-current="page">Edit Data Asisten</li>
    </ol>
  </nav>

  <div class="pb-3">
    <h1>Edit Data Asisten</h1>
  </div>


  @include('common.alert')

  <div class="card mb-grid">
    <div class="card-header">
      <div class="card-header-title">Horizontal form</div>
    </div>
    <div class="card-body">
      <form method="POST" action="{{route('updateDataAss', ["id" => $edit->id ])}}" enctype="multipart/form-data" >
        @csrf
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label form-label">Nama</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="name" placeholder="Nama" value="{{$edit->name}}">
            </div>
          </div>
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label form-label">Email</label>
          <div class="col-sm-10">
            <input type="email" class="form-control" name="email" value="{{$edit->email}}" placeholder="Email">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputPassword3" class="col-sm-2 col-form-label form-label">Password</label>
          <div class="col-sm-10">
            <input type="password" class="form-control" name="password" placeholder="Password">
          </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label form-label">Konfirmasi Password</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" name="password2" placeholder="Password">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label form-label">Join Date</label>
            <div class="col-sm-10">
              <input type="date" class="form-control" name="join_date" value="{{$edit->join_date}}">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label form-label">Role</label>
            <div class="col-sm-10">
              <select class="form-control" name="role">
                <option selected value="{{$edit->role}}">{{$edit->role}}</option>
                  <option value="Asisten">Asisten</option>
                  <option value="PJ">PJ</option>
                  <option value="Staff">Staff</option>
                  <option value="Admin">Admin</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label form-label">Upload Foto</label>
            <div class="col-sm-10">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="photo"/>
                    <label  class="custom-file-label">{{$edit->photo}}</label>
                  </div>

                  <a href="{{asset('avatar_asisten/'.$edit->photo)}}">{{$edit->photo}}</a>
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