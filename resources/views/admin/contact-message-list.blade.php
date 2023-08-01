@extends('admin.admin-index')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">            
            <h1 class="m-0 text-dark">Хэрэглэгчийн илгээсэн мэдээлэл</h1>            
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin">Эхлэл</a></li>
              <li class="breadcrumb-item active">Хэрэглэгчийн илгээсэн мэдээллийн жагсаалт</li>
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
              <div class="col-md-10">
                  <div class="card">
                      <div class="card-header">
                      <h3 class="card-title">Мэдээллийн жагсаалт</h3>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th style="width: 5%">№</th>
                                    <th style="width: 20%">Хэрэглэгчийн нэр</th>
                                    <th>Хэрэглэгчийн имэйл</th>
                                    <th style="width: 15%">Агуулга</th>
                                    <th>Мэдээлэл</th>
                                    <th style="width: 5%">Үйлдэл</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($messages as $message)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{ $message->name }}</td>
                                    <td>{{ $message->email }}</td>
                                    <td>{{ $message->subject }}</td>
                                    <td>{{ str_limit($message->message, 20) }}</td>
                                    <td>
                                        <a href="{{ route('admin-contact-message-view', $message->id) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-pencil-alt"></i> Харах</a>                                  
                                    </td>
                                </tr>
                                @endforeach                    
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->    
                        <div class="card-footer">                        
                            {{$messages->links("pagination::bootstrap-4")}}                        
                        </div>          
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