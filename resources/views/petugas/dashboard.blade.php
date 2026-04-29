<h1>Dashboard Petugas</h1>

<a href="/petugas/transactions" class="btn btn-success">
    Transaksi
</a>
 <a href="{{ route('logout') }}" onclick="return confirm('Logout?')">
    Logout
<p>Selamat datang, {{ auth()->user()->name }}</p>