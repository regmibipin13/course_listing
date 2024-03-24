@extends('layouts.frontend')
@section('content')
    <section id="courses" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 my-3">
                    <h3>Available Courses</h3>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        @foreach ($courses as $course)
                            <div class="col-md-3 mb-3">
                                <div class="card">
                                    <img src="{{ $course->display_image }}" class="card-img-top" alt="{{ $course->title }}">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $course->title }}</h5>
                                        <p class="card-text">Rs. {{ $course->price }}</p>
                                        <p class="card-text">By Instructor {{ $course->instructor->name }}</p>
                                        <div class="d-flex">
                                            <a href="{{ route('frontend.courseDetails', $course->id) }}"
                                                class="btn btn-primary btn-sm">View
                                                Details</a>
                                            &nbsp;
                                            @auth
                                                @if ($course->created_by_user_id == auth()->id())
                                                    <a href="{{ route('courses.edit', $course->id) }}"
                                                        class="btn btn-info btn-sm">Edit</a>
                                                    &nbsp;

                                                    <form action="{{ route('courses.destroy', $course->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger btn-sm">Delete</button>
                                                    </form>
                                                @endif
                                            @endauth
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            {{ $courses->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
