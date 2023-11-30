@extends('master')
@section('fcontent')
<section>
    <div class="container mt-3">
        <div class="row">
            @foreach ($books as $book)
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header text-center">
                        <img class="" src="{{ asset('web/img/PDF_file_icon.svg.webp') }}" height="200px" width="200px" alt="">
                    </div>
                    <div class="card-body">
                        <p>{{ $book->description }}</p>
                            <div class="d-flex justify-content-between">
                                <p class="text-left">Price : {{ $book->price }}</p>
                                <p class="text-end">Status :
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
            @endforeach
        </div>
    </div>
</section>
@endsection
