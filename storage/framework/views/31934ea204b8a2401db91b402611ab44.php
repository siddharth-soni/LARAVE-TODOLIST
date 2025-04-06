<!-- Button to trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#taskModal">
    Add Task
</button>

<!-- Modal -->
<div class="modal fade" id="taskModal" tabindex="-1" aria-labelledby="taskModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="taskModalLabel">Add New Task</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?php echo e(route('tasks.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>

                    <!-- Task Title -->
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" id="title" class="form-control" placeholder="Enter title name"
                            required>
                    </div>

                    <!-- Description -->
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" name="description" id="description" class="form-control"
                            placeholder="Enter description" required>
                    </div>

                    <!-- Status Checkbox -->
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="status" id="status"
                                value="non-pending">
                            <label class="form-check-label" for="status">
                                Mark as Non-Pending
                            </label>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Task</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS (Make sure it's included) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<?php /**PATH C:\wamp64\www\PROJECTS\LARAVEL\ToDoList\resources\views/add.blade.php ENDPATH**/ ?>