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
                            <th class="text-start">Id</th>
                            <th class="text-start">Nama Customer</th>
                            <th class="text-start">Nama Barang</th>
                            <th class="text-start">Jumlah</th>
                            <th class="text-start">Gramasi</th>
                            <th class="text-start">Status</th>
                            <th class="text-start">Plat Nomor</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-start">1</td>
                            <td class="text-start">1</td>
                            <td class="text-start">John Doe</td>
                            <td class="text-start">Scuba</td>
                            <td class="text-start">100</td>
                            <td class="text-start">70</td>
                            <td class="text-start">
                                <div class="bg-primary text-white w-auto radius d-inline-flex p-1">
                                    Selesai
                                </div>
                            </td>
                            <td>
                                D 4554 BGR
                            </td>
                            <td>
                                <div class="d-flex justify-content-center align-items-center">
                                    {{-- edit --}}
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#editTransaksiModal"
                                        class="btn pt-0 pb-0 pe-0 ps-0 m-0"><i
                                            class="bi bi-pencil-square ps-2 me-2"></i></button>
                                    {{-- haous --}}
                                    <a href="#" class="btn pt-0 pb-0 pe-0 ps-0 m-0"><i
                                            class="bi bi-trash3-fill ps-2 me-2"></i></a>
                                    {{-- detail --}}
                                    <button type="button" class="btn pt-0 pb-0 pe-0 ps-0 m-0"><i
                                            class="bi bi-eye-fill ps-2 me-2"></i></button>
                                </div>
                            </td>
                        </tr>
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
                <form action="" method="POST">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="addTransaksiModalLabel">Input Data Transaksi</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="inputCustomer" class="form-label">Customer</label>
                            <select class="form-select" name="inputCustomer" id="inputCustomer"
                                aria-label="Default select example">
                                <option selected disabled>==Pilih Status==</option>
                                <option value="1">Jane doe</option>
                                <option value="2">John doe</option>
                                <option value="3">Asep</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="dateInput" class="form-label">Tanggal</label>
                            <input type="date" class="form-control" id="dateInput" name="dateInput">
                        </div>
                        <div class="mb-3 row">
                            <div class="col-lg-6">
                                <label for="productNameInput" class="form-label">Nama Barang</label>
                                <input type="text" class="form-control" id="productNameInput" name="productNameInput">
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
                            <label for="jumlahInput" class="form-label">Jumlah</label>
                            <input type="text" class="form-control" id="jumlahInput" name="jumlahInput">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- end modal add --}}
    {{-- modal Edit --}}
    <div class="modal fade" id="editTransaksiModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="editTransaksiModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="" method="POST">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="editTransaksiModalLabel">Edit Data Pemesanan</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="inputCustomer" class="form-label">Customer</label>
                            <select class="form-select" name="inputCustomer" id="inputCustomer"
                                aria-label="Default select example">
                                <option selected disabled>==Pilih Status==</option>
                                <option value="1">Jane doe</option>
                                <option value="2">John doe</option>
                                <option value="3">Asep</option>
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
                            <label for="statusInput" class="form-label">Status</label>
                            <select class="form-select" name="statusInput" id="statusInput"
                                aria-label="Default select example">
                                <option selected disabled>==Pilih Status==</option>
                                <option value="1">Diproses</option>
                                <option value="2">Dikirim</option>
                                <option value="3">Selesai</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="jumlahInput" class="form-label">Jumlah</label>
                            <input type="text" class="form-control" id="jumlahInput" name="jumlahInput">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- end modal edit --}}
@endsection

@section('scriptPage')
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/2.0.7/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.2/js/dataTables.responsive.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.2/js/responsive.bootstrap5.js"></script>
    <script src="{{ asset('assets/js/table.js') }}"></script>
@endsection
