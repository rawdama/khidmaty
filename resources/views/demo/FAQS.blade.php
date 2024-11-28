@extends('demo-layouts.master')
@section('title', 'الأسئلة الشائعة')
@section('page-header')
    @section('PageTitle', 'الأسئلة الشائعة')
@endsection

@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <section class="faqs">
                <div class="container">
                    <div class="row align-items-center justify-content-around">
                        <div class="col-12 p-3 faqs-content">
                            <h3>الأسئلة الشائعة <i class="fa-sharp fa-solid fa-question"></i></h3>
                            <div class="accordion" id="accordionExample">
                                @foreach ($questions as $index => $question)
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading{{ $index }}">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapse{{ $index }}" aria-expanded="false" 
                                            aria-controls="collapse{{ $index }}">
                                            {{$question->question}}
                                        </button>
                                    </h2>
                                    <div id="collapse{{ $index }}" class="accordion-collapse collapse"
                                        aria-labelledby="heading{{ $index }}" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <p>
                                                {{$question->answer}}
                                            </p>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js">
    </script>
@endsection