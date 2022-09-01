@extends('layouts.index')

@section('content')

    <form action="{{ route('plus',$id) }}" method="post" class="form-control m-2">
        @csrf
        <h4 class="m-2">Tavarga kirim soni:</h4>
        <input type="text" name="count" id="" class="form-control m-2">
        <button class="btn btn-primary m-2">Kirim</button>
    </form>

@endsection