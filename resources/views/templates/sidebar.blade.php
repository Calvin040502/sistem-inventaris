<div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions"
    aria-labelledby="offcanvasWithBothOptionsLabel">
    <div class="offcanvas-header">
        <h2 class="offcanvas-title d-none d-sm-block" style="font-weight: 700" id="offcanvas">Menu</h2>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body px-0">
        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-start" id="menu">
            @can('super admin')
                <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}" class="nav-link text-truncate">
                        <img class="home" src="{{ asset('icon/home.svg') }}" alt=""> Dashboard
                    </a>
                </li>
            @endcan
            <li class="nav-item {{ Request::is('kendaraan') ? 'active' : '' }}">
                <a href="{{ route('kendaraan') }}" class="nav-link text-truncate">
                    <img class="transportasi" src="{{ asset('icon/transportasi.svg') }}" alt="">
                    List Aset Kendaraan</a>
            </li>
            <li class="nav-item {{ Request::is('elektronik') ? 'active' : '' }}">
                <a href="{{ route('elektronik') }}" class="nav-link text-truncate">
                    <img class="elektronika" src="{{ asset('icon/elektronik.svg') }}" alt="">
                    List Aset Elektronik</a>
            </li>
            <li class="nav-item {{ Request::is('furnitur') ? 'active' : '' }}">
                <a href="{{ route('furnitur') }}" class="nav-link text-truncate">
                    <img class="furniture" src="{{ asset('icon/furnitur.svg') }}" alt="">
                    List Aset Furniture</a>
            </li>
            <li class="nav-item {{ Request::is('aksesori') ? 'active' : '' }}">
                <a href="{{ route('aksesori') }}" class="nav-link text-truncate">
                    <img class="aksesoris" src="{{ asset('icon/aksesoris.svg') }}" alt="">
                    List Aset Aksesoris</a>
            </li>
            @can('super admin')
                <li class="nav-item {{ request()->is('manage-users') ? 'active' : '' }}">
                    <a href="{{ route('manage.users') }}" class="nav-link text-truncate">
                        <img class="user" src="{{ asset('icon/user.svg') }}" alt="">
                        Manage Admin
                    </a>
                </li>
            @endcan

        </ul>
    </div>
</div>
<style>
    .offcanvas-body #menu li.nav-item {
        width: 92%;
        margin: 0 16px 10px 16px;
        display: flex;
        align-items: center;
        font-size: 20px;
        vertical-align: middle;
        transition: all 0.3s ease;
    }

    .offcanvas-body #menu li.nav-item img {
        margin-right: 10px;
        height: 24px;
        width: 24px;
        transition: all 0.3s ease;
    }

    .offcanvas-body #menu li.nav-item:hover img.home,
    .offcanvas-body #menu li.nav-item.active img.home {
        transform: scale(1.2);
        content: url('icon/homehover.svg');
        height: 28px;
        width: 28px;
    }

    .offcanvas-body #menu li.nav-item:hover img.transportasi,
    .offcanvas-body #menu li.nav-item.active img.transportasi {
        transform: scale(1.2);
        content: url('icon/transportasi-hover.svg');
        height: 28px;
        width: 28px;
    }

    .offcanvas-body #menu li.nav-item:hover img.elektronika,
    .offcanvas-body #menu li.nav-item.active img.elektronika {
        transform: scale(1.2);
        content: url('icon/elektronik-hover.svg');
    }

    .offcanvas-body #menu li.nav-item:hover img.furniture,
    .offcanvas-body #menu li.nav-item.active img.furniture {
        transform: scale(1.2);
        content: url('icon/furnitur-hover.svg');
    }

    .offcanvas-body #menu li.nav-item:hover img.aksesoris,
    .offcanvas-body #menu li.nav-item.active img.aksesoris {
        transform: scale(1.2);
        content: url('icon/aksesoris-hover.svg');
        height: 28px;
        width: 28px;
    }

    .offcanvas-body #menu li.nav-item:hover img.user,
    .offcanvas-body #menu li.nav-item.active img.user {
        transform: scale(1.2);
        content: url('icon/userhover.svg');
        height: 28px;
        width: 28px;
    }

    .offcanvas-body #menu li.nav-item a.nav-link {
        color: #8ba8d9;
        width: 355px;
        display: flex;
        align-items: center;
        padding-left: 8px;
        transition: all 0.3s ease;
        height: 55px;
    }

    .offcanvas-body #menu li.nav-item a.nav-link:hover,
    .offcanvas-body #menu li.nav-item.active a.nav-link {
        background-color: #EDD9EB;
        color: #0A58CA;
        transition: all 0.3s ease;
        width: 355px;
    }
</style>
