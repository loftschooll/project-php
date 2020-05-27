@extends('layouts.adminLayout.admin_index')

@section('content')
    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="{{ asset('/admin/admin_index') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">News</a>
                <a href="#" class="current">View News</a>
            </div>
            <h1>News</h1>
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
            <a href="{{ url('/admin/news/news-create') }}" class="btn btn-primary btn-mini">Create</a>
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                            <h5>View News</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-bordered data-table">
                                <thead>
                                <tr>
                                    <th>News ID</th>
                                    <th>News Image</th>
                                    <th>News Name</th>
                                    <th>News Description</th>
                                    <th>News Date</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($news as $article)
                                    <tr class="gradeX">
                                        <td>{{ $article->id }}</td>
                                        <td>
                                            @if(!empty($article->news_image))
                                                <img src="{{ asset('/img/news/small/'.$article->news_image) }}" />
                                            @endif
                                        </td>
                                        <td>{{ $article->news_name }}</td>
                                        <td>{{ $article->description }}</td>
                                        <td>{{ $article->date }}</td>
                                        <td class="center">
                                            <a href="{{ url('/admin/news/news-edit/' . $article->id) }}" class="btn btn-primary btn-mini">Edit</a>
                                            <a href="{{ url('/admin/news/news-delete/' . $article->id) }}" id="delCat" class="btn btn-danger btn-mini">Delete</a>
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
