@extends('layouts.adminLayout.admin_index')

@section('content')
    <!--main-container-part-->
    <div id="content">
        <div id="content-header">
            <div id="breadcrumb">
                <a href="#" title="Go to Home" class="tip-bottom">
                    <i class="icon-home"></i> Home</a>
                <a href="#" class="current">Покупка</a>
            </div>
            <h1>Заказ #{{ $orderDetails->id }}</h1>
        </div>
        <div class="container-fluid">
            <hr>
            <div class="row-fluid">
                <div class="span6">
                    <div class="widget-box">
                        <div class="widget-title">
                            <h5>Детали покупки</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-striped table-bordered">
                                <tbody>
                                <tr>
                                    <td class="taskDesc">Дата покупки</td>
                                    <td class="taskStatus">{{ $orderDetails->created_at }}</td>
                                </tr>
                                <tr>
                                    <td class="taskDesc">Стоимость заказа</td>
                                    <td class="taskStatus">{{ $orderDetails->grand_total }} рублей</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="span6">
                    <div class="widget-box">
                        <div class="widget-title">
                            <h5>Данные покупателя</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-striped table-bordered">
                                <tbody>
                                <tr>
                                    <td class="taskDesc">Имя покупателя</td>
                                    <td class="taskStatus">{{ $orderDetails->name }}</td>
                                </tr>
                                <tr>
                                    <td class="taskDesc">Email покупателя</td>
                                    <td class="taskStatus">{{ $orderDetails->user_email }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <table id="example" class="table table-striped table-bordered" style="width: 100%">
                <thead>
                <tr>
                    <th>Название товара</th>
                    <th>Цена товара</th>
                    <th>Количество</th>
                    <th>Стоимость за товар</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orderDetails->orders as $pro)
                    <tr>
                        <td style="text-align: center;">{{ $pro->product_name }}</td>
                        <td style="text-align: center;">{{ $pro->product_price }} рублей</td>
                        <td style="text-align: center;">{{ $pro->product_qty }}</td>
                        <td style="text-align: center;">{{ $pro->product_price*$pro->product_qty }} рублей</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!--main-container-part-->
@endsection
