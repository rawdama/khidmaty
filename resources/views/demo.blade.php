<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="اكتشف عالم السيارات بمتجر خدمتى - حيث الجودة تلتقي بالتنوع. احصل على أفضل قطع الغيار والإكسسوارات الرائعة لسيارتك اليوم!">
    <title>خدمتى</title>
    <link rel="shortcut icon" href="assetsdemo/images/logo.svg" type="image/x-icon">
    <!-- Required CSS -->
    <link rel="stylesheet" href="assetsdemo/css/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="assetsdemo/css/main.css">
    <link rel="stylesheet" href="assetsdemo/css/style.css">
</head>

<body>
    <!-- header section -->
    <header>
        <!-- offers bar -->
        @include('demo-layouts.offersBar')
        <!-- nav bar -->
        @include('demo-layouts.navBar')
      
        <!-- empty cart -->
        <!--  <div class="mini_cart empty">
            <p>هناك 0 عنصر في سلة التسوق الخاصة بك</p>
            <div class="inner_cart">
                <img src="assets/images/empty-cart.png" alt="empty-cart">
                <div class="subtotal">
                    <p> الإجمالى:</p>
                    <span>0,00 ريال</span>
                </div>
            </div>
            <div class="btns">
                <a href="shopping-cart.html">عربة التسوق</a>
                <a href="checkout.html">الدفع</a>
            </div>
        </div> -->
        <!-- filled -->
        <div class="mini_cart">
            <p>هناك <span>1</span> عنصر في سلة التسوق الخاصة بك</p>
            <div class="inner_cart">
                <div class="product">
                    <div class="img">
                        <img src="assetsdemo/images/pro1.jpg" alt="product">
                    </div>
                    <div class="info">
                        <h6>
                            <a href="product-details.html">طقم لمبات فيليبس ليد HB3/4</a>
                        </h6>
                        <p>السعر :<span>2500 ريال</span></p>
                        <div class="count_delete">
                            <p>الكمية : <span>X2</span></p>
                            <button>
                                <i class="fa-regular fa-trash-can-list"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="product">
                    <div class="img">
                        <img src="assetsdemo/images/pro1.jpg" alt="product">
                    </div>
                    <div class="info">
                        <h6>
                            <a href="product-details.html">طقم لمبات فيليبس ليد HB3/4</a>
                        </h6>
                        <p>السعر :<span>2500 ريال</span></p>
                        <div class="count_delete">
                            <p>الكمية : <span>X2</span></p>
                            <button>
                                <i class="fa-regular fa-trash-can-list"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="product">
                    <div class="img">
                        <img src="assetsdemo/images/pro1.jpg" alt="product">
                    </div>
                    <div class="info">
                        <h6>
                            <a href="product-details.html">طقم لمبات فيليبس ليد HB3/4</a>
                        </h6>
                        <p>السعر :<span>2500 ريال</span></p>
                        <div class="count_delete">
                            <p>الكمية : <span>X2</span></p>
                            <button>
                                <i class="fa-regular fa-trash-can-list"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="subtotal">
                    <p> الإجمالى:</p>
                    <span>80,00 ريال</span>
                </div>
            </div>
            <div class="btns">
                <a href="shopping-cart.html">عربة التسوق</a>
                <a href="checkout.html">الدفع</a>
            </div>
        </div>
    </header>
    <!-- main container -->
    <main>
        <!-- hero section -->
        <section class="hero_section">
            <div class="hero_container">
                <div class="row">
                    <div class="col-lg-3 p-1" id="order2">
                        <div class="inner-section">
                            <div class="slide center">
                                <img src="assetsdemo/images/right1.webp">
                                <div class="layer">
                                    <h5>إضاءة وإكسسوارات لامعة</h5>
                                </div>
                            </div>
                            <div class="slide center">
                                <img src="assetsdemo/images/right2.webp">
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
                                        <img src="assetsdemo/images/center.webp" alt="">
                                        <div class="layer">
                                            <h4>استكشف قطع غيار وإكسسواراتنا</h4>
                                            <p>اكتشف أحدث القطع والإكسسوارات لتحسين سيارتك.</p>
                                            <a href="shop.html">تسوق الآن</a>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="assetsdemo/images/center2.jpg" alt="">
                                        <div class="layer">
                                            <h4>خبراء السيارات في خدمتك</h4>
                                            <p>
                                                ثق بخبرتنا في تقديم أعلى جودة منتجات الصيانة والخدمات
                                            </p>
                                            <a href="about-us.html">تعرف علينا</a>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="assetsdemo/images/center3.jpg" alt="">
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
                                <img src="assetsdemo/images/left.jpg" alt="">
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
        <!-- services bars -->
        <section class="services_bar">
            <div class="swiper servicesBarSwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="service_card__swiper">
                            <img src="assetsdemo/images/sb1.png" alt="">
                            <h6>مقاعد </h6>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="service_card__swiper">
                            <img src="assetsdemo/images/sb2.png" alt="">
                            <h6>عجلات و إطارات</h6>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="service_card__swiper">
                            <img src="assetsdemo/images/sb3.png" alt="">
                            <h6>تعليق الإطارات</h6>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="service_card__swiper">
                            <img src="assetsdemo/images/sb4.png" alt="">
                            <h6>المحرك</h6>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="service_card__swiper">
                            <img src="assetsdemo/images/sb5.png" alt="">
                            <h6>أنظمة عوادم</h6>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="service_card__swiper">
                            <img src="assetsdemo/images/sb6.png" alt="">
                            <h6>نظام نقل الحركة</h6>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="service_card__swiper">
                            <img src="assetsdemo/images/sb7.png" alt="">
                            <h6>لمبات وإضاءة</h6>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="service_card__swiper">
                            <img src="assetsdemo/images/sb8.png" alt="">
                            <h6>صدمات</h6>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="service_card__swiper">
                            <img src="assetsdemo/images/sb9.png" alt="">
                            <h6>بطاريات</h6>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="service_card__swiper">
                            <img src="assetsdemo/images/sb10.png" alt="">
                            <h6>أدوات صيانة</h6>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- popular categories -->
        <section class="popular_categories">
            <div class="container">
                <!-- popular categories row -->
                <div class="row">
                    <div class="col-12 d-flex justify-content-between align-items-center mb-2">
                        <h2 class="section_head">
                            فئات متجرنا المميزة
                        </h2>
                        <a href="categories.html" class="shop_all">عرض الكل
                            <i class="fa-regular fa-circle-arrow-left"></i>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12 p-2">
                        <a href="shop.html" class="category">
                            <div class="text">
                                <h6> الهيكل الخارجى</h6>
                                <ul>
                                    <li>
                                        الأبواب، الرفرف والكبوت
                                    </li>
                                    <li>
                                        الصدامات والشبكات
                                    </li>
                                    <li>
                                        المرايا والمسحات
                                    </li>
                                </ul>
                            </div>
                            <div class="img">
                                <img src="assetsdemo/images/cat1.jpg" alt="">
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12 p-2">
                        <a href="shop.html" class="category">
                            <div class="text">
                                <h6>المحرك ونظام الدفع</h6>
                                <ul>
                                    <li>
                                        زيوت المحرك
                                    </li>
                                    <li>
                                        أنظمة العادم
                                    </li>
                                    <li>
                                        ملحقات نظام الدفع
                                    </li>
                                </ul>
                            </div>
                            <div class="img">
                                <img src="assetsdemo/images/cat2.jpg" alt="">
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12 p-2">
                        <div class="category">
                            <a href="shop.html" class="text">
                                <h6>أنظمة التعليق</h6>
                                <ul>
                                    <li>
                                        مساعدي الصدمات
                                    </li>
                                    <li>
                                        أنظمة التوجيه
                                    </li>
                                    <li>
                                        أنظمة التعليق الهوائي
                                    </li>
                                </ul>
                            </a>
                            <div class="img">
                                <img src="assetsdemo/images/cat3.jpg" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12 p-2">
                        <a href="shop.html" class="category">
                            <div class="text">
                                <h6>أنظمة إلكترونية</h6>
                                <ul>
                                    <li>
                                        نظام الصوت والمرئيات
                                    </li>
                                    <li>
                                        نظام الأمان والإنذار
                                    </li>
                                    <li>
                                        أنظمة الملاحة وال GPS
                                    </li>
                                </ul>
                            </div>
                            <div class="img">
                                <img src="assetsdemo/images/cat4.jpg" alt="">
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12 p-2">
                        <a href="shop.html" class="category">
                            <div class="text">
                                <h6>إضاءة</h6>
                                <ul>
                                    <li>
                                        مصابيح أمامية
                                    </li>
                                    <li>
                                        مصابيح خلفية
                                    </li>
                                    <li>
                                        مصابيح داخلية
                                    </li>
                                </ul>
                            </div>
                            <div class="img">
                                <img src="assetsdemo/images/cat5.jpg" alt="">
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12 p-2">
                        <a href="shop.html" class="category">
                            <div class="text">
                                <h6>عجلات و إطارات</h6>
                                <ul>
                                    <li>
                                        إكسسوارات
                                    </li>
                                    <li>
                                        مجموعات الفرامل
                                    </li>
                                    <li>
                                        إطارات وجنوط
                                    </li>
                                </ul>
                            </div>
                            <div class="img">
                                <img src="assetsdemo/images/cat6.jpg" alt="">
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <!-- advertisement section -->
        <section class="advertisement_section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-12 p-2">
                        <a href="#!" class="image">
                            <img src="assetsdemo/images/add1.jpg" alt="">
                            <div class="layer">
                                <h4>إطارات عالية الجودة</h4>
                                <p>تسوق الإطارات</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-6 col-12 p-2">
                        <a href="#!" class="image">
                            <img src="assetsdemo/images/add2.jpg" alt="">
                            <div class="layer">
                                <h4>إضاءة متقدمة لسيارتك</h4>
                                <p>استعرض المزيد</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <!-- stor section -->
        <section class="store_section">
            <div class="container">
                <!-- car parts store row -->
                <div class="row">
                    <!-- section_head -->
                    <div class="col-12 d-flex justify-content-between section_head">
                        <h3> قطع غيار السيارات</h3>
                        <a href="shop.html" class="shop_all">عرض الكل
                            <i class="fa-regular fa-circle-arrow-left"></i>
                        </a>
                    </div>
                    <!-- section_tabs -->
                    <div class="col-12 mb-3 p-2">
                        <div class="section_tabs">
                            <ul>
                                <li class="active">
                                    <img src="assetsdemo/images/bumper.png" alt="">
                                    <h6>الصدامات، الشبوك والواجهة</h6>
                                </li>
                                <li>
                                    <img src="assetsdemo/images/engine.png" alt="">
                                    <h6>المكائن، القيرات وملحقاتها</h6>
                                </li>
                                <li>
                                    <img src="assetsdemo/images/aids.png" alt="">
                                    <h6>المساعدات، المقصات وعمود التوازن</h6>
                                </li>
                                <li>
                                    <img src="assets/images/filters.png" alt="">
                                    <h6>البواجي، الفلاتر والسيور</h6>
                                </li>
                                <li>
                                    <img src="assetsdemo/images/disk.png" alt="">
                                    <h6>الفرامل والأقمشة</h6>
                                </li>
                                <li>
                                    <img src="assetsdemo/images/aircondition.png" alt="">
                                    <h6>نظام التكييف والتبريد</h6>
                                </li>
                                <li>
                                    <img src="assetsdemo/images/feul.png" alt="">
                                    <h6>نظام الوقود</h6>
                                </li>
                                <li>
                                    <img src="assetsdemo/images/shkman.png" alt="">
                                    <h6>الشكمان</h6>
                                </li>
                                <li>
                                    <img src="assetsdemo/images/fenders.png" alt="">
                                    <h6>الأبواب، الرفرف والكبوت</h6>
                                </li>
                                <li>
                                    <img src="assetsdemo/images/piston.png" alt="">
                                    <h6>العكس، الدفرنس والرمانات</h6>
                                </li>
                                <li>
                                    <img src="assetsdemo/images/dricson.png" alt="">
                                    <h6>الدركسون وملحقاته</h6>
                                </li>
                                <li>
                                    <img src="assetsdemo/images/Interioraccessories.png" alt="">
                                    <h6>الاكسسوارات الداخلية</h6>
                                </li>
                                <li>
                                    <img src="assetsdemo/images/tools.png" alt="">
                                    <h6>أدوات و معدات الصيانة</h6>
                                </li>
                                <li>
                                    <img src="assetsdemo/images/care.png" alt="">
                                    <h6>اكسسوارات العناية</h6>
                                </li>
                                <li>
                                    <img src="assetsdemo/images/lightining.png" alt="">
                                    <h6>الاضاءات و المصابيح</h6>
                                </li>
                                <li>
                                    <img src="assetsdemo/images/oils.png" alt="">
                                    <h6>الزيوت و السوائل</h6>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- rendered products -->
                    <div class="rendered_products">
                        <div class="product_crad">
                            <div class="product_image">
                                <img src="assetsdemo/images/pro1.jpg" alt="product">
                                <span>أوريون</span>
                                <button>
                                    <i class="fa-sharp fa-light fa-heart"></i>
                                </button>
                            </div>
                            <div class="product_info">
                                <h5 class="pro_name" title="طقم كشاف تويوتا أوريون غطاء أسود 2009-2011 قطعتين">
                                    <a href="product-details.html"> طقم كشاف تويوتا أوريون</a>
                                </h5>
                                <p class="pro_number">NO: 6287019946008</p>
                                <p class="trader">تاجر الرياض - 815</p>
                                <div class="price_buy">
                                    <h6>180 ريال</h6>
                                    <button>
                                        <i class="fa-regular fa-cart-shopping-fast"></i>
                                    </button>
                                </div>
                                <div class="rate_sale">
                                    <p>
                                        <span class="old_price">400 ريال</span>
                                        <span class="sale">خصم 49.07%</span>
                                    </p>
                                    <a href="#!">
                                        <b>5 <i class="fa-sharp fa-solid fa-star"></i></b> (6)
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="product_crad">
                            <div class="product_image">
                                <img src="assetsdemo/images/pro2.jpg" alt="product">
                                <span>أوريون</span>
                                <button>
                                    <i class="fa-sharp fa-light fa-heart"></i>
                                </button>
                            </div>
                            <div class="product_info">
                                <h5 class="pro_name" title="طقم كشاف تويوتا أوريون غطاء أسود 2009-2011 قطعتين">
                                    <a href="product-details.html"> طقم كشاف تويوتا أوريون</a>
                                </h5>
                                <p class="pro_number">NO: 6287019946008</p>
                                <p class="trader">تاجر الرياض - 815</p>
                                <div class="price_buy">
                                    <h6>180 ريال</h6>
                                    <button>
                                        <i class="fa-regular fa-cart-shopping-fast"></i>
                                    </button>
                                </div>
                                <div class="rate_sale">
                                    <p>
                                        <span class="old_price">400 ريال</span>
                                        <span class="sale">خصم 49.07%</span>
                                    </p>
                                    <a href="#!">
                                        <b>5 <i class="fa-sharp fa-solid fa-star"></i></b> (6)
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="product_crad">
                            <div class="product_image">
                                <img src="assetsdemo/images/pro3.jpg" alt="product">
                                <span>أوريون</span>
                                <button>
                                    <i class="fa-sharp fa-light fa-heart"></i>
                                </button>
                            </div>
                            <div class="product_info">
                                <h5 class="pro_name" title="طقم كشاف تويوتا أوريون غطاء أسود 2009-2011 قطعتين">
                                    <a href="product-details.html"> طقم كشاف تويوتا أوريون</a>
                                </h5>
                                <p class="pro_number">NO: 6287019946008</p>
                                <p class="trader">تاجر الرياض - 815</p>
                                <div class="price_buy">
                                    <h6>180 ريال</h6>
                                    <button>
                                        <i class="fa-regular fa-cart-shopping-fast"></i>
                                    </button>
                                </div>
                                <div class="rate_sale">
                                    <p>
                                        <span class="old_price">400 ريال</span>
                                        <span class="sale">خصم 49.07%</span>
                                    </p>
                                    <a href="#!">
                                        <b>5 <i class="fa-sharp fa-solid fa-star"></i></b> (6)
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="product_crad">
                            <div class="product_image">
                                <img src="assetsdemo/images/pro4.jpg" alt="product">
                                <span>أوريون</span>
                                <button>
                                    <i class="fa-sharp fa-light fa-heart"></i>
                                </button>
                            </div>
                            <div class="product_info">
                                <h5 class="pro_name" title="طقم كشاف تويوتا أوريون غطاء أسود 2009-2011 قطعتين">
                                    <a href="product-details.html"> طقم كشاف تويوتا أوريون</a>
                                </h5>
                                <p class="pro_number">NO: 6287019946008</p>
                                <p class="trader">تاجر الرياض - 815</p>
                                <div class="price_buy">
                                    <h6>180 ريال</h6>
                                    <button>
                                        <i class="fa-regular fa-cart-shopping-fast"></i>
                                    </button>
                                </div>
                                <div class="rate_sale">
                                    <p>
                                        <span class="old_price">400 ريال</span>
                                        <span class="sale">خصم 49.07%</span>
                                    </p>
                                    <a href="#!">
                                        <b>5 <i class="fa-sharp fa-solid fa-star"></i></b> (6)
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="product_crad">
                            <div class="product_image">
                                <img src="assetsdemo/images/pro1.jpg" alt="product">
                                <span>أوريون</span>
                                <button>
                                    <i class="fa-sharp fa-light fa-heart"></i>
                                </button>
                            </div>
                            <div class="product_info">
                                <h5 class="pro_name" title="طقم كشاف تويوتا أوريون غطاء أسود 2009-2011 قطعتين">
                                    <a href="product-details.html"> طقم كشاف تويوتا أوريون</a>
                                </h5>
                                <p class="pro_number">NO: 6287019946008</p>
                                <p class="trader">تاجر الرياض - 815</p>
                                <div class="price_buy">
                                    <h6>180 ريال</h6>
                                    <button>
                                        <i class="fa-regular fa-cart-shopping-fast"></i>
                                    </button>
                                </div>
                                <div class="rate_sale">
                                    <p>
                                        <span class="old_price">400 ريال</span>
                                        <span class="sale">خصم 49.07%</span>
                                    </p>
                                    <a href="#!">
                                        <b>5 <i class="fa-sharp fa-solid fa-star"></i></b> (6)
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="product_crad">
                            <div class="product_image">
                                <img src="assetsdemo/images/pro3.jpg" alt="product">
                                <span>أوريون</span>
                                <button>
                                    <i class="fa-sharp fa-light fa-heart"></i>
                                </button>
                            </div>
                            <div class="product_info">
                                <h5 class="pro_name" title="طقم كشاف تويوتا أوريون غطاء أسود 2009-2011 قطعتين">
                                    <a href="product-details.html"> طقم كشاف تويوتا أوريون</a>
                                </h5>
                                <p class="pro_number">NO: 6287019946008</p>
                                <p class="trader">تاجر الرياض - 815</p>
                                <div class="price_buy">
                                    <h6>180 ريال</h6>
                                    <button>
                                        <i class="fa-regular fa-cart-shopping-fast"></i>
                                    </button>
                                </div>
                                <div class="rate_sale">
                                    <p>
                                        <span class="old_price">400 ريال</span>
                                        <span class="sale">خصم 49.07%</span>
                                    </p>
                                    <a href="#!">
                                        <b>5 <i class="fa-sharp fa-solid fa-star"></i></b> (6)
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- stores -->
        <section class="stores">
            <div class="container">
                <div class="row">
                    <!-- section_head -->
                    <div class="col-12 d-flex justify-content-between section_head">
                        <h3>ابرز المتاجر</h3>
                        <a href="stores.html" class="shop_all">عرض الكل
                            <i class="fa-regular fa-circle-arrow-left"></i>
                        </a>
                    </div>
                    <div class="stores_cards">
                        <a href="shop.html" class="store_card">
                            <div class="logo">
                                <img src="assetsdemo/images/partener1.png" alt="partener">
                            </div>
                            <h6>الوعلان للتجارة</h6>
                        </a>
                        <a href="shop.html" class="store_card">
                            <div class="logo">
                                <img src="assetsdemo/images/partener2.png" alt="partener">
                            </div>
                            <h6>السلمي للمحركات</h6>
                        </a>
                        <a href="shop.html" class="store_card">
                            <div class="logo">
                                <img src="assetsdemo/images/partener3.png" alt="partener">
                            </div>
                            <h6>HYUNDIA</h6>
                        </a>
                        <a href="shop.html" class="store_card">
                            <div class="logo">
                                <img src="assetsdemo/images/partener4.png" alt="partener">
                            </div>
                            <h6>المجدوعي</h6>
                        </a>
                        <a href="shop.html" class="store_card">
                            <div class="logo">
                                <img src="assetsdemo/images/bmw.png" alt="partener">
                            </div>
                            <h6>BMW</h6>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <!-- recent blogs -->
        <section class="recent_bolgs">
            <div class="container">
                <h2>آخر المستجدات والأفكار المبتكرة</h2>
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-12 p-lg-3 p-2">
                        <div class="blog">
                            <a href="blog.html">
                                <div class="blog_image">
                                    <img src="assetsdemo/images/blog1.jpg" alt="blog">
                                </div>
                                <div class="date">
                                    <span class="day">8</span>
                                    <span class="month">يناير</span>
                                </div>
                            </a>
                            <h4>
                                <a href="blog.html">
                                    أهمية صيانة السيارة الدورية
                                </a>
                            </h4>
                            <p>
                                صيانة السيارة الدورية هي مفتاح الحفاظ على سلامة وأداء سيارتك. في هذا المقال، سنستعرض
                                أهمية الصيانة الدورية وسنشرح ما يجب عليك الانتباه له خلال عمليات الصيانة المختلفة.
                                سنتحدث عن تغيير الزيوت وفحص الفرامل واستبدال الفلاتر والعناية بالبطارية والمزيد. هذا
                                سيساعدك في الحفاظ على سيارتك بحالة ممتازة وتمتع بقيادة آمنة وسلسة.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12 p-lg-3 p-2">
                        <div class="blog">
                            <a href="blog.html">
                                <div class="blog_image">
                                    <img src="assetsdemo/images/blog2.jpg" alt="blog">
                                </div>
                                <div class="date">
                                    <span class="day">17</span>
                                    <span class="month">مارس</span>
                                </div>
                            </a>
                            <h4>
                                <a href="blog.html">
                                    أفضل طرق توفير الوقود لسيارتك
                                </a>
                            </h4>
                            <p>
                                مع ارتفاع أسعار الوقود، أصبح توفير الوقود أمرًا حيويًا لمالكي السيارات. في هذا المقال،
                                سنتناول أهم الاستراتيجيات والتقنيات التي يمكنك اعتمادها لتقليل استهلاك الوقود بسيارتك.
                                سنتحدث عن القيادة الاقتصادية، والصيانة الدورية، واختيار الإطارات المناسبة، واستخدام
                                تقنيات الهجين والكهربائية، والمزيد.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12 p-lg-3 p-2">
                        <div class="blog">
                            <a href="blog.html">
                                <div class="blog_image">
                                    <img src="assetsdemo/images/blog3.jpg" alt="blog">
                                </div>
                                <div class="date">
                                    <span class="day">23</span>
                                    <span class="month">يوليو</span>
                                </div>
                            </a>
                            <h4>
                                <a href="blog.html">
                                    أفضل الإكسسوارات لتخصيص سيارتك
                                </a>
                            </h4>
                            <p>
                                إذا كنت تبحث عن طريقة لجعل سيارتك فريدة وتعكس شخصيتك، فإن استخدام الإكسسوارات المناسبة
                                يمكن أن يكون الحلا المثلى. هذا المقال سيقدم لك نظرة عامة على بعض أفضل الإكسسوارات التي
                                يمكنك استخدامها لتخصيص سيارتك. سنتناول موضوعات مثل الجنوط والشعارات وأضواء LED والعديد
                                من الإكسسوارات الأخرى التي يمكن أن تجعل سيارتك تبرز بين البقية.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="features">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-6 p-2">
                        <div class="feature">
                            <img src="assetsdemo/images/f1.svg" alt="">
                            <h5>شحن مجانا</h5>
                            <p>شحن مجاني لجميع المناطق عند الطلب بأكثر من 100 ريال</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6 p-2">
                        <div class="feature">
                            <img src="assets/images/f2.svg" alt="">
                            <h5>7 أيام من الإرجاع السهل</h5>
                            <p>أي خطأ في المنتج خلال 07 أيام لاستبداله على الفور.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6 p-2">
                        <div class="feature">
                            <img src="assetsdemo/images/f3.svg" alt="">
                            <h5>دعم على مدار 24 ساعة.</h5>
                            <p>فريق الدعم لدينا جاهز دائمًا لخدمتك طوال أيام الأسبوع</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6 p-2">
                        <div class="feature">
                            <img src="assetsdemo/images/f4.svg" alt="">
                            <h5>الدفع آمن</h5>
                            <p>نحن نضمن الدفع الآمن بنسبة 100% من خلال الدفع عبر الإنترنت</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- footer -->
    @include('demo-layouts.footer')
    <!-- search modal -->
    <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container p-0">
                        <form action="shop.html" class="row">
                            <div class="col-12">
                                <div class="input_search">
                                    <input type="text" placeholder="إبحث باسم القطعة او رقمها.......">
                                </div>
                            </div>
                            <div class="col-12 mb-4">
                                <div class="search_results_no">
                                    <p><span>12</span> نتيجة</p>
                                    <a href="shop.html"> عرض الكل <i class="fa-regular fa-arrow-left-long"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-6 p-2">
                                <div class="product_crad">
                                    <div class="product_image">
                                        <img src="assetsdemo/images/pro1.jpg" alt="product">
                                        <span>أوريون</span>
                                        <button>
                                            <i class="fa-sharp fa-light fa-heart"></i>
                                        </button>
                                    </div>
                                    <div class="product_info">
                                        <h5 class="pro_name" title="طقم كشاف تويوتا أوريون غطاء أسود 2009-2011 قطعتين">
                                            <a href="product-details.html"> طقم كشاف تويوتا أوريون</a>
                                        </h5>
                                        <p class="pro_number">NO: 6287019946008</p>
                                        <p class="trader">تاجر الرياض - 815</p>
                                        <div class="price_buy">
                                            <h6>180 ريال</h6>
                                            <button>
                                                <i class="fa-regular fa-cart-shopping-fast"></i>
                                            </button>
                                        </div>
                                        <div class="rate_sale">
                                            <p>
                                                <span class="old_price">400 ريال</span>
                                                <span class="sale">خصم 49.07%</span>
                                            </p>
                                            <a href="#!">
                                                <b>5 <i class="fa-sharp fa-solid fa-star"></i></b> (6)
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-6 p-2">
                                <div class="product_crad">
                                    <div class="product_image">
                                        <img src="assetsdemo/images/pro2.jpg" alt="product">
                                        <span>أوريون</span>
                                        <button>
                                            <i class="fa-sharp fa-light fa-heart"></i>
                                        </button>
                                    </div>
                                    <div class="product_info">
                                        <h5 class="pro_name" title="طقم كشاف تويوتا أوريون غطاء أسود 2009-2011 قطعتين">
                                            <a href="product-details.html"> طقم كشاف تويوتا أوريون</a>
                                        </h5>
                                        <p class="pro_number">NO: 6287019946008</p>
                                        <p class="trader">تاجر الرياض - 815</p>
                                        <div class="price_buy">
                                            <h6>180 ريال</h6>
                                            <button>
                                                <i class="fa-regular fa-cart-shopping-fast"></i>
                                            </button>
                                        </div>
                                        <div class="rate_sale">
                                            <p>
                                                <span class="old_price">400 ريال</span>
                                                <span class="sale">خصم 49.07%</span>
                                            </p>
                                            <a href="#!">
                                                <b>5 <i class="fa-sharp fa-solid fa-star"></i></b> (6)
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-6 p-2">
                                <div class="product_crad">
                                    <div class="product_image">
                                        <img src="assetsdemo/images/pro3.jpg" alt="product">
                                        <span>أوريون</span>
                                        <button>
                                            <i class="fa-sharp fa-light fa-heart"></i>
                                        </button>
                                    </div>
                                    <div class="product_info">
                                        <h5 class="pro_name" title="طقم كشاف تويوتا أوريون غطاء أسود 2009-2011 قطعتين">
                                            <a href="product-details.html"> طقم كشاف تويوتا أوريون</a>
                                        </h5>
                                        <p class="pro_number">NO: 6287019946008</p>
                                        <p class="trader">تاجر الرياض - 815</p>
                                        <div class="price_buy">
                                            <h6>180 ريال</h6>
                                            <button>
                                                <i class="fa-regular fa-cart-shopping-fast"></i>
                                            </button>
                                        </div>
                                        <div class="rate_sale">
                                            <p>
                                                <span class="old_price">400 ريال</span>
                                                <span class="sale">خصم 49.07%</span>
                                            </p>
                                            <a href="#!">
                                                <b>5 <i class="fa-sharp fa-solid fa-star"></i></b> (6)
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- JS -->
    <script src="assetsdemo/js/main.js"></script>
    <script src="assetsdemo/js/app.js"></script>
</body>

</html>