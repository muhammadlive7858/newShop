@extends('layouts.index')

@section('content')

    <h3>Tavar yaratish sahifasi</h3>

    <form action="{{ route('product.store') }}" method="post" class="form-control">
        @csrf
        <input required type="text" name="name" id="" class="form-control m-2" placeholder="Tavar nomini kiriting:">
        <input required type="text" name="code" id="" class="form-control m-2" placeholder="Tavar kodini kiriting:">
        <input required type="text" name="price" id="" class="form-control m-2" placeholder="Tavar asl baxosi kiriting:">
        
        <select required name="category_id" id="" class="form-control m-2">
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
            <input required type="number" name="priceOne" id="" class="form-control m-2" placeholder="Tavar past baxosi:">
            <input required type="number" name="priceTwo" id="" class="form-control m-2" placeholder="Tavar o'rta baxosi:">
            <input required type="number" name="priceThree" id="" class="form-control m-2" placeholder="Tavar yuqori baxosi:">
        </div>
        <input required type="text" name="count" id="" class="form-control m-2" placeholder="Tavar sonini kiriting:">
        <button class="btn btn-primary m-2">Saqlash</button>
    </form>

@endsection