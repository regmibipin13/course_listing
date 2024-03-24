@extends('layouts.app')
@section('content')
    <div class="container my-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Create New Instructor
                    </div>
                    <div class="card-body">
                        <form action="{{ route('instructors.store') }}" method="POST">
                            @csrf
                            @include('instructors.form')
                            <button type="submit" class="btn btn-success">Save</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
