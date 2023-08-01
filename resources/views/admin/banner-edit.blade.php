@extends('admin.admin-index')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Баннер</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/admin">Эхлэл</a></li>
                <li class="breadcrumb-item"><a href="{{route('admin-banner-list')}}">Баннер жагсаалт</a></li>
                <li class="breadcrumb-item active">Баннер нэмэх</li>
                </ol>
            </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Баннер нэмэх</h3>                        
                        </div>
                        <form action="{{ $banner->id == null ? '/admin/banner/store' : '/admin/banner/update/' . $banner->id }} " method="POST" enctype="multipart/form-data">                        
                        {{ csrf_field() }}         
                        {{ method_field('PUT') }}
                            <div class="card-body">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Нэр</label>
                                        <input type="text" id="name" name="name" class="form-control" value="{{$banner->name}}" required>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="status">Төлөв</label>
                                        <select class="form-control custom-select" name="status" id="status">                                            
                                            <option value="1" @if($banner->status == 1) selected='selected' @endif>Нийтлэгдсэн</option>
                                            <option value="2" @if($banner->status == 2) selected='selected' @endif>Ноорог</option>                       
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="Order">Эрэмбэ</label>
                                        <input id="Order" name="order" class="form-control" type="number" value="{{$banner->order}}">
                                    </div> 
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Зураг</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="Image" name="Image">
                                                <label class="custom-file-label" for="Image">Зураг сонгох</label>
                                            </div>           
                                        </div>
                                        @if($banner->image != null)
                                        <div class="col-md-6" style="margin-top: 10px; margin-bottom: 10px;">
                                            <img class="img-fluid" src="{{ asset('storage/'.$banner->image) }}">
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                
                            </div>
                            <!-- /.card-body -->
                            
                            <div class="card-footer">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary">Хадгалах</button>
                                    <a href="{{route('admin-banner-list')}}" class="btn btn-secondary float-right">Цуцлах</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>            
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection