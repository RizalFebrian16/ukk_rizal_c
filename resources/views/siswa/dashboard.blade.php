<h1>Dashboard Siswa</h1>
    <a href="{{ route('siswa.books') }}" class="btn btn-primary">
    Daftar Buku
</a>

<a href="/siswa/transactions" class="btn btn-success">
    Transaksi Saya
    <a href="{{ route('logout') }}" onclick="return confirm('Logout?')">
    Logout
</a>
</a>
</a>
<p>Selamat datang, {{ auth()->user()->name }}</p>