@extends('admin.admin-index')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">            
            <h1 class="m-0 text-dark">Холбоо барих</h1>            
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/admin">Эхлэл</a></li>
                <li class="breadcrumb-item active">Холбоо барих</li>
            </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Холбоо барих мэдээлэл</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="POST" action="{{ route('admin-contact-update', [$data->id]) }}">
              {{ csrf_field() }}
              {{ method_field('PUT') }}
                <div class="card-body">
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
                    <div class="form-group">
                        <label for="phoneNum">Утасны дугаар</label>
                        <input type="text" class="form-control" id="phoneNum" name="phone" placeholder="Утасны дугаар" value="{{$data->phone_number}}" required>
                    </div>
                    <div class="form-group">
                        <label for="faxNum">Факсын дугаар</label>
                        <input type="text" class="form-control" id="faxNum" name="fax" placeholder="Факс" value="{{$data->fax_number}}">
                    </div>
                    <div class="form-group">
                        <label for="userEmail">Имэйл</label>
                        <input type="email" class="form-control" id="userEmail" name="email" placeholder="Имэйл хаяг" value="{{$data->email}}" required>
                    </div>
                    <div class="form-group">
                        <label for="webSite">Вэб сайт</label>
                        <input type="text" class="form-control" id="webSite" name="web" placeholder="Вэб" value="{{$data->website}}">
                    </div>
                    <div class="form-group">
                        <label>Хаяг</label>
                        <textarea class="form-control" name="address" rows="3" placeholder="Хаяг ..." >{{$data->address}}</textarea>
                    </div>
                    <!-- <div class="form-group">
                        <label>Хаяг/Англи/</label>
                        <textarea class="form-control" name="address_en" rows="3" placeholder="Address ...">{{$data->address_en}}</textarea>
                    </div> -->
                </div>
                <!-- /.card-body -->               

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Хадгалах</button>
                  <a href="{{route('admin-contact-view')}}" class="btn btn-secondary float-right">Цуцлах</a>                  
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
@endsection