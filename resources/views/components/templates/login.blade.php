<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mikhayla Kain - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/general.css') }}">
</head>

<body class="overflow-hidden">
    <section class="bg-login w-100 vh-100 d-flex justify-content-center align-items-center text-white">
        <div class="row w-50">
            <form action="{{ route('login.auth') }}" method="POST">
                @csrf
                <div class="col-12 d-flex align-items-center justify-content-center mb-5">
                    <svg width="100" height="100" viewBox="0 0 168 137" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M2.7002 2H21.3129C24.2833 2 26.9041 3.94481 27.768 6.78998L56.9057 102.751C57.7696 105.596 60.3905 107.541 63.3606 107.541H129.011C132.098 107.541 134.792 105.443 135.551 102.448L147.306 56.0645C148.065 53.0686 150.759 50.9711 153.845 50.9711H165.463"
                            stroke="white" stroke-width="3.75648" stroke-linecap="round" />
                        <path
                            d="M98.9427 28.916C97.9546 27.927 96.3528 27.927 95.3648 28.916L79.2638 45.036C78.276 46.0251 78.276 47.6289 79.2638 48.618C80.2518 49.6072 81.8539 49.6072 82.8419 48.618L97.1536 34.2895L111.466 48.618C112.454 49.6072 114.055 49.6072 115.043 48.618C116.031 47.6289 116.031 46.0251 115.043 45.036L98.9427 28.916ZM99.6838 77.9895V30.7071H94.6237V77.9895H99.6838Z"
                            fill="white" />
                        <path
                            d="M79.443 135.404C83.6349 135.404 87.033 132.002 87.033 127.805C87.033 123.608 83.6349 120.206 79.443 120.206C75.2512 120.206 71.853 123.608 71.853 127.805C71.853 132.002 75.2512 135.404 79.443 135.404Z"
                            stroke="white" stroke-width="3.00518" />
                        <path
                            d="M116.55 135.404C120.742 135.404 124.14 132.002 124.14 127.805C124.14 123.608 120.742 120.206 116.55 120.206C112.358 120.206 108.96 123.608 108.96 127.805C108.96 132.002 112.358 135.404 116.55 135.404Z"
                            stroke="white" stroke-width="3.00518" />
                    </svg>
                </div>
                <div class="col-12 d-flex align-items-center justify-content-center border radius py-2 px-1 mb-4">
                    <div class="input-group">
                        <label for="username">
                            <span class="input-group-text transparent-input" id="basic-addon1">
                                <i class="fa-solid fa-user-large fs-5 me-3"></i>
                            </span>
                        </label>
                        <input type="text" class="form-control transparent-input" id="username" name="username"
                            aria-label="Username" aria-describedby="basic-addon1" placeholder="Username">
                    </div>
                </div>
                <div class="col-12 d-flex align-items-center justify-content-center mb-5 border radius py-2 px-1">
                    <div class="input-group">
                        <label for="password">
                            <span class="input-group-text transparent-input me-3" id="basic-addon1">
                                <i class="fa-solid fa-lock fs-5"></i>
                            </span>
                        </label>
                        <input type="password" class="form-control transparent-input" aria-label="password"
                            aria-describedby="basic-addon1" id="password" name="password" placeholder="Password">
                    </div>
                </div>
                <div class="col-12 d-flex align-items-center justify-content-center mb-2">
                    <button class="btn bg-white text-primary w-100 py-3">LOGIN</button>
                </div>
            </form>
            <div class="col-12 d-flex align-items-center justify-content-center">
                <a href="#" class="text-decoration-none text-white fs-7">forget password?</a>
            </div>
        </div>
    </section>
    <script src="https://kit.fontawesome.com/0eecdb36e6.js" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/css/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if ($errors->any())
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            });

            Toast.fire({
                icon: 'error',
                title: '{{ $errors->first() }}'
            });
        </script>
    @endif
</body>

</html>
