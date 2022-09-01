@extends('layouts.index')

@section('content')

    <h3>Kategoriyadagi tavarlar ro'yxati</h3>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>N</th>
                <th>Tavar nomi</th>
                <th>Tavar kategoriyasi</th>
                <th>Tavar Asl baxosi</th>
                <th>Tavar Past baxosi</th>
                <th>Tavar O'rta baxosi</th>
                <th>Tavar Yuqori baxosi</th>
                <th>Mavjud</th>
                <th>Amallar</th>
            </tr>
        </thead>
        <tbody>
            <?php  $i = 1;  ?>
            @if(isset($products))
                @forelse($products as $product)
                    <tr>
                        <th><?php  echo $i; ?></th>
                        <th>{{ $product->name }}</th>
                        <th>{{ $product->category_id }}</th>
                        <th class="bg-success text-white">{{ $product->price }} so'm</th>
                        <th class="bg-primary text-white">{{ $product->past }} so'm</th>
                        <th class="bg-primary text-white">{{ $product->orta }} so'm</th>
                        <th class="bg-primary text-white">{{ $product->yuqori }} so'm</th>
                        <th>{{ $product->count }}</th>
                        <th class="d-flex">
                            <a href="{{ route('omborxona-kirim',$product->id) }}" class="btn btn-success m-1">Kirim</a>
                            <form action="{{ route('product.destroy',$product->id) }}" method="post">
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