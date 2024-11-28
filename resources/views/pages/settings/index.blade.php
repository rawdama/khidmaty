@extends('layouts.master')

@section('title', 'Admin Settings')

@section('page-header')
    @section('PageTitle', 'Admin Settings')
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <form action="{{ route('settings.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="form-group">
                            @foreach (config('app.languages') as $locale => $language)
                                <div class="form-group col-md-6">
                                    <label for="name_{{ $locale }}">{{ __('name') }} ({{ $language }})</label>
                                    <input type="text" class="form-control w-100" id="name_{{ $locale }}" name="name_{{ $locale }}" value="{{ old("name_$locale", optional($settings)->translate($locale)->name) }}" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="address_{{ $locale }}">{{ __('address') }} ({{ $language }})</label>
                                    <input type="text" class="form-control w-100" id="address_{{ $locale }}" name="address_{{ $locale }}" value="{{ old("address_$locale", optional($settings)->translate($locale)->address) }}" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="Currency_{{ $locale }}">{{ __('Currency') }} ({{ $language }})</label>
                                    <input type="text" class="form-control w-100" id="Currency_{{ $locale }}" name="Currency_{{ $locale }}" value="{{ old("Currency_$locale", optional($settings)->translate($locale)->Currency) }}" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="terms_policies_{{ $locale }}">{{ __('terms_policies') }} ({{ $language }})</label>
                                    <textarea class="form-control w-100" id="terms_policies_{{ $locale }}" name="terms_policies_{{ $locale }}" rows="5" required>{{ old("terms_policies_$locale", optional($settings)->translate($locale)->terms_policies) }}</textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="privacy_policy_{{ $locale }}">{{ __('privacy_policy') }} ({{ $language }})</label>
                                    <textarea class="form-control w-100" id="privacy_policy_{{ $locale }}" name="privacy_policy_{{ $locale }}" rows="5" required>{{ old("privacy_policy_$locale", optional($settings)->translate($locale)->privacy_policy) }}</textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="about_{{ $locale }}">{{ __('about') }} ({{ $language }})</label>
                                    <textarea class="form-control w-100" id="about_{{ $locale }}" name="about_{{ $locale }}" rows="5" required>{{ old("about_$locale", optional($settings)->translate($locale)->about) }}</textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="who_we_are_{{ $locale }}">{{ __('who_we_are') }} ({{ $language }})</label>
                                    <textarea class="form-control w-100" id="who_we_are_{{ $locale }}" name="who_we_are_{{ $locale }}" rows="5" required>{{ old("who_we_are_$locale", optional($settings)->translate($locale)->who_we_are) }}</textarea>
                                </div>
                            @endforeach
                        </div>

                        <div class="form-group">
                            <label for="twitter_link">رابط تويتر</label>
                            <input type="url" name="twitter_link" class="form-control w-100" id="twitter_link" placeholder="رابط تويتر" value="{{ old('twitter_link', optional($settings)->twitter_link) }}">
                        </div>
                        <div class="form-group">
                            <label for="facebook_link">رابط فيسبوك</label>
                            <input type="url" name="facebook_link" class="form-control w-100" id="facebook_link" placeholder="رابط فيسبوك" value="{{ old('facebook_link', optional($settings)->facebook_link) }}">
                        </div>
                        <div class="form-group">
                            <label for="instagram_link">رابط انستجرام</label>
                            <input type="url" name="instagram_link" class="form-control w-100" id="instagram_link" placeholder="رابط انستجرام" value="{{ old('instagram_link', optional($settings)->instagram_link) }}">
                        </div>
                        <div class="form-group">
                            <label for="snapchat_link">رابط سناب شات</label>
                            <input type="url" name="snapchat_link" class="form-control w-100" id="snapchat_link" placeholder="رابط سناب شات" value="{{ old('snapchat_link', optional($settings)->snapchat_link) }}">
                        </div>
                        <div class="form-group">
                            <label for="linkedin_link">رابط لينكدان</label>
                            <input type="url" name="linkedin_link" class="form-control w-100" id="linkedin_link" placeholder="رابط لينكدان" value="{{ old('linkedin_link', optional($settings)->linkedin_link) }}">
                        </div>
                        <div class="form-group">
                            <label for="youtube_link">رابط يوتيوب</label>
                            <input type="url" name="youtube_link" class="form-control w-100" id="youtube_link" placeholder="رابط يوتيوب" value="{{ old('youtube_link', optional($settings)->youtube_link) }}">
                        </div>
                        <div class="form-group">
                            <label for="whatsapp_link">رابط واتساب</label>
                            <input type="url" name="whatsapp_link" class="form-control w-100" id="whatsapp_link" placeholder="رابط واتساب" value="{{ old('whatsapp_link', optional($settings)->whatsapp_link) }}">
                        </div>
                        <div class="form-group">
                            <label for="app_store_link">رابط App Store</label>
                            <input type="url" name="app_store_link" class="form-control w-100" id="app_store_link" placeholder="رابط App Store" value="{{ old('app_store_link', optional($settings)->app_store_link) }}">
                        </div>
                        <div class="form-group">
                            <label for="google_play_link">رابط Google Play</label>
                            <input type="url" name="google_play_link" class="form-control w-100" id="google_play_link" placeholder="رابط Google Play" value="{{ old('google_play_link', optional($settings)->google_play_link) }}">
                        </div>
                        <div class="form-group">
                            <label for="header_logo">لوجو الهدر</label>
                            <input type="file" name="header_logo" class="form-control w-100" id="header_logo" onchange="displayImage(event, 'headerLogoPreview')">
                            <small>Image Preview:</small><br>
                            <img id="headerLogoPreview" src="{{ optional($settings)->header_logo ? asset($settings->header_logo) : '#' }}" alt="Image Preview" style="display: {{ optional($settings)->header_logo ? 'block' : 'none' }}; width: 100px; height: auto;">
                        </div>
                        <div class="form-group">
                            <label for="footer_logo">لوجو الفوتر</label>
                            <input type="file" name="footer_logo" class="form-control w-100" id="footer_logo" onchange="displayImage(event, 'footerLogoPreview')">
                            <small>Image Preview:</small><br>
                            <img id="footerLogoPreview" src="{{ optional($settings)->footer_logo ? asset($settings->footer_logo) : '#' }}" alt="Image Preview" style="display: {{ optional($settings)->footer_logo ? 'block' : 'none' }}; width: 100px; height: auto;">
                        </div>
                        <div class="form-group">
                            <label for="favicon">الفيف أيكون</label>
                            <input type="file" name="favicon" class="form-control w-100" id="favicon">
                        </div>
                        <div class="form-group">
                            <label for="about_image">صورة من نحن</label>
                            <input type="file" name="about_image" class="form-control w-100" id="about_image" onchange="displayImage(event, 'aboutImagePreview')">
                            <small>Image Preview:</small><br>
                            <img id="aboutImagePreview" src="{{ optional($settings)->about_image ? asset($settings->about_image) : '#' }}" alt="Image Preview" style="display: {{ optional($settings)->about_image ? 'block' : 'none' }}; width: 100px; height: auto;">
                        </div>
                        <div class="form-group">
                            <label for="phone_1">رقم الهاتف 1</label>
                            <input type="text" name="phone_1" class="form-control w-100" id="phone_1" placeholder="رقم الهاتف 1" value="{{ old('phone_1', optional($settings)->phone_1) }}">
                        </div>
                        <div class="form-group">
                            <label for="phone_2">رقم الهاتف 2</label>
                            <input type="text" name="phone_2" class="form-control w-100" id="phone_2" placeholder="رقم الهاتف 2" value="{{ old('phone_2', optional($settings)->phone_2) }}">
                        </div>
                        <div class="form-group">
                            <label for="email">البريد الإلكتروني</label>
                            <input type="email" name="email" class="form-control w-100" id="email" placeholder="البريد الإلكتروني" value="{{ old('email', optional($settings)->email) }}">
                        </div>
                        <button type="submit" class="btn btn-primary">حفظ الإعدادات</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function displayImage(event, previewElementId) {
            const imagePreview = document.getElementById(previewElementId);
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                    imagePreview.style.display = 'block';
                }
                reader.readAsDataURL(file);
            } else {
                imagePreview.style.display = 'none';
            }
        }
    </script>
@endsection

@section('js')
    <!-- Additional JS if needed -->
@endsection