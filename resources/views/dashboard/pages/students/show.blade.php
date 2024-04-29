@extends('dashboard.layouts.main')

@section('title')
    Students-show-scores
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>ShowScores {{ $student->name }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
                            <li class="breadcrumb-item active">ShowScore {{ $student->name }} </li>

                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>


        <section class="content my-5">
            <div class=" container-fluid">
                <div class=" row">
                    <div class=" col-12">
                        @include('dashboard.pages.messages.message')
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Scores</h3>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Exam</th>
                                            <th>Score</th>
                                            <th>time_minutes</th>
                                            <th>At</th>
                                            <th>status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($exams as $exam)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $exam->name }}</td>
                                                <td>{{ $exam->pivot->score }}</td>
                                                <td>{{ $exam->pivot->time_minutes }}</td>
                                                <td>{{ $exam->pivot->started_at }}</td>
                                                <td>{{ $exam->pivot->status }}</td>

                                                <td>
                                                    @if ($exam->pivot->status == 'closed')
                                                        <a href="{{ route('dashboard.students.openExam', ['studentId' => $student->id, 'examId' => $exam->id]) }}" class=" btn btn-success">
                                                            <i class=" fas fa-lock-open"></i>
                                                        </a>
                                                    @else
                                                        <a href="{{ route('dashboard.students.closeExam', ['studentId' => $student->id, 'examId' => $exam->id]) }}" class=" btn btn-danger">
                                                            <i class=" fas fa-lock"></i>
                                                        </a>
                                                    @endif

                                                </td>



                                            </tr>
                                        @endforeach




                                    </tbody>
                                </table>


                            </div>
                            <!-- /.card-body -->
                        </div>

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
