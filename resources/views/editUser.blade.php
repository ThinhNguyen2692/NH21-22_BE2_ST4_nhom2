@extends('layoutAdmin')
@section('adminContent')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>User Edit</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Edit</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <form action="{{ url('indexAdmin/udateUser')}}" method="post" enctype="multipart/form-data" >
      @csrf
      <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">General</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>          
              </div>
              @foreach($getUser as $value)
              <div class="form-group">
                <label for="inputName">User id</label>
                <input type="text" type_id="inputName"  class="form-control" value="{{$value->id}}" name="id" readonly>
              </div>
              <div class="form-group">
                <label for="inputName">User name</label>
                <input type="text" type_id="inputName" class="form-control" value="{{$value->user_name}}" name="name">
              </div>
              <div class="form-group">
                <label for="inputName">Email</label>
                <input type="email" type_id="inputName" class="form-control" value="{{$value->email}}" name="email">
              </div>
              <div class="form-group">
                <label for="inputName">Password</label>
                <input type="text" type_id="inputName" class="form-control" value="" name="pass">
                <div class="form-group">
                  <label for="inputStatus">Role</label>
                  <select id="inputStatus" class="form-control custom-select" name="role">
                  <option>{{$value->role_id}}</option>  
                  <option>0</option>
                    <option>1</option>
                  </select>
                </div>
              </div>
      @endforeach
          <!-- /.card -->
      <div class="row">
        <div class="col-12">
          <input name="submit" type="submit" value="Edit" class="btn btn-success float-right">
        </div>
      </div>
      </form>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection