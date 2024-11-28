@extends('demo-layouts.master')
@section('title', 'empty')
@section('page-header')
    @section('PageTitle', 'empty')
@endsection

@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <section class="blogs_section">
                <div class="container">
                    <div class="row">
                        @foreach ($blogs as $blog )
                        <div class="col-lg-4 col-md-6 col-12 p-lg-3 p-2">
                            <div class="blog">
                                <a href="blog.html">
                                    <div class="blog_image">
                                        <img src="{{ asset('storage/uploads/' . $blog->photo) }}" alt="blog">
                                    </div>
                                    <div class="date">
                                        <span class="day">{{$blog->created_at->format('d')}}</span>
                                        <span class="month">{{$blog->created_at->format('M')}}</span>
                                    </div>
                                </a>
                                <h4>
                                    <a href="{{ route('blog.show', $blog->id) }}">
                                        
                                        {{$blog->name}}
                                    </a>
                                </h4>
                                <p class="desc">
                                    <span class="preview">{{ Str::limit($blog->desc, 100) }}</span>
                                    <span class="more" style="display: none;">{{ $blog->desc }}</span>
                                </p>
                                <a href="#" class="read-more">Read More</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </section>

           
        </div>
    </div>
    <!-- row closed -->
@endsection

@section('js')
   
@endsection