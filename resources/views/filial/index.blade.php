@extends('layouts.index')

@section('content')

    <h3>Filiallar ro'yxati sahifasi</h3>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>N</th>
                <th>Filial nomi</th>
                <th>Filial haqida malumot</th>
                <th>Amallar</th>
            </tr>
        </thead>
        <tbody>
            <?php  $i = 1; ?>
            @if(isset($filials))

                @forelse($filials as $filial)
                    <tr>
                        <th><?php  echo $i; ?></th>
                        <th>{{ $filial->name }}</th>
                        <th>{{ $filial->description }}</th>
                        <th class="d-flex justify-content-between w-25">
                            <a href="{{ route('filial.edit',$filial->id) }}" class="btn btn-success m-1">Tahrirlash</a>
                            <a href="{{ route('filial.show',$filial->id) }}" class="btn btn-success m-1">Foydalanuvchilar</a>

                            <form action="{{ route('filial.destroy',$filial->id) }}" method="post">
                                @csrf 
                                @method('delete')
                                <button class="btn btn-danger m-1">O'chirish</button>
                            </form>
                        </th>
                    </tr>
                    <?php $i++; ?>
                @empty

                @endforelse
            @endif
        </tbody>
    </table>

@endsection