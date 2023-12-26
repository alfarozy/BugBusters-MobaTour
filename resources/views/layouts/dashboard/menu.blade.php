<a href="{{ route('dashboard.index.admin') }}"
    class="flex items-center text-white hover:opacity-100 py-4 pl-6 nav-item {{ request()->routeIs('dashboard.index.admin') ? 'active-nav-link' : 'opacity-75' }}">
    <i class="fas fa-tachometer-alt mr-3"></i>
    Dashboard
</a>
<a href="tables.html" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
    <i class="fas fa-calendar-check mr-3"></i>
    Pendaftaran Turnamen
</a>
<a href="{{ route('tournament.index') }}"
    class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
    <i class="fas fa-trophy mr-3"></i>
    Turnamen
</a>
<a href="blank.html" class="flex items-center text-white opacity-75 py-4 pl-6 nav-item">
    <i class="fas fa-users mr-3"></i>
    Member
</a>
<a href="{{ route('admin.index') }}"
    class="flex items-center text-white py-4 pl-6 nav-item {{ request()->routeIs('admin.*') ? 'active-nav-link' : 'opacity-75' }}">
    <i class="fas fa-user-shield mr-3"></i>
    Admin
</a>
<hr>
<a href="{{ route('logout.admin') }}" class="flex items-center opacity-75 text-white py-4 pl-6 nav-item">
    <i class="fas fa-sign-out-alt mr-3"></i>
    Logout
</a>
