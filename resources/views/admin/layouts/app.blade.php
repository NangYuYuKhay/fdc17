<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>@yield('title')</title>
        <link href="https://unpkg.com/simple-datatables@7.1.2/dist/style.css" rel="stylesheet">
        <link href="{{ asset('storage/sb-admin5/css/styles.css') }}" rel="stylesheet" />
        <link href="{{ asset('storage/toastify/toastify.css') }}" rel="stylesheet" />
        @yield('style')
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net">

    </head>
    <body class="sb-nav-fixed">

        <!-- top bar -->
        @include('admin.layouts.topbar')
        <!-- end top bar -->

        <div id="layoutSidenav">

            <!-- side bar -->
            @include('admin.layouts.sidebar')
            <!-- end side bar -->

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <ol class="breadcrumb my-4">
                            <li class="breadcrumb-item active">@yield('header')</li>
                        </ol>
                        <div class="row">
                            <div class="col-md-12">
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script> -->
        <script src="https://code.jquery.com/jquery-4.0.0.min.js" integrity="sha256-OaVG6prZf4v69dPg6PhVattBXkcOWQB62pdZ3ORyrao=" crossorigin="anonymous"></script>
        <script src="{{ asset('storage/sb-admin5/js/scripts.js') }}"></script>
        <script src="{{ asset('storage/toastify/toastify.js') }}"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        @yield('script')
    </body>
</html>
