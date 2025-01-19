<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    @include("layout.head")
</head>

<body class="body" style="background: #D09683">

    @include("layout.navbar")

    <div class="container mb-5">
        <div class="row justify-content-center p-3">
            <div class="col-12 mt-4 mb-4">
                <h1 class="text-center" style="font-family: 'Borel'; color: #330000;">Create Your Account</h1>
            </div>
            <div class="col-sm-12 col-md-8 col-lg-5 text-center">
                <form action="{{ route('register') }}" method="POST" class="mt-2">
                    @csrf
                    <div class="row mt-2">
                        <div class="col-12">
                            <div id="formErrors" class="alert alert-danger text-start" role="alert" style="display:none;">
                                <ul class="m-0"></ul>
                            </div>
                        </div>
                        <!-- Name Field -->
                        <div class="col-12 mb-3">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input id="name" name="name" type="text" required value="{{ old('name') }}" class="form-control">
                            </div>
                        </div>
                        <!-- Email Field -->
                        <div class="col-12 mb-3">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" name="email" type="email" required value="{{ old('email') }}" class="form-control">
                            </div>
                        </div>
                        <!-- Password Field -->
                        <div class="col-12 mb-3">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input id="password" name="password" type="password" required class="form-control">
                            </div>
                        </div>
                        <!-- Confirm Password Field -->
                        <div class="col-12 mb-3">
                            <div class="form-group">
                                <label for="password_confirmation">Confirm Password</label>
                                <input id="password_confirmation" name="password_confirmation" type="password" required class="form-control">
                            </div>
                        </div>
                        <!-- Register Button -->
                        <div class="col-12 mt-4">
                            <button id="registerButton" type="submit" class="btn custom-brown-btn w-100"> Register </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Validation error -->
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
