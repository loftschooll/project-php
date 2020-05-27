@extends('layouts.adminLayout.admin_index')

@section('content')
    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="{{ asset('/admin/admin_index') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">News</a>
                <a href="#" class="current">Add News</a>
            </div>
            <h1>News</h1>
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
        <div class="container-fluid"><hr>
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                            <h5>Add News</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/admin/news/news-create') }}" name="add_news" id="add_news" novalidate="novalidate">
                                {{ csrf_field() }}
                                <div class="control-group">
                                    <label class="control-label">Image</label>
                                    <div class="controls">
                                        <input type="file" name="news_image" id="news_image">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">News Name</label>
                                    <div class="controls">
                                        <input type="text" name="news_name" id="news_name">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Date</label>
                                    <div class="controls">
                                        <input type="text" name="date" id="date">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Description</label>
                                    <div class="controls">
                                        <textarea type="text" name="description" id="description"></textarea>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <input type="submit" value="Add Product" class="btn btn-success">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
