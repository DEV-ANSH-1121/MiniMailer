<!DOCTYPE html>
<html lang="en">
    @include('layout.head')
    <body class="sb-nav-fixed">
        @include('layout.navbar')
        <div id="layoutSidenav">
            @include('layout.sidebar')
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        @yield('content')
                    </div>
                </main>
                @include('layout.footer')
            </div>
        </div>
        @include('layout.script')
    </body>
</html>
