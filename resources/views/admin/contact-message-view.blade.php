@extends('admin.admin-index')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Хэрэглэгчийн мэдээлэл</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('admin-contact-message-list')}}">Жагсаалт</a></li>
                <li class="breadcrumb-item active">Хэрэглэгчийн мэдээлэл</li>
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
                            <h3 class="card-title">Хэрэглэгчийн мэдээлэл</h3>         
                            
                        </div>                        
                            <div class="card-body">
                                <div class="col-md-6">
                                
                                    <div class="form-group">
                                        <label for="title">Хэрэглэгчийн нэр</label>
                                        <p>{{$message->name}}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="Description">Хэрэглэгчийн имэйл</label>
                                        <p>{{$message->email}}</p>
                                    </div>                                    
                                    <div class="form-group">
                                        <label for="Description">Агуулга</label>
                                        <p>{{$message->subject}}</p>
                                    </div>   
                                    <div class="form-group">
                                        <label for="Description">Илгээсэн огноо</label>
                                        <p>{{$message->created_at}}</p>
                                    </div>   
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="content">Мэдээлэл</label>
                                    </div>
                                    <div >
                                        {!! $message->message !!}                              
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