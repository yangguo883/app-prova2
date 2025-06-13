<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>

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

    {{-- Messaggio di errore personalizzato (es. login fallito) --}}
    @if(session('error'))
        <p style="color:red">{{ session('error') }}</p>
    @endif

    <form method="POST" action="/login">
        @csrf
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <button type="submit">Login</button>
    </form>
    <a href="/register">Non hai un account? Registrati</a>
</body>
</html>
