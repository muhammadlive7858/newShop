@extends('layouts.index')

@section('content')

    <h3>Kategoriyalar ro'yxati</h3>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>N</th>
                <th>Kategoriya nomi</th>
                <th>Kategoriya otasi</th>
                <th>Kategoriya malumoti</th>
                <th>Amallar</th>
            </tr>
        </thead>
        <tbody>
            <?php  $i = 1;  ?>
            @if(isset($category))
                @forelse($category as $category)
                    <tr>
                        <th><?php  echo $i; ?></th>
                        <th>{{ $category->name }}</th>
                        <th>{{ $category->parent_id }}</th>
                        <th>{{ $category->desc }}</th>
                        <th class="d-flex">
                            <a href="{{ route('category-product',$category->id) }}" class="btn btn-success m-1">Ko'rish</a>
                        </th>
                    </tr>
                    <?php  $i++; ?>
                @empty
                @endforelse
            @endif
        </tbody>
    </table>

@endsection