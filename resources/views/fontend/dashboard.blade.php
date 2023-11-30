@extends('fontend.master')
@section('fontContent')
<div class="container-fluid">
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
                                        @if($book->file)
                                        <a class="text-decoration-none btn btn-outline-success btn-sm" href="{{ asset('books/' . $book->file) }}" target="_blank">View PDF</a>
                                        @endif
                                    @elseif($book->status == 'premium')
                                        <a href="{{ url('/user/single', $book->id) }}" class="text-decoration-none">Order</a>
                                    @endif
                                </p>
                            </div>

                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
 </div>
@endsection
