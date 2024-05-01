@extends('dashboard.layouts.main')

@section('title')
    show Message
@endsection


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>show Message</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.messages.index') }}">Messages</a></li>
                            <li class="breadcrumb-item active">Message</li>
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
                                    <h3 class="card-title">Message Details</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-0">
                                    <table class="table table-sm">
                                        <tbody>
                                            <tr>

                                                <th>Name</th>
                                                <td>
                                                    {{ $message->name }}
                                                </td>

                                            </tr>

                                            <tr>

                                                <th>Email</th>
                                                <td>
                                                    {{ $message->email }}
                                                </td>

                                            </tr>

                                            <tr>

                                                <th>Subject</th>
                                                <td>
                                                    {{ $message->subject ?? '...' }}
                                                </td>

                                            </tr>

                                            <tr>

                                                <th>body</th>
                                                <td>
                                                    {{ $message->body }}
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

                </div>


            </div>
            <!-- /.content -->
        </section>

        <div class="card">
            <div class="card-header">
                <h3 class=" card-title">Send response</h3>
            </div>
            <div class="card-body p-0">
                @include('dashboard.pages.errors.errors')
                <form action="{{ route('dashboard.messages.response', $message->id) }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class=" form-group">
                            <label> Title</label>
                            <input type="text" class="form-control" name="Title" value="{{ old('Title') }}">
                        </div>
                        <div class=" form-group">
                            <label> body</label>
                            <textarea class=" form-control" name="body" rows="5">{{ old('body') }}</textarea>
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
    <!-- /.content-wrapper -->
@endsection
