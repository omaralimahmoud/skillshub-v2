@extends('dashboard.layouts.main')

@section('title')
    skills
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>skills</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
                            <li class="breadcrumb-item active">skills </li>

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
                                <h3 class="card-title">All skills</h3>

                                <div class="card-tools">
                                    <!-- <div class="input-group input-group-sm" style="width: 150px;">
                                                                                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                                                                    <div class="input-group-append">
                                                                                        <button type="submit" class="btn btn-default">
                                                                                            <i class="fas fa-search"></i>
                                                                                        </button>
                                                                                    </div>
                                                                                </div>-->
                                    <button type="button" data-toggle="modal" class=" btn btn-sm  btn-primary" data-target="#add-modal">
                                        Add New
                                    </button>
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
                                            <th>Category</th>
                                            <th>Active</th>
                                            <th>Actions</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($skills as $skill)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $skill->name }}</td>
                                                <td>
                                                 <img src="{{ asset("uploads/$skill->image") }}" height="50px" alt="">
                                                </td>
                                                <td>{{ $skill->category->name }}</td>
                                                <td>
                                                    @if ($skill->is_active)
                                                        <span class=" badge bg-success">Yes</span>
                                                    @else
                                                        <span class=" badge  bg-danger">No</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-sm btn-info edit-btn" data-toggle="modal" data-target="#edit-modal" data-id="{{ $skill->id }}" data-name-en="{{ $skill->getTranslation('name', 'en') }}" data-name-ar="{{ $skill->getTranslation('name', 'ar') }}" data-image="{{ $skill->image }}" data-category_id="{{ $skill->category_id }}">
                                                        <i class=" fas fa-edit"></i>
                                                    </button>

                                                    <form action="{{ route('dashboard.skills.destroy', $skill->id) }}" method="POST" class=" d-inline-block">
                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit" onclick="return confirm('are you sure?')" class=" btn btn-sm btn-danger">
                                                            <i class=" fas fa-trash"></i>
                                                        </button>
                                                    </form>





                                                    <a href="{{ route('dashboard.skills.toggle', $skill->id) }}" class=" btn btn-sm  btn-secondary">
                                                        <i class="fas fa-toggle-on"></i>
                                                    </a>
                                                </td>

                                            </tr>
                                        @endforeach




                                    </tbody>
                                </table>
                                <div class=" d-flex justify-content-center my-3">
                                    {{ $skills->links() }}
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

    <!-- /.modal -->

    <div class="modal fade" id="add-modal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add New</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @include('dashboard.pages.errors.errors')
                    <form action=" {{ route('dashboard.skills.store') }}" method="POST" id="add-form" enctype="multipart/form-data">
                        @csrf

                        <div class=" row">
                            <div class=" col-6">
                                <div class="form-group">
                                    <label>Name(en)</label>
                                    <input type="text" name="name_en" class="form-control">
                                </div>
                            </div>
                            <div class=" col-6">
                                <div class="form-group">
                                    <label>Name(ar)</label>
                                    <input type="text" name="name_ar" class="form-control">
                                </div>

                            </div>
                        </div>

                        <div class=" row">
                            <div class=" col-6">
                                <div class="form-group">
                                    <label>Category</label>
                                    <select class="custom-select form-control" name="category_id">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class=" col-6">
                                <div class="form-group">
                                    <label>Image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="image">
                                            <label class="custom-file-label">Choose file</label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>





                    </form>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" form="add-form" class="btn btn-primary"> submit</button>

                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->







    <!-- / edit.modal -->

    <div class="modal fade" id="edit-modal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @include('dashboard.pages.errors.errors')
                    <form action=" {{ route('dashboard.skills.update') }}" method="POST" id="edit-form" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" id="edit-form-id">
                        <div class=" row">


                            <div class=" col-6">
                                <div class="form-group">
                                    <label>Name(en)</label>
                                    <input type="text" name="name_en" class="form-control" id="edit-form-name-en">
                                </div>
                            </div>



                            <div class=" col-6">
                                <div class="form-group">
                                    <label>Name(ar)</label>
                                    <input type="text" name="name_ar" class="form-control" id="edit-form-name-ar">
                                </div>

                            </div>


                        </div>



                        <div class=" row">
                            <div class=" col-6">
                                <div class="form-group">
                                    <label>Category</label>
                                    <select class="custom-select form-control"name="category_id" id="edit-form-category-id">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{$category->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class=" col-6">
                                <div class="form-group">
                                    <label>Image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="image">
                                            <label class="custom-file-label">Choose file</label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>



                    </form>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" form="edit-form" class="btn btn-primary"> submit</button>

                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- edit /.modal -->
@endsection

@push('scripts')
    <script>
        $('.edit-btn').click(function() {
            let id = $(this).attr('data-id')
            let nameEn = $(this).attr('data-name-en')
            let nameAr = $(this).attr('data-name-ar')
            let image = $(this).attr('data-image')
            let category_id = $(this).attr('data-category_id')
            // console.log(id, name, nameAr);
            $('#edit-form-id').val(id);
            $('#edit-form-name-en').val(nameEn);
            $('#edit-form-name-ar').val(nameAr);

            $('#edit-form-category-id').val(category_id)

        })
    </script>
@endpush
