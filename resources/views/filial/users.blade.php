@extends('layouts.index')

@section('content')

    <h3>Filiallar ro'yxati sahifasi</h3>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>№</th>
                <th>Foydalanuvchi Nomi</th>
                <th>Foydalanuvchi Email</th>

                <th>Amallar</th>
            </tr>
        </thead>
        <tbody>
            <?php  $i = 1; ?>
            @if(isset($users))

                @forelse($users as $users)
                    <tr>
                        <th><?php  echo $i; ?></th>
                        <th>{{ $users->name }}</th>
                        <th>{{ $users->email }}</th>

                        <th>
                            <form action="{{ route('users-destroy',$users->id) }}" method="post">
                                @csrf 
                                <button class="btn btn-danger">O'chirish</button>
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