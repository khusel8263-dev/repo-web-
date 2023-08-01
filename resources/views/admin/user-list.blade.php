@extends('admin.admin-index')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">            
            <h1 class="m-0 text-dark">Хэрэглэгч</h1>            
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin">Эхлэл</a></li>
              <li class="breadcrumb-item active">Хэрэглэгчийн жагсаалт</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <!-- Your Page Content Here -->
      <div class="container">
          <div class="row">
              <div class="col-md-8">
                  <div class="card">
                      <div class="card-header">
                      <h3 class="card-title">Хэрэглэгчийн жагсаалт</h3>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">
                      <table class="table table-bordered">
                          <thead>
                          <tr>
                              <th style="width: 5%">№</th>
                              <th style="width: 20%">Нэр</th>
                              <th>Имэйл</th>
                              <th style="width: 25%">Үйлдэл</th>
                          </tr>
                          </thead>
                          <tbody>
                          @foreach ($users as $user)
                          <tr>
                              <td>{{$loop->iteration}}</td>
                              <td>{{ $user->name }}</td>
                              <td>{{ $user->email }}</td>
                              <td>
                                  <a href="/admin/users/edit/{{$user->id}}" class="btn btn-info btn-sm">
                                  <i class="fas fa-pencil-alt"></i> Засах</a>                            
                                  <a onclick="return confirm('Та {{$user->name}} нэртэй хэрэглэгчийг устгахдаа итгэлтэй байна уу?')" href="{{ route('admin-users-delete', [$user->id]) }}" class="btn btn-danger btn-sm">
                                  <i class="fas fa-trash"></i> Устгах</a>
                              </td>
                          </tr>
                          @endforeach                    
                          </tbody>
                      </table>
                      </div>
                      <!-- /.card-body -->                
                  </div>
                  <!-- /.card -->    
              </div>
              <!-- /.col -->    
          </div>
          <!-- /.row -->
      </div>
    
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection