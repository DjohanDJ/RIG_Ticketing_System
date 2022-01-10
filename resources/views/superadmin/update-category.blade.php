<!-- name attributenya 'categoryName', nama variablenya selectedCategory -->

@extends('layouts.app')

@section('extra-header')
    <link rel="stylesheet" href="{{asset('css/insert-category.css')}}">
@stop

@section('content')

<div class="container">
    <div class="title d-flex justify-content-center">Category List</div>

    <form method="post" action="/update-category/{{$selectedCategory->id}}">
        @csrf
        <div class="form-item">
            <label for="">Category Name :</label>
            <input name="categoryName" type="text" class="input-1" placeholder="{{$selectedCategory->categoryName}}" value="{{$selectedCategory->categoryName}}">
        </div>
        <div class="list-btn">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="/super-admin-home" class="btn btn-danger">Cancel</a>
        </div>  
    </form>
</div>

@stop