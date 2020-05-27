@extends('layouts.adminLayout.admin_index')

@section('content')
    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="{{ asset('/admin/admin_index') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Products</a>
                <a href="#" class="current">View Products</a>
            </div>
            <h1>Products</h1>
            @if(Session::has('flash_message_error'))
                <div class="alert alert-error alert-block">
                    <button class="close" type="button" data-dismiss="alert">x</button>
                    <srtong>{!! session('flash_message_error') !!}</srtong>
                </div>
            @endif
            @if(Session::has('flash_message_success'))
                <div class="alert alert-success alert-block">
                    <button class="close" type="button" data-dismiss="alert">x</button>
                    <srtong>{!! session('flash_message_success') !!}</srtong>
                </div>
            @endif
        </div>
        <div class="container-fluid">
            <hr>
            <a href="{{ url('/admin/products/create') }}" class="btn btn-primary btn-mini">Create</a>
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                            <h5>View Products</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-bordered data-table">
                                <thead>
                                <tr>
                                    <th>Product ID</th>
                                    <th>Product Image</th>
                                    <th>Product Name</th>
                                    <th>Product Description</th>
                                    <th>Product category</th>
                                    <th>Category Name</th>
                                    <th>Product price</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr class="gradeX">
                                        <td>{{ $product->id }}</td>
                                        <td>
                                            @if(!empty($product->image))
                                                <img src="{{ asset('/img/products/small/'.$product->image) }}" />
                                            @endif
                                        </td>
                                        <td>{{ $product->product_name }}</td>
                                        <td>{{ $product->description }}</td>
                                        <td>{{ $product->category_id }}</td>
                                        <td>{{ $product->category_name }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td class="center">
                                            <a href="{{ url('/admin/products/edit/' . $product->id) }}" class="btn btn-primary btn-mini">Edit</a>
                                            <a href="{{ url('/admin/products/delete/' . $product->id) }}" id="delCat" class="btn btn-danger btn-mini">Delete</a>
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
