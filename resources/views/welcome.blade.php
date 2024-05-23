@extends('layouts.app')

@section('title', 'HomePage')

@section('content')
    <div class="p-5 mb-4 bg-light rounded-3">
        <div class="container-fluid py-5 text-center">
            <h1 class="display-5 fw-bold">Hello User</h1>
            <p class="col-md-8 fs-4 my-5  mx-auto ">
                Please Login To Enter To Dashboard <br>
                If You Dodn't Have An Account Please Register
            </p>
            <button class="btn btn-outline-primary btn-lg px-4" type="button">
                Let's Start!
            </button>
        </div>
    </div>
@endsection