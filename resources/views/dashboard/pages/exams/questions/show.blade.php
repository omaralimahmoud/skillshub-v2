@extends('dashboard.layouts.main')

@section('title')
    show ExamQuestions
@endsection


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ $exam->name }} Questions</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.exams.index') }}">Exams</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.exams.show', $exam->id) }}">Back</a></li>
                            <li class="breadcrumb-item active">Questions</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>


        <section>

            <!-- /.content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <!-- /.card -->
                        @include('dashboard.pages.messages.message')
                        <div class=" col-12 pb-3">

                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Exam Questions</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover text-nowrap">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Title</th>
                                                <th>Options</th>
                                                <th>Right_answer</th>
                                                <th>Actions</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($exam->questions as $question)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $question->title }}</td>
                                                    <td>
                                                        {{ $question->option_1 }} |<br>
                                                        {{ $question->option_2 }} |<br>
                                                        {{ $question->option_3 }} |<br>
                                                        {{ $question->option_4 }}
                                                    </td>

                                                    <td>{{ $question->right_answer }}</td>





                                                    <td>
                                                        <a href="{{ route('dashboard.exams.questions.edit', ['exam' => $exam->id, 'question' => $question->id]) }}" class="btn btn-sm btn-info ">
                                                            <i class=" fas fa-edit"></i>
                                                        </a>

                                                    </td>


                                                    {{-- <td>


                                                        <form action="{{ route('dashboard.exams.destroy', $exam->id) }}" method="POST" class=" d-inline-block">
                                                            @csrf
                                                            @method('DELETE')

                                                            <button type="submit" onclick="return confirm('are you sure?')" class=" btn btn-sm btn-danger">
                                                                <i class=" fas fa-trash"></i>
                                                            </button>
                                                        </form>



                                                         </td> --}}



                                                </tr>
                                            @endforeach




                                        </tbody>
                                    </table>

                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                    <a href="{{ route('dashboard.exams.index') }}" class=" btn btn-sm  btn-success">Back to all exams</a>
                    <a href="{{ url()->previous() }}" class=" btn btn-sm  btn-primary">Back</a>
                </div>


            </div>
            <!-- /.content -->
        </section>

    </div>
    <!-- /.content-wrapper -->
@endsection
