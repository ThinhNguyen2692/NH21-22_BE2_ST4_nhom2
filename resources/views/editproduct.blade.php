@extends('layoutAdmin')
@section('adminContent')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Products Add</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Products Add</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
  @foreach ($getItem as $row)
    <form action="{{ url('indexAdmin/editproduct/'. $row->id . '')}}" method="post" enctype="multipart/form-data">
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
      <label for="inputName">Product ID</label>
      <input type="text" id="inputName" class="form-control" value=" {{$row->id}}" name="id">
    </div>
        <div class="card-body">
          <div class="form-group">
            <label for="inputName">Product Name</label>
            <input type="text" id="inputName" class="form-control" value=" {{$row->name}}" name="name">
          </div>
          <div class="form-group">
            <label for="inputStatus">Manufacture</label>
            <select class="form-control custom-select" name="manu">
            <option value="{{$row->type_id}}">{{$row->type_name}} </option>
              @foreach($getProtypes as $row2)

              <option value="{{$row2->id}}">{{$row2->type_name}} </option>

              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="inputStatus">Protype</label>
            <select class="form-control custom-select" name="type">
            <option value="{{$row->manu_id}}">{{$row->manu_name}} </option>
              @foreach($getManufactures as $row1)

              <option value="{{$row1->id}}"> {{$row1->manu_name}} </option>

              @endforeach

            </select>
          </div>
          <div class="form-group">
            <label for="inputDescription">Description</label>
            <textarea id="inputDescription" class="form-control" rows="4" name="desc">{{$row->description}}</textarea>
          </div>

          <div class="form-group">
            <label for="inputProjectLeader">Price</label>
            <input type="text" id="inputProjectLeader" class="form-control" value=" {{$row->price}}" name="price">
          </div>
          <div class="form-group">
    <label for="inputProjectLeader">Sale Price</label>
    <input type="text" id="inputProjectLeader" class="form-control" value=" {{$row->sale_price}}" name="saleprice"
  </div>
  
          <div class="form-group">
            <label for="inputProjectLeader">Chip</label>
            <input type="text" id="inputProjectLeader" class="form-control" value=" {{$row->chip}}" name="Chip">
          </div>
          <div class="form-group">
          <label class="control-label">Ram:</label>
          <select name="Ram" class="form-control input-sm combobox">
                <option value=" {{$row->Ram}}"> {{$row->Ram}}</option>
                <option value="3 GB">3 GB</option>
                <option value="4 GB">4 GB</option>
                <option value="6 GB">6 GB</option>
                <option value="8 GB">8 GB</option>
                <option value="16 GB">16 GB</option>
                <option value="32 GB">32 GB</option>
              </select>
          </div>
          <div class="form-group">
              <label  class="control-label">Capacity:</label>
              <select name="Capacity" class="form-control input-sm combobox">
              <option value=" {{$row->Capacity}}"> {{$row->Capacity}}</option>
                <option value="8 GB">8 GB</option>
                <option value="16 GB">16 GB</option>
                <option value="32 GB">32 GB</option>
                <option value="64 GB">64 GB</option>
                <option value="128 GB">128 GB</option>
                <option value="256 GB">256 GB</option>
                <option value="512 GB">512 GB</option>

              </select>
            </div>
          <div class="form-group">
            <label for="inputProjectLeader">Quantity</label>
            <input type="text" id="inputProjectLeader" class="form-control" value=" {{$row->quantity}}" name="quantity">
          </div>
          <div class="form-group">
            <label for="inputProjectLeader">Operating system</label>
            <input type="text" id="inputProjectLeader" class="form-control" value=" {{$row->HDH}}" name="HDH">
          </div>
          <div class="form-group">
            <label for="inputProjectLeader">Origin</label>
            <input type="text" id="inputProjectLeader" class="form-control" value=" {{$row->origin}}" name="origin">
          </div>
          <div class="form-group">
            <label for="inputProjectLeader">status</label>
            <input type="text" id="inputProjectLeader" class="form-control" value=" {{$row->status}}" name="status">
          </div>
          <div class="form-group">
            <label for="inputProjectLeader">Image</label>
            <input type="file" id="inputProjectLeader" class="form-control" name="image">
          </div>
          <div class="form-group">
              <img style="width:200px" src="{{ asset('assets/pages/img/products/'. $row->image . '') }}" alt="">
              </div>
        </div>
        <div class="form-group">
          <label for="inputStatus">Feature</label>
          <select id="inputStatus" class="form-control custom-select" value=" {{$row->feature}}" name="feature">
            <option>0</option>
            <option>1</option>
          </select>
        </div>
        @endforeach
        <!-- /.card-body -->
      </div>

      <!-- /.card -->



      <div class="row">
        <div class="col-12">
          <input name="submit" type="submit" value="Create new Porject" class="btn btn-success float-right">
        </div>
      </div>
    </form>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection