@extends('demo-layouts.master')
@section('title', 'الأسئلة الشائعة')
@section('page-header')
    @section('PageTitle', 'الأسئلة الشائعة')
@endsection

@section('content')
    <!-- row -->
    <div class="row">
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <div class="col-md-12 mb-30">
            <section class="hero_section">
                <div class="hero_container">
                    <div class="row">
                        <div class="col-lg-3 p-1" id="order2">
                            <div class="inner-section">
                                <div class="slide center">
                                    <img src={{asset("assetsdemo/images/right1.webp")}}>
                                    <div class="layer">
                                        <h5>إضاءة وإكسسوارات لامعة</h5>
                                    </div>
                                </div>
                                <div class="slide center">
                                    <img src={{asset("assetsdemo/images/right2.webp")}}>
                                    <div class="layer">
                                        <h5>سوائل وزيوت لصحة المحرك</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 p-1" id="order1">
                            <div class="inner-section slider">
                                <div class="swiper heroSwiper">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <img src={{asset("assetsdemo/images/center.webp")}} alt="">
                                            <div class="layer">
                                                <h4>استكشف قطع غيار وإكسسواراتنا</h4>
                                                <p>اكتشف أحدث القطع والإكسسوارات لتحسين سيارتك.</p>
                                                <a href="shop.html">تسوق الآن</a>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <img src={{asset("assetsdemo/images/center2.jpg")}} alt="">
                                            <div class="layer">
                                                <h4>خبراء السيارات في خدمتك</h4>
                                                <p>
                                                    ثق بخبرتنا في تقديم أعلى جودة منتجات الصيانة والخدمات
                                                </p>
                                                <a href="about-us.html">تعرف علينا</a>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <img src={{asset("assetsdemo/images/center3.jpg")}} alt="">
                                            <div class="layer">
                                                <h4>لا تتردد في الاتصال بنا</h4>
                                                <p>
                                                    هل لديك أسئلة أو تحتاج إلى مساعدة؟ فريقنا هنا لمساعدتك
                                                </p>
                                                <a href="contact-us.html">اتصل بنا</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-pagination"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 p-1" id="order3">
                            <div class="inner-section">
                                <div class="slide center">
                                    <img src={{asset("assetsdemo/images/left.jpg")}} alt="">
                                    <div class="layer">
                                        <h5>صحة المحرك أمر بالغ الأهمية</h5>
                                        <p>
                                            اختر أفضل الزيوت والسوائل لضمان طول عمر سيارتك
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="stores">
                <div class="container">
                    <div class="row">
                        <!-- section_head -->
                        <div class="col-12 d-flex justify-content-between section_head">
                            <h3>ابرز المتاجر</h3>
                            
                        </div>
                        <div class="stores_cards">
                            @foreach ($stores as $store )
                                
                           
                            <a href="shop.html" class="store_card">
                                <div class="logo">
                                    <img src="{{ asset('storage/uploads/' . $store->photo) }}" alt="{{ $store->name }}" width="100" height="auto">
                                </div>
                                <h6>{{$store->name}} </h6>
                            </a>
                            @endforeach
                            
                        </div>
                    </div>
                </div>
            </section>

            <section class="popular_categories">
                <div class="container">
                    <!-- popular categories row -->
                    <div class="row">
                        <div class="col-12 d-flex justify-content-between align-items-center mb-2">
                            <h2 class="section_head">
                                فئات متجرنا المميزة
                            </h2>
                            
                        </div>
                        @foreach ($productstores as $productstore )
                            
                        <div class="col-lg-4 col-md-6 col-12 p-2">
                            <a href="shop.html" class="category">
                                <div class="text">
                                    <h6> {{$productstore->name}}</h6>
                                </div>
                                <div class="img">
                                    <img src="{{ asset('storage/uploads/' . $productstore->photo) }}" alt="{{ $productstore->name }}" width="100" height="auto">
                                </div>
                            </a>
                        </div>
                        @endforeach
                       
                    </div>
                </div>
            </section>
            <section class="store_section">
                <div class="container">
                    <!-- car parts store row -->
                    <div class="row">
                        <!-- section_head -->
                        <div class="col-12 d-flex justify-content-between section_head">
                            <h3> قطع غيار السيارات</h3>
                            
                        </div>
                        <!-- section_tabs -->
                        <div class="col-12 mb-3 p-2">
                            <div class="section_tabs">
                                <ul>
                                    @foreach ($ProductDepartments as $ProductDepartment)
                                        <li class="{{ $loop->first ? 'active' : '' }}">
                                            <img src="{{ asset('storage/uploads/' . $ProductDepartment->photo) }}" alt="{{ $ProductDepartment->name }}" width="100" height="auto">
                                            <h6>{{ $ProductDepartment->name }}</h6>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="rendered_products">
                            <div class="product_crad">
                            @foreach ($products as $product)
                                <div class="product_card">
                                    <div class="product_image">
                                        <img src="{{ asset('storage/uploads/' . $product->photo) }}" alt="{{ $product->name }}" width="100" height="auto">
                                        <span>{{ $product->name }}</span>
                                        <button>
                                            <i class="fa-sharp fa-light fa-heart"></i>
                                        </button>
                                    </div>
                                    <div class="product_info">
                                        <h5 class="pro_name" title="{{ $product->name }}">
                                            <a href="#">{{ $product->name }}</a>
                                        </h5>
                                        <p class="pro_number"></p>
                                        <p class="trader"> {{$product->store->name}} </p>
                                        <div class="price_buy">
                                            <h6>{{ $product->price }} ريال</h6> <!-- Assuming 'price' is a field in the product -->
                                            <button>
                                                <i class="fa-regular fa-cart-shopping-fast"></i>
                                            </button>
                                        </div>
                                        <div class="rate_sale">
                                            <a href="#!">
                                                <b>{{ $product->ratings->avg('rating') }} <i class="fa-sharp fa-solid fa-star"></i></b> ({{ $product->reviews_count }}) <!-- Assuming these fields exist -->
                                            </a>
                                            
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            </div>
                        </div>
                        
                        
                        
                    </div>
                </div>
            </section>

        </div>
    </div>
    <!-- row closed -->
@endsection

@section('js')
    <!-- Include Bootstrap JS if not already included -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection