<?php $__env->startSection('title', $title); ?>

<?php $__env->startSection('content'); ?>
 <h3><?php echo e($title); ?></h3>

  <nav>
    <div class="nav-wrapper">
      <form action="<?php echo e(route('search')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="input-field">
          <input id="search" type="search" required name="query" >
          <label class="label-icon" for="search"><i class="material-icons">search</i></label>
          <i class="material-icons">close</i>
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
        <tbody>
    <?php $__currentLoopData = $companys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>     
          <tr>
            <td><?php echo e($company->id); ?></td>
            <td><?php echo e($company->company_name); ?></td>

            <td>
            <?php if($company->athletes_count): ?>
               <?php echo e($company->athletes_count); ?>

            <?php endif; ?>
            </td>

            <td>
            <?php if($company->teams_count): ?>
               <?php echo e($company->teams_count); ?>

            <?php endif; ?>
            </td>
            <td><a href="/company/<?php echo e($company->id); ?>/edit" class="waves-effect waves-light btn-small"><i class="tiny material-icons left">edit</i>UPDATE</a></td>
          </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>


</form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
  ##parent-placeholder-d7eb6b340a11a367a1bec55e4a421d949214759f##


<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\web4doc\resources\views/company/company.blade.php ENDPATH**/ ?>