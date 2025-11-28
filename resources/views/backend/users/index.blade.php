@extends('backend.layouts.master')

@section('title', 'User Manage')

@section('content')

    <div class="card">
        <div class="card-header">
            <h4 class="mb-0">All Registered Users</h4>
        </div>

        <div class="card-body table-responsive">
            <table class="table table-hover align-middle">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>View</th>
                    <th>Action</th>
                </tr>
                </thead>

                <tbody>
                @foreach($users as $index => $user)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td><span class="badge bg-info">{{ ucfirst($user->role) }}</span></td>

                        <td>
                            @if($user->active)
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-danger">Inactive</span>
                            @endif
                        </td>

                        <td>
                            <a href="{{ route('user.activities') }}?uid={{ $user->id }}" class="btn btn-sm btn-primary">
                                👁 View
                            </a>
                        </td>

                        <td>
                            <form action="{{ route('admin.users.status', $user->id) }}" method="POST">
                                @csrf
                                <button class="btn btn-sm {{ $user->active ? 'btn-danger' : 'btn-success' }}">
                                    {{ $user->active ? 'Deactivate' : 'Activate' }}
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>

@endsection
