<!-- Langsung foreach categories yg ad, bs insert update delete, nama variabelnya categories -->

@extends('layouts.app')

@section('extra-header')
    <link rel="stylesheet" href="{{asset('css/super-admin-home.css')}}">
@stop

@section('content')

<div class="container">
    <div class="title d-flex justify-content-center">Category List</div>

    <a href="/insert-category" class="insert-button">+</a>
   
    @foreach($categories as $c)
        <div class="list-ct">
            <div class="desc"> 
                <div class="item-name">CategoryName : &nbsp;</div>
                <div class="name">{{ $c->categoryName }}</div>
            </div>
            <div class="list-button">
                <a href="/update-category/{{$c->id}}" class="btn btn-primary">Update</a>
                <form method="post" action="/delete-category/{{$c->id}}">
                    @csrf
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    @endforeach
</div>

@stop
