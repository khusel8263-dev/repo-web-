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
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-text-width"></i>
                        Холбоо барих
                    </h3>
                    <a href="/admin/contact/edit/{{$data->id}}" class="btn btn-info btn-sm float-right">
                                <i class="fas fa-pencil-alt"></i> Засах</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <dl>
                            <dt>Утасны дугаар</dt>
                            <dd>{{$data->phone_number}}</dd>
                            <dt>Факсын дугаар</dt>
                            <dd>{{$data->fax_number}}</dd>
                            <dt>Имэйл хаяг</dt>
                            <dd>{{$data->email}}</dd>
                            <dt>Вэб сайт</dt>
                            <dd>{{$data->website}}</dd>
                        </dl>
                        
                        <div class="callout callout-danger">
                            <h5>Хаяг</h5>

                            <p>{{$data->address}}</p>
                        </div>

                        <!-- <div class="callout callout-warning">
                            <h5>Хаяг/Англи/</h5>

                            <p>{{$data->address_en}}</p>
                        </div>                     -->
                    </div>
                    <!-- /.card-body -->
                    
                </div>
            <!-- /.card -->

            
            </div>
            <!-- ./col -->        
        </div>
        <!-- /.row -->
        <!-- END TYPOGRAPHY -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

</div>
<!-- /.content-wrapper -->
@endsection