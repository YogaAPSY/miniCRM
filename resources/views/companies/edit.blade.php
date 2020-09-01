@extends('adminlte::page')

@section('content')
<!-- general form elements -->
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Add Companies</h3>
    </div>
    @if(session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
    @elseif ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <!-- /.card-header -->
    <!-- form start -->


    <form action="{{route('company.update', [$companies->id])}}" method="POST" role="form" enctype="multipart/form-data">
        @method('PUT')


        <div class=" card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input value="{{ $companies->name ?? ''}}" type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Ex : Yoga Anugrah Pratama">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Email</label>
                <input value="{{ $companies->email ?? ''}}" type="email" name="email" class="form-control" id="exampleInputPassword1" placeholder="Ex : yogaanugrahpsy@gmail.com">
            </div>
            <div class="form-group">
                <label for="exampleInputFile">Logo</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" name="logo" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    </div>
                    <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.card-body -->
        @csrf
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
<!-- /.card -->
@stop
