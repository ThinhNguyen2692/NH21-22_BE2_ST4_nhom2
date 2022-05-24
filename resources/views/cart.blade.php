@extends('layoutAdmin')
@section('adminContent')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Cart</h1>
            <br>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Cart</li>
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
          <h3 class="card-title">Cart</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th class="text-center">
                          ID
                      </th>
                      <th class="text-center">
                        Product name
                      </th>
                      <th  class="text-center">
                        User name
                      </th>
                      <th  class="text-center">
                         Quantity
                      </th>
                      <th  class="text-center">
                         Total
                      </th>
                      <th style="width: 20%" class="text-center">
                         Action
                      </th>
                  </tr>
              </thead>
              <tbody>
              @foreach($getCart as $row)
                  <tr>
                 
                      <td class="text-center">
                      {{$row->id_cart}}
                      </td>
                      <td class="text-center">
                      {{$row->name}}
                      </td>
                      <td class="text-center">
                      {{$row->user_name}}
                      </td>
                      <td class="text-center">
                      {{$row->quantity_cart}}
                      </td>
                      <td class="text-center">
                      {{$row->total_cart}}
                      </td>
                      <td class="project-actions text-center" >
                          <a class="btn btn-danger btn-sm" href="{{url('indexAdmin/deleteCartAdmin/'. $row->id_cart. '')}}">
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