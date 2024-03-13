<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Login</title>
</head>

<body class="bg-login bg-white">
    <div class="row justify-content-center  full-height">
        <div class="col-10 text-center mt-5">
            <img height="48" src="{{ asset('images/logo-color.png') }}" alt="NoImage" style="filter: invert(1)">
        </div>
        <div class="col-10 col-md-7 login-box mt-4">
            <div class="row bg-white rounded" style="height: 64vh">
                <div class="d-none d-md-block col-md-6  px-0">
                    <img class="img-fluid h-100 w-100 rounded" src="{{ asset('images/loginImg2.jpg') }}" alt="">
                </div>
                <div class="col-md-6 my-auto p-4 login-content">
                    <h1> Welcome </h1>
                    @if ($errors->any())
                        <div {{ $errors }}>
                            <div class="font-medium text-danger">
                                {{ __('Whoops! Something went wrong.') }}
                            </div>

                            <ul class="mt-3 list-disc list-inside text-sm text-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('login') }}" method="POST" class="mt-5">
                        @csrf
                        <div class="form-group">
                            <label for="" class="text-dark">Email</label>
                            <input type="email" name="email" id="email" class="form-control form-control-lg"
                                placeholder="" value="{{ old('email') }}" autofocus>
                        </div>
                        <div class="form-group mb-1">
                            <label for="" class="text-dark">Password</label>
                            <input type="password" id="password" class="form-control form-control-lg" placeholder=""
                                name="password" autocomplete="current-password">
                        </div>
                        <div class="row justify-content-end px-3">
                            <a href="{{route('register')}}">Not Registered? Sign Up</a>
                        </div>
                        <button type="submit" class="btn btn-block btn-lg btn-primary mt-4">
                            Login
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/jquery-3.2.1.slim.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
</body>

</html>
