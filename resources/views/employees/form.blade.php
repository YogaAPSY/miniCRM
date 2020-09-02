@extends('adminlte::page')

@section('content')
<!-- general form elements -->

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

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Add employees</h3>
    </div>

    <!-- /.card-header -->
    <!-- form start -->
    @if(isset($employees))

    <form action="{{route('employee.update', [$employees->id])}}" method="POST" role="form" enctype="multipart/form-data">
        <input type="hidden" value="PUT" name="_method">
        @else
        <form action="{{route("employee.store")}}" method="POST" role="form" enctype="multipart/form-data">
            @endif


            <div class=" card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">First Name</label>
                    <input value="{{ $employees->first_name ?? ''}}" type="text" name="first_name" class="form-control" id="exampleInputEmail1" placeholder="Ex : Yoga Anugrah Pratama">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Last Name</label>
                    <input value="{{ $employees->last_name ?? ''}}" type="text" name="last_name" class="form-control" id="exampleInputEmail1" placeholder="Ex : Yoga Anugrah Pratama">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Email</label>
                    <input value="{{ $employees->email ?? ''}}" type="email" name="email" class="form-control" id="exampleInputPassword1" placeholder="Ex : yogaanugrahpsy@gmail.com">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Phone</label>
                    <input value="{{ $employees->phone ?? ''}}" type="number" name="phone" class="form-control" id="exampleInputEmail1" placeholder="Ex : Yoga Anugrah Pratama">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Company</label>
                    <select name="company_id" id="" class="form-control">
                        <option value="" disabled selected="">-- Choose Company --</option>
                        @forelse($companies as $company)
                        @if($company->id == isset($employees->company_id))
                        <option value="{{$company->id}}" selected>{{$company->name}}</option>
                        @else
                        <option value="{{$company->id}}">{{$company->name}}</option>
                        @endif
                        @empty
                        <option value="" disabled>-- Belum ada company --</option>
                        @endforelse
                    </select>

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
