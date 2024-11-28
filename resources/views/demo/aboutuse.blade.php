@extends('demo-layouts.master')
@section('title', 'empty')
@section('page-header')
    @section('PageTitle', 'empty')
@endsection

@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <section class="about-us">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <div class="aboutus_contect">
                                <div class="aboutt">
                                    <h1>مرحبًا بك في خدمتى!</h1>
                                    <p class="about_us__text">
                                        نحن شركة متخصصة في توريد قطع غيار السيارات عالية الجودة 🛠️ وتقديم خدمات الصيانة
                                        الشاملة
                                        🧰. تأسست شركتنا مع رؤية واضحة لتحقيق التميز في صناعة السيارات وخدمة عملائنا بشكل
                                        استثنائي.
                                    </p>
                                </div>
                                <div class="history">
                                    <h3>📅 تاريخنا:</h3>
                                    <p>
                                        تأسست شركتنا في عام 2003، ومنذ ذلك الحين، نعمل بجدية لتزويد عملائنا بأفضل قطع الغيار
                                        والخدمات. نتفهم أهمية سلامة وأداء سياراتكم، ولذا نقدم منتجات عالية الجودة وأنظمة
                                        صيانة
                                        متطورة 🚀.
                                    </p>
                                </div>
                                <div class="message">
                                    <h3>📜 رسالتنا:</h3>
                                    <p>
                                        رسالتنا هي تقديم قيمة ملموسة لعملائنا. نسعى دائمًا لتلبية احتياجاتكم وضمان رضائكم
                                        😊. نعمل بإخلاص واهتمام دائم لضمان أن تكون سيارتكم دائمًا في أفضل حال 🚗.
                                    </p>
                                </div>
                                <div class="vision">
                                    <h3>🌠 رؤيتنا:</h3>
                                    <p>
                                        رؤيتنا هي أن نصبح الوجهة الأولى لعملائنا عند البحث عن قطع غيار السيارات والخدمات
                                        الفعّالة للصيانة. نسعى لتحقيق هذه الرؤية من خلال الالتزام بالجودة والاهتمام
                                        بالتفاصيل في كل ما نقدمه 🎯.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="image">
                                <img src={{asset("assetsdemo/images/about-us.jpg")}} alt="about">
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="testimonials">
                <div class="container">
                    <h2>آراء العملاء</h2>
                    <div class="swiper testimonilasSwiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                @foreach ($opnions as $opnion )
                                    
                                
                                <div class="review">
                                    <div><h4>{{$opnion->name}}</h4></div>
                                    
                                    <div>
                                    <p>
                                        {{$opnion->comment}}
                                    </p>
                                </div>
                                </div>
                                @endforeach
                                
                                
                                
                            </div>
                            
                           
                           
                           
                        </div>
                        <div class="testimonialsSwiperPagination"></div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <!-- row closed -->
@endsection

@section('js')
   
@endsection