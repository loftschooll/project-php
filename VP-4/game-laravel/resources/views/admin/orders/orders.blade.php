@extends('layouts.adminLayout.admin_index')

@section('content')
    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="{{ asset('/admin/admin_index') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Orders</a>
                <a href="#" class="current">View Orders</a>
            </div>
            <h1>Orders</h1>
            @if(Session::has('flash_message_error'))
                <div class="alert alert-error alert-block">
                    <button class="close" type="button" data-dismiss="alert">x</button>
                    <srtong>{!! session('flash_message_error') !!}</srtong>
                </div>
            @endif
            @if(Session::has('flash_message_success'))
                <div class="alert alert-error alert-block">
                    <button class="close" type="button" data-dismiss="alert">x</button>
                    <srtong>{!! session('flash_message_success') !!}</srtong>
                </div>
            @endif
        </div>
        <div class="container-fluid">
            <hr>
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                            <h5>View Orders</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-bordered data-table">
                                <thead>
                                <tr>
                                    <th>Заказ №</th>
                                    <th>Дата заказа</th>
                                    <th>Имя покупателя</th>
                                    <th>Email покупателя</th>
                                    <th>Купленные товары</th>
                                    <th>Стоимость заказа</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $order)
                                    <tr>
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->created_at }}</td>
                                        <td>{{ $order->name }}</td>
                                        <td>{{ $order->user_email }}</td>
                                        <td>
                                            @foreach($order->orders as $pro)
                                                {{ $pro->product_name }}
                                                ({{ $pro->product_qty }})<br>
                                            @endforeach
                                        </td>
                                        <td>{{ $order->grand_total }}</td>
                                        <td>
                                            <a href="{{ url('admin/orders/order/'.$order->id) }}" class="btn btn-success btn-mini">Подробнее</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
