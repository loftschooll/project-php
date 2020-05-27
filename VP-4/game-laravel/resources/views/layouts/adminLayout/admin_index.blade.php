<!DOCTYPE html>
<html lang="en">
<head>
    <title>Matrix Admin</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('css/backend/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/backend/bootstrap-responsive.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/backend/fullcalendar.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/backend/matrix-style.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/backend/matrix-media.css') }}" />
    <link href="{{ asset('fonts/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/backend/jquery.gritter.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/admin-css.css') }}">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

<!--top-Header-menu-->
@include('layouts.adminLayout.admin_header')
<!--close-top-Header-menu-->

<!--sidebar-menu-->
@include('layouts.adminLayout.admin_sidebar')
<!--sidebar-menu-->

<!--main-container-part-->
@yield('content')
<!--end-main-container-part-->

<!--Footer-part-->
@include('layouts.adminLayout.admin_footer')
<!--end-Footer-part-->

<script src="{{ asset('js/backend/excanvas.min.js') }}"></script>
<script src="{{ asset('js/backend/jquery.min.js') }}"></script>
<script src="{{ asset('js/backend/jquery.ui.custom.js') }}"></script>
<script src="{{ asset('js/backend/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/backend/jquery.flot.min.js') }}"></script>
<script src="{{ asset('js/backend/jquery.flot.resize.min.js') }}"></script>
<script src="{{ asset('js/backend/jquery.peity.min.js') }}"></script>
<script src="{{ asset('js/backend/fullcalendar.min.js') }}"></script>
<script src="{{ asset('js/backend/matrix.js') }}"></script>
<script src="{{ asset('js/backend/matrix.dashboard.js') }}"></script>
<script src="{{ asset('js/backend/jquery.gritter.min.js') }}"></script>
<script src="{{ asset('js/backend/matrix.interface.js') }}"></script>
<script src="{{ asset('js/backend/matrix.chat.js') }}"></script>
<script src="{{ asset('js/backend/jquery.validate.js') }}"></script>
<script src="{{ asset('js/backend/matrix.form_validation.js') }}"></script>
<script src="{{ asset('js/backend/jquery.wizard.js') }}"></script>
<script src="{{ asset('js/backend/jquery.uniform.js') }}"></script>
<script src="{{ asset('js/backend/select2.min.js') }}"></script>
<script src="{{ asset('js/backend/matrix.popover.js') }}"></script>
<script src="{{ asset('js/backend/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/backend/matrix.tables.js') }}"></script>

<script type="text/javascript">
    // This function is called from the pop-up menus to transfer to
    // a different page. Ignore if the value returned is a null string:
    function goPage (newURL) {

        // if url is empty, skip the menu dividers and reset the menu selection to default
        if (newURL != "") {

            // if url is "-", it is this page -- reset the menu:
            if (newURL == "-" ) {
                resetMenu();
            }
            // else, send page to designated URL
            else {
                document.location.href = newURL;
            }
        }
    }

    // resets the menu selection upon entry to this page:
    function resetMenu() {
        document.gomenu.selector.selectedIndex = 2;
    }
</script>
</body>
</html>
