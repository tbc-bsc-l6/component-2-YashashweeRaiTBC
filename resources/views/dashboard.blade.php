<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @include("layout.head")
    </head>

    <body class="body" style="background: #D09683">
        
        @include("layout.navbar")
        
        <div class="container ps-5 pe-5">
            <div class="row">
                <div class="col-12 p-2 text-center mt-4 mb-4 border-bottom-brown">
                    <h1 style="font-family: 'Borel'; color: #330000;">Dashboard</h1>
                    <p style="font-family: 'Borel'; color: #330000;"><i>Share your love for books</i></p>
                </div>
            </div>
        </div>

        @include("layout.footer")

        <script>
            function redirectTo(url) {
            window.location.href = url;
        }
        </script>
        
    </body>
</html>
