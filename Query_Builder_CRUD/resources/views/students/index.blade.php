@extends('students.layout')
 
@section('content')
    <div class="row" style="margin-top: 20px;">
            <div class="col-lg-12 margin-tb">
                <div style="text-align: center;">
                    <h4>Laravel Application with Image Upload Using  Query Builder</h4>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('students.create') }}"> 
                        Add New Student
                    </a>
                </div>
            </div>
    </div>
 
    <br>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <!-- works,when deleted -->
 
    <table class="table table-bordered" style="margin-top: 20px;">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Address</th>
            <th>Image</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($students as $student)
            <tr>
                <td>{{ $student->id }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->address}}</td>
                <td><img src="/images/{{ $student->image }}" width="100px"></td>
                <td>
                    <form action="{{ route('students.destroy', $student->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('students.show', $student->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('students.edit', $student->id) }}">Edit</a>
 
                        @csrf
                        @method('DELETE') 
                        <button type="submit" class="btn btn-danger">Delete</button>

                    </form>
                </td>
            </tr>
        @endforeach
    </table>
 
    {!! $students->links() !!}
    <!-- it works for paginate -->
 
@endsection