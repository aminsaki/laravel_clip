@extends('layouts.admin')

@section('content')
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6" height="0" width="0" style="display:none;visibility:hidden"></iframe>
    </noscript>
    <div class="wrapper"  id="app" >
     @include('Cpanel.templates.sidebar')
        <div class="main-panel"  >
            <!-- Navbar -->
            {{--@include('Cpanel.templates.navbar')--}}
            <!-- End Navbar -->
            <div class="content">
                <router-view></router-view>
            </div>
{{--            @include('Cpanel.templates.footer')--}}

        </div>
    </div>

@endsection()