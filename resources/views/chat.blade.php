

@extends('layouts.app')

@section('pagescript')
   <style>
        .list-group{
            overflow-y: scroll;
            height: 300px;
        }
    </style>
@stop

@section('content')
<div class="content-wrapper">
    <div class="page-header">
                    <div class="page-header-content">
                        <div class="page-title">
                            <h3><span class="text-semibold">Messenger</span></h3>
                        </div>
                    </div>

                    <div class="breadcrumb-line breadcrumb-line-component">
                        <ul class="breadcrumb">
                            <li><a href="index.html"><i class="icon-home2 position-left"></i> Home</a></li>
                            <li class="active">Conversation</li>
                        </ul>
                    </div>
                </div>
    <div class="content">
        <div class="panel panel-flat">
            <div id="app">
                <div class="panel-heading">
                            <h6 class="panel-title">Group Chat (@{{ numberOfUsers }})</h6>
                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <li><a href='' @click.prevent='deleteSession'><i class="icon-bin position-left"></i></a></li>
                                </ul>
                            </div>
                </div>
                <div class="badge badge-pill badge-primary">@{{ typing }}</div>
                <div class="panel-body">
                    <ul class="media-list chat-list content-group" v-chat-scroll>
                        <message
                            v-for="value,index in chat.message"
                            :key=value.index
                            :color= chat.color[index]
                            :user = chat.user[index]
                            :time = chat.time[index]
                            >
                            @{{ value }}
                        </message>
                    </ul>
                  <textarea class="form-control content-group" rows="3" cols="1" placeholder="Enter your message..." v-model='message' @keyup.enter='send'></textarea>

                            <div class="row">
                                <div class="col-xs-12 text-right">
                                    <button type="button" class="btn bg-teal-400 btn-labeled btn-labeled-right" v-on:click="send"><b><i class="icon-circle-right2"></i></b> Send</button>

                                </div>
                            </div>
                  <br>
                </div>
                  
            </div>
        </div>
        
	</div>
	<script src="{{ asset('js/app.js') }}"></script>
    </div>
</div>

@endsection