@extends('layouts.index')

@section('content')
    <div class="w-100 d-flex justify-content-between">
        <h1>Sotuv Ofisi</h1>
        <a href="{{ route('karzina') }}" class="btn btn-danger m-2">Karzina</a>
    </div>
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

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Count</th>
                <th>Sotuv</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $i = 1;
            ?>
            @forelse($product as $product)
                <tr>
                    <th><?php   echo $i ?></th>
                    <th>{{ $product->name }}</th>
                    <th>{{ $product->count }}</th>
                    <th class="w-50">
                        <form action="{{ route('karzina-plus') }}" method="post" class="form-control d-flex jystify-content-between">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">

                            <div class="d-flex justify-content-between flex-row">
                                <label for="price1" class="mx-2">
                                    Tavarning past baxosi:{{ $product->past}}
                                    <input class="checkbox" type="checkbox" name="productprice" id="price1" value="{{ $product->past }}">
                                </label>
                                <label for="price2" class="mx-2">
                                    Tavarning o'rta baxosi:{{ $product->orta}}
                                    <input class="checkbox" type="checkbox" name="productprice" id="price2" value="{{ $product->orta }}">
                                </label>
                                <label for="price3" class="mx-2">
                                    Tavarning yuqori baxosi:{{ $product->yuqori}}
                                    <input class="checkbox" type="checkbox" name="productprice" id="price3" value="{{ $product->yuqori }}">
                                </label>
                            </div>

                            <input type="text" name="count" id="" class="form-control w-25 m-1" placeholder="Tavar soni:">
                            <button class="btn btn-primary m-1"><i class="bi bi-plus"></i></button>
                        </form>
                    </th>
                    <?php  $i++; ?> 
                </tr>  
            @empty
            @endforelse
        </tbody>
    </table>

@endsection