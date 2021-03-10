<?php $__env->startSection('title'); ?>

<h3>
 Statistique mensuel (réservations en cours, validées ou
effectuées)
</h3>
<h5>
 Nombre de réservations par mois
</h5>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
 <div id="perf_div" style="width:800px;border:1px solid
black"></div>
 <?php echo \Lava::render('ColumnChart', 'nombreDeReservationParMois',
'perf_div'); ?>

</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>