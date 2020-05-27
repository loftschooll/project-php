@extends('layouts.adminLayout.admin_index')

@section('content')
    <!--main-container-part-->
    <div id="content">
        <!--breadcrumbs-->
        <div id="content-header">
            <div id="breadcrumb"> <a href="{{ asset('/admin/admin_index') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
        </div>
        <!--End-breadcrumbs-->

        <!--Action boxes-->
        <div class="container-fluid">
            <div class="quick-actions_homepage">
                <ul class="quick-actions">
                    <li class="bg_lb"> <a href="{{ asset('/admin/admin_index') }}"> <i class="icon-dashboard"></i>Главная </a> </li>
                    <li class="bg_ly"> <a href="{{ asset('/admin/category/index') }}"> <i class="icon-th"></i> Категории </a> </li>
                    <li class="bg_lo"> <a href="{{ asset('/admin/products/index') }}"> <i class="icon-th"></i> Продукция</a> </li>
                    <li class="bg_lo"> <a href="{{ asset('/admin/news/news-index') }}"> <i class="icon-th"></i> Новости</a> </li>
                    <li class="bg_lg"> <a href="{{ asset('/admin/orders/orders') }}"> <i class="icon-calendar"></i> Заказы</a> </li>
                    <li class="bg_lb"> <a href="{{ asset('/admin/email/index') }}"> <i class="icon-pencil"></i>Email отправления</a> </li>
                </ul>
            </div>

        </div>
    </div>

    <!--end-main-container-part-->
@endsection
