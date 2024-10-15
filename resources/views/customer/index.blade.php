@extends('layouts.layout')

@section('content')

<div class="container p-5 m-2">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>   
            @endif
            <div class="card shadow">
                <div class="card-header text-white text-center" style="background-color: rgb(151, 151, 209);">
                    <h4>Import Excel Data into Laravel</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('customer.import') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="file" class="form-label">Select Excel File</label>
                            <input type="file" class="form-control" id="file" name="file" required>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-lavender btn-block">Import</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.btn-lavender {
    background-color: rgb(151, 151, 209);
    color: white;
    border: none;
    transition: background-color 0.3s ease;
}

.btn-lavender:hover {
    background-color: #e6e6fa; /* Lighter lavender shade */
    color: black;
}

</style>

@endsection
