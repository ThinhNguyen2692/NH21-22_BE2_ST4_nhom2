@extends('layoutAdmin')
@section('adminContent')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Products</h1>
            <br>
            <a class="btn btn-info btn-sm" href="{{url('indexAdmin/addproduct')}}">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Add
                          </a>
                          <br>
                          <form action="{{ url('shop-product-list')}}" method="get">
              @csrf
                <div class="input-group">
                  <input name="keyword" type="text" placeholder="Search" class="form-control">
                  <span class="input-group-btn">
                    <button class="btn btn-primary" type="submit">Search</button>
                  </span>
                </div>
              </form>
          </div>
         
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Products</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Products</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
           
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th >
                          ID
                      </th>
                      <th>
                      Quantity
                      </th>
                      <th >
                         Name
                      </th>
                      <th >
                          Image
                      </th>
                      <th>
                          Price
                      </th>
                      <th>
                          Price(%)
                      </th>
                      <th>
                          CPU
                      </th>
                      <th>
                          Ram
                      </th>
                      <th>
                          HDH
                      </th>
                      <th>
                      Capacity
                      </th>
                      <th class="text-center">
                          manufatures
                      </th>
                      <th  class="text-center">
                        Protype
                      </th>
                      <th class="text-center">
                          Origin
                      </th>
                      <th class="text-center">
                       Action
                      </th>
                  </tr>
              </thead>
              <tbody>
                 
                @foreach($getProducts as $row)
                  <tr>
                      <td>
                          {{$row->id}}
                      </td>
                      <td>
                      {{$row->quantity}}
                      </td>
                      <td>
                      {{$row->name}}
                      </td>
                      <td>
                        
                        <img style="width:50px" src="{{ asset('assets/pages/img/products/'. $row->image . '') }}" alt="">
                      </td>
                     
                      <td>
                      {{number_format($row->price)}}
                      </td>
                      <td>
                      {{$row->sale_price}}
                      </td>
                      <td>
                      {{$row->chip}}
                      </td>
                      <td>
                      {{$row->Ram}}
                      </td>
                      <td>
                      {{$row->HDH}}
                      </td>
                      <td>
                      {{$row->Capacity}}
                      </td>
                      <td class="text-center">
                      {{$row->manu_name}}
                      </td>
                      <td class="text-center">
                      {{$row->type_name}}
                      </td>
                      <td class="text-center">
                      {{$row->origin}}
                      </td>
                      <td class="text-center">
                          <a class="btn btn-info btn-sm" href="{{url('indexAdmin/products/editproduct/'. $row->id . '')}}">
                              <i class="fas fa-pencil-alt"></i>
                              Edit
                          </a>
                          <a class="btn btn-danger btn-sm" href="{{url('indexAdmin/products/'. $row->id . '')}}">
                              <i class="fas fa-trash">
                              </i>
                              Delete
                          </a>
                      </td>
                     
                  </tr>
                  @endforeach
              </tbody>
          </table>
      
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
     
    </section>
    <!-- /.content -->

  </div>
  <!-- /.content-wrapper -->
  @endsection