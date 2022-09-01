@extends('layouts.index')

@section('content')

    <h3>Filial yaratish sahifasi</h3>

    <form action="{{ route('filial.store') }}" method="post" class="form-control">
        @csrf
        <input type="text" name="name" id="" class="form-control m-2" placeholder="Filial nomini kiriting:">
        <input type="text" name="description" id="" class="form-control m-2" placeholder="Filial malumot kiriting:">
        <button class="btn btn-primary m-2">Saqlash</button>
    </form>

@endsection