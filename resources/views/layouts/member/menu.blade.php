<a href="{{ route('dashboard.index') }}"
    class="flex items-center text-white hover:opacity-100 py-4 pl-6 nav-item {{ request()->routeIs('dashboard.index') ? 'active-nav-link' : 'opacity-75' }}">
    <i class="fas fa-tachometer-alt mr-3"></i>
    Dashboard
</a>
<a href="blank.html" class="flex items-center text-white py-4 pl-6 nav-item">
    <i class="fas fa-trophy mr-3"></i>
    Tournamen saya
</a>
<a href="forms.html" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
    <i class="fas fa-table mr-3"></i>
    History transaksi
</a>
<a href="{{ route('logout') }}" class="flex items-center opacity-75 text-white py-4 pl-6 nav-item">
    <i class="fas fa-sign-out-alt mr-3"></i>
    Logout
</a>
