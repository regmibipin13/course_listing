@extends('layouts.frontend')
@section('content')
    <section id="courses" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 my-3">
                    <h3>{{ $course->title }}</h3>
                </div>
                <div class="col-md-12">
                    <img src="{{ $course->display_image }}" alt="{{ $course->title }}" width="100%" height="500">
                </div>
                <div class="col-md-12 my-3">
                    <h2>Rs. {{ $course->price }}</h2>
                </div>
                <div class="col-md-8 my-3 richTextContainer">
                    {!! $course->description !!}
                </div>
                <div class="col-md-4">
                    <div class="card mb-2">
                        <div class="card-header">
                            Instructor Details
                        </div>
                        <div class="card-body">
                            <span>{{ $course->instructor->name }}</span><br>
                            <span>{{ $course->instructor->email }}</span><br>
                        </div>
                    </div>
                    <div class="card mb-2">
                        <div class="card-header">
                            Course Created By
                        </div>
                        <div class="card-body">
                            <span>{{ $course->created_by_user->name }}</span><br>
                            <span>{{ $course->created_by_user->email }}</span><br>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
