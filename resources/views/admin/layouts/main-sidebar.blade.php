<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="side-header">
        <a class="header-brand1" href="{{route('adminHome')}}">
            <img src="{{ asset($setting->dark_logo) ?? asset('assets/uploads/empty.png')}}"
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
            <a class="side-menu__item" href="{{ route('services.index') }}">
                <i class="fa fa-server side-menu__icon"></i>
                <span class="side-menu__label">الخدمات</span>
            </a>
        </li>
        <li class="slide">
            <a class="side-menu__item" href="{{ route('building.index') }}">
                <i class="fa fa-building side-menu__icon"></i>
                <span class="side-menu__label">العقارات</span>
            </a>
        </li>
        <li class="slide">
            <a class="side-menu__item" href="{{ route('about.index') }}">
                <i class="fa fa-user-check side-menu__icon"></i>
                <span class="side-menu__label">من نحن</span>
            </a>
        </li>

        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="#">
                <i class="fa fa-user-check side-menu__icon"></i>
                <span class="side-menu__label">الوظائف</span><i class="angle fa fa-angle-left"></i>
            </a>
            <ul class="slide-menu">

                <li><a href="{{ route('job.index') }}" class="slide-item">الوظائف</a></li>
                <li><a href="{{ route('jobContact.index') }}" class="slide-item">رسائل الوظائف</a></li>

            </ul>
        </li>

        <li class="slide">
            <a class="side-menu__item" href="{{ route('contact.index') }}">
                <i class="fa fa-comment side-menu__icon"></i>
                <span class="side-menu__label">الرسائل</span>
            </a>
        </li>
        <li class="slide">
            <a class="side-menu__item" href="{{ route('partners.index') }}">
                <i class="fa fa-hotel side-menu__icon"></i>
                <span class="side-menu__label">شركائنا</span>
            </a>
        </li>
        <li class="slide">
            <a class="side-menu__item" href="{{ route('request.index') }}">
                <i class="fa fa-envelope side-menu__icon"></i>
                <span class="side-menu__label">رسائل طلبات العروض</span>
            </a>
        </li>
        <li class="slide">
            <a class="side-menu__item" href="{{ route('settings.index') }}">
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


<!--        <li class="slide">-->
<!--            <a class="side-menu__item" data-toggle="slide" href="#">-->
<!--                <i class="fe fe-settings side-menu__icon"></i>-->
<!--                <span class="side-menu__label">الاعدادات</span><i class="angle fa fa-angle-left"></i>-->
<!--            </a>-->
<!--            <ul class="slide-menu">-->
<!---->
<!--                <li><a href="#" class="slide-item"> من نحن</a></li>-->
<!--                <li><a href="#" class="slide-item">الشروط و الاحكام</a></li>-->
<!--                <li><a href="#" class="slide-item">الخصوصية</a></li>-->
<!---->
<!--            </ul>-->
<!--        </li>-->

{{--        <li class="slide">--}}
{{--            <a class="side-menu__item" href="{{route('sliders.index')}}">--}}
{{--                <i class="fe fe-camera side-menu__icon"></i>--}}
{{--                <span class="side-menu__label">البانر المتحرك</span>--}}
{{--            </a>--}}
{{--        </li>--}}

{{--        <li class="slide">--}}
{{--            <a class="side-menu__item" href="{{route('users.index')}}">--}}
{{--                <i class="fe fe-user-minus side-menu__icon"></i>--}}
{{--                <span class="side-menu__label">المستخدمين</span>--}}
{{--            </a>--}}
{{--        </li>--}}

{{--        <li class="slide">--}}
{{--            <a class="side-menu__item" href="{{route('users.index')}}">--}}
{{--                <i class="fe fe-user-minus side-menu__icon"></i>--}}
{{--                <span class="side-menu__label">المواقع</span>--}}
{{--            </a>--}}
{{--        </li>--}}


