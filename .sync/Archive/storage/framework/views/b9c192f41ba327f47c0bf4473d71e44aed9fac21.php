<?php $__env->startSection('title', $title); ?>

<?php $__env->startSection('content'); ?>
 <h3><?php echo e($title); ?></h3>

  <form>
  <input type="hidden" name="_token" id="_token" value="<?php echo e(csrf_token()); ?>">


      <table class="responsive-table">
        <thead>
          <tr>
              <th>Id</th>
              <th>Data</th>
              <th>Nome atleta</th>
              <th>Altezza</th>
              <th>Peso</th>
          </tr>
        </thead>
        <tbody>

    <?php $__empty_1 = true; $__currentLoopData = $checkups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $checkup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>  
          <tr>
            <td><?php echo e($checkup->id); ?></td>
            <td><?php echo e(date('d-m-Y', strtotime($checkup->date))); ?></td>
            <td><?php echo e($checkup->athlete->name); ?></td>
            <td><?php echo e($checkup->height); ?></td>
            <td><?php echo e($checkup->weight); ?></td>
          </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
          <tr>
            <td colspan="4"><b>Nessuna visita inserita</b></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
    <?php endif; ?>

        </tbody>
      </table>


 

  </ul>
</form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
  ##parent-placeholder-d7eb6b340a11a367a1bec55e4a421d949214759f##


<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\web4doc\resources\views/checkup.blade.php ENDPATH**/ ?>