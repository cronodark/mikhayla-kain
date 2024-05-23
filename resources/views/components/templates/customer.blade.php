@extends('layouts.index')

@section('cssPage')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.7/css/dataTables.bootstrap5.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/3.0.2/css/responsive.bootstrap5.css">
@endsection

@section('content')
<div class="ms-4">
    <h1 class="fs-1 text-gray mt-3">Customer</h1>
    <div class="mt-4 card shadow mb-3 w-100 data-table-containe p-4">
        <div class="d-flex justify-content-end align-items-end mb-3">
            <button class="btn btn-primary"><i class="bi bi-plus-circle me-2"></i>Tambah Customer</button>
        </div>
        <table id="myTable" class="table table-striped data-table display w-100">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Id</th>
                    <th>Nama</th>
                    <th>alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>1</td>
                    <td>John Doe</td>
                    <td>Scuba</td>
                    <td>
                        <i class="bi bi-pencil-square me-2"></i>
                        <i class="bi bi-trash3-fill me-2"></i>
                        <i class="bi bi-eye-fill"></i>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('scriptPage')
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/2.0.7/js/dataTables.bootstrap5.js"></script>
<script src="https://cdn.datatables.net/responsive/3.0.2/js/dataTables.responsive.js"></script>
<script src="https://cdn.datatables.net/responsive/3.0.2/js/responsive.bootstrap5.js"></script>
<script src="{{ asset('assets/js/table.js') }}"></script>
@endsection
