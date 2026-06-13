@extends('layouts.app')

@section('content')

<h2>Laporan Tugas Selesai</h2>

<form method="GET" action="{{ route('tasks.report') }}">

    <div class="row">

        <div class="col-md-4">
            <label>Tanggal Awal</label>

            <input
                type="date"
                name="start"
                class="form-control"
                value="{{ request('start') }}">
        </div>

        <div class="col-md-4">
            <label>Tanggal Akhir</label>

            <input
                type="date"
                name="end"
                class="form-control"
                value="{{ request('end') }}">
        </div>

        <div class="col-md-4">

            <label>&nbsp;</label>

            <button
                type="submit"
                class="btn btn-primary form-control">

                Tampilkan

            </button>

        </div>

    </div>

</form>

<hr>

<table class="table table-bordered">

    <thead>
        <tr>
            <th>Judul</th>
            <th>Deadline</th>
            <th>Tanggal Selesai</th>
        </tr>
    </thead>

    <tbody>

    @forelse($tasks as $task)

        <tr>

            <td>{{ $task->title }}</td>

            <td>{{ $task->due_date }}</td>

            <td>{{ $task->completed_at }}</td>

        </tr>

    @empty

        <tr>

            <td colspan="3" class="text-center">
                Tidak ada data
            </td>

        </tr>

    @endforelse

    </tbody>

</table>

@endsection