@extends('adminlte::page')

@section('content')


<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>List Company</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">List Company</li>
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
                        <a href="{{route("company.create")}}" class="btn btn-primary"><i class="fas fa-edit"> Tambah</i></a>
                    </div>
                    <div class="col-md-9">

                    </div>

                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="users-table" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Logo</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>

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


@Push('js')
<script>
    $(function() {
        $('#users-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: 'company',
            columns: [{
                    data: 'id',
                    name: 'no'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'logo',
                    name: 'logo',
                    render: function(data, type, full, meta) {
                        return "<img src='<?= asset('storage/images/') ?>/" + data + "\' height=50px/>";
                    }
                },
                {
                    data: 'created_at',
                    name: 'created_at'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ]
        });
    });
</script>
@endpush
@stop
