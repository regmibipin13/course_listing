@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 my-3">
                <div>
                    <a href="{{ route('courses.create') }}" class="btn btn-success">Add New</a>
                </div>
                <div class="card my-2">
                    <div class="card-header">
                        Courses
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Title</th>
                                    <th>Price</th>
                                    <th>Instructor Name</th>
                                    <th>Instructor Email</th>
                                    <th>Created By</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($courses))
                                    @foreach ($courses as $course)
                                        <tr>
                                            <td>{{ $course->id }}</td>
                                            <td>{{ $course->title }}</td>
                                            <td>Rs.{{ $course->price }}</td>
                                            <td>Rs.{{ $course->instructor->name }}</td>
                                            <td>Rs.{{ $course->instructor->email }}</td>
                                            <td>{{ $course->created_by_user->name }}
                                                (#{{ $course->created_by_user->id }})
                                            </td>
                                            <td class="d-flex">
                                                <a href="{{ route('courses.edit', $course->id) }}"
                                                    class="btn btn-info btn-sm">Edit</a>
                                                &nbsp;
                                                <a href="{{ route('courses.show', $course->id) }}"
                                                    class="btn btn-primary btn-sm">View</a>
                                                &nbsp;
                                                <form action="{{ route('courses.destroy', $course->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="4" class="text-center">No Data Available</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        {{ $courses->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
