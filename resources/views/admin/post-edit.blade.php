@extends('admin.admin-index')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Мэдээ</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Эхлэл</a></li>
                <li class="breadcrumb-item active">Мэдээ нэмэх</li>
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
                            <h3 class="card-title">Мэдээ нэмэх</h3>                        
                        </div>
                        <form action="{{ $post->id == null ? '/admin/post/store' : '/admin/post/update/' . $post->id }} " method="POST" enctype="multipart/form-data">                        
                        {{ csrf_field() }}         
                        {{ method_field('PUT') }}
                            <div class="card-body">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title">Гарчиг</label>
                                        <input type="text" id="title" name="title" class="form-control" value="{{$post->title}}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="Description">Мэдээний хураангуй</label>
                                        <textarea id="Description" name="short" class="form-control" rows="4">{{$post->short}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Мэдээний төлөв</label>
                                        <select class="form-control custom-select" name="status" id="status">                                            
                                            <option value="1" @if($post->status == 1) selected='selected' @endif>Нийтлэгдсэн</option>
                                            <option value="2" @if($post->status == 2) selected='selected' @endif>Ноорог</option>                       
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="FeaturedImage">Жагсаалтанд харагдах зураг</label>
                                        <div class="input-group">                                        
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="FeaturedImage" name="FeaturedImage">
                                                <label class="custom-file-label" for="FeaturedImage">Зураг сонгох</label>
                                            </div>                                            
                                        </div>
                                        @if($post->featuredimage != null)
                                        <div style="margin-top: 10px; margin-bottom: 10px;">
                                            <img class="img-fluid" src="{{ asset('storage/'.$post->featuredimage) }}">
                                        </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">Хуудасны зураг</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="Image" name="Image">
                                                <label class="custom-file-label" for="Image">Зураг сонгох</label>
                                            </div>           
                                        </div>
                                        @if($post->image != null)
                                        <div style="margin-top: 10px; margin-bottom: 10px;">
                                            <img class="img-fluid" src="{{ asset('storage/'.$post->image) }}">
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <textarea class="textarea" name="content" placeholder="Place some text here">
                                        {{$post->content}}
                                        </textarea>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="col-md-12">
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Хадгалах</button>
                                    <a href="{{route('admin-post-list')}}" class="btn btn-secondary float-right">Цуцлах</a>
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