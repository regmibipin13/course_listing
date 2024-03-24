@extends('layouts.app')
@section('content')
    <div class="container my-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Edit Course
                    </div>
                    <div class="card-body">
                        <form action="{{ route('courses.update', $course->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            @include('courses.form')
                            <button type="submit" class="btn btn-success">Save</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
