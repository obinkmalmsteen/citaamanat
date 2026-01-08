

{{-- start slider popup kiri --}}
        <div class="filter">
        <button class="btn btn-default filter-btn shadow"><i class="material-icons">filter_list</i></button>
        <div class="container filters-container">
            
           {{-- FULL BLEED BACKGROUND --}}
            <div class="mobile-menu-full">
                <div class="mobile-menu-inner">
                    <div class="mobile-menu-grid">

                        @foreach ($mobileMenus as $menu)

                            @php
                                // Cek apakah route butuh login
                                $route = $menu['route'];
                                $needsLogin = in_array($route, [
                                    'mobilerequesttoken',
                                    'mobileprofile', // ⬅️ tambahkan di sini
                                ]);
                                // tambah route lain jika perlu

                                // Tentukan link
                                $href = $needsLogin
                                    ? (Auth::check()
                                        ? route($route)
                                        : route('mobile.login'))
                                    : (Route::has($route)
                                        ? route($route)
                                        : '#');
                            @endphp


                        @php
    $isActive = request()->routeIs($menu['route']);
@endphp
                            <a href="{{ $href }}" class="mobile-menu-item {{ $isActive ? 'active' : '' }}">

                                <div class="menu-icon">
                                    <span class="material-symbols-outlined">{{ $menu['icon'] }}</span>
                                </div>

                                <span class="menu-label">
                                    {{ $menu['label'] }}
                                </span>

                            </a>
                        @endforeach

                    </div>
                </div>
            </div>

            {{-- end menu icon --}}
           
           
           

            

        </div>
    </div>

{{-- end slider popup kiri --}}



{{-- <a href="{{ $href }}"
   class="mobile-menu-item {{ $isActive ? 'active' : '' }}"> --}}