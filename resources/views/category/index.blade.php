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
                            <a href="{{ route('category.edit',$category->id) }}" class="btn btn-success m-1">Tahrirlash</a>
                            <form action="{{ route('category.destroy',$category->id) }}" method="post">
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