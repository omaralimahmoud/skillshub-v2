@extends('dashboard.layouts.main')

@section('title')
    show Exam
@endsection


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ $exam->name }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.exams.index') }}">Exams</a></li>
                            <li class="breadcrumb-item active">{{ $exam->name }}</li>
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
                        <div class=" col-md-10 offset-md-1 pb-3">

                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Exam Details</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-0">
                                    <table class="table table-sm">
                                        <tbody>
                                            <tr>

                                                <th>Name</th>
                                                <td>
                                                    {{ $exam->name }}
                                                </td>

                                            </tr>

                                            <tr>

                                                <th>description</th>
                                                <td>
                                                    {{ $exam->description }}
                                                </td>

                                            </tr>

                                            <tr>

                                                <th>skill</th>
                                                <td>
                                                    {{ $exam->skill->name }}
                                                </td>

                                            </tr>

                                            <tr>

                                                <th>Image</th>
                                                <td>
                                                    <img src="{{ asset("uploads/$exam->image") }}" height="50px" alt="">
                                                </td>

                                            </tr>
                                            <tr>

                                                <th>question_number</th>
                                                <td>
                                                    {{ $exam->question_number }}
                                                </td>

                                            </tr>
                                            <tr>

                                                <th>difficulty</th>
                                                <td>
                                                    {{ $exam->difficulty }}
                                                </td>

                                            </tr>
                                            <tr>

                                                <th>duration_minutes</th>
                                                <td>
                                                    {{ $exam->duration_minutes }}
                                                </td>

                                            </tr>
                                            <tr>

                                                <th>Active</th>
                                                <td>
                                                    @if ($exam->is_active)
                                                        <span class=" badge bg-success">Yes</span>
                                                    @else
                                                        <span class=" badge bg-danger">No</span>
                                                    @endif


                                                </td>

                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                    <a href="{{ route('dashboard.exams.questions.show', $exam->id) }}" class=" btn btn-sm  btn-success">Show Question </a>
                    <a href="{{ url()->previous() }}" class=" btn btn-sm  btn-primary">Back</a>
                </div>


            </div>
            <!-- /.content -->
        </section>

    </div>
    <!-- /.content-wrapper -->
@endsection
