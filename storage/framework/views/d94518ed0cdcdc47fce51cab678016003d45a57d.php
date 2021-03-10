<?php $__env->startSection('title'); ?>

<h1> Récapitulatif de votre demande de réservation </h1>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>



<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">Code Type Container</th>
            <th scope="col">Libellé Type Container</th>
            <th scope="col">Longueur</th>
            <th scope="col">largueur</th>
            <th scope="col">poids</th>
            <th scope="col">tare</th>
            <th scope="col">capacité de charge</th>
            <th scope="col">quantité réservée</th>            
        </tr>
    </thead>
    <tbody>

         
        <tr>
    <?php $__currentLoopData = $CollectionlignesReservation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $uneLigneDeReservation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
     <tr>
        <td><?php echo e($uneLigneDeReservation["codeTypeContainer"]); ?></td>
        <td><?php echo e($uneLigneDeReservation["libelleTypeContainer"]); ?></td>
        <td><?php echo e($uneLigneDeReservation["longueurCont"]); ?></td>
        <td><?php echo e($uneLigneDeReservation["largeurCont"]); ?></td>
        <td><?php echo e($uneLigneDeReservation["hauteurCont"]); ?></td>
        <td><?php echo e($uneLigneDeReservation["poidsCont"]); ?></td>
        <td><?php echo e($uneLigneDeReservation["tare"]); ?></td>
        <td><?php echo e($uneLigneDeReservation["capaciteDeCharge"]); ?></td>
        <td><?php echo e($uneLigneDeReservation["qteReserver"]); ?></td> 
     </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
        
    </tbody>
</table>




<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>