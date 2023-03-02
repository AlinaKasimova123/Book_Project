<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    
    
    
    <title>Document</title>
</head>
<body class="antialiased">

































<?php
$user = auth()->user();
?>
<div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
    <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
        <?php if(auth()->guard()->check()): ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('author-rights')): ?>
                <a href="<?php echo e(route('myBooks', $user->id)); ?>"
                   class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Мои
                    книги</a>
                <a href="<?php echo e(route('addAuthorBook', $user->id)); ?>"
                   class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Добавить
                    книгу</a>
            <?php endif; ?>
        <?php else: ?>
            <a href="<?php echo e(route('login')); ?>"
               class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                in</a>

            <?php if(Route::has('register')): ?>
                <a href="<?php echo e(route('register')); ?>"
                   class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
            <?php endif; ?>
        <?php endif; ?>
    </div>
    <h3>Название книги:</h3>
    <?php $__currentLoopData = $bookInfo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <p><?php echo e($book->name); ?></p>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <h3>Автор книги:</h3>
    <?php $__currentLoopData = $authors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $author): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <p><?php echo e($author->fio); ?></p>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <?php
        foreach ($bookInfo as $book) {
            $bookId = $book->id;
        }
        ?>
    <h2>Оставьте комментарий:</h2>
    <form id="newComment" method="POST" action="<?php echo e(route('addComment', $bookId)); ?>">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label for="email">Email</label>
            <input class="form-control" id="email" name="email" type="text" value="" placeholder="Email">
            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="alert alert-danger"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="form-group">
            <label>Ваше ФИО</label>
            <input class="form-control" type="text" value="" placeholder="ФИО">
            <?php $__errorArgs = ['fio'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="alert alert-danger"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="form-group">
            <label for="comment">Комментарий</label>
            <textarea class="form-control" id="comment" name="comment" type="text" placeholder="Комментарий"></textarea>
            <?php $__errorArgs = ['fio'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="alert alert-danger"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="form-group">
            <button class="btn btn-lg btn-primary" type="submit" name="registration">Отправить</button>
        </div>
    </form>

    <h2>Комментарии:</h2>
    <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <p><?php echo e($comment->comment); ?></p>
        <div>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin-rights')): ?>
                <a href="<?php echo e(route('updateComment', [$bookId, $comment->id])); ?>">Редактировать</a>
                <a href="<?php echo e(route('deleteComment', [$bookId, $comment->id])); ?>">Удалить</a>
            <?php endif; ?>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
</body>
</html>
<?php /**PATH C:\OSPanel\domains\localhost\resources\views/books/show.blade.php ENDPATH**/ ?>