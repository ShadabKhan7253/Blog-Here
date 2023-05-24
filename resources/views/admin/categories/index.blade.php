@extends('admin.layout.app')

@section('main-content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-item-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Categories</h1>
    </div>

    <div class="row">
        <div class="col-md-12">
            @include('admin.layout._alert-message')
            <table class="table table-bordered">
                <thead>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Post Count</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td> 0 </td>
                            <td>
                                <a href="{{ route('admin.categories.edit',$category->id) }}" class="btn btn-primary"><i class="fas fa-pen"></i></a>
                                <a href="{{ route('admin.categories.edit',$category->id) }}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>

                    @endforeach
                </tbody>
            </table>
            {{ $categories->links('vendor.pagination.bootstrap-5') }}
        </div>
    </div>
</div>
@endsection
