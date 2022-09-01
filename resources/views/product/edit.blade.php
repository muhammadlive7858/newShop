@extends('layouts.index')

@section('content')

    <h3>Tavar tahrirlash sahifasi</h3>

    @forelse($product as $product)
        <form action="{{ route('product.update',$product->id) }}" method="post" class="form-control">
            @csrf
            <input value="{{$product->name}}"  type="text" name="name" id="" class="form-control m-2" placeholder="Tavar nomini kiriting:">
            <input value="{{$product->code}}" type="text" name="code" id="" class="form-control m-2" placeholder="Tavar kodini kiriting:">
            <input value="{{$product->price}}" type="text" name="price" id="" class="form-control m-2" placeholder="Tavar asl baxosi kiriting:">
            
            <select value="{{$product->category_id}}" name="category_id" id="" class="form-control m-2">
                @if(isset($category))
                    @forelse($category as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @empty
                        <option value="#">Kategoriya mavjud emas</option>
                    @endforelse
                @endif
            </select>

            <span class="m-2">Tavar baxolari</span>
            <div class="d-flex justify-content-between">
                <input value="{{ $product->past }}" type="number" name="priceOne" id="" class="form-control m-2" placeholder="Tavar past baxosi:">
                <input value="{{ $product->orta }}" type="number" name="priceTwo" id="" class="form-control m-2" placeholder="Tavar o'rta baxosi:">
                <input value="{{ $product->yuqori }}" type="number" name="priceThree" id="" class="form-control m-2" placeholder="Tavar yuqori baxosi:">
            </div>
            <input value="{{$product->count}}" type="text" name="count" id="" class="form-control m-2" placeholder="Tavar sonini kiriting:">
            <button class="btn btn-primary m-2">Saqlash</button>
        </form>
    @empty
    @endforelse

@endsection