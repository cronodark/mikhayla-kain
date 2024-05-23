<div class="col-auto col-md-2 col-xl-2 bg-blue-custom">
    <div class="d-flex flex-column align-items-center align-items-sm-start pt-2 text-white min-vh-100">
        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start w-100"
            id="menu">
            <li class="nav-item w-100">
                <div class="{{ Route::currentRouteName() == 'dashboard' ? 'active' : '' }} font-weight-bold ps-3">
                    <a href="{{ route('dashboard') }}" class="nav-link align-middle px-0">
                        <i class="fs-4 bi-house text-white me-3"></i> <span class="d-none d-sm-inline text-white fs-5 ">Home</span>
                    </a>
                </div>
            </li>
            <li class="nav-item w-100">
                <div class="{{ Route::currentRouteName() == 'transaksi.index' ? 'active' : '' }} font-weight-bold ps-3">
                    <a href="{{ route('transaksi.index') }}" class="nav-link px-0 align-middle">
                        <i class="fs-4 bi-table text-white me-3"></i> <span class="d-none d-sm-inline text-white fs-5">Data Transaksi</span>
                    </a>
                </div>
            </li>
            <li class="nav-item w-100">
                <div class="{{ Route::currentRouteName() == 'customer.index' ? 'active' : '' }} font-weight-bold ps-3">
                    <a href="{{ route('customer.index') }}" class="nav-link px-0 align-middle">
                        <i class="fs-4 bi bi-people-fill text-white me-3"></i> <span class="d-none d-sm-inline text-white fs-5">Data Customer</span>
                    </a>
                </div>
            </li>
        </ul>
        <hr>
    </div>
</div>
