<nav class="bg-white shadow-lg fixed bottom-0 left-0 right-0 py-3 border-t">
    <div class="flex justify-around">
        <a href="{{ route('dashboard') }}"
            class="flex flex-col items-center {{ Request::is('mobile/dashboard*') ? 'text-blue-500' : 'text-gray-500' }}">
            <i class="las la-home text-2xl mb-1"></i>
            <span class="text-xs">Beranda</span>
        </a>
        <a href="{{ route('pendaftaran') }}"
            class="flex flex-col items-center {{ Request::is('mobile/pendaftaran*') ? 'text-blue-500' : 'text-gray-500' }}">
            <i class="las la-file-alt text-2xl mb-1"></i>
            <span class="text-xs">Pendaftaran</span>
        </a>
        <a href="{{ route('pengumuman') }}"
            class="flex flex-col items-center {{ Request::is('mobile/pengumuman*') ? 'text-blue-500' : 'text-gray-500' }}">
            <i class="las la-info-circle text-2xl mb-1"></i>
            <span class="text-xs">Info</span>
        </a>
        <a href="{{ route('profil') }}"
            class="flex flex-col items-center {{ Request::is('mobile/profil*') ? 'text-blue-500' : 'text-gray-500' }}">
            <i class="las la-user text-2xl mb-1"></i>
            <span class="text-xs">Profil</span>
        </a>
    </div>
</nav>
