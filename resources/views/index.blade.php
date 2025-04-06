@include('layouts.header')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            {{-- @include('partial.add') --}}
            <div class="card shadow-lg p-4">

                <h4 class="text-center mb-4">To-Do List</h4>

                <form action="{{ route('tasks.store') }}" method="POST">
                    @csrf

                    <!-- Task Title -->
                    @include('add')

                    <!-- Submit Button -->
                    {{-- <button type="submit" class="btn btn-primary w-100">Add To Db</button> --}}
                </form>
            </div>
            <!-- Task List -->
            <div class="mt-4">
                <h5 class="text-center">Tasks</h5>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $task)
                                <tr>
                                    <td>{{ $task->title }}</td>
                                    <td>{{ $task->description }}</td>
                                    <td>{{ $task->status == 'pending' ? 'Pending' : 'Non-Pending' }}</td>
                                    <td class="d-flex gap-2">
                                        <!-- Delete Form with SweetAlert -->
                                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST"
                                            class="delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger btn-sm delete-btn"
                                                data-id="{{ $task->id }}">Delete</button>
                                        </form>

                                        <!-- Edit Button with SweetAlert -->
                                        <a href="{{ route('tasks.edit', $task->id) }}"
                                            class="btn btn-warning btn-sm edit-btn" data-id="{{ $task->id }}">EDIT</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // DELETE CONFIRMATION
        document.querySelectorAll(".delete-btn").forEach(button => {
            button.addEventListener("click", function (event) {
                event.preventDefault();

                let form = this.closest(".delete-form"); // Get the closest form

                Swal.fire({
                    title: "Are you sure?",
                    text: "This task will be permanently deleted!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#3085d6",
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit(); // If confirmed, submit the form
                    }
                });
            });
        });

        // EDIT CONFIRMATION
        document.querySelectorAll(".edit-btn").forEach(button => {
            button.addEventListener("click", function (event) {
                event.preventDefault();

                let editUrl = this.getAttribute("href"); // Get the edit URL

                Swal.fire({
                    title: "Are you sure?",
                    text: "You are about to edit this task.",
                    icon: "info",
                    showCancelButton: true,
                    confirmButtonColor: "#28a745",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, Edit!",
                    cancelButtonText: "No, Cancel!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = editUrl; // Redirect to edit page
                    }
                });
            });
        });
    });
</script>

@include('layouts.footer')