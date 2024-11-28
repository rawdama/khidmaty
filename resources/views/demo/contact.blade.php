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
            <section class="contact-us">
                <div class="container">
                    <!-- contact info row -->
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-12 p-3">
                            <div class="info">
                                <div class="icon">
                                    <img src="{{ asset('assetsdemo/images/location.svg') }}" alt="location">
                                </div>
                                <p>{{ $setting->address }}</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12 p-3">
                            <div class="info">
                                <div class="icon">
                                    <img src="{{ asset('assetsdemo/images/phone.svg') }}" alt="phone">
                                </div>
                                <a href="tel:+{{ $setting->phone_1 }}">{{ $setting->phone_1 }}</a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12 p-3">
                            <div class="info">
                                <div class="icon">
                                    <img src="{{ asset('assetsdemo/images/email.svg') }}" alt="email">
                                </div>
                                <a href="mailto:{{ $setting->email }}">{{ $setting->email }}</a>
                            </div>
                        </div>
                    </div><!-- form row -->
                    <div class="row">
                        <div class="col-12 p-3">
                            <form action="{{ route('contact.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <!-- field-set -->
                                    <div class="inputfield">
                                        <label for="name">الإسم كاملا</label>
                                        <input type="text" id="name" name="name" required>
                                        <span class="highlight"></span>
                                    </div>
                                    <!-- field-set -->
                                    <div class="inputfield">
                                        <label for="email">البريد الإلكترونى</label>
                                        <input type="email" id="email" name="email" required>
                                        <span class="highlight"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <!-- field-set -->
                                    <div class="inputfield">
                                        <label for="phone">رقم الجوال</label>
                                        <input type="tel" id="phone" name="phone" required>
                                        <span class="highlight"></span>
                                    </div>
                                    <!-- field-set -->
                                    <div class="inputfield">
                                        <label for="subject">موضوع الرسالة</label>
                                        <input type="text" id="subject" name="subject" required>
                                        <span class="highlight"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <!-- field-set -->
                                    <div class="inputfield">
                                        <label for="message" class="message-label">رسالتك</label>
                                        <textarea name="message" id="message" required></textarea>
                                        <span class="highlight"></span>
                                    </div>
                                </div>
                                <button type="submit">إرسال</button>
                            </form>
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