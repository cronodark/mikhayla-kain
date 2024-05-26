@extends('layouts.index')

@section('cssPage')
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.7/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/3.0.2/css/responsive.bootstrap5.css">
@endsection

@section('content')
    <div class="ms-3 me-3">
        <h1 class="fs-1 text-gray mt-3">Customer</h1>
        <div class="mt-4 card shadow mb-3 w-100 data-table-containe p-4">
            <div class="d-flex justify-content-end align-items-end mb-3">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCustomerModal">
                    <i class="bi bi-plus-circle me-2"></i>Tambah Customer
                </button>
            </div>

            <div class="data-table-container">
                <table id="myTable" class="table table-striped table-hover data-table display w-100">
                    <thead>
                        <tr>
                            <th class="text-start">No</th>
                            <th class="text-start">Id</th>
                            <th class="text-start">Nama</th>
                            <th class="text-start">Kontak</th>
                            <th class="text-start">Alamat</th>
                            <th class="text-start">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customers as $customer)
                            <tr>
                                <td class="text-start">{{ $loop->iteration }}</td>
                                <td class="text-start">{{ $customer->id }}</td>
                                <td class="text-start">{{ $customer->name }}</td>
                                <td class="text-start">{{ $customer->phone_number }}</td>
                                <td class="text-start">{{ $customer->address }}</td>
                                <td>
                                    {{-- edit --}}
                                    <button type="button" data-bs-toggle="modal"
                                        data-bs-target="#editCustomerModal{{ $customer->id }}"
                                        class="btn pt-0 pb-0 pe-0 ps-0 m-0"><i
                                            class="bi bi-pencil-square ps-2 me-2"></i></button>
                                    {{-- hapus --}}
                                    <a href="javascript:void(0);" onclick="confirmDelete({{ $customer->id }})"
                                        class="btn pt-0 pb-0 pe-0 ps-0 m-0"><i class="bi bi-trash3-fill ps-2 me-2"></i></a>
                                    <form id="deleteCustomerForm{{ $customer->id }}"
                                        action="{{ route('customer.delete', $customer->id) }}" method="GET"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                    {{-- detail --}}
                                    <button type="button" class="btn pt-0 pb-0 pe-0 ps-0 m-0"><i
                                            class="bi bi-eye-fill ps-2 me-2"></i></button>
                                    {{-- modal Edit --}}
                                    <div class="modal fade" id="editCustomerModal{{ $customer->id }}"
                                        data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                        aria-labelledby="editCustomerModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form id="editCustomerForm{{ $customer->id }}"
                                                    action="{{ route('customer.update', $customer->id) }}" method="POST">
                                                    @csrf
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="editCustomerModalLabel">Edit Data
                                                            Customer</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="nameInput" class="form-label">Nama</label>
                                                            <input type="text" class="form-control" id="nameInput"
                                                                value="{{ $customer->name }}" name="nameInput">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="phoneInput" class="form-label">Kontak</label>
                                                            <input type="text" class="form-control" id="phoneInput"
                                                                value="{{ $customer->phone_number }}" name="phoneInput">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="addressInput" class="form-label">Alamat</label>
                                                            <textarea class="form-control" name="addressInput" id="addressInput" rows="3">{{ $customer->address }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-success"
                                                            onclick="confirmSubmission({{ $customer->id }})">Save</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- end modal edit --}}
                                </td>
                            </tr>
                            <form id="deleteCustomerForm{{ $customer->id }}"
                                action="{{ route('customer.delete', $customer->id) }}" method="GET"
                                style="display: none;">
                                @csrf
                            </form>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{-- modal add --}}
        <div class="modal fade" id="addCustomerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="addCustomerModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{ route('customer.create') }}" method="POST">
                        @csrf
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="addCustomerModalLabel">Input Data Customer</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="nameInput" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="nameInput" name="nameInput">
                            </div>
                            <div class="mb-3">
                                <label for="phoneInput" class="form-label">Kontak</label>
                                <input type="text" class="form-control" id="phoneInput" name="phoneInput">
                            </div>
                            <div class="mb-3">
                                <label for="addressInput" class="form-label">Alamat</label>
                                <textarea class="form-control" name="addressInput" id="addressInput" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" id="btnSave" class="btn btn-success">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- end modal add --}}
        @if (session('success'))
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        title: 'Success!',
                        text: "{{ session('success') }}",
                        icon: 'success',
                        confirmButtonText: 'OK'
                    });
                });
            </script>
        @endif
        @if (session('successEdit'))
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        title: 'Success!',
                        text: "{{ session('successEdit') }}",
                        icon: 'success',
                        confirmButtonText: 'OK'
                    });
                });
            </script>
        @endif
        @if (session('successDelete'))
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        title: 'Success!',
                        text: "{{ session('successDelete') }}",
                        icon: 'success',
                        confirmButtonText: 'OK'
                    });
                });
            </script>
        @endif
    </div>
@endsection

@section('scriptPage')
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/2.0.7/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.2/js/dataTables.responsive.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.2/js/responsive.bootstrap5.js"></script>
    <script src="{{ asset('assets/js/table.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('assets/js/customer.js') }}"></script>
@endsection
