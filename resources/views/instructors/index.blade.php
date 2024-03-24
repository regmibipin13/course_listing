@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 my-3">
                <div>
                    <a href="{{ route('instructors.create') }}" class="btn btn-success">Add New</a>
                </div>
                <div class="card my-2">
                    <div class="card-header">
                        Instructors
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Created By</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($instructors))
                                    @foreach ($instructors as $instructor)
                                        <tr>
                                            <td>{{ $instructor->id }}</td>
                                            <td>{{ $instructor->name }}</td>
                                            <td>{{ $instructor->email }}</td>
                                            <td>{{ $instructor->created_by_user->name }}
                                                (#{{ $instructor->created_by_user->id }})
                                            </td>
                                            <td class="d-flex">
                                                <a href="{{ route('instructors.edit', $instructor->id) }}"
                                                    class="btn btn-info btn-sm">Edit</a>
                                                &nbsp;
                                                <form action="{{ route('instructors.destroy', $instructor->id) }}"
                                                    method="POST">
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
                        {{ $instructors->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
