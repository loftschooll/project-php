<!--Header-part-->
<div class="control-group normal_text">
    <a href="{{ asset('/') }}"><img src="{{ asset('img/logo.png') }}" alt="Logo" /></a>
</div>
<!--close-Header-part-->
<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
    <ul class="nav">
        <li class="">
            <a title="" href="{{ url('/admin/admin_index') }}">
                <span class="text">Главная</span>
            </a>
        </li>
        <li class="">
            <a title="" href="{{ url('/admin/settings') }}">
                <i class="icon icon-cog"></i>
                <span class="text">Setting</span>
            </a>
        </li>
        <li class="">
            <a title="" href="{{ url('/logout') }}">
                <i class="icon icon-share-alt"></i>
                <span class="text">Logout</span>
            </a>
        </li>
    </ul>
</div>
<!--close-top-Header-menu-->
