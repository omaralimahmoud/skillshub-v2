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
                        <form action="{{ route('dashboard.exams.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class=" row">
                                    <div class=" col-6">
                                        <div class=" form-group">
                                            <label> Name(en)</label>
                                            <input type="text" class=" form-control" name="name_en">
                                        </div>

                                    </div>


                                    <div class=" col-6">
                                        <div class=" form-group">
                                            <label> Name(ar)</label>
                                            <input type="text" class=" form-control" name="name_ar">
                                        </div>

                                    </div>








                                </div>


                                <div class=" form-group">
                                    <label> Description(en)</label>
                                    <textarea name="description_en" class=" form-control" rows="5"></textarea>
                                </div>

                                <div class=" form-group">
                                    <label> Description(ar)</label>
                                    <textarea name="description_ar" class=" form-control" rows="5"></textarea>
                                </div>

                                <div class=" row">
                                    <div class=" col-6">
                                        <div class="form-group">
                                            <label>Skill</label>
                                            <select class="custom-select form-control" name="skill_id">
                                                @foreach ($skills as $skill)
                                                    <option value="{{ $skill->id }}">{{ $skill->name }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>



                                    <div class=" col-6">
                                        <div class=" form-group">
                                            <label>Image</label>
                                            <div class=" input-group">
                                                <div class=" custom-file">
                                                    <input type="file" name="image" class=" custom-file-input">
                                                    <label class=" custom-file-label">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>



                                <div class=" row">


                                    <div class=" col-4">
                                        <div class=" form-group">
                                            <label>Question_number</label>
                                            <input type="number" class=" form-control" name="question_number">
                                        </div>

                                    </div>

                                    <div class=" col-4">
                                        <div class=" form-group">
                                            <label>Difficulty</label>
                                            <input type="number" class=" form-control" name="difficulty">
                                        </div>

                                    </div>


                                    <div class=" col-4">
                                        <div class=" form-group">
                                            <label>duration_minutes</label>
                                            <input type="number" class=" form-control" name="duration_minutes">
                                        </div>

                                    </div>




                                </div>



                                <div class=" form-group">
                                    <button type="submit" class=" btn  btn-success">Submit</button>
                                    <a href="{{ url()->previous() }}" class=" btn btn-primary">Back</a>
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
