@extends('adminlte::page')

@section('content')


<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>List Employee</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">List Employe</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
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
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">

                    <div class="col-md-3">
                        <a href="{{route("employee.create")}}" class="btn btn-primary"><i class="fas fa-edit"> Tambah</i></a>
                    </div>
                    <div class="col-md-9">

                    </div>

                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Company</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php $i = 1; ?>
                            @forelse($employees as $employee)
                            <tr>

                                <td>{{$i++}}</td>
                                <td>{{$employee->name}}
                                </td>
                                <td>{{$employee->email}}</td>
                                <td><img src="{{ asset('storage/images/'.$employee->logo)}}" alt="" width="70px" height="60px"></td>
                                <td>{{$employee->created_at}}</td>
                                <td>
                                    <a href="{{route("employee.show", [$employee->id])}}" class="btn btn-block bg-gradient-success"><i class="fas fa-eye"> Show</i></a>

                                    <a href="{{route("employee.edit", [$employee->id])}}" class="btn btn-block bg-gradient-primary"><i class="fas fa-edit"> Edit</i></a>

                                    <form onsubmit="return confirm('Delete this employee permanently?')" action="{{route('employee.destroy', [$employee->id])}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-block bg-gradient-danger "><i class="fas fa-trash"> Delete</i></button>
                                    </form>

                                </td>
                            </tr>
                            @empty
                            <p>No Data employee</p>
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="6">
                                    {!! $employees->appends(Request::all())->links() !!}
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div> <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->
@stop
