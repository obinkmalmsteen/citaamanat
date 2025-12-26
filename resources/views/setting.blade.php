@extends('layouts/app')

@section('content')
<h1 class="h3 mb-4 text-gray-800">
    <i class="fas fa-tachometer-alt mr-2"></i>
    Settings
</h1>

<div class="row">
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card shadow h-100 py-3">
            <div class="card-body">

                <h6 class="text-uppercase text-muted mb-2">Status Registrasi Masjid</h6>

                {{-- STATUS --}}
                @if ($registrationActive === 1)
                    <span class="badge badge-success mb-3 d-inline-block">
                        AKTIF
                    </span>
                @else
                    <span class="badge badge-danger mb-3 d-inline-block">
                        NONAKTIF
                    </span>
                @endif

                {{-- TOMBOL --}}
                <form method="POST" action="{{ route('admin.toggle.registration') }}">
                    @csrf
                    <button class="btn {{ $registrationActive ? 'btn-danger' : 'btn-success' }}">
                        {{ $registrationActive ? 'Matikan Registrasi' : 'Aktifkan Registrasi' }}
                    </button>
                </form>

            </div>
        </div>
    </div>


<div class="col-xl-4 col-md-6 mb-4">
    <div class="card shadow h-100 py-3">
        <div class="card-body">

            <h6 class="text-uppercase text-muted mb-2">
                Toggle Mobile / Web View
            </h6>

            {{-- STATUS --}}
            @if ((int) $mobileActive === 1)
                <span class="badge badge-success mb-3 d-inline-block">
                    AKTIF
                </span>
            @else
                <span class="badge badge-danger mb-3 d-inline-block">
                    NONAKTIF
                </span>
            @endif

            {{-- TOMBOL --}}
            <form method="POST" action="{{ route('admin.toggle.mobile') }}">
                @csrf

                <button type="submit"
                    class="btn {{ (int) $mobileActive === 1 ? 'btn-danger' : 'btn-success' }}">
                    {{ (int) $mobileActive === 1
                        ? 'Matikan Mobile View'
                        : 'Aktifkan Mobile View' }}
                </button>
            </form>

        </div>
    </div>
</div>





</div>
@endsection

