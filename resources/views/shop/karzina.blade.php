@extends('layouts.index')

@section('content')
    <div class="w-100 d-flex justify-content-between">
        <h1>Sotuv Karzinasi</h1>
        <!-- <a href="{{ route('karzina') }}" class="btn btn-primary m-2">Karzina</a> -->
    </div>
    <form action="{{ route('shop-search') }}" class="form-control d-flex justify-content-between" method="get">
        @csrf
        <input type="text" name="product" id="" class="form-control m-1" placeholder="Tavar nomi:">
        <button class="btn btn-primary m-1">Qidirish</button>
    </form>

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
                $order_summa = 0;
            ?>
            @if(!empty($order))
                @forelse($order as $order)
                    <tr>
                        <th><?php   echo $i ?></th>
                        <th>{{ $order["name"] }}</th>
                        <th>{{ $order["count"] }}</th>
                        <th class="w-50">{{ $order["price"] }}</th>
                        <?php  $i++; ?> 
                        <?php  $order_summa = $order_summa + ($order['count'] * $order['price']); ?> 

                    </tr>  
                @empty
                @endforelse
            @endif
        </tbody>
    </table>
    <form action="{{ route('sale') }}" method="post">
        @csrf
        <div class="d-flex justify-content-between w-50 mx-auto">
            <h3>
                Umumiy savdo summasi:
            </h3>
            <h3><?php  
                
                echo $order_summa;

            ?> so'm</h3> 
        </div>
        <div class="d-flex justify-content-between w-50 mx-auto">
            <h4 clas="w-50 m-2">Karta orqali to'lav:</h4>
            <input type="number" name="card" id="" class=" w-50 form-control m-2" placeholder="Summani kiriting:">
        </div>
        <div class="d-flex justify-content-between w-50 mx-auto">
            <h4 clas="w-50 my-auto m-2">Qarzga savdo qilish:</h4>
            <input type="checkbox" name="debt_order" id="" class="p-2 m-2">
            <a href="{{ route('debt.create') }}" class="btn btn-primary p-2 m-2">Qarzdor yaratish</a>
        </div>
        <div class="d-flex justify-content-between w-50 mx-auto">
            <button  class="btn btn-primary m-2 p-2">Sotish</button>
            <a href="{{ route('return') }}" class="btn btn-danger  m-2 p-2">Bekor qilish</a>
        </div>
    </form>

@endsection