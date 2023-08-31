<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="side-header">
        <a class="header-brand1" href="{{route('adminHome')}}">
            <img src="{{ asset($setting->logo) ?? asset('assets/uploads/logo.png')}}"
                 class="header-brand-img light-logo1" alt="logo">
        </a>
        <!-- LOGO -->
    </div>
    <ul class="side-menu">
        <li><h3>العناصر</h3></li>
        <li class="slide">
            <a class="side-menu__item" href="{{route('adminHome')}}">
                <i class="fa fa-home side-menu__icon"></i>
                <span class="side-menu__label">الرئيسية</span>
            </a>
        </li>
        <li class="slide">
            <a class="side-menu__item" href="{{route('admins.index')}}">
                <i class="fa fa-users side-menu__icon"></i>
                <span class="side-menu__label">المشرفين</span>
            </a>
        </li>

        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="#">
                <i class="fa fa-user-check side-menu__icon"></i>
                <span class="side-menu__label">المستخدمين</span><i class="angle fa fa-angle-left"></i>
            </a>
            <ul class="slide-menu">

                <li><a href="{{ route('userPerson.index') }}" class="slide-item">الافراد</a></li>
                <li><a href="{{ route('userCompany.index') }}" class="slide-item">الشركات</a></li>

            </ul>
        </li>

        <li class="slide">
            <a class="side-menu__item" href="{{route('driver.index')}}">
                <i class="fa fa-car side-menu__icon"></i>
                <span class="side-menu__label">السائقين</span>
            </a>
        </li>

        <li class="slide">
            <a class="side-menu__item" href="{{route('city.index')}}">
                <i class="fa fa-city side-menu__icon"></i>
                <span class="side-menu__label">المدن</span>
            </a>
        </li>

        <li class="slide">
            <a class="side-menu__item" href="{{route('warehouse.index')}}">
                <i class="fa fa-warehouse side-menu__icon"></i>
                <span class="side-menu__label">المخازن</span>
            </a>
        </li>


        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="#">
                <i class="fa fa-truck side-menu__icon"></i>
                <span class="side-menu__label">الطلبات</span><i class="angle fa fa-angle-left"></i>
            </a>
            <ul class="slide-menu">

                <li><a href="{{ route('orderNew') }}" class="slide-item">الجديدة</a></li>
                <li><a href="{{ route('orderWaiting') }}" class="slide-item">في الانتظار</a></li>
                <li><a href="{{ route('orderComplete') }}" class="slide-item">المكتملة</a></li>

            </ul>
        </li>

        <li class="slide">
            <a class="side-menu__item" href="{{route('settingIndex')}}">
                <i class="fa fa-wrench side-menu__icon"></i>
                <span class="side-menu__label">الاعدادات</span>
            </a>
        </li>

        <li class="slide">
            <a class="side-menu__item" href="{{route('admin.logout')}}">
                <i class="fa fa-lock side-menu__icon"></i>
                <span class="side-menu__label">تسجيل الخروج</span>
            </a>
        </li>

    </ul>
</aside>

