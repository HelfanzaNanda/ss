<div class="main-menu menu-fixed menu-accordion menu-shadow menu-light" data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" navigation-header"><span>General</span><i class=" feather icon-minus" data-toggle="tooltip" data-placement="right" data-original-title="General"></i>
            </li>

            <li class="nav-item {{Request::is('travel/tdashboard') ? 'active' : '' }}"><a href="{{route('tdashboard.index')}}"><i class="fa fa-th"></i><span class="menu-title" data-i18n="Email Application">Dashboard</span></a>
            </li>
            <li class=" nav-item"><a href="#"><i class="fa fa-first-order"></i><span class="menu-title">Booking</span></a>
                <ul class="menu-content">
                    <li class="{{Request::is('travel/booking-notconfirmed') ? 'active' : '' }}"><a class="menu-item" href="{{route('booking-notconfirmed.index')}}" data-i18n="Flat">Belum Konfirmasi</a>
                    </li>
                    <li class="{{Request::is('travel/booking-confirmed') ? 'active' : '' }}"><a class="menu-item" href="{{route('booking-confirmed.index')}}" data-i18n="Bg image">Sudah Konfirmasi</a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item {{Request::is('travel/driver') ? 'active' : '' }}"><a href="{{route('driver.index')}}"><i class="fa fa-user"></i><span class="menu-title" data-i18n="Email Application">Driver</span></a>
            </li>
            <li class=" nav-item {{Request::is('travel/car') ? 'active' : '' }}"><a href="{{route('car.index')}}"><i class="fa fa-car"></i><span class="menu-title" data-i18n="Email Application">Mobil</span></a>
            </li>
        </ul>
    </div>
</div>