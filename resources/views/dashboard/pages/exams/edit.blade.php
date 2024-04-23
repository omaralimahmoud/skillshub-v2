@extends('dashboard.layouts.main')

@section('title')
    Edit-Exams
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Exam</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.exams.index') }}">Exams</a></li>
                            <li class="breadcrumb-item active">Edit </li>

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
                        <form action="{{ route('dashboard.exams.update', $exam->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class=" row">
                                    <div class=" col-6">
                                        <div class=" form-group">
                                            <label> Name(en)</label>
                                            <input type="text" class=" form-control" name="name_en" value="{{ $exam->getTranslation('name', 'en') }} ">
                                        </div>

                                    </div>


                                    <div class=" col-6">
                                        <div class=" form-group">
                                            <label> Name(ar)</label>
                                            <input type="text" class=" form-control" name="name_ar" value="{{ $exam->getTranslation('name', 'ar') }}">
                                        </div>

                                    </div>








                                </div>


                                <div class=" form-group">
                                    <label> Description(en)</label>
                                    <textarea name="description_en" class=" form-control" rows="5">{{ $exam->getTranslation('description', 'en') }}</textarea>
                                </div>

                                <div class=" form-group">
                                    <label> Description(ar)</label>
                                    <textarea name="description_ar" class=" form-control" rows="5">{{ $exam->getTranslation('description', 'ar') }}</textarea>
                                </div>

                                <div class=" row">
                                    <div class=" col-6">
                                        <div class="form-group">
                                            <label>Skill</label>
                                            <select class="custom-select form-control" name="skill_id">
                                                @foreach ($skills as $skill)
                                                    <option value="{{ $skill->id }}" @if ($exam->skill_id == $skill->id) selected @endif>{{ $skill->name }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>



                                    <div class=" col-6">
                                        <div class=" form-group">
                                            <label>Image</label>
                                            <div class=" input-group">
                                                <img src="{{ asset("uploads/$exam->image") }}" height="50px" alt="">
                                                <div class=" custom-file">
                                                    <input type="file" name="image" class=" custom-file-input">
                                                    <label class=" custom-file-label">Choose file</label>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>



                                <div class=" row">




                                    <div class=" col-6">
                                        <div class=" form-group">
                                            <label>Difficulty</label>
                                            <input type="number" class=" form-control" name="difficulty" value="{{ $exam->difficulty }}">
                                        </div>

                                    </div>


                                    <div class=" col-6">
                                        <div class=" form-group">
                                            <label>duration_minutes</label>
                                            <input type="number" class=" form-control" name="duration_minutes" value="{{ $exam->duration_minutes }}">
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
