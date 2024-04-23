@extends('dashboard.layouts.main')

@section('title')
    Edit-Question-Exams
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Question Exam</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.exams.index') }}">Exams</a></li>
                            <li class="breadcrumb-item active">Add New </li>

                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>


        <section class="content ">
            <div class=" container-fluid">
                <div class=" row">
                    <div class=" col-12 pb-3">
                        @include('dashboard.pages.errors.errors')
                        <form action=" {{ route('dashboard.exams.questions.update', ['exam' => $exam->id, 'question' => $question->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">






                                <div class="row">
                                    <div class=" col-6">
                                        <div class=" form-group">

                                            <label> Title</label>
                                            <input type="text" class=" form-control" name="title" value=" {{ $question->title }}">
                                        </div>
                                    </div>



                                    <div class=" col-6">
                                        <div class=" form-group">

                                            <label> right_answer</label>
                                            <input type="number" min="1" max="4" class=" form-control" name="right_answer" value="{{ $question->right_answer }}">
                                        </div>
                                    </div>

                                    <div class=" col-6">
                                        <div class=" form-group">

                                            <label> Option 1</label>
                                            <input type="text" class=" form-control" name="option_1" value="{{ $question->option_1 }}">
                                        </div>
                                    </div>

                                    <div class=" col-6">
                                        <div class=" form-group">

                                            <label> Option 2</label>
                                            <input type="text" class=" form-control" name="option_2" value="{{ $question->option_2 }}">
                                        </div>
                                    </div>

                                    <div class=" col-6">
                                        <div class=" form-group">

                                            <label> Option 3</label>
                                            <input type="text" class=" form-control" name="option_3" value="{{ $question->option_3 }}">
                                        </div>
                                    </div>

                                    <div class=" col-6">
                                        <div class=" form-group">

                                            <label> Option 4</label>
                                            <input type="text" class=" form-control" name="option_4" value="{{ $question->option_4 }}">
                                        </div>
                                    </div>




                                </div>







                                <div class=" form-group">
                                    <button type="submit" class=" btn  btn-success">Submit</button>

                                </div>

                            </div>



                        </form>


                    </div>

                </div>

            </div>
        </section>

    </div>
    <!-- /.content-wrapper -->
@endsection

@push('scripts')
    <script></script>
@endpush
