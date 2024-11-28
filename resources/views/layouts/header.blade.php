<nav class="navbar">

<div class="d-flex">
<button type="button" class="btn btn-link d-none d-xl-block sidebar-mini-btn p-0 text-primary">
<span class="hamburger-icon">
<span class="line"></span>
<span class="line"></span>
<span class="line"></span>
</span>
</button>
<button type="button" class="btn btn-link d-block d-xl-none menu-toggle p-0 text-primary">
<span class="hamburger-icon">
<span class="line"></span>
<span class="line"></span>
<span class="line"></span>
</span>
</button>
<a href="{{ route('dashboard') }}" class="brand-icon d-flex align-items-center mx-2 mx-sm-3 text-primary">
    <img src="{{ asset('storage/uploads/' . $settings->header_logo) }}" alt="Brand Icon" height="22">
</a>

</div>
<!--search-->
<div class="header-left flex-grow-1 d-none d-md-block">
<div class="main-search px-3 flex-fill">
<input class="form-control" type="text" placeholder="Enter your search key word">
<div class="card shadow rounded-4 search-result slidedown">
<div class="card-body">
<small class="text-uppercase text-muted">Recent searches</small>
<div class="d-flex flex-wrap align-items-start mt-2 mb-4">
<a class="small rounded py-1 px-2 m-1 fw-normal bg-primary text-white" href="#">HRMS Admin</a>
<a class="small rounded py-1 px-2 m-1 fw-normal bg-secondary text-white" href="#">Hospital Admin</a>
<a class="small rounded py-1 px-2 m-1 fw-normal bg-info text-white" href="./app-project.html">Project</a>
<a class="small rounded py-1 px-2 m-1 fw-normal bg-dark text-white" href="./app-social.html">Social App</a>
<a class="small rounded py-1 px-2 m-1 fw-normal bg-danger text-white" href="#">University Admin</a>
</div>
<small class="text-uppercase text-muted">Suggestions</small>
<div class="card list-group list-group-flush list-group-custom mt-2">
<a class="list-group-item list-group-item-action text-truncate" href=".//docs/doc-helperclass.html">
<div class="fw-bold">Helper Class</div>
<small class="text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</small>
</a>
<a class="list-group-item list-group-item-action text-truncate" href=".//docs/element-daterange.html">
<div class="fw-bold">Date Range Picker</div>
<small class="text-muted">There are many variations of passages of Lorem Ipsum available</small>
</a>
<a class="list-group-item list-group-item-action text-truncate" href=".//docs/element-imageinput.html">
<div class="fw-bold">Image Input</div>
<small class="text-muted">It is a long established fact that a reader will be distracted</small>
</a>
<a class="list-group-item list-group-item-action text-truncate" href=".//docs/plugin-table.html">
<div class="fw-bold">DataTables for jQuery</div>
<small class="text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</small>
</a>
<a class="list-group-item list-group-item-action text-truncate" href=".//docs/doc-setup.html">
<div class="fw-bold">Development Setup</div>
<small class="text-muted">Contrary to popular belief, Lorem Ipsum is not simply random text.</small>
</a>
</div>
</div>
</div>
</div>
</div>
<!--end search-->

<ul class="header-right justify-content-end d-flex align-items-center mb-0">
    
