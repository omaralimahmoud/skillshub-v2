@extends('dashboard.layouts.auth.auth-main')
@section('title')
    Verification Email
@endsection
@section('content')
    <div class="card  login-box  w-75">
        <div class="card-header">
            Featured
        </div>
        <div class="card-body ">



            <h3 class="card-text">a Verification Email sent successfully, please check your inbox</h3>

            <form action="{{ route('dashboard.dashboard.auth.verification.send') }}" method="POST">
                @csrf
                <button class="btn btn-primary" type="submit">ResendEmail</button>
            </form>



        </div>
    </div>
@endsection
