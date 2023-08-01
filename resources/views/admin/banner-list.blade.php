@extends('admin.admin-index')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">            
            <h1 class="m-0 text-dark">Баннер</h1>            
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/admin">Эхлэл</a></li>
                <li class="breadcrumb-item active">Баннер жагсаалт</li>
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
                      <h3 class="card-title">Баннер жагсаалт</h3>
                      <a class="btn btn-success float-right" href="{{route('admin-banner-create')}}"><i class="fas fa-plus"></i> Нэмэх</a>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">
                      <table class="table table-bordered">
                          <thead>
                          <tr>
                              <th style="width: 5%">№</th>
                              <th style="width: 25%">Нэр</th>                              
                              <th style="width: 15%">Төлөв</th>
                              <th style="width: 20%">Үйлдэл</th>
                          </tr>
                          </thead>
                          <tbody>
                          @foreach ($banners as $banner)
                          <tr>
                              <td>{{$loop->iteration}}</td>
                              <td><a href="{{route('admin-banner-view', [$banner->id])}}">{{ $banner->name }}</a></td>                              
                              @if($banner->status == "1")
                              <td>Нийтлэгдсэн</td>
                              @else
                              <td>Ноорог</td>
                              @endif
                              <td>
                                  <a href="{{ route('admin-banner-edit', $banner->id)}}" class="btn btn-info btn-sm">
                                  <i class="fas fa-pencil-alt"></i> Засах</a>                            
                                  <a onclick="return confirm('Та {{$banner->name}} баннерыг устгахдаа итгэлтэй байна уу?')" href="{{ route('admin-banner-delete', [$banner->id]) }}" class="btn btn-danger btn-sm">
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