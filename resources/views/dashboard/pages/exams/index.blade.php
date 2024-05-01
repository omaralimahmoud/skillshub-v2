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
                        <h1>Exams</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
                            <li class="breadcrumb-item active">exams </li>

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
                                <h3 class="card-title">All Exams</h3>

                                <div class="card-tools">

                                    <a href="{{ route('dashboard.exams.create') }}" class=" btn btn-sm  btn-primary">
                                        Add New
                                    </a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Image</th>
                                            <th>Skill</th>
                                            <th>question_number</th>
                                            <th>Active</th>
                                            <th>Actions</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($exams as $exam)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $exam->name }}</td>
                                                <td>
                                                    <img src="{{ asset("uploads/$exam->image") }}" height="50px" alt="">
                                                </td>
                                                <td>{{ $exam->skill->name }}</td>
                                                <td>{{ $exam->question_number }}</td>
                                                <td>
                                                    @if ($exam->is_active)
                                                        <span class=" badge bg-success">Yes</span>
                                                    @else
                                                        <span class=" badge  bg-danger">No</span>
                                                    @endif
                                                </td>
                                                <td>


                                                    <a href="{{ route('dashboard.exams.show', $exam->id) }}" class="btn btn-sm btn-primary ">
                                                        <i class=" fas fa-eye"></i>
                                                    </a>

                                                    <a href=" {{ route('dashboard.exams.questions.show', $exam->id) }}" class="btn btn-sm btn-success ">
                                                        <i class=" fas fa-question"></i>
                                                    </a>

                                                    <a href="{{ route('dashboard.exams.edit', $exam->id) }}" class="btn btn-sm btn-info ">
                                                        <i class=" fas fa-edit"></i>
                                                    </a>






                                                    <form action="{{ route('dashboard.exams.destroy', $exam->id) }}" method="POST" class=" d-inline-block">
                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit" onclick="return confirm('are you sure?')" class=" btn btn-sm btn-danger">
                                                            <i class=" fas fa-trash"></i>
                                                        </button>
                                                    </form>





                                                    <a href="{{ route('dashboard.exams.toggle', $exam->id) }}" class=" btn btn-sm  btn-secondary">
                                                        <i class="fas fa-toggle-on"></i>
                                                    </a>
                                                </td>

                                            </tr>
                                        @endforeach




                                    </tbody>
                                </table>
                                <div class=" d-flex justify-content-center my-3">
                                    {{ $exams->links() }}
                                </div>

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
