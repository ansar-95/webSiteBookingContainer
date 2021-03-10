<?php $__env->startSection('title'); ?>

<h1> Liste de vos réservations </h1>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php if(count($collectionReservationEtLigneDeReservation)>0): ?>

<?php $__currentLoopData = $collectionReservationEtLigneDeReservation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reservationCourante): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<div class="col-md-9">
    <div class="card ">  
        <div class="card-header bg-info">
            <h4>
                RESERVATION NUMERO : <?php echo e(current($reservationCourante)->numeroDeReservation); ?>

            </h4> 
            <h6>
                EFFECTUEE LE : <?php echo e(date('d/m/Y', current($reservationCourante)->dateReservation)); ?><br>

            </h6>
            <?php if(current($reservationCourante)->etat=="enCours"): ?>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-danger float-right" data-toggle="modal" data-target="#a<?php echo e(current($reservationCourante)->numeroDeReservation); ?>">
                Confirmer la réservation
            </button>

            <!-- Modal -->
            <div class="modal fade" id="a<?php echo e(current($reservationCourante)->numeroDeReservation); ?>" tabindex="-1" role="dialog" aria-labelledby="confirmerReservationModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title " id="exampleModalLabel">Confirmation</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Souhaitez-vous <bold>confirmer</bold> la réservation N° <?php echo e(current($reservationCourante)->numeroDeReservation); ?>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                            <form action="<?php echo e(route('ConfirmerReservation')); ?>" method="post">
                                <?php echo e(csrf_field()); ?>

                                <input type="hidden" name="codeReservation" value="<?php echo e(current($reservationCourante)->codeReservation); ?>">
                                <button class="btn btn-primary" type="submit">Confirmer la réservation</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php else: ?>
            <h2><span class="badge float-right btn-secondary">Réservation Confirmée </span></h2>
            <?php endif; ?>
        </div>
        <div class="card-body ">
            <p>
                MISE A DISPOSITION :
                <?php echo e(current($reservationCourante)->villeDepart); ?> le <?php echo e(date('d/m/Y', current($reservationCourante)->dateDebutReservation)); ?>

                <br>
                RESTITUTION :
                <?php echo e(current($reservationCourante)->villeArrivee); ?> le <?php echo e(date('d/m/Y', current($reservationCourante)->dateFinReservation)); ?>

            </p>
            <table class="table table-sm table-striped">  
                <thead class="thead-dark ">

                    <tr>
                        <th>Type de container</th>
                        <th>Quantité</th>

                    </tr> 

                    <?php $__currentLoopData = $reservationCourante; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ligneDeReservation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($ligneDeReservation->libelleTypeContainer); ?></td>
                        <td><?php echo e($ligneDeReservation->qteReserver); ?></td>

                    </tr>  
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>
        </div>
    </div>
    <br>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>