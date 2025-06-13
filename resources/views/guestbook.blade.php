<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Guestbook</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container my-5">
    <div class="card shadow p-4">
        <h1 class="text-center mb-4">Guestbook</h1>

        {{-- Messaggi di conferma --}}
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- Messaggi di errore --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="/guestbook/add" class="mb-3">
            @csrf
            <div class="mb-3">
                <label for="message" class="form-label">Scrivi un messaggio</label>
                <textarea name="message" class="form-control" rows="3" placeholder="Scrivi qualcosa..." required></textarea>
            </div>
            <button type="submit" class="btn btn-success w-100">Invia</button>
        </form>

        <form method="POST" action="/logout" class="mb-4">
            @csrf
            <button type="submit" class="btn btn-outline-secondary">Logout</button>
        </form>

        <h2 class="mb-3">Messaggi</h2>
        @if ($messages->isEmpty())
            <p class="text-muted">Nessun messaggio ancora.</p>
        @else
            <ul class="list-group">
                @foreach ($messages as $msg)
                    <li class="list-group-item">
                        <strong>{{ $msg->user->name }} ({{ $msg->created_at->format('d/m/Y H:i') }}):</strong><br>
                        {{ $msg->message }}
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
