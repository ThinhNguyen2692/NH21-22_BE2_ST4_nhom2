@extends('layoutAdmin')
@section('adminContent')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Manufactures Add</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Manufactures Add</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->

  </section>

  <!-- Main content -->
  <section class="content">

    <form action="{{ url('indexAdmin/addManu')}}" method="post" enctype="multipart/form-data">
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
        <div class="card-body">
          <div class="form-group">
            <label for="inputName">Manufacture name</label>
            <input type="text" id="inputName" class="form-control" name="name">
          </div>
          <div class="form-group">
            <label for="inputProjectLeader">Image</label>
            <input type="file" id="inputProjectLeader" class="form-control" name="image">
          </div>
        </div>

      </div>
      <!-- /.card-body -->
      <div class="row">
  <div class="col-12">
    <input name="submit" type="submit" value="Create new Porject" class="btn btn-success float-right">
  </div>
</div>
</div>
<!-- /.card -->

</form>
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection ?>