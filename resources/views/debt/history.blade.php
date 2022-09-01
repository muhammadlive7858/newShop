@extends('layouts.index')

@section('content')

    <h3>To'lav tarixi</h3>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>N</th>
                <th>Summa</th>
                <th>Vaqti</th>
            </tr>
        </thead>
        <tbody>
            <?php  $i = 1;  ?>
            @if(isset($debthistory))
                @forelse($debthistory as $debthistory)
                    <tr>
                        <th><?php  echo $i; ?></th>
                        <th>{{ $debthistory->summa }}</th>
                        <th>{{ $debthistory->created_at }}</th>
                    </tr>
                    <?php  $i++; ?>
                @empty
                @endforelse
            @endif
        </tbody>
    </table>

@endsection