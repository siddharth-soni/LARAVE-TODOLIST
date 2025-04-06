<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Task</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- FontAwesome Icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-success text-white text-center">
                    <h4 class="mb-0"><i class="fas fa-edit me-2"></i> Edit Task</h4>
                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('tasks.update', $task->id)); ?>" method="POST" class="update-form">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PATCH'); ?>

                        <!-- Title -->
                        <div class="mb-3">
                            <label for="title" class="form-label fw-bold">Task Title</label>
                            <input type="text" name="title" id="title" value="<?php echo e($task->title); ?>" required 
                                   class="form-control" placeholder="Enter task title">
                        </div>

                        <!-- Description -->
                        <div class="mb-3">
                            <label for="description" class="form-label fw-bold">Task Description</label>
                            <textarea name="description" id="description" rows="3" required 
                                      class="form-control" placeholder="Enter task description"><?php echo e($task->description); ?></textarea>
                        </div>

                        <!-- Status -->
                        <div class="mb-3">
                            <label for="status" class="form-label fw-bold">Task Status</label>
                            <select name="status" id="status" class="form-select">
                                <option value="pending" <?php echo e($task->status == 'pending' ? 'selected' : ''); ?>>Pending</option>
                                <option value="completed" <?php echo e($task->status == 'non pending' ? 'selected' : ''); ?>>Non Pending</option>
                            </select>
                        </div>

                        <!-- Update Button -->
                        <button type="button" class="btn btn-success w-100 update-btn">
                            <i class="fas fa-save me-2"></i> Update Task
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript for SweetAlert -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // UPDATE CONFIRMATION
        document.querySelector(".update-btn").addEventListener("click", function (event) {
            event.preventDefault(); // Prevent form submission

            let form = this.closest(".update-form"); // Get the form

            Swal.fire({
                title: "Confirm Update",
                text: "Are you sure you want to update this task?",
                icon: "question",
                showCancelButton: true,
                confirmButtonColor: "#28a745",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, Update",
                cancelButtonText: "Cancel"
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit(); // Submit form if confirmed
                }
            });
        });
    });
</script>

<!-- Bootstrap 5 JavaScript Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
<?php /**PATH C:\wamp64\www\PROJECTS\LARAVEL\ToDoList\resources\views/edit.blade.php ENDPATH**/ ?>