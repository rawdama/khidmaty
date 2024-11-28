@extends('demo-layouts.master')
@section('title', 'empty')
@section('page-header')
    @section('PageTitle', 'empty')
@endsection

@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <section class="stores-section">
                <div class="row">
                    <div class="col-12 mb-3">
                        <form action="{{ route('stores.search') }}" method="GET">
                            <input type="text" name="name" placeholder="تبحث عن متجر .. ؟" class="form-control">
                        </form>
                    </div>
                    @foreach($stores as $store)
                    <div class="col-lg-3 col-6 p-2">
                        <a href="shop.html" class="store_card store_page">
                            <div class="logo">
                                <img src="{{ asset('storage/uploads/' . $store->photo) }}" alt="{{ $store->name }}" width="100" height="auto">
                            </div>
                            <h6>{{$store->name}} </h6>
                        </a>
                    </div>
                    @endforeach
                    
                 
                    
                    
                </div>
            </section>
        </div>
    </div>
    <!-- row closed -->
@endsection

@section('js')
   
@endsection