@extends('layouts.admin')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                {{ str_limit($msg->subject, $limit = 50, $end = '...') }}
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Accueil</a></li>
                <li><a href="{{ route('messages.index') }}">Messages</a></li>
                <li class="active">{{ str_limit($msg->subject, $limit = 20, $end = '...') }}</li>
            </ol>
        </section>


        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-3">
                    <div class="box box-solid">
                        <div class="box-header with-border">
                            <h3 class="box-title">Folders</h3>

                            <div class="box-tools">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                            class="fa fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="box-body no-padding">
                            <ul class="nav nav-pills nav-stacked">
                                <li class="active"><a href="{{ route('messages.index') }}"><i class="fa fa-inbox"></i>
                                        Inbox</a></li>
                                <li><a href="#"><i class="fa fa-envelope-o"></i> Sent</a></li>
                                <li><a href="{{ route('messages.trashed') }}"><i class="fa fa-trash-o"></i> Trash</a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Read Mail</h3>

                            <div class="box-tools pull-right">
                                <form action="{{ route('messages.trash', $msg->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-default btn-sm" title="Delete">
                                        <i class="fa fa-trash-o"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                            <div class="mailbox-read-info">
                                <h3>{{ $msg->subject }}</h3>
                                <h5>From: {{ $msg->mail }}
                                    <span class="mailbox-read-time pull-right">{{ $msg->sent_date }}</span></h5>
                            </div>
                            <!-- /.mailbox-read-info -->
                            <div class="mailbox-read-message">
                                {{ $msg->message }}
                            </div>
                            <!-- /.mailbox-read-message -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

