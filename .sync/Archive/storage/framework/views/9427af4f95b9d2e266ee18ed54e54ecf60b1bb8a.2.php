<?php $__env->startSection('title', $title); ?>

<?php $__env->startSection('content'); ?>
 <h3><?php echo e($title); ?></h3>

  <nav>
    <div class="nav-wrapper">
      <form action="<?php echo e(route('team.index')); ?>" method="get">
        <div class="input-field">
          <input id="search" type="search" name="team_name" required>
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
              <th>Nome team</th>
              <th>Società che possiede il team</th>
              <th>Numero di atleti nel team</th>
              <th>Azioni</th>
          </tr>
        </thead>
        <tbody>
    <?php $__currentLoopData = $teams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $team): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>   
          <tr>
            <td><?php echo e($team->id); ?></td>
            <td><?php echo e($team->team_name); ?></td>

            <td>
            <?php if($team->company->company_name): ?>
               <?php echo e($team->company->company_name); ?>

            <?php endif; ?>
            </td>

            <td>
            <?php if($team->athletes_count): ?>
               <?php echo e($team->athletes_count); ?>

            <?php endif; ?>
            </td>
            <td><a href="/team/<?php echo e($team->id); ?>/edit" class="waves-effect waves-light btn-small"><i class="tiny material-icons left">edit</i>UPDATE</a></td>
          </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>



</form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
  ##parent-placeholder-d7eb6b340a11a367a1bec55e4a421d949214759f##


<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\web4doc\resources\views/team/team.blade.php ENDPATH**/ ?>