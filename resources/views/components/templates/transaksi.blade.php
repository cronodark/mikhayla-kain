@extends('layouts.index')

@section('cssPage')
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.7/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/3.0.2/css/responsive.bootstrap5.css">
@endsection

@section('content')
    <div class="ms-3 me-3">
        <h1 class="fs-1 text-gray mt-3">Transaksi</h1>
        <div class="mt-4 card shadow mb-3 w-100 data-table-containe p-4">
            <div class="d-flex justify-content-end align-items-end mb-3">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTransaksiModal">
                    <i class="bi bi-plus-circle me-2"></i>Tambah Transaksi
                </button>
            </div>

            <div class="data-table-container">
                <table id="myTable" class="table table-striped table-hover data-table display w-100">
                    <thead>
                        <tr>
                            <th class="text-start">No</th>
                            <th class="text-start">Tanggal</th>
                            <th class="text-start">Nama Customer</th>
                            <th class="text-start">Nama Barang</th>
                            <th class="text-start">Warna</th>
                            <th class="text-start">Jumlah</th>
                            <th class="text-start">Gramasi</th>
                            <th class="text-start">Status</th>
                            <th class="text-start">Plat Nomor</th>
                            <th class="text-start">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transactions as $transaction)
                            <tr>
                                <td class="text-start">{{ $loop->iteration }}</td>
                                <td class="text-start">{{ $transaction->date }}</td>
                                <td class="text-start">{{ $transaction->customer->name }}</td>
                                <td class="text-start">{{ $transaction->product_name }}</td>
                                <td class="text-start">{{ $transaction->color }}</td>
                                <td class="text-start">{{ $transaction->quantity }}</td>
                                <td class="text-start">{{ $transaction->gramasi }}</td>
                                <td class="text-start">
                                    @if ($transaction->status == '3')
                                        <div class="bg-primary text-white w-auto radius d-inline-flex p-1">
                                            Selesai
                                        </div>
                                    @elseif ($transaction->status == '2')
                                        <div class="bg-warning text-white w-auto radius d-inline-flex p-1">
                                            dikirim
                                        </div>
                                    @else
                                        <div class="bg-secondary text-white w-auto radius d-inline-flex p-1">
                                            diproses
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    {{ $transaction->nopol }}
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center align-items-center">
                                        {{-- edit --}}
                                        <button type="button" data-bs-toggle="modal"
                                            data-bs-target="#editTransaksiModal{{ $transaction->id }}"
                                            class="btn pt-0 pb-0 pe-0 ps-0 m-0"><i
                                                class="bi bi-pencil-square ps-2 me-2"></i></button>
                                        {{-- hapus --}}
                                        <a href="javascript:void(0);" onclick="confirmDelete({{ $transaction->id }})""
                                            class="btn pt-0 pb-0 pe-0 ps-0 m-0"><i
                                                class="bi bi-trash3-fill ps-2 me-2"></i></a>
                                        <form id="deleteTransactionForm{{ $transaction->id }}"
                                            action="{{ route('transaksi.delete', $transaction->id) }}" method="GET"
                                            style="display: none;">
                                            @csrf
                                        </form>
                                        {{-- detail --}}
                                        {{-- <button type="button" class="btn pt-0 pb-0 pe-0 ps-0 m-0"><i
                                                class="bi bi-eye-fill ps-2 me-2"></i></button> --}}
                                    </div>
                                </td>
                            </tr>
                            {{-- modal Edit --}}
                            <div class="modal fade" id="editTransaksiModal{{ $transaction->id }}" data-bs-backdrop="static"
                                data-bs-keyboard="false" tabindex="-1" aria-labelledby="editTransaksiModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form id="editTransactionForm{{ $transaction->id }}" action="{{ route('transaksi.update', $transaction->id) }}" method="POST">
                                            @csrf
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="editTransaksiModalLabel">Edit Data
                                                    Pemesanan</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="dateInput" class="form-label">Tanggal</label>
                                                    <input type="date" class="form-control"
                                                        value="{{ $transaction->date }}" id="dateInput" name="dateInput">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="inputCustomer" class="form-label">Customer</label>
                                                    <select class="form-select" name="inputCustomer" id="inputCustomer"
                                                        aria-label="Default select example">
                                                        @foreach ($customers as $customer)
                                                            <option value="{{ $customer->id }}"
                                                                {{ $transaction->id_customer == $customer->id ? 'selected' : '' }}>
                                                                {{ $customer->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="mb-3 row">
                                                    <div class="col-lg-6">
                                                        <label for="productNameInput" class="form-label">Nama Barang</label>
                                                        <input type="text" value="{{ $transaction->product_name }}"
                                                            class="form-control" id="productNameInput"
                                                            name="productNameInput">
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label for="colorInput" class="form-label">Warna</label>
                                                        <input type="text" class="form-control"
                                                            value="{{ $transaction->color }}" id="colorInput"
                                                            name="colorInput">
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="gramasiInput" class="form-label">Gramasi</label>
                                                    <input type="text" class="form-control"
                                                        value="{{ $transaction->gramasi }}" id="gramasiInput"
                                                        name="gramasiInput">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="statusInput" class="form-label">Status</label>
                                                    <select class="form-select" name="statusInput" id="statusInput"
                                                        aria-label="Default select example">
                                                        <option selected disabled>==Pilih Status==</option>
                                                        <option value="1"
                                                            {{ $transaction->status == 1 ? 'selected' : '' }}>Diproses
                                                        </option>
                                                        <option value="2"
                                                            {{ $transaction->status == 2 ? 'selected' : '' }}>Dikirim
                                                        </option>
                                                        <option value="3"
                                                            {{ $transaction->status == 3 ? 'selected' : '' }}>Selesai
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="quantityInput" class="form-label">Jumlah</label>
                                                    <input type="text" class="form-control"
                                                        value="{{ $transaction->quantity }}" id="quantityInput"
                                                        name="quantityInput">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="nopolInput" class="form-label">Jumlah</label>
                                                    <input type="text" class="form-control"
                                                        value="{{ $transaction->nopol }}" id="nopolInput"
                                                        name="nopolInput">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="button" onclick="confirmSubmission({{ $transaction->id }})" class="btn btn-success">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            {{-- end modal edit --}}
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- modal add --}}
    <div class="modal fade" id="addTransaksiModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="addTransaksiModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('transaksi.create') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="addTransaksiModalLabel">Input Data Transaksi</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="inputCustomer" class="form-label">Customer</label>
                            <select class="form-select" name="inputCustomer" id="inputCustomer"
                                aria-label="Default select example">
                                <option selected disabled>==Pilih Customer==</option>
                                @foreach ($customers as $customer)
                                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="dateInput" class="form-label">Tanggal</label>
                            <input type="date" class="form-control" id="dateInput" name="dateInput">
                        </div>
                        <div class="mb-3 row">
                            <div class="col-lg-6">
                                <label for="productNameInput" class="form-label">Nama Barang</label>
                                <input type="text" class="form-control" id="productNameInput"
                                    name="productNameInput">
                            </div>
                            <div class="col-lg-6">
                                <label for="colorInput" class="form-label">Warna</label>
                                <input type="text" class="form-control" id="colorInput" name="colorInput">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="gramasiInput" class="form-label">Gramasi</label>
                            <input type="text" class="form-control" id="gramasiInput" name="gramasiInput">
                        </div>
                        <div class="mb-3">
                            <label for="quantityInput" class="form-label">Jumlah</label>
                            <input type="text" class="form-control" id="quantityInput" name="quantityInput">
                        </div>
                        <div class="mb-3">
                            <label for="inputNopol" class="form-label">Nomor Kendaraan</label>
                            <input type="text" class="form-control" id="inputNopol" name="inputNopol">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-success">Save</button>
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
    <script src="{{ asset('assets/js/transaksi.js') }}"></script>
@endsection
