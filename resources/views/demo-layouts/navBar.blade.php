<nav class="container">
    <div class="logo">
        <a href="index.html">
            <img src={{asset("assetsdemo/images/logo.svg")}} alt="logo">
        </a>
    </div>
    <div class="navigation_links">
        <ul>
            <li><a class="nav-link active" href="{{route('home')}}">الرئيسية</a></li>
            <li><a class="nav-link" href="{{route('demoStores')}}">المتاجر</a></li>
            <li><a class="nav-link" href="{{route('contect.index')}}">تواصل معنا</a></li>
            <li><a class="nav-link" href="{{route('allBlogs')}}">المدونات</a></li>
        </ul>
    </div>
    <div class="search">
        <div class="cart_open" id="toggleSmallCart">
            <h6>0,00 ريال</h6>
            <i class="fa-light fa-bag-shopping"></i>
            <span>0</span>
        </div>
        <!-- not logged in -->
        <!-- <a href="auth.html">
            <i class="fa-regular fa-user"></i>
        </a> -->
        <!-- logged in -->
        <div class="dropdown">
            <a class="account" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
                aria-expanded="false">
                <div class="user">
                    <img src={{asset("assetsdemo/images/user.png")}}alt="avatar">
                </div>
            </a>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <li>
                    <a class="dropdown-item" href="profile.html">الملف الشخصى</a>
                </li>
                <li>
                    <a class="dropdown-item" href="orders.html">طلباتى</a>
                </li>
                <li>
                    <a class="dropdown-item" href="favourits.html">المفضلة</a>
                </li>
                <li>
                    <a class="dropdown-item" href="auth-login.html">تسجيل الخروج</a>
                </li>
            </ul>
        </div>
        <button data-bs-toggle="modal" data-bs-target="#searchModal">
            <i class="fa-regular fa-magnifying-glass"></i>
        </button>
        <button class="toggler">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </div>
</nav>