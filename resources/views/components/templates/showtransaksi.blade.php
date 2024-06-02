@extends('layouts.index')

@section('cssPage')
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.7/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/3.0.2/css/responsive.bootstrap5.css">
@endsection

@section('content')
    <div class="ms-4 me-xxl-3 me-5">
        <h1 class="fs-1 text-gray mt-3">Detail Transaksi</h1>
        <div class="mt-4 card shadow mb-3 w-100 data-table-containe p-4">
            <div class="d-flex justify-content-between mb-3">
                <div class="me-md-2 me-2">
                    <a href="{{ route('transaksi.index') }}"><button class="btn text-white custom-btn d-flex"><i class="bi bi-backspace"></i><span class="ms-2 d-none d-xxl-block">Kembali</span></button></a>
                </div>
                <div>
                    <button type="button" class="btn btn-primary d-flex" data-bs-toggle="modal"
                        data-bs-target="#addDetailTransaksiModal">
                        <i class="bi bi-plus-circle"></i><span class="ms-2 d-none d-xxl-block">Tambah Item</span>
                    </button>
                </div>

            </div>
            <div class="row mx-1 mb-3 border p-2">
                <div class="col-lg-6 col-sm-12">
                    <span class="fs-7 fw-bold">Tanggal Transaksi</span>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <span class="fs-7 fw-semibold">{{ $transaction->date }}</span>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <span class="fs-7 fw-bold">Nama Customer</span>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <span class="fs-7 fw-semibold">{{ $transaction->customer->name }}</span>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <span class="fs-7 fw-bold">Nama Kain</span>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <span class="fs-7 fw-semibold">{{ $transaction->product_name }}</span>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <span class="fs-7 fw-bold">Warna Kain</span>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <span class="fs-7 fw-semibold">{{ $transaction->color }}</span>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <span class="fs-7 fw-bold">Gramasi Kain</span>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <span class="fs-7 fw-semibold">{{ $transaction->gramasi }}</span>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <span class="fs-7 fw-bold">Nomor Kendaraan</span>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <span class="fs-7 fw-semibold">{{ $transaction->nopol }}</span>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <span class="fs-7 fw-bold">Jumlah kain</span>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <span class="fs-7 fw-semibold">{{ $itemCount }}</span>
                </div>
            </div>
            <div class="data-table-container">
                <table id="myTable" class="table table-striped table-hover data-table display w-100">
                    <thead>
                        <tr>
                            <th class="text-start">No</th>
                            <th class="text-start">ID</th>
                            <th class="text-start">Berat</th>
                            <th class="text-start">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($detailTransactions as $detailTransaction)
                            <tr>
                                <td class="text-start">{{ $loop->iteration }}</td>
                                <td class="text-start">{{ $detailTransaction->id }}</td>
                                <td class="text-start">{{ $detailTransaction->weight }}</td>
                                <td class="text-start">
                                    <button type="button" data-bs-toggle="modal"
                                        data-bs-target="#editDetailTransaksiModal{{ $detailTransaction->id }}"
                                        class="btn pt-0 pb-0 pe-0 ps-0 m-0"><i
                                            class="bi bi-pencil-square ps-2 me-2"></i></button>
                                    <a href="javascript:void(0);" onclick="confirmDelete({{ $detailTransaction->id }})"
                                        class="btn pt-0 pb-0 pe-0 ps-0 m-0"><i class="bi bi-trash3-fill ps-2 me-2"></i></a>
                                    <form id="deleteDetailTransactionForm{{ $detailTransaction->id }}"
                                        action="{{ route('transaksi.show.delete', $detailTransaction->id) }}"
                                        method="GET" style="display: none;">
                                        @csrf
                                    </form>
                                </td>
                            </tr>
                            {{-- Modal edit --}}
                            <div class="modal fade" id="editDetailTransaksiModal{{ $detailTransaction->id }}"
                                data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                aria-labelledby="editDetailTransaksiModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form id="editDetailTransactionForm{{ $detailTransaction->id }}"
                                            action="{{ route('transaksi.show.update', $detailTransaction->id) }}"
                                            method="POST">
                                            @csrf
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="editDetailTransaksiModalLabel">Edit Item
                                                    Pemesanan</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="weightInput" class="form-label">Berat</label>
                                                    <input type="number" class="form-control"
                                                        value="{{ $detailTransaction->weight }}" id="weightInput"
                                                        name="weightInput">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="button"
                                                    onclick="confirmSubmission({{ $detailTransaction->id }})"
                                                    class="btn btn-success">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            {{-- End Modal edit --}}
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- Modal add --}}
    <div class="modal fade" id="addDetailTransaksiModal" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="addDetailTransaksiModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('transaksi.show.create', $transaction->id) }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="addDetailTransaksiModalLabel">add Item
                            Pemesanan</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="weightInput" class="form-label">Berat</label>
                            <input type="number" class="form-control" id="weightInput" name="weightInput">
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
    {{-- End Modal add --}}
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
    <script src="{{ asset('assets/js/detailTransaksi.js') }}"></script>
@endsection
