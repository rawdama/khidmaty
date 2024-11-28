@extends('demo-layouts.master')
@section('title', 'empty')
@section('page-header')
    @section('PageTitle', 'empty')
@endsection

@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <section class="blog_details__section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <div class="blog_content">
                                <h3> {{$blog->name}}   </h3>
                                <p>
                                    {{$blog->desc}}
                                </p>
                                <div class="share_blog">
                                    <h6>مشاركة المدونة:</h6>
                                    <ul class="social_share">
                                        <li>
                                            <a href="#">
                                                <i class="fa-brands fa-facebook-f"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa-brands fa-instagram"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa-brands fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa-brands fa-linkedin-in"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12 mb-lg-0 mb-4">
                            <div class="blog_img">
                                <img src="{{ asset('storage/uploads/' . $blog->photo) }}" alt="blog">
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
   
@endsection