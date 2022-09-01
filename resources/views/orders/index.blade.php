@extends('layouts.index')

@section('content')

    <h3>Tavar ro'yxati</h3>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>N</th>
                <th>Sotuv</th>
                <th>Summa</th>
                <th>Foyda</th>
                <th>Qaytim</th>
                <th>Amallar</th>
            </tr>
        </thead>
        <tbody>
            <?php  $i = 1;  ?>
            @if(isset($order))
                @forelse($order as $order)
                    <tr>
                        <th><?php  echo $i; ?></th>
                        <th>{{ $order->productsAndCounts }}</th>
                        <th>{{ $order->savdo }}</th>
                        <th class="bg-success text-white">{{ $order->foyda }} so'm</th>
                        <th class="bg-primary text-white">{{ $order->qaytimPuli }} so'm</th>
                        <th class="d-flex">
                            <a href="{{ route('order.edit',$order->id) }}" class="btn btn-success m-1">Tahrirlash</a>
                            <form action="{{ route('order.destroy',$order->id) }}" method="post">
                                @csrf
                                <button class="btn btn-danger m-1">O'chirish</button>
                            </form>
                        </th>
                    </tr>
                    <?php  $i++; ?>
                @empty
                @endforelse
            @endif
        </tbody>
    </table>

@endsection