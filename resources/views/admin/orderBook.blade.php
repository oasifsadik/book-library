@extends('admin.master')

@section('adminCOntent')
<div class="container">
    <h1>Admin Dashboard - Orders</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>User</th>
                <th>Book Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->user->name }}</td>
                    <td>{{ $order->book->name }}</td>
                    <td>
                        @if($order->admin_approved === 'pending')
                                <a href="{{ url('admin/approved',$order->id) }}" class="btn btn-success btn-sm">Complate</a>
                            @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
