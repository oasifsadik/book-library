@extends('fontend.master')

@section('fontContent')
    <div class="container">
        <h1>Ordered Books</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Book Name</th>
                    <th>User</th>
                    <!-- Add more columns for other details if needed -->
                </tr>
            </thead>
            <tbody>
                @foreach($orderedBooks as $orderedBook)
                    <tr>
                        <td>{{ $orderedBook->book->name }}</td>
                        <td>{{ $orderedBook->user->name }}</td>
                        <!-- Add more columns with book or user details -->
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
