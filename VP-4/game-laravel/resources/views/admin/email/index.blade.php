@extends('layouts.adminLayout.admin_index')

@section('content')
    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="{{ asset('/admin/admin_index') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Email Admin</a>
                <a href="#" class="current">View Email</a>
            </div>
            <h1>Email Admin</h1>
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
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                            <h5>View Email Admin</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-bordered data-table">
                                <thead>
                                <tr>
                                    <th>Email Admin</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($emails as $email)
                                    <tr class="gradeX">
                                        <td>{{ $email->admin_email}}</td>
                                        <td class="center">
                                            <a href="{{ url('/admin/email/edit/' . $email->id) }}" class="btn btn-primary btn-mini">Edit</a>
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
