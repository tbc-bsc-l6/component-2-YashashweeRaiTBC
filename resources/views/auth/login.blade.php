<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include("layout.head")
</head>

<body class="body" style="background: #D09683">
    @include("layout.navbar")

    <div class="container mb-5">
        <div class="row justify-content-center p-3">
            <div class="col-12 mt-4 mb-4 ">
                <h1 class="text-center" style="font-family: 'Borel'; color: #330000;">Welcome Back!</h1>
            </div>
            <div class="col-sm-12 col-md-8 col-lg-5 text-center">
                <form name="login" action="{{ route('login') }}" method="POST" class="mt-2">
                    @csrf
                    <div class="row mt-2">
                        <div class="col-12">
                            <div id="formErrors" class="alert alert-danger text-start" role="alert" style="display:none;">
                                <ul class="m-0"></ul>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" name="email" type="email" required value="{{ old('email') }}" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input id="password" name="password" type="password" required class="form-control">
                            </div>
                        </div>
                        <div class="col-12 mt-4">
                        <button id="signInButton" type="submit" class="btn custom-brown-btn w-100">Log In</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--Validation errors-->
    @if ($errors->any())
        <div class="alert alert-danger px-4 py-2" style="background-color: #f8d7da; border: 1px solid #f5c6cb; border-radius: 5px;">
            <ul class="m-0">
                @foreach ($errors->all() as $error)
                    <li class="mb-2 text-danger">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @include("layout.footer")

</body>

</html>
