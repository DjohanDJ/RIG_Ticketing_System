<!-- ini detail ticketnya, dalamnya foreach reply di ticket itu, sama bisa reply2 -->
<!-- buat repliesnya, tinggal foreach variable replies, buat liat siapa yang kirim gitu, pake attrib messageSender nya -->
<!-- pas mau reply sesuatu, name nya pake reply -->

@extends('layouts.app')

@section('extra-header')
    <link rel="stylesheet" href="{{asset('css/detail-ticket.css')}}">
@stop

@section('content')

<div class="container">
    <div class="list-btn">
        <a href="/binusian-home" id="show-reply" class="btn btn-danger">Back</a>
    </div>
    <div class="ticket">
        <div class="list-desc">
            <div class="item-title">{{$selectedTicket->title}}</div>
            <div class="item-desc">{{$selectedTicket->description}}</div>
            <div class="item-status">Status : <b>{{$selectedTicket->status}}</b></div>
        </div>
        
    </div>

    <form method="post" action="/insert-reply/{{$selectedTicket->id}}">
        @csrf
        <div class="form-item">
            <input name="reply" type="text" class="input-1" placeholder="Input message to reply">
        </div>
        <div class="list-btn">
            <button type="submit" class="btn btn-primary">Reply</button>
        </div>  
    </form>

    <div class="title">Replies</div>

    @foreach ($replies as $r)
    <div class="reply">
        <div class="list-desc">
            <div class="reply-title">{{$r->messageSender}}</div>
            <div class="reply-desc">{{$r->messageContent}}</div>
        </div>
    </div>
    @endforeach
    
</div>

@stop