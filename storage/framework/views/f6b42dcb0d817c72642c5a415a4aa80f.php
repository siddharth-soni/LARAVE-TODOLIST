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
                                        <!-- Delete Form -->
                                        <form action="<?php echo e(route('tasks.destroy', $task->id)); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="button" class="btn btn-danger btn-sm delete-btn"
                                                data-id="<?php echo e($task->id); ?>">Delete</button>
                                        </form>

                                        <!-- Edit Button -->
                                        <a href="<?php echo e(route('tasks.edit', $task->id)); ?>"
                                            class="btn btn-warning btn-sm">EDIT</a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div><?php /**PATH C:\wamp64\www\PROJECTS\LARAVEL\ToDoList\resources\views/delete.blade.php ENDPATH**/ ?>