@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h2 class="fw-bold">🎀 Daftar Tugas</h2>
        <p class="text-muted">Kelola tugas kamu dengan lebih rapi</p>
    </div>

    <a href="{{ route('tasks.create') }}"
       class="btn btn-primary">
       ➕ Tambah Tugas
    </a>

</div>

<div class="row">

@foreach($tasks as $task)

<div class="col-md-4 mb-4">

    <div class="card task-card shadow">

        <div class="card-body">

            <h5 class="fw-bold">
                📚 {{ $task->title }}
            </h5>

            <p class="text-muted mb-2">
                <i class="bi bi-calendar-event"></i>
                {{ \Carbon\Carbon::parse($task->due_date)->format('d M Y') }}
            </p>

            @if($task->is_completed)

                <span class="badge bg-success">
                    ✔ Selesai
                </span>

            @else

                <span class="badge bg-warning text-dark">
                    ⏳ Pending
                </span>

            @endif

            <hr>

            <div class="d-flex flex-wrap gap-2">

                {{-- JIKA BELUM SELESAI --}}
                @if(!$task->is_completed)

                <a href="{{ route('tasks.edit', $task->id) }}"
                   class="btn btn-primary btn-sm">
                    ✏ Edit
                </a>

                <form action="{{ route('tasks.complete', $task->id) }}"
                      method="POST">

                    @csrf
                    @method('PATCH')

                    <button type="submit"
                            class="btn btn-success btn-sm">
                        ✔ Selesai
                    </button>

                </form>

                <form action="{{ route('tasks.destroy', $task->id) }}"
                      method="POST">

                    @csrf
                    @method('DELETE')

                    <button type="submit"
                            class="btn btn-danger btn-sm"
                            onclick="return confirm('Hapus tugas ini?')">
                        🗑 Hapus
                    </button>

                </form>

                @endif

            </div>

        </div>

    </div>

</div>

@endforeach

</div>

@endsection