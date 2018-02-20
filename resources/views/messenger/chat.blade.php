

@extends('layouts.app')

@section('pagescript')
   <style>
        .media-list{
            overflow-y: scroll;
            height: 350px;
        }
    </style>
@stop

@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                 <h3><span class="text-semibold">Chatroom</span></h3>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-component">
            <ul class="breadcrumb">
                <li><a href="/home"><i class="icon-home2 position-left"></i> Home</a></li>
                <li class="active">Chatroom</li>
            </ul>
        </div>
    </div>
    <div class="content">
        <div class="panel panel-flat">
            <div id="app">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6 col-xs-6">
                            <h6 class="panel-title">Conversation</h6>
                        </div>
                        <div class="col-md-6 col-xs-6">
                            <div style="text-align: right">
                                <span class="label bg-teal">@{{ numberOfUsers }}</span> &nbsp;online
                                <!-- <ul class="icons-list">
                                    <li><a href=''@click.prevent='deleteSession'><i class="icon-bin position-left"></i></a></li>
                                </ul> -->
                            </div>
                        </div>
                    </div>
                    <hr>       
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
                  <input type="text" class="form-control" placeholder="Type your message here..." v-model='message' @keyup.enter='send'>
                  <br>
                  <div class="row">
                        <div class="col-xs-6">
                        </div>
                        <div class="col-xs-6 text-right">
                            <button type="button" class="btn bg-teal btn-labeled btn-labeled-right" v-on:click="send"><b><i class="icon-paperplane" ></i></b> Send</button>
                        </div>
                </div>
                </div>
                  
            </div>
        </div>
        
	</div>
    @include('layouts.footer')
	<script src="{{ asset('js/app.js') }}"></script>
    </div>
</div>

@endsection