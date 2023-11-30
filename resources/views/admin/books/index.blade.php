@extends('admin.master')

@section('adminCOntent')
<h1 class="h3 mb-0 text-gray-800">Create Books</h1>
<div class="container-fluid">
   <div class="col-md-8 offset-2 border rounded p-3 shadow">
        <form action="{{ url('/admin/save') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" name="title"  placeholder="enter book name" >
            </div>
            <div class="form-group">
                <label for="">Description</label>
                <input type="text" class="form-control" name="description"  placeholder="enter book description" >
            </div>
            <div class="form-group">
                <label for="">file</label>
                <input type="file" class="form-control" name="file" >
            </div>
            <div class="form-group">
                <label for="">price</label>
                <input type="number" class="form-control" name="price" >
            </div>
            <div class="form-group">
                <label class="" >Select Book Status</label>
                <select class="custom-select mb-3" name="status">
                    <option selected disabled>Book Status</option>
                        <option value="free" {{ old('status') == 'free' ? 'selected' : '' }}>free</option>
                        <option value="premium" {{ old('status') == 'premium' ? 'selected' : '' }}>premium</option>
                </select>
            </div>
            <div class="form-group">
            <button type="submit" class="btn btn-success w-100">Submit</button>
            </div>
       </form>
   </div>
</div>
@endsection
