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
                    <h1 style="font-family: 'Borel'; color: #330000;">Cozy Nook</h1>
                    <p style="font-family: 'Borel'; color: #330000;"><i>Share your love for books</i></p>
                </div>
            </div>
            
            <div class="row">
                @include("home.blog")
                <div class="col-lg-1 col-0"></div>
                <div class="col-lg-3 col-12 mt-5 ps-lg-4">
                    <div class="row">
                        @include("home.trending")
                        @include("home.recent")
                        @include("home.tags")
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 g-0 mt-2">
                    <nav>
                        <ul class="pagination justify-content-center">
                            <!-- Previous Button -->
                            <li class="page-item @if($page_number <= 1) disabled @endif">
                                <a class="page-link" href="/?page={{ $page_number - 1 }}"> Previous </a>
                            </li>
                            
                            <!-- Page Numbers -->
                            @for ($i = 1; $i <= ceil($total_blogs / $page_length); $i++)
                                <li class="page-item @if($page_number === $i) active @endif">
                                    <a class="page-link" href="/?page={{ $i }}">{{ $i }}</a>
                                </li>
                            @endfor
                            
                            <!-- Next Button -->
                            <li class="page-item @if($page_number >= ceil($total_blogs / $page_length)) disabled @endif">
                                <a class="page-link" href="/?page={{ $page_number + 1 }}"> Next </a>
                            </li>
                        </ul>
                    </nav>
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
