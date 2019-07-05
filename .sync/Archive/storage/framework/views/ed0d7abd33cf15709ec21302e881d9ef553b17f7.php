<?php $__env->startSection('body'); ?>
        <tbody>
    <?php $__currentLoopData = $searchResults; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $searchResult): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>     
          <tr>
            <td><?php echo e($searchResult->type); ?></td>
            <td><?php echo e($searchResult->title); ?></td>

            <td>
<?php echo e($searchResult->url); ?>

            </td>

            <td>

            </td>
            <td><a href="/company/<?php echo e($searchResult->type); ?>/edit" class="waves-effect waves-light btn-small"><i class="tiny material-icons left">edit</i>UPDATE</a></td>
          </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>


</form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
  ##parent-placeholder-d7eb6b340a11a367a1bec55e4a421d949214759f##


<?php $__env->stopSection(); ?>
<?php echo $__env->make('company.header.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\web4doc\resources\views/company/search.blade.php ENDPATH**/ ?>