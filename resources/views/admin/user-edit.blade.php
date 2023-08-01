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
            <li class="breadcrumb-item active">Хэрэглэгчийн мэдээлэл</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container">
        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <!-- left column -->
              <div class="col-md-6">
                <!-- general form elements -->
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Хэрэглэгчийн мэдээлэл</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form role="form" method="POST" action="{{ route('admin-users-update', [$user->id]) }}">
                  {{ csrf_field() }}
                  {{ method_field('PUT') }}
                    <div class="card-body">
                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="userName">Нэр</label>
                        <input type="text" class="form-control" id="userName" name="name" placeholder="Нэр" value="{{$user->name}}" required>
                      </div>
                      <div class="form-group">
                        <label for="userEmail">Имэйл</label>
                        <input type="email" class="form-control" id="userEmail" name="email" placeholder="Имэйл хаяг" value="{{$user->email}}">
                      </div>
                      <div class="form-group">
                        <label for="userPassword">Нууц үг</label>
                        <input type="password" class="form-control" id="userPassword" name="password" placeholder="Нууц үг" value="{{$user->password}}">
                      </div>
                      
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Хадгалах</button>
                      <a href="{{route('admin-users-list')}}" class="btn btn-secondary float-right">Цуцлах</a>
                    </div>
                  </form>
                </div>
                <!-- /.card -->           
                

              </div>
              <!--/.col (left) -->
              
            </div>
            <!-- /.row -->
          </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
  </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection