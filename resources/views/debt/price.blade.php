@extends('layouts.index')

@section('content')
<h1>Qarz to'lash sahifasi</h1>


    <form action="{{ route('debt.update',$debt->id) }}" method="post" class="d-flex justify-content-between">
        @csrf 
        @method('PATCH')
        <h4>Summani kiriting:</h4>
        <input type="text" name="price" id="" class="form-control w-25" placeholder="Summa">
        <button class="btn btn-primary">To'lash</button>
    </form>

@endsection