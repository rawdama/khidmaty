@extends('layouts.master')

@section('title', 'FAQS')

@section('page-header')
    @section('PageTitle', 'Manage Questions')
@endsection

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#QuestionModal">Add Question</button><br><br>

                    <div class="table-responsive">
                        <table id="datatable" class="table table-hover table-sm table-bordered p-0" data-page-length="50" style="text-align: center">
                            <thead>
                                <tr class="alert-success">
                                    <th>#</th>
                                    <th>QUESTION</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($questions as $question)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $question->question }}</td>
                                        <td>
                                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit{{$question->id}}" title="edit">
                                                <li class="fa fa-edit"></li>
                                            </button>

                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{$question->id}}" title="delete">
                                                <li class="fa fa-trash"></li>
                                            </button>
                                            <!-- Delete Confirmation Modal -->
                                            <div class="modal fade" id="delete{{$question->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Delete question</h5>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you sure you want to delete this record?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form action="{{ route('questions.destroy', $question->id) }}" method="POST" style="display:inline;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger">Delete</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Edit Modal -->
                                            <div class="modal fade" id="edit{{$question->id}}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{$question->id}}" aria-hidden="true">
                                                <div class="modal-dialog modal-xl" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="editModalLabel{{$question->id}}">Edit Question</h5>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('questions.update', $question->id) }}" method="post">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="form-row">
                                                                    @foreach (config('app.languages') as $locale => $language)
                                                                        <div class="form-group">
                                                                            <label for="question_{{ $locale }}_{{$question->id}}">{{ __('question') }} ({{ $language }})</label>
                                                                            <input type="text" class="form-control" id="question_{{ $locale }}_{{$question->id}}" name="question_{{ $locale }}" value="{{ $question->translate($locale)->question ?? '' }}" required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="answer_{{ $locale }}_{{$question->id}}">{{ __('answer') }} ({{ $language }})</label>
                                                                            <input type="text" class="form-control" id="answer_{{ $locale }}_{{$question->id}}" name="answer_{{ $locale }}" value="{{ $question->translate($locale)->answer ?? '' }}" required>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Adding Questions -->
    <div class="modal fade" id="QuestionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Question</h5>
                </div>
                <div class="modal-body">
                    <form id="adminForm" action="{{ route('questions.store') }}" method="post">
                        @csrf
                        <div class="form-row">
                            @foreach (config('app.languages') as $locale => $language)
                                <div class="form-group">
                                    <label for="question_{{ $locale }}">{{ __('question') }} ({{ $language }})</label>
                                    <input type="text" class="form-control" id="question_{{ $locale }}" name="question_{{ $locale }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="answer_{{ $locale }}">{{ __('answer') }} ({{ $language }})</label>
                                    <input type="text" class="form-control" id="answer_{{ $locale }}" name="answer_{{ $locale }}" required>
                                </div>
                            @endforeach
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" id="saveAdmin">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')

@endsection