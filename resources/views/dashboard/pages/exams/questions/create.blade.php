@extends('dashboard.layouts.main')

@section('title')
    Exams
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add New Exam</h1>
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
                        <form action=" {{ route('dashboard.exams.questions.store', $exam_id) }}" method="POST">
                            @csrf
                            <div class="card-body">



                                @for ($i = 1; $i <= $question_number; $i++)
                                    <h5>Question{{ $i }}</h5>

                                    <div class="row">
                                        <div class=" col-6">
                                            <div class=" form-group">

                                                <label> Title</label>
                                                <input type="text" class=" form-control" name="titles[]" value="{{ old('titles[]') }}" >
                                            </div>
                                        </div>



                                        <div class=" col-6">
                                            <div class=" form-group">

                                                <label> right_answer</label>
                                                <input type="number" min="1" max="4" class=" form-control" name="right_answers[]" value="{{ old('right_answers[]') }}" >
                                            </div>
                                        </div>

                                        <div class=" col-6">
                                            <div class=" form-group">

                                                <label> Option 1</label>
                                                <input type="text" class=" form-control" name="option_1s[]" value="{{ old('option_1s[]') }}" >
                                            </div>
                                        </div>

                                        <div class=" col-6">
                                            <div class=" form-group">

                                                <label> Option 2</label>
                                                <input type="text" class=" form-control" name="option_2s[]" value="{{ old('option_2s[]') }}" >
                                            </div>
                                        </div>

                                        <div class=" col-6">
                                            <div class=" form-group">

                                                <label> Option 3</label>
                                                <input type="text" class=" form-control" name="option_3s[]" value="{{ old('option_3s[]') }}" >
                                            </div>
                                        </div>

                                        <div class=" col-6">
                                            <div class=" form-group">

                                                <label> Option 4</label>
                                                <input type="text" class=" form-control" name="option_4s[]" value="{{ old('option_4s[]') }}" >
                                            </div>
                                        </div>




                                    </div>
                                @endfor






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
