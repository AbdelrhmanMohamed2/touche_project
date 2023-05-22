<!DOCTYPE html>
<html lang="en">

@include('EndUser.layouts.head')

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
    <!-- Navigation
    ==========================================-->
    @include('EndUser.layouts.navbar')
    @if (session('success'))
        <div class="alert alert-success">{{session('success')}}</div>
    @endif
    @yield('content')
    <!-- Contact Section -->
    @include('EndUser.layouts.contact')

    @include('EndUser.layouts.footer')
    @include('EndUser.layouts.scripts')
</body>

</html>
