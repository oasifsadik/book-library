@extends('fontend.master')

@section('fontContent')
<div class="container-fluid">
    <div class="container mt-3">
        <div class="row shadow rounded-5 p-4">
            <div class="col-md-4 p-3 border rounded shadow">
                <img src="{{ asset('web/img/PDF_file_icon.svg.webp') }}" height="300px" alt="">
            </div>
            <div class="col-md-6 p-3 m-3">
                <p>Description: <br>{{ $book->description }}</p>
                <p>Status: <br>{{ $book->status }}</p>
                <p>Price: <br>{{ $book->price }}</p>
                <p>
                    @if ($book->status == 'free')
                        <a class="text-decoration-none btn btn-outline-success btn-sm" href="{{ asset('books/' . $book->file) }}" target="_blank">View PDF</a>
                    @elseif ($book->status == 'premium')
                        <form action="{{ url('orderItem', $book->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-outline-dark">Order Now</button>
                        </form>
                    @endif
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
