
@extends('layouts.app', ['activePage' => 'Questions-management', 'titlePage' => __('Questions Management')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">{{ __('Questions') }}</h4>
                <p class="card-category"> {{ __('Here you can manage questions') }}</p>
              </div>
              <div class="card-body">
                @if (session('status'))
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <span>{{ session('status') }}</span>
                      </div>
                    </div>
                  </div>
                @endif
                <div class="row">
                  <div class="col-12 text-right">
                    <a href="{{ route('questions.create') }}" class="btn btn-sm btn-primary">{{ __('Add Question') }}</a>
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                          {{ __('Question') }}
                      </th>
                      <th>
                          {{ __('Answers') }}
                      </th>
                      <th>
                          {{ __('Score') }}
                      </th>
                      <th>
                        {{ __('Quiz Name') }}
                      </th>
                      <th>
                        {{ __('Creation date') }}
                      </th>
                      <th class="text-right">
                        {{ __('Actions') }}
                      </th>
                    </thead>
                    <tbody>
                      @foreach($questions as $question)
                        <tr>
                          <td>
                            <a href="#" title="{{ $question->title }}">
                                {{ Str::limit($question->title, 25) }}
                            </a>
                          </td>
                          <td>
                            {{ Str::limit($question->right_answer, 20) }}
                          </td>
                          <td>
                            {{ $question->score }}
                          </td>
                          <td>
                            <a href="/admin/quiz/{{ $question->quiz->id }}">{{ $question->quiz->name }}</a>
                          </td>
                          <td>
                            {{ $question->created_at->diffForHumans() }}
                          </td>
                          <td class="td-actions text-right">

                              <form action="{{ route('questions.destroy', $question) }}" method="post">
                                  @csrf
                                  @method('delete')
                                  <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('questions.edit', $question) }}" data-original-title="" title="">
                                    <i class="material-icons">edit</i>
                                    <div class="ripple-container"></div>
                                  </a>
                                  <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this user?") }}') ? this.parentElement.submit() : ''">
                                      <i class="material-icons">close</i>
                                      <div class="ripple-container"></div>
                                  </button>
                              </form>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end" aria-label="...">
                        {{ $questions->links() }}
                    </nav>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection
