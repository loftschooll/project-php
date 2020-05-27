@extends('layouts.adminLayout.admin_index')

@section('content')
    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="{{ asset('/admin/admin_index') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Categories</a>
                <a href="#" class="current">Vies Categories</a>
            </div>
            <h1>Categories</h1>
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
            <a href="{{ url('/admin/category/create') }}" class="btn btn-primary btn-mini">Create</a>
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                            <h5>View Categories</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-bordered data-table">
                                <thead>
                                <tr>
                                    <th>Category ID</th>
                                    <th>Category Name</th>
                                    <th>Category URL</th>
                                    <th>Category Description</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $category)
                                    <tr class="gradeX">
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->url }}</td>
                                        <td>{{ $category->description }}</td>
                                        <td class="center">
                                            <a href="{{ url('/admin/category/edit/' . $category->id) }}" class="btn btn-primary btn-mini">Edit</a>
                                            <a href="{{ url('/admin/category/delete/' . $category->id) }}" id="delCat" class="btn btn-danger btn-mini">Delete</a>
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
