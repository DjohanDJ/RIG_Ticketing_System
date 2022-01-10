<!-- View all created ticket, lalu ad button create ticket 
(buttonnya di if, kalo 2 ticket, 
jd disable aj buttonnya wrna abu2 gt) -->

@extends('layouts.app')

@section('extra-header')
    <link rel="stylesheet" href="{{asset('css/binusian-home.css')}}">
@stop

@section('content')

<div class="container">
    @if (count($createdTickets) < 2)
        <a href="/insert-ticket" class="insert-button">+</a>
    @endif

    <div class="ticket-item">
        @foreach ($createdTickets as $c)
        <div class="ticket">
            <div class="list-desc">
                <div class="item-title">{{$c->title}}</div>
                <div class="item-desc">{{$c->description}}</div>
                <div class="item-status">Status : <b>{{$c->status}}</b></div>
            </div>
            <div class="list-btn">
                <a href="/detail-tickets/{{$c->id}}" class="btn btn-primary">Detail</a>
            </div>
        </div>
        @endforeach
    </div>
  
</div>

@stop