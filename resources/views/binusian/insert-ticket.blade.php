<!-- View buat insert ticket, name attribnya : categoryName, status, title, description -->
<!-- Untuk categorynya, foreach select option, variabelnya categories -->

<!-- name attributenya 'categoryName' -->

@extends('layouts.app')

@section('extra-header')
    <link rel="stylesheet" href="{{asset('css/insert-category.css')}}">
@stop

@section('content')

<div class="container">
    <div class="title d-flex justify-content-center">Category List</div>

    <form method="post" action="/insert-ticket">
        @csrf
        <div class="form-item">
            <label for="">Title :</label>
            <input name="title" type="text" class="input-1" placeholder="Input Title">
        </div>
        <div class="form-item">
            <label for="">Description:</label>
            <input name="description" type="text" class="input-1" placeholder="Input Description">
        </div>
        <div class="form-item">
            <label for="">Category Name :</label>
            <select name="categoryName" id="categoryName">
                @foreach($categories as $cat)
                    <option value="{{$cat->id}}">{{$cat->categoryName}}</option>
                @endforeach
            </select>
        </div>
        <div class="list-btn">
            <button type="submit" class="btn btn-primary">Insert</button>
            <a href="/binusian-home" class="btn btn-danger">Cancel</a>
        </div>  
    </form>
</div>

@stop