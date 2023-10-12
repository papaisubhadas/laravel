<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ language_direction() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    {{-- <link rel="icon" type="image/png" href="{{asset('img/favicon.png')}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('img/favicon.png')}}"> --}}
    <meta name="keyword" content="">
    <meta name="description" content="">

    <!-- Shortcut Icon -->
    <link rel="shortcut icon" href="{{ asset('frontend/image/web-favicon.png') }}" defer>
    {{-- <link rel="icon" type="image/ico" href="{{ asset('frontend/image/web-favicon.png') }}" /> --}}

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | {{ config('app.name') }}</title>

    @stack('before-styles')

    <script src="{{ asset('vendor/jquery/jquery-3.6.4.min.js') }}"></script>

    @vite(['resources/sass/app-backend.scss', 'resources/js/app-backend.js'])





    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet"  defer/>
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+Bengali+UI&display=swap" rel="stylesheet" defer/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" defer>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.css" rel="stylesheet" defer>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet" defer>
    <style>
        body {
            font-family: Ubuntu, "Noto Sans Bengali UI", Arial, Helvetica, sans-serif
        }

        .note-btn-group {
            display: -webkit-inline-box;
        }
    </style>

    @stack('after-styles')

    <x-google-analytics />

    @livewireStyles

</head>

<body>
    <!-- Sidebar -->
    @include('backend.includes.sidebar')
    <!-- /Sidebar -->

    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
        <!-- Header -->
        @include('backend.includes.header')
        <!-- /Header -->

        <div class="body flex-grow-1 px-3">
            <div class="container-lg">

                <div class="error-msg alert alert-danger" role="alert" style="display: none;"></div>
                <div class="success-msg alert alert-success" role="alert" style="display: none;"></div>
                @if(session('alert-delete'))
                    <div class="alert alert-success">
                        {{ session('alert-delete') }}
                    </div>
                @endif
                @include('flash::message')

                <!-- Errors block -->
                @include('backend.includes.errors')
                <!-- / Errors block -->

                <!-- Main content block -->
                @yield('content')
                <!-- / Main content block -->

            </div>
        </div>

        <!-- Footer block -->
        @include('backend.includes.footer')
        <!-- / Footer block -->

    </div>

    <!-- Scripts -->
    @stack('before-scripts')

    @livewireScripts

    @stack('after-scripts')


</body>

</html>
