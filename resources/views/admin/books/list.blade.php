@extends('admin.master')

@section('adminCOntent')
<h1 class="h3 mb-0 text-gray-800">Create Books</h1>
<div class="container-fluid mt-3">
   <table class="table border rounded">
        <thead>
            <tr>
                <td>sl</td>
                <td>Name</td>
                <td>Description</td>
                <td>Price</td>
                <td>status</td>
                <td>file</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
            @php
                $i = 1;
            @endphp
            @foreach ($books as $book)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $book->name }}</td>
                <td>{{ $book->description }}</td>
                <td>{{ $book->price }}</td>
                <td>{{ $book->status }}</td>
                <td>
                    @if($book->file)
                        <a href="{{ asset('books/' . $book->file) }}" target="_blank">View PDF</a>
                    @endif
                </td>
                <td>
                    <a href="{{ url('/Admin/edit',$book->id) }}" class="btn btn-outline-success btn-sm">edit</a>
                    <a href="{{ url('/Admin/delete',$book->id) }}" class="btn btn-outline-danger btn-sm">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
   </table>
</div>
@endsection
