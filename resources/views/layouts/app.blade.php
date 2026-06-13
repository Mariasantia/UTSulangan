<!DOCTYPE html>
<html>
<head>
    <title>Task Manager UTS Web II</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<style>
body{
    background: linear-gradient(
        135deg,
        #ffe4ec,
        #f3e8ff,
        #dbeafe
    );
    min-height:100vh;
}

.glass-card{
    background: rgba(255,255,255,0.6);
    backdrop-filter: blur(12px);
    border-radius:20px;
    border:none;
    box-shadow:0 8px 20px rgba(0,0,0,.08);
}

.stat-card{
    border-radius:20px;
    color:white;
    padding:20px;
}

.bg-pink{
    background:linear-gradient(135deg,#ff7eb3,#ff758c);
}

.bg-purple{
    background:linear-gradient(135deg,#8b5cf6,#6366f1);
}

.bg-blue{
    background:linear-gradient(135deg,#06b6d4,#3b82f6);
}

.navbar{
    background: rgba(255,255,255,0.7)!important;
    backdrop-filter: blur(12px);
}

.navbar-brand{
    font-weight:bold;
}

.task-card{
    border:none;
    border-radius:20px;
    transition:.3s;
}

.task-card:hover{
    transform:translateY(-4px);
}

.page-title{
    font-weight:700;
}
</style>
</head>
<body>

<nav class="navbar navbar-expand-lg mb-4 shadow-sm">
    <div class="container">

        <a class="navbar-brand" href="/">
            🎀 StudyFlow
        </a>

        <div class="ms-auto">

            <a href="{{ route('tasks.index') }}"
               class="btn btn-outline-primary me-2">
                <i class="bi bi-list-task"></i>
                Tugas
            </a>

            <a href="{{ route('tasks.dashboard') }}"
               class="btn btn-outline-warning me-2">
                <i class="bi bi-speedometer2"></i>
                Dashboard
            </a>

            <a href="{{ route('tasks.report') }}"
               class="btn btn-outline-success">
                <i class="bi bi-bar-chart"></i>
                Laporan
            </a>

        </div>

    </div>
</nav>

<div class="container mt-4">

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @yield('content')

</div>

</body>
</html>