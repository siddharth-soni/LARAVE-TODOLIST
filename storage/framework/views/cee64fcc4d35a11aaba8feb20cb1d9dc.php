<?php echo $__env->make('layouts.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            
            <div class="card shadow-lg p-4">

                <h4 class="text-center mb-4">To-Do List</h4>

                <form action="<?php echo e(route('tasks.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>

                    <!-- Task Title -->
                    <?php echo $__env->make('add', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

                    <!-- Submit Button -->
                    
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
                            <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($task->title); ?></td>
                                    <td><?php echo e($task->description); ?></td>
                                    <td><?php echo e($task->status == 'pending' ? 'Pending' : 'Non-Pending'); ?></td>
                                    <td class="d-flex gap-2">
                                        <!-- Delete Form with SweetAlert -->
                                        <form action="<?php echo e(route('tasks.destroy', $task->id)); ?>" method="POST"
                                            class="delete-form">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="button" class="btn btn-danger btn-sm delete-btn"
                                                data-id="<?php echo e($task->id); ?>">Delete</button>
                                        </form>

                                        <!-- Edit Button with SweetAlert -->
                                        <a href="<?php echo e(route('tasks.edit', $task->id)); ?>"
                                            class="btn btn-warning btn-sm edit-btn" data-id="<?php echo e($task->id); ?>">EDIT</a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

<?php echo $__env->make('layouts.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\PROJECTS\LARAVEL\ToDoList\resources\views/index.blade.php ENDPATH**/ ?>