<li class="d-none d-xl-inline-block">
<a class="nav-link fullscreen" href="javascript:void(0);" onclick="toggleFullScreen(documentElement)">
<svg viewBox="0 0 16 16" width="18px" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M5.8279 10.172C5.73414 10.0783 5.60698 10.0256 5.4744 10.0256C5.34182 10.0256 5.21467 10.0783 5.1209 10.172L1.0249 14.268V11.5C1.0249 11.3674 0.972224 11.2402 0.878456 11.1464C0.784688 11.0527 0.657511 11 0.524902 11C0.392294 11 0.265117 11.0527 0.171349 11.1464C0.0775808 11.2402 0.0249023 11.3674 0.0249023 11.5V15.475C0.0249023 15.6076 0.0775808 15.7348 0.171349 15.8285C0.265117 15.9223 0.392294 15.975 0.524902 15.975H4.4999C4.63251 15.975 4.75969 15.9223 4.85346 15.8285C4.94722 15.7348 4.9999 15.6076 4.9999 15.475C4.9999 15.3424 4.94722 15.2152 4.85346 15.1214C4.75969 15.0277 4.63251 14.975 4.4999 14.975H1.7319L5.8279 10.879C5.92164 10.7852 5.9743 10.6581 5.9743 10.5255C5.9743 10.3929 5.92164 10.2658 5.8279 10.172ZM10.1719 10.172C10.2657 10.0783 10.3928 10.0256 10.5254 10.0256C10.658 10.0256 10.7851 10.0783 10.8789 10.172L14.9749 14.268V11.5C14.9749 11.3674 15.0276 11.2402 15.1213 11.1464C15.2151 11.0527 15.3423 11 15.4749 11C15.6075 11 15.7347 11.0527 15.8285 11.1464C15.9222 11.2402 15.9749 11.3674 15.9749 11.5V15.475C15.9749 15.6076 15.9222 15.7348 15.8285 15.8285C15.7347 15.9223 15.6075 15.975 15.4749 15.975H11.4999C11.3673 15.975 11.2401 15.9223 11.1463 15.8285C11.0526 15.7348 10.9999 15.6076 10.9999 15.475C10.9999 15.3424 11.0526 15.2152 11.1463 15.1214C11.2401 15.0277 11.3673 14.975 11.4999 14.975H14.2679L10.1719 10.879C10.0782 10.7852 10.0255 10.6581 10.0255 10.5255C10.0255 10.3929 10.0782 10.2658 10.1719 10.172ZM5.8279 5.82799C5.73414 5.92173 5.60698 5.97439 5.4744 5.97439C5.34182 5.97439 5.21467 5.92173 5.1209 5.82799L1.0249 1.73199V4.49999C1.0249 4.6326 0.972224 4.75978 0.878456 4.85355C0.784688 4.94732 0.657511 4.99999 0.524902 4.99999C0.392294 4.99999 0.265117 4.94732 0.171349 4.85355C0.0775808 4.75978 0.0249023 4.6326 0.0249023 4.49999V0.524994C0.0249023 0.392386 0.0775808 0.265209 0.171349 0.17144C0.265117 0.0776723 0.392294 0.0249939 0.524902 0.0249939H4.4999C4.63251 0.0249939 4.75969 0.0776723 4.85346 0.17144C4.94722 0.265209 4.9999 0.392386 4.9999 0.524994C4.9999 0.657602 4.94722 0.784779 4.85346 0.878547C4.75969 0.972315 4.63251 1.02499 4.4999 1.02499H1.7319L5.8279 5.12099C5.92164 5.21476 5.9743 5.34191 5.9743 5.47449C5.9743 5.60708 5.92164 5.73423 5.8279 5.82799Z" />
<path class="fill-secondary" d="M10.5253 5.97439C10.3927 5.97439 10.2655 5.92173 10.1718 5.82799C10.078 5.73423 10.0254 5.60708 10.0254 5.47449C10.0254 5.34191 10.078 5.21476 10.1718 5.12099L14.2678 1.02499H11.4998C11.3672 1.02499 11.24 0.972315 11.1462 0.878547C11.0525 0.784779 10.9998 0.657602 10.9998 0.524994C10.9998 0.392386 11.0525 0.265209 11.1462 0.17144C11.24 0.0776723 11.3672 0.0249939 11.4998 0.0249939H15.4748C15.6074 0.0249939 15.7346 0.0776723 15.8283 0.17144C15.9221 0.265209 15.9748 0.392386 15.9748 0.524994V4.49999C15.9748 4.6326 15.9221 4.75978 15.8283 4.85355C15.7346 4.94732 15.6074 4.99999 15.4748 4.99999C15.3422 4.99999 15.215 4.94732 15.1212 4.85355C15.0275 4.75978 14.9748 4.6326 14.9748 4.49999V1.73199L10.8788 5.82799C10.785 5.92173 10.6579 5.97439 10.5253 5.97439Z" />
</svg>
</a>
</li>
<!--language-->
<li class="d-none d-xl-inline-block">
    <div class="dropdown morphing scale-left Language mx-sm-2">
        <button class="btn btn-light btn-sm dropdown-toggle" type="button" id="languageDropdown" data-bs-toggle="dropdown" aria-expanded="false">
            @if (App::getLocale() == 'ar')
                Saudi Arabia
            @else
                English
            @endif
        </button>
        <div class="dropdown-menu rounded-4 shadow border-0" aria-labelledby="languageDropdown">
            <a class="dropdown-item" rel="alternate" hreflang="en" href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}">
                English
            </a>
            <a class="dropdown-item" rel="alternate" hreflang="ar" href="{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}">
                Saudi Arabia
            </a>
        </div>
    </div>
</li>
<!--end language-->

<!--profile-->
<li>
<div class="dropdown morphing scale-left user-profile mx-lg-3 mx-2">
<a class="nav-link dropdown-toggle rounded-circle after-none p-0" href="#" role="button" data-bs-toggle="dropdown">
<img class="avatar img-thumbnail rounded-circle shadow" src="{{ asset('assets/img/profile_av.png') }}" alt="">
</a>
<div class="dropdown-menu border-0 rounded-4 shadow p-0">
<div class="card border-0 w240">
<div class="card-body border-bottom d-flex">
<img class="avatar rounded-circle" src="./assets/img/profile_av.png" alt="">
<div class="flex-fill ms-3">
    @if(Auth::guard('admin')->check())
    <h6 class="card-title mb-0">{{ Auth::guard('admin')->user()->name }}</h6>
    <span class="text-muted">
        <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="3f5e5353565a584d5e4b5a4d7f534a5150115c5052">
            {{ Auth::guard('admin')->user()->phone }}
        </a>
    </span>
@endif

</div>
</div>
<div class="list-group m-2 mb-3">
<a class="list-group-item list-group-item-action border-0" href="{{route('admin.profile')}}"><i class="w30 fa fa-user"></i>My Profile</a>
<a class="list-group-item list-group-item-action border-0" href="{{route('settings.index')}}"><i class="w30 fa fa-gear"></i>Settings</a>
<a class="list-group-item list-group-item-action border-0" href="{{route('admins.index')}}"><i class="w30 fa fa-users"></i>users</a>
</div>
<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" class="btn bg-secondary text-light text-uppercase rounded-0">logout</button>
</form>
</div>
</div>
</div>
</li>
<!--end profile-->

</ul>
</nav>