<!DOCTYPE html>
<html>
<head><title>Login — Admin</title>
<style>body{font-family:sans-serif;background:#1a1a2e;color:#fff;display:flex;justify-content:center;align-items:center;height:100vh;margin:0}form{background:#16213e;padding:2rem;border-radius:12px;width:320px}input{width:100%;padding:.6rem;margin:.4rem 0;border:none;border-radius:6px}button{width:100%;padding:.7rem;background:#e94560;color:#fff;border:none;border-radius:6px;cursor:pointer}</style>
</head>
<body>
<form method="POST" action="{{ route('login.post') }}">
@csrf
<h2>Admin Login</h2>
<input type="email" name="email" placeholder="Email" required>
<input type="password" name="password" placeholder="Password" required>
<button>Login</button>
@if(session('err'))<p style="color:#ff6b6b;font-size:.9rem">{{session('err')}}</p>@endif
</form>
</body>
</html>
