@if (App::getLocale() == 'en')
    <link href="{{ URL::asset('assetsdemo/css/ltr.css') }}" rel="stylesheet">
@else
    <link href="{{ URL::asset('assetsdemo/css/rtl.css') }}" rel="stylesheet">
@endif
<div class="offers_bar">
    <div class="container">
        <div class="language">
            @foreach (config('app.languages') as $key => $language)
            <button onclick="changeLocale('{{ $key }}')" class="btn btn-light">
                {{ $language }}
                <i class="fa-sharp fa-light fa-language"></i>
            </button>
        @endforeach

        </div>
        <div class="offers">
            <div class="swiper offersSwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <p> احجز خدمة صيانة لسيارتك الآن واحصل على فحص مجاني للسيارة.</p>
                    </div>
                    <div class="swiper-slide">
                        <p>
                            اكتشف مجموعة واسعة من الإكسسوارات الداخلية والخارجية بتخفيضات تصل إلى 30%.
                        </p>
                    </div>
                    <div class="swiper-slide">
                        <p> اشترِ قطع الغيار والزيوت بقيمة ١٥٠ دولار أو أكثر واحصل على شحن مجاني.</p>
                    </div>
                    <div class="swiper-slide">
                        <p>
                            اختر باقة صيانة سيارتك واحصل على خدمات متعددة بأسعار مميزة وضمان
                            الجودة.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="social">
            <ul>
                <li>
                    <a href="#!"> <i class="fa-brands fa-facebook-f"></i> </a>
                </li>
                <li>
                    <a href="#!"> <i class="fa-brands fa-instagram"></i> </a>
                </li>
                <li>
                    <a href="#!"> <i class="fa-brands fa-twitter"></i> </a>
                </li>
            </ul>
        </div>
    </div>
</div>