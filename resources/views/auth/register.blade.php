<!DOCTYPE html>
<html>
<head>
    <title>Registrati</title>
</head>
<body>
    <h2>Registrazione</h2>

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

    <form method="POST" action="/register">
        @csrf
        <input type="text" name="name" placeholder="nome" required><br>
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <input type="password" name="password_confirmation" placeholder="Conferma Password" required><br>
        <button type="submit">Registrati</button>
    </form>
    <a href="/login">Hai già un account? Accedi</a>
</body>
</html>
