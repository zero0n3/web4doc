<?php if($paginator->hasPages()): ?>
  <ul class="pagination">
    
        <?php if($paginator->onFirstPage()): ?>
    <li class="disabled"><i class="material-icons">chevron_left</i></li>
        <?php else: ?>
    <li class="waves-effect"><a href="<?php echo e($paginator->previousPageUrl()); ?>"><i class="material-icons">chevron_left</i></a></li>
        <?php endif; ?>    


        
        <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <li class="active"><?php echo e($page); ?></li>

    <li class="waves-effect"><a href="#!"><?php echo e($page); ?></a></li>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


        
        <?php if($paginator->hasMorePages()): ?>
    <li class="waves-effect"><a href="<?php echo e($paginator->nextPageUrl()); ?>"><i class="material-icons">chevron_right</i></a></li>
        <?php else: ?>
    <li class="disabled"><i class="material-icons">chevron_right</i></li>
        <?php endif; ?>    
  </ul>
<?php endif; ?>





<?php if($paginator->hasPages()): ?>
      <ul class="pagination">
        
        <?php if($paginator->onFirstPage()): ?>
            <li class="disabled">
                <i class="material-icons">chevron_left</i>
            </li>
        <?php else: ?>
            <li class="waves-effect">
                <a href="<?php echo e($paginator->previousPageUrl()); ?>" rel="prev" ><i class="material-icons">chevron_left</i></a>
            </li>
        <?php endif; ?>

        
        <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
            <?php if(is_string($element)): ?>
                <li class="disabled"><?php echo e($element); ?></li>
            <?php endif; ?>

            
            <?php if(is_array($element)): ?>
                <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($page == $paginator->currentPage()): ?>
                        <li class="active"><?php echo e($page); ?></li>
                    <?php else: ?>
                        <li class="waves-effect"><a href="<?php echo e($url); ?>"><?php echo e($page); ?></a></li>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        
        <?php if($paginator->hasMorePages()): ?>
            <li class="waves-effect">
                <a href="<?php echo e($paginator->nextPageUrl()); ?>" rel="next"><i class="material-icons">chevron_right</i></a>
            </li>
        <?php else: ?>
            <li class="disabled">
                <i class="material-icons">chevron_right</i>
            </li>
        <?php endif; ?>
    </ul>
<?php endif; ?>

<?php /**PATH C:\xampp\htdocs\web4doc\resources\views/vendor/pagination/default.blade.php ENDPATH**/ ?>