@extends('layouts.admin')

@section('title')
    <title>user</title>
@endsection
@section('css')
    <style>
        .card-header{
            background-color: #6C757D;
        }
        input[type="checkbox"]{
            transform: scale(1.2);
        }
    </style>
@endsection
@section('js')
<<<<<<< HEAD

    <script src="{{ asset('admins\role\add\add.js') }}"></script>

    <script src="{{ asset('admins\role\add\add.js') }}"></script>

=======
<<<<<<< HEAD
    <script src="{{ asset('admins\role\add\add.js') }}"></script>
=======
<<<<<<< HEAD
    <script src="{{ asset('admins\role\add\add.js') }}"></script>
=======
>>>>>>> 3e4e04948ecce592037fa8927b1ed7a372189b69
    <script>
        $('.checkbox_wrap').on('click', function (){
            $(this).parents('.card').find('.checkbox_children').prop('checked', $(this).prop('checked'));
        });
    </script>
<<<<<<< HEAD

=======
>>>>>>> 590d958e141c12cd7a582b240dcfe1a60bdaf92e
>>>>>>> 1262dcd5ca8e6672d7b54111a1f786de3884c6ba
>>>>>>> 3e4e04948ecce592037fa8927b1ed7a372189b69
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('partials.content-header',['name'=>'role', 'key'=>'add'])
    <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <form action="{{route('role.store')}}" method="post" enctype="multipart/form-data" style="width: 100%">
                        @csrf

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Ten role</label>
<<<<<<< HEAD
                                       <input type="text"
=======
                                <input type="text"
>>>>>>> 3e4e04948ecce592037fa8927b1ed7a372189b69
                                       class="form-control"
                                       name='name'
                                       value="{{old('name')}}"
                                       placeholder="Nhap ten role">
                            </div>
                            <div class="form-group">
                                <label>Role description</label>
                                <textarea type="text"
                                          class="form-control"
                                          name='display_name'
                                          value="{{old('display_name')}}"
                                          placeholder="Nhap mo ta"
                                          rows="5"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
<<<<<<< HEAD
<                            <div>
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 1262dcd5ca8e6672d7b54111a1f786de3884c6ba
                            <div>
>>>>>>> 3e4e04948ecce592037fa8927b1ed7a372189b69
                                <lable>
                                    <input type="checkbox" class="checkall">
                                </lable>
                                Check All
                            </div>
                        </div>
                        <div class="col-md-12">
<<<<<<< HEAD

=======
<<<<<<< HEAD
=======
=======
>>>>>>> 590d958e141c12cd7a582b240dcfe1a60bdaf92e
>>>>>>> 1262dcd5ca8e6672d7b54111a1f786de3884c6ba
>>>>>>> 3e4e04948ecce592037fa8927b1ed7a372189b69
                            @foreach($permissionParent as $permissionParentItem)
                            <div class="card border-primary text-black mb-3">
                                <div class="card-header">
                                    <lable>
                                        <input type="checkbox" value="" class="checkbox_wrap" >
                                    </lable>
                                    {{$permissionParentItem->name}}
                                </div>
                                <div class="row">
                                    @foreach($permissionParentItem->permissionChildren as $permissionChildrenItem)
                                    <div class="card-body text-primary col-md-3">
                                        <h5 class="card-title">
                                            <lable>
                                                <input type="checkbox" class="checkbox_children" name="permission_id[]" value="{{$permissionChildrenItem->id}}">
                                            </lable>
                                            {{$permissionChildrenItem->name}}
                                        </h5>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

