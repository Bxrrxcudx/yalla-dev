@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Mailbox
                <small>13 new messages</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ url()->previous() }}"><i class="fa fa-dashboard"></i> Accueil</a></li>
                <li class="active">Messages</li>
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
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="box-body no-padding">
                            <ul class="nav nav-pills nav-stacked">
                                <li class="active"><a href="{{ route('messages.index') }}"><i class="fa fa-inbox"></i> Inbox
                                        <span class="label label-primary pull-right">12</span></a></li>
                                <li><a href="#"><i class="fa fa-envelope-o"></i> Sent</a></li>
                                <li><a href="{{ route('messages.trashed') }}"><i class="fa fa-trash-o"></i> Trash</a></li>
                            </ul>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Inbox</h3>
                            <!-- barre de rechercher mails
                            <div class="box-tools pull-right">
                                <div class="has-feedback">
                                    <input type="text" class="form-control input-sm" placeholder="Search Mail">
                                    <span class="glyphicon glyphicon-search form-control-feedback"></span>
                                </div>
                            </div>
                            -->
                            <!-- /.box-tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                            <div class="mailbox-controls">
                                <!-- Check all button -->
                                <!--<button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
                                </button>-->

                                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                                <!-- /.pull-right -->
                            </div>
                            <div class="table-responsive mailbox-messages">
                                <table class="table table-hover table-striped">
                                    <tbody>
                                    @foreach ($msgs as $msg)
                                        <tr>
                                            <td><input type="checkbox"></td>
                                            <td class="mailbox-subject"><b><a href="{{ route('messages.show', ['message' => $msg->id]) }}">{{ $msg->subject }}</a></b>
                                            <td class="mailbox-name">{{ $msg->first_name }} {{ $msg->last_name }}</td>
                                            </td>
                                            <td class="mailbox-date">{{ $msg->sent_date }}</td>
                                            <td class="mailbox-star">

                                                <form action="{{ route('messages.destroy', ['id' => $msg->id]) }}" method="POST">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <button type="submit" class="btn btn-default btn-sm">
                                                        <i class="fa fa-trash-o"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                                <!-- /.table -->
                            </div>
                            <!-- /.mail-box-messages -->
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer no-padding">
                            <div class="mailbox-controls">
                                <!-- Check all button -->
                                <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
                                </button>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                                </div>
                                <!-- /.btn-group -->
                                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                                <div class="pull-right">
                                    <div class="btn-group">
                                        {{ $msgs->render() }}
                                    </div>
                                    <!-- /.btn-group -->
                                </div>
                                <!-- /.pull-right -->
                            </div>
                        </div>
                    </div>
                    <!-- /. box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>


        <form action="{{ route('messages.store') }}" method="POST">
            {{ csrf_field() }}
            <div>
                <label for="last_name">Nom</label>
                <input type="text" name="last_name" id="last_name">
            </div>
            <div>
                <label for="first_name">Prénom</label>
                <input type="text" name="first_name" id="first_name">
            </div>
            <div>
                <label for="mail">E-mail</label>
                <input type="text" name="mail" id="mail">
            </div>
            <div>
                <label for="subject">Sujet</label>
                <input type="text" name="subject" id="subject">
            </div>
            <div>
                <label for="message">Message</label>
                <textarea name="message" id="message" cols="50" rows="10"></textarea>
            </div>
            <input type="submit" value="Envoyer">
        </form>

    </div>
@endsection

