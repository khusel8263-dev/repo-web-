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
                <li class="breadcrumb-item"><a href="{{route('admin-banner-list')}}">Жагсаалт</a></li>
                <li class="breadcrumb-item active">Баннер</li>
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
                            <h3 class="card-title">Баннер үзэх</h3>         
                            <a href="{{route('admin-banner-edit', [$banner->id])}}" class="btn btn-info btn-sm float-right">
                                <i class="fas fa-pencil-alt"></i> Засах
                            </a>
                        </div>                        
                            <div class="card-body">
                                <div class="col-md-6">
                                @if(session()->has('message'))
                                    <div class="alert alert-success">
                                        {{ session()->get('message') }}
                                    </div>
                                @endif
                                    <div class="form-group">
                                        <label for="name">Нэр</label>
                                        <p>{{$banner->name}}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="Order">Дараалал</label>
                                        <p>{{$banner->order}}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputStatus">Төлөв</label>   
                                        <div class="color-palette-set">                                  
                                        @if($banner->status == 1)                                
                                            <div class="bg-success color-palette"><span>Нийтлэгдсэн</span></div>                                                                                
                                        @else                                        
                                            <div class="bg-secondary color-palette"><p>Ноорог</p></div>                                                                                                                     
                                        @endif
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="exampleInputFile">Зураг</label>
                                        @if($banner->image != null)
                                        <img src="{{ asset('storage/'.$banner->image) }}" width="100%">
                                        @endif
                                    </div>
                                </div>
                                
                            </div>
                            <!-- /.card-body -->                        
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