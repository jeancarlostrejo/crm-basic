<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRM DESDE CERO</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    {{-- AdminLTE --}}
    <link rel="stylesheet" href="{{ asset('/css/plugins/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/adminlte.min.css') }}">

    {{-- Bootstrap 5 --}}
    <link rel="stylesheet" href="{{ asset('/css/plugins/css/bootstrap.min.css') }}">

    {{-- Datatables --}}
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap5.min.css') }}">

    {{-- Flatpckr --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    {{-- Select2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        @include('layouts.partials.header')

        @include('layouts.partials.sidebar')

        <div class="content-wrapper">
            @yield('content')
        </div>

        @include('layouts.partials.footer')
    </div>

    <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>

    {{-- JQuery --}}
    <script src="{{ asset('js/plugins/jquery.min.js') }}"></script>

    {{-- Bootstrap5 --}}
    <script src="{{ asset('js/plugins/bootstrap.bundle.js') }}"></script>

    {{-- AdminLte --}}
    <script src="{{ asset('js/adminlte.min.js') }}"></script>

    {{-- Datatables --}}
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap5.js') }}"></script>

    {{-- flatpickr --}}
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://npmcdn.com/flatpickr/dist/l10n/es.js"></script>

    {{-- Select2 --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            flatpickr(".date", {
                "locale": "es"
            });
            $('.select2').select2();
        })
    </script>
    @yield('scripts')
</body>

</html>
