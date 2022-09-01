@extends('layouts.index')

@section('content')

    <h3>Qarz yaratish sahifasi</h3>

    <form action="{{ route('debt.store') }}" method="post" class="form-control">
        @csrf
        <input type="text" name="name" id="" class="form-control m-2" placeholder="Qarzdor nomini kiriting:">
        <input type="text" name="phone" id="" class="form-control m-2" placeholder="Qarzdor telefonini kiriting:">
        <input type="text" name="desc" id="" class="form-control m-2" placeholder="Qarzdor malumoti kiriting:">
        
        <input type="text" name="debt" id="" class="form-control m-2" placeholder="Qarz Summasi kiriting:">
        <button class="btn btn-primary m-2">Saqlash</button>
    </form>

@endsection