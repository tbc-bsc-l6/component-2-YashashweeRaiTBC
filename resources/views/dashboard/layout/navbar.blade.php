<div class="row g-0">
    <div class="col-12 g-0 pe-4 m-0" style="background: #D09683; height: 90px;">
        <nav class="navbar navbar-light" style="height: 100%; display: flex; justify-content: space-between; align-items: center; padding: 0 15px;">
            <!-- Logo -->
            <a class="navbar-brand" href="/">
                <img style="max-height: 80px; max-width: 80px;" src="/logo.png" title="Cozy Nook">
            </a>

            <!-- Login and Register Links -->
            <div class="d-flex align-items-center">
                @guest
                    <a class="me-3 text-brown" href="{{ route('show.login') }}" style="text-decoration: none; font-weight: bold;">Login</a>
                    <a class="text-brown" href="{{ route('show.register') }}" style="text-decoration: none; font-weight: bold;">Register</a>
                @endguest

                @auth 
                    <span class="border-r-2 pr-2 text-brown" style="font-family: 'Borel'; font-weight: bold; margin-top: 12px;">
                        Hi, {{ Auth::user()->name }}
                    </span>
                    <span class="mx-3 text-brown" style="font-weight: bold;">|</span> <!-- Separator -->
                    <form action="{{ route('logout') }}" method="POST" class="m-0">
                        @csrf 
                        <button class="btn" style="text-decoration: none; color: #330000; font-weight: bold;">Logout</button>
                    </form>
                @endauth

            </div>
        </nav>
    </div>

    <div class="col-12 text-center g-0 border-bottom-brown border-top-brown background-brown">
        <img class="header-image" src="/header.png" title="The main header">
    </div>
</div>
