<!DOCTYPE html>
<html lang="en">

@include('partials.head')

<body>
    <div class="adminx-container">
        @include('partials.navbar')
        @include('partials.sidebar')
            <div class="adminx-content">
                <div class="adminx-main-content">
                    <div class="container-fluid">
                        @yield('content')
                    </div>
                </div>
            </div>

    </div>
    @include('partials.script')
    @yield('script')
</body>
</html>