<!--sidebar-menu-->
<div id="sidebar"><a href="{{ asset('/admin/admin_index') }}" class="visible-phone">
        <i class="icon icon-home"></i> Main Page</a>
    <ul>
        <li class="active"><a href="{{ asset('/admin/admin_index') }}"><i class="icon icon-home"></i> <span>Главная</span></a> </li>
        <li class="submenu"> <a href="#"><i class="icon icon-th"></i> <span>Категории</span></a>
            <ul>
                <li><a href="{{ asset('/admin/category/create') }}">Создать категории</a></li>
                <li><a href="{{ asset('/admin/category/index') }}">Все категории</a></li>
            </ul>
        </li>
        <li class="submenu"> <a href="#"><i class="icon icon-th"></i> <span>Продукция</span></a>
            <ul>
                <li><a href="{{ asset('/admin/products/create') }}">Создать продукция</a></li>
                <li><a href="{{ asset('/admin/products/index') }}">Все продукция</a></li>
            </ul>
        </li>
        <li class="submenu"> <a href="#"><i class="icon icon-th"></i> <span>Новости</span></a>
            <ul>
                <li><a href="{{ asset('/admin/news/news-create') }}">Создать новость</a></li>
                <li><a href="{{ asset('/admin/news/news-index') }}">Все Новости</a></li>
            </ul>
        </li>
        <li class="submenu"> <a href="#"><i class="icon-calendar"></i> <span>Заказы</span></a>
            <ul>
                <li><a href="{{ asset('/admin/orders/orders') }}">Все заказы</a></li>
            </ul>
        </li>
        <li class="submenu"> <a href=""><i class="icon-pencil"></i> <span>Email уведомления</span></a>
            <ul>
                <li><a href="{{ asset('/admin/email/index') }}">Email уведомления</a></li>
            </ul>
        </li>
    </ul>
</div>
<!--sidebar-menu-->
