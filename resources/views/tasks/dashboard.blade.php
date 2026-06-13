@extends('layouts.app')

@section('content')

<h2>Dashboard Statistik</h2>

<div class="row">

    <div class="col-md-4">
        <div class="card text-bg-primary mb-3">
            <div class="card-body">
                <h5>Total Tugas</h5>
                <h2>{{ $total }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card text-bg-success mb-3">
            <div class="card-body">
                <h5>Tugas Selesai</h5>
                <h2>{{ $completed }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card text-bg-warning mb-3">
            <div class="card-body">
                <h5>Belum Selesai</h5>
                <h2>{{ $pending }}</h2>
            </div>
        </div>
    </div>

</div>

<h3 class="mt-4">Tugas Berdasarkan Deadline</h3>

<table class="table table-bordered">

    <thead>
        <tr>
            <th>Tanggal</th>
            <th>Jumlah Tugas</th>
        </tr>
    </thead>

    <tbody>

    @foreach($upcoming as $item)

    <tr>
        <td>{{ $item->due_date }}</td>
        <td>{{ $item->total }}</td>
    </tr>

    @endforeach

    </tbody>

</table>

@endsection