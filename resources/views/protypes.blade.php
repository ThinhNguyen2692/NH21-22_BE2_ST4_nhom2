@extends('layoutAdmin')
@section('adminContent')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Protype</h1>
            <br>
            <a class="btn btn-info btn-sm" href="{{url('indexAdmin/addprotype')}}">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Add
                          </a>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Protype</li>
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
          <h3 class="card-title">Protype</h3>

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
                      <th style="width: 2%">
                          ID
                      </th>
                      <th style="width: 80%">
                         Name
                      </th>
                      <th style="width: 20%" class="text-center">
                         Action
                      </th>
                  </tr>
              </thead>
              <tbody>
           
              @foreach($getProtypes as $row)
                  <tr>
                 
                      <td>
                         {{$row->id}}
                      </td>
                      <td>
                      {{$row->type_name}}
                      </td>
                      
                      <td class="project-actions text-center" >
                      <a class="btn btn-info btn-sm" href="{{url('indexAdmin/protypes/editprotype/'. $row->id . '')}}">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </a>
                          <a class="btn btn-danger btn-sm" href="{{url('indexAdmin/protypes/'. $row->id . '')}}">
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