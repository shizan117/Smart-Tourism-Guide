@extends('backend.layouts.master')

@section('title', 'Spot Categories')

@section('content')
    <main class="main-content">
        <div class="container-fluid p-0">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="page-title">Manage Categories</h2>
            </div>

            <!-- Add Category -->
            <div class="card mb-3">
                <div class="card-body">
                    <form action="{{ route('admin.spotCategories.store') }}" method="POST">
                        @csrf
                        <div class="d-flex">
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                   placeholder="Category Name" required>
                            <button class="btn btn-primary ms-2">Add</button>
                        </div>
                        @error('name')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </form>
                </div>
            </div>

            <!-- Category List -->
            <div class="card">
                <div class="card-header">All Categories</div>
                <div class="card-body p-0">
                    <table class="table table-bordered mb-0">
                        <thead>
                        <tr>
                            <th width="10%">#</th>
                            <th>Name</th>
                            <th width="25%">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $key => $cat)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $cat->name }}</td>
                                <td class="d-flex align-items-center gap-2">
                                    <!-- Status Slider -->
                                    <label class="switch mb-0">
                                        <input type="checkbox"
                                               class="status-toggle"
                                               data-id="{{ $cat->id }}"
                                            {{ $cat->is_active ? 'checked' : '' }}>
                                        <span class="slider round"></span>
                                    </label>

                                    <!-- Edit button -->
                                    <button class="btn btn-warning btn-sm editBtn"
                                            data-id="{{ $cat->id }}"
                                            data-name="{{ $cat->name }}">
                                        Edit
                                    </button>

                                    <!-- Delete -->
                                    <form action="{{ route('admin.spotCategories.destroy', $cat->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Delete this category?')"
                                          class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        @if($categories->count() == 0)
                            <tr>
                                <td colspan="3" class="text-center text-muted">No categories found.</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </main>

    <!-- Edit Modal -->
    <div class="modal fade" id="editCategoryModal" tabindex="-1">
        <div class="modal-dialog">
            <form method="POST" id="editCategoryForm">
                @csrf
                @method('PUT')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <label class="form-label">Category Name</label>
                        <input type="text" id="editName" name="name" class="form-control" required>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary">Save Changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // Edit Modal
        document.querySelectorAll('.editBtn').forEach(button => {
            button.addEventListener('click', function() {
                let id = this.dataset.id;
                let name = this.dataset.name;

                document.getElementById('editName').value = name;
                document.getElementById('editCategoryForm').action = '/admin/spot-categories/' + id;

                let editModal = new bootstrap.Modal(document.getElementById('editCategoryModal'));
                editModal.show();
            });
        });

        // Status toggle
        document.querySelectorAll('.status-toggle').forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                let id = this.dataset.id;
                let status = this.checked ? 1 : 0;

                fetch('/admin/spot-categories/status/' + id, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ status: status })
                })
                    .then(res => res.json())
                    .then(data => console.log(data));
            });
        });
    </script>

    <style>
        /* Slider switch */
        .switch {
            position: relative;
            display: inline-block;
            width: 50px;
            height: 24px;
        }
        .switch input { display:none; }
        .slider {
            position: absolute;
            cursor: pointer;
            background: #ccc;
            border-radius: 24px;
            top: 0; left: 0; right: 0; bottom: 0;
            transition: .4s;
        }
        .slider:before {
            position: absolute;
            content: "";
            height: 18px;
            width: 18px;
            left: 3px;
            bottom: 3px;
            background: #fff;
            border-radius: 50%;
            transition: .4s;
        }
        input:checked + .slider {
            background: #28a745;
        }
        input:checked + .slider:before {
            transform: translateX(26px);
        }
    </style>
@endsection
