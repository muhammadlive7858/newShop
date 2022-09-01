@extends('layouts.index')

@section('content')
    <h1>Sotuv Ofisi</h1>
    <div class="d-flex justify-content-between">
        <form action="{{ route('shop-search') }}" class="form-control d-flex justify-content-between" method="get">
            @csrf
            <input type="text" name="product" id="" class="form-control m-1" placeholder="Tavar nomi:">
            <button class="btn btn-primary m-1">Qidirish</button>
        </form>
        <form action="{{ route('shop-search-code') }}" class="form-control d-flex justify-content-between" method="get">
            @csrf
            <input type="text" name="product_code" id="" class="form-control m-1" placeholder="Tavar kodi:">
            <button class="btn btn-primary m-1">Qidirish</button>
        </form>
    </div>
@endsection