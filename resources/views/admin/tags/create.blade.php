@extends('admin.layout.app')

@section('main-content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-item-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add New Tag</h1>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.tags.store') }}"  method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="form-label">Name</label>
                        <input
                        type="text"
                        value="{{ old('name') }}"
                        class="form-control @error('name') border-danger text-danger @enderror"
                        placeholder="Enter tag name"
                        name="name"
                        id="name">
                        @error('name')
                            <span class="text-danger">
                                {{ $errors->first('name') }}
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" name="addTag">Submit</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
