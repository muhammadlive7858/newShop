@extends('layouts.index')

@section('content')

    <h3>Kategoriya yaratish sahifasi</h3>

    @forelse($category as $category)
        <form action="{{ route('category.update') }}" class="post" class="form-control">
            @csrf
            <input value="{{ $category->name }}" type="text" name="name" id="" class="form-control m-2" placeholder="Tavar nomini kiriting:">
            <select value="{{ $category->parent_id }}" name="parent_id" id="" class="form-control m-2">
                @if(isset($category))
                    @forelse($category as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @empty
                        <option value="#">Kategoriya mavjud emas</option>
                    @endforelse
                @endif
            </select>

            
            <input valu="{{ $category->desc }}" type="text" name="desc" id="" class="form-control m-2" placeholder="Kategory malumoti kiriting:">
            <button class="btn btn-primary m-2">Saqlash</button>
        </form>
    @empty
        <h1>Kategoriyadagi xatolik!</h1>
    @endforelse

@endsection