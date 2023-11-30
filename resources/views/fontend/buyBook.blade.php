@extends('fontend.master')
@section('fontContent')
<div class="container-fluid">
    <div class="container mt-3">
        <div class="row">
            @foreach ($buys as $buy)
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header text-center">
                        <img class="" src="{{ asset('web/img/PDF_file_icon.svg.webp') }}" height="200px" width="200px" alt="">
                    </div>
                    <div class="card-body">
                        <p>Name :{{ $buy->book->description }}</p>
                        <p>{{ $buy->book->description }}</p>
                            <div class="d-flex justify-content-between">
                                <p class="text-end">
                                        <a class="text-decoration-none btn btn-outline-success btn-sm" href="{{ asset('books/' . $buy->book->file) }}" target="_blank">View PDF</a>
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
