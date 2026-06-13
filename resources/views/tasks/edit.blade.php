@extends('layouts.app')

@section('content')

<h2>Edit Tugas</h2>

<form action="{{ route('tasks.update', $task) }}" method="POST">

    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">
            Judul Tugas
        </label>

        <input
            type="text"
            name="title"
            class="form-control"
            value="{{ $task->title }}"
            required>
    </div>

    <div class="mb-3">
        <label class="form-label">
            Deskripsi
        </label>

        <textarea
            name="description"
            class="form-control"
            rows="4">{{ $task->description }}</textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">
            Deadline
        </label>

        <input
            type="date"
            name="due_date"
            class="form-control"
            value="{{ $task->due_date }}"
            required>
    </div>

    <button
        type="submit"
        class="btn btn-primary">
        Update
    </button>

    <a href="/"
       class="btn btn-secondary">
       Kembali
    </a>

</form>

@endsection