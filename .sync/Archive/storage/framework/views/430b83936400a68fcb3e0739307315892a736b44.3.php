<?php $__env->startSection('title', $title); ?>

<?php $__env->startSection('content'); ?>
 <h3><?php echo e($title); ?></h3>

  <nav>
    <div class="nav-wrapper">
    <form action="<?php echo e(route('search')); ?>" method="get">
      <div class="input-group">
        <input type="search" name="search" class="form-control">
        <span class="input-group-prepend">
          <button type="submit" class="btn btn-primary">Search</button>
        </span>
      </div>
    </form>
    </div>
  </nav>

  <form>
  <input type="hidden" name="_token" id="_token" value="<?php echo e(csrf_token()); ?>">


      <table class="responsive-table">
        <thead>
          <tr>
              <th>Id</th>
              <th>Nome società</th>
              <th>Numero di atleti</th>
              <th>Numero di team</th>
              <th>Azioni</th>
          </tr>
        </thead>
<?php echo $__env->yieldContent('body'); ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('templates.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\web4doc\resources\views/company/header/header.blade.php ENDPATH**/ ?>