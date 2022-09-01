@extends('layouts.index')

@section('content')

    <h3>Tavar ro'yxati</h3>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>N</th>
                <th>Qarzdor nomi</th>
                <th>Qarzdor telefoni</th>
                <th>Qarzdor Malumot</th>
                <th>Umumiy qarz summasi</th>
                <th>Hozirgi qarzi</th>
                <th>Amallar</th>
            </tr>
        </thead>
        <tbody>
            <?php  $i = 1;  ?>
            @if(isset($debts))
                @forelse($debts as $debt)
                    <tr>
                        <th><?php  echo $i; ?></th>
                        <th>{{ $debt->name }}</th>
                        <th>{{ $debt->phone }}</th>
                        <th class="bg-success text-white">{{ $debt->desc }}</th>
                        <th class="bg-primary text-white">{{ $debt->generalDebt }} so'm</th>
                        <th class="bg-primary text-white">{{ $debt->debt }} so'm</th>
                        <th class="d-flex">
                            <a href="{{ route('debt.edit',$debt->id) }}" class="btn btn-success m-1">To'lash</a>
                            <a href="{{ route('history-debt',$debt->id) }}" class="btn btn-primary m-1">To'lav tarixi</a>
                            <form action="{{ route('debt.destroy',$debt->id) }}" method="post">
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