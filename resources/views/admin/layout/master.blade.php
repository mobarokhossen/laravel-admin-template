<?php
/**
 * Created by PhpStorm.
 * User: Mobarok Hossen
 * Date: 12/2/2017
 * Time: 10:12 PM
 */
?>


<!DOCTYPE html>
<!--[if IE 8]>
 <html lang="en" class="ie8 no-js">
<![endif]-->
<!--[if IE 9]>
<html lang="en" class="ie9 no-js">
<![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8" />
    <title> AddAlarm | {{ isset($data['title']) ? $data['title'] : 'Admin App' }} </title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="Add Alarm " name="description" />
    <meta content="" name="author" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <script>
        window.Laravel = @php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); @endphp
    </script>
    @include('admin.partials.style')
    @stack('styles')
    <!-- END THEME LAYOUT STYLES -->
    <link rel="shortcut icon" href="favicon.ico" />
</head>

<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
    <div class="page-wrapper">
        @include('admin.partials.header')

        <div class="page-container">

        @include('admin.partials.sidebar')

            <!-- BEGIN CONTENT -->
                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">
                        <!-- BEGIN PAGE HEADER-->
                        @include('admin.partials.theme-design')

                        @include('admin.partials.breadcrumb')

                        @yield('contents')

                    </div>
                </div>

                @include('admin.partials.right-sidebar')
        </div>

        @include('admin.partials.footer')
    </div>

    @include('admin.partials.quick-nav')
    @include('admin.partials.script')
    @stack('scripts')

    <script type="text/javascript">

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>


    <style type="text/css">
        .dataTables_wrapper .dataTables_paginate .paginate_button{
            padding: 1px;
        }
        .dataTables_wrapper .dataTables_paginate .paginate_button:hover{
            background: none;
            border: 1px solid transparent;
        }
    </style>
</body>
</html>
