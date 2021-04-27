@extends('layouts.admin')

@section('title')
    <title>Add product</title>
@endsection
@section('css')
<link href="{{ asset('vendor\select2\select2.min.css') }}" rel="stylesheet" />  
<link href="{{ asset('admin\product\add\add.css') }}" rel="stylesheet" />  
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
   @include('partials.content-header',['name'=>'product', 'key'=>'add'])
    <!-- /.content-header -->

    <!-- Main content -->
    <form action="" method="post" enctype="multipart/form-data">
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                
                    @csrf
                    <div class="form-group">
                        <label>Ten san pham</label>
                        <input type="text" 
                               class="form-control" 
                               name='name'
                               placeholder="Nhap ten san pham">
                      </div>
                    <div class="form-group">
                      <label>Gia san pham</label>
                      <input type="text" 
                             class="form-control" 
                             name='price'
                             placeholder="Nhap gia san pham">
                    </div>
                    <div class="form-group">
                        <label>Anh dai dien</label>
                        <input type="file" 
                               class="form-control-file" 
                               name='image_path[]'>
                    </div>
                    <div class="form-group">
                        <label>Anh chi tiet</label>
                        <input type="file" 
                               multiple
                               class="form-control-file" 
                               name='feature_image_path'>
                    </div>
                    

                    <div class="form-group">
                      <label>Chon danh muc</label>
                      <select class="form-control select2_init" name = 'parent_id'>
                        <option value="0">Chon danh muc</option>
                        {!! $htmlOption !!}
                      </select>
                    </div>
                    <div class="form-group">
                        <label>Tags</label>
                        <select name="tags[]" class="form-control tags_select_choose" multiple="multiple">
                            
                        </select>
                    </div>
                    
                    
                  
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label>Nhap noi dung</label>
                <textarea class="form-control tinymce_editor_init" rows = "10" name='content'></textarea>
            </div>
            </div>
            <div class="col-md-12">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
  </form>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
@section('js')

<script src="{{ asset('vendor\select2\select2.min.js') }}"></script>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script src="{{ asset('admin\product\add\add.js') }}"></script>

@endsection
