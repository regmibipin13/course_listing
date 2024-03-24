@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 my-3">
                <div class="card my-2">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>Display Image</th>
                                <td>
                                    @if ($url = $course->getFirstMediaUrl())
                                        <img src="{{ $url }}" alt="{{ $course->title }}" width="300" height="200">
                                    @else
                                        No Image
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>ID</th>
                                <td>{{ $course->id }}</td>
                            </tr>
                            <tr>
                                <th>Title</th>
                                <td>{{ $course->title }}</td>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <td>
                                    <div class="richTextContainer">
                                        {!! $course->description !!}
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>Instructor Name</th>
                                <td>{{ $course->instructor->name }}</td>
                            </tr>
                            <tr>
                                <th>Instructor Email</th>
                                <td>{{ $course->instructor->email }}</td>
                            </tr>
                            <tr>
                                <th>Created By</th>
                                <td>{{ $course->created_by_user->name }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
