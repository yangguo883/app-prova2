<!DOCTYPE html>
<html>
<head>
    <title>Guestbook</title>
</head>
<body>
    <h1>Guestbook</h1>

    {{-- Messaggi di conferma --}}
    @if(session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif

    {{-- Messaggi di errore --}}
    @if ($errors->any())
        <div style="color:red">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="/guestbook/add">
        @csrf
        <textarea name="message" placeholder="Scrivi un messaggio..." required></textarea><br>
        <button type="submit">Invia</button>
    </form>

    <form method="POST" action="/logout">
        @csrf
        <button type="submit">Logout</button>
    </form>

    <h2>Messaggi:</h2>
    <ul>
        @foreach ($messages as $msg)
            <li>
                <strong>{{ $msg->user->name }} ({{ $msg->created_at->format('d/m/Y H:i') }}):</strong> {{ $msg->message }}
            </li>
        @endforeach
    </ul>
</body>
</html>
