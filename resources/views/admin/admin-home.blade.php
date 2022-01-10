<!-- bkin dropdown None, sama category yg ada, kalo None, variablenya isinya all ticket -->
<!-- kalo dropodownnya dipilih categorynya, variablenya sesuai category yg ad -->

<!-- bikin juga dropdown buat status, pake nama variable status -->

<!-- nama variable ticketnya: tickets -->
<!-- input name dropdownnnya pake categoryName -->

<!-- button detailnya jadiin progress, baru nnti jadi detail -->

<!-- bikin 2 jenis button, 'Detail', 'Progress' -->
<!-- kalo statusnya lagi waiting, buttonnya Progress, lalu nnt pas panggil route bawa /detail-tickets/waiting -->
<!-- kalo sattusnya udh on progress, buttonnya Detail, ini parse /detail-tickets/on progress biasa -->

<!-- viewny kolom pertama kasi statusny y, lg waiting, on progress, ato udh closed -->

@extends('layouts.app')

@section('extra-header')
<link rel="stylesheet" href="{{asset('css/admin-home.css')}}">
@stop

@section('content')

<div class="container">
<div class="container">

    <div class="list-sort">
        <div class="sort-item">
            <div class="list-desc"> Sort By Category :&nbsp;</div>
            <select onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                <option value="-" selected disabled hidden>{{$ccName}}</option>
                <option value="/admin-home/none/{{$cs}}">None</option>
                @foreach($categories as $cat)
                    <option value="/admin-home/{{$cat->id}}/{{$cs}}">{{$cat->categoryName}}</option>
                @endforeach
            </select>
        </div>
        <div class="sort-item">
            <div class="list-desc"> Sort By Status :&nbsp;</div>
            <select onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                <option value="-" selected disabled hidden>{{$cs}}</option>
                <option value="/admin-home/{{$cc}}/none">None</option>
                <option value="/admin-home/{{$cc}}/waiting">Waiting</option>
                <option value="/admin-home/{{$cc}}/on progress">On Progress</option>
                <option value="/admin-home/{{$cc}}/closed">Closed</option>
            </select>
        </div>
    </div>

    <div class="ticket-item">
        @foreach ($tickets as $c)
        <div class="ticket">
            <div class="list-desc">
                <div class="item-title">{{$c->title}}</div>
                <div class="item-desc">{{$c->description}}</div>
                <div class="item-status">Status : <b>{{$c->status}}</b></div>
            </div>
            <div class="list-btn">
                <a href="/detail-tickets/{{$c->id}}/{{$c->status}}" class="btn btn-primary">Detail</a>
            </div>
        </div>
        @endforeach
    </div>
</div>

@stop