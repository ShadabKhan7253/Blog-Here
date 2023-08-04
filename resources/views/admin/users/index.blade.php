@extends('admin.layout.app')

@section('main-content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-item-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Blogs</h1>
            <a href="{{ route('admin.blogs.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-plus fa-sm text-white-50 mr-1"></i>Create Blog</a>
        </div>

        <div class="row">
            <div class="col-md-12">
                @include('admin.layout._alert-message')
                <table class="table table-bordered table-responsive">
                    <thead>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Post Count</th>
                        <th>Actions</th>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>
                                    <img src="#" alt="{{ $user->name }}" width="80px">
                                </td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }} </td>
                                <td>{{ $user->role }} </td>
                                <td>{{ $user->blogs->count() }} </td>
                                <td>
                                    {{-- <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary"><i
                                            class="fas fa-pen"></i></a> --}}
                                    @if (!$user->isAdmin())
                                        <form action="{{ route('admin.users.makeAdmin', $user->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-outline-success">Make Admin</button>
                                        </form>
                                    @endif
                                    @if ($user->isAdmin())
                                        <form action="{{ route('admin.users.revokeAdmin', $user->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button class="btn btn-outline-danger">
                                                Revoke Admin</button>
                                        </form>
                                    @endif
                                    @if ($users->getName == 'ABCD')
                                        <h1>Shad</h1>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                @if ($users->count() == 0)
                    <p>No users founds</p>
                @endif

                {{ $users->links('vendor.pagination.bootstrap-5') }}
            </div>
        </div>
    </div>
    <!-- Admin Modal-->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="POST" action="" id="deleteForm">
                @csrf
                @method('DELETE')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Delete Blog?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Are you sure you want to delete blog?</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

{{-- @section('scripts')
    <script>
        function deleteModalHelper(url) {
            document.getElementById("deleteForm").setAttribute('action', url);
        }
    </script>
@endsection --}}
