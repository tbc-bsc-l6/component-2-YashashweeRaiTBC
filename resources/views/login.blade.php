<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include("layout.head")
</head>

<body class="body" style="background: #D09683">
        
    @include("layout.navbar")
        
    <div class="container">
        <div class="row justify-content-center p-3">
            <div class="col-12 mt-4 mb-4 ">
                <h1 class="text-center" style="font-family: 'Borel'; color: #330000;">Welcome Back!</h1>
            </div>
            <div class="col-sm-12 col-md-8 col-lg-5 text-center">
                <form name="login" class="mt-2">
                    @csrf
                    <div class="row mt-2">
                        <div class="col-12">
                            <div id="formErrors" class="alert alert-danger text-start" role="alert" style="display:none;">
                                <ul class="m-0">
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Email</label>
                                <input id="email" type="email" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-6 col-sm-12">
                            <div class="form-group">
                                <label>Password</label>
                                <input id="password" type="password" class="form-control">
                            </div>
                        </div>
                        <div class="col-12 mt-4">
                            <button id="signInButton" type="button" class="btn custom-brown-btn w-100"> Log In </button>
                        </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    @include("layout.footer")

    <script>
        function redirectTo(url) {
        window.location.href = url;
    }
    </script>
    
    <script>
        let loginSubmitted = false;

        function clearErrors() {
            $("#formErrors ul").empty();
            $("#formErrors").hide();
        }

        function addErrors(errorArray) {
            if (Array.isArray(errorArray) && errorArray.length > 0) {
                for (let i = 0; i < errorArray.length; i++) {
                    $("#formErrors ul").append("<li>" + errorArray[i] + "</li>");
                }
                $("#formErrors").show();
            }
        }
        
        function formatErrors(errorArray) {
            let errorsList = [];
            for (var key in errorArray) {
                if (errorArray.hasOwnProperty(key)) {
                    errorsList.push(errorArray[key]);
                }
            }
            
            return errorsList;
        }
        
        $(document).ready(function() {
            $("#signInButton").click(function(e) {
                e.preventDefault();
                clearErrors();
                if (loginSubmitted !== true) {
                    loginSubmitted = true;
                    $.post({
                        "url": "/api/login",
                        "data": {
                            "_token": "{{ csrf_token() }}",
                            "email": $("#email").val(),
                            "password": $("#password").val()
                        },
                        success: function(reponse) {
                            loginSubmitted = false;
                            window.location.href = "/dashboard";
                        },
                        error: function(response) {
                            loginSubmitted = false;
                            
                            if (response.status == 422) {
                                addErrors(formatErrors(response.responseJSON.errors));
                            } else {
                                addErrors(["Unable to process your request."]);
                            }
                        }
                    });
                }
            });
        });
    </script>
        
</body>

</html>
