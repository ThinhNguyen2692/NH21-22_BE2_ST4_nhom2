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
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 1%">
                          ID
                      </th>
                      <th style="width: 10%">
                         Name
                      </th>
                      <th style="width: 20%">
                          Image
                      </th>
                      <th>
                          Price
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
                      <th>
                          
                      </th>
                      <th style="width: 8%" class="text-center">
                          manufatures
                      </th>
                      <th style="width: 20%"  class="text-center">
                        Protype
                      </th>
                      <th style="width: 20%" class="text-center">
                       Action
                      </th>
                  </tr>
              </thead>
              <tbody>
                 
                
                  <tr>
                      <td>
                          <?php echo 'id'; ?>
                      </td>
                      <td>
                      <?php echo 'name' ?>
                      </td>
                      <td>
                        
                        <img style="width:50px" src="'image" alt="">
                      <td>
                      <?php echo 'price'?>
                      </td>
                      <td class="project_progress">
                      <?php echo 'manu_name' ?>
                      </td>
                      <td class="project-state">
                      <?php echo 'type_name'?>
                      </td>
                      <td class="project-actions text-center" >
                          <a class="btn btn-info btn-sm" href="editproduct.php?id=">
                              <i class="fas fa-pencil-alt"></i>
                              Edit
                          </a>
                          <a class="btn btn-danger btn-sm" href="del.php?id=">
                              <i class="fas fa-trash">
                              </i>
                              Delete
                          </a>
                      </td>
                  </tr>
                
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