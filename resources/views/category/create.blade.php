@extends('layouts.index')

@section('content')

    <h3>Kategoriya yaratish sahifasi</h3>

    <form action="{{ route('category.store') }}" method="post" class="form-control">
        @csrf
        <input type="text" name="name" id="" class="form-control m-2" placeholder="Tavar nomini kiriting:">
        <select name="parent_id" id="" class="form-control m-2">
            @if(isset($category))
                <option value="">Kategoriya tanlanmagan</option>
                @forelse($category as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @empty
                @endforelse
            @endif
        </select>

        
        <input type="text" name="desc" id="" class="form-control m-2" placeholder="Kategory malumoti kiriting:">
        <button class="btn btn-primary m-2">Saqlash</button>
    </form>

@endsection