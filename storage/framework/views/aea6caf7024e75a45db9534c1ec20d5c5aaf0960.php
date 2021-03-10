<?php $__env->startSection('title'); ?>
<h1> DEVIS </h1>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php if(!$collectionDevis->isEmpty()): ?>
<?php $__currentLoopData = $collectionDevis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reservation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="col-md-9">
    <div class="card ">
        <div class="card-header bg-info">
            <h4>
                DEVIS DU <?php echo e($reservation->getDevis()->getDateDevis()); ?> <br>
                RESERVATION NUMERO : <i><?php echo e($reservation->getNumeroDeReservation()); ?></i>
            </h4>
            <h6>
                EFFECTUEE LE : <?php echo e($reservation->getDateReservation()); ?><br>
            </h6>
            <?php if($reservation->getDevis()->getValider()==0): ?>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-danger float-right" datatoggle="modal" data-target="#a<?php echo e($reservation->getDevis()->getCodeDevis()); ?>">
                Valider le DEVIS
            </button>
            <!-- Modal -->
            <div class="modal fade" id="a<?php echo e($reservation->getDevis()->getCodeDevis()); ?>" tabindex="-1" role="dialog" arialabelledby="confirmerReservationModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title "
                                id="exampleModalLabel">Confirmation</h5>
                            <button type="button" class="close" datadismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Souhaitez-vous <bold>valider</bold> le devis
                            relatif à la réservation N° <?php echo e($reservation->getNumeroDeReservation()); ?>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">Annuler</button>
                            <form action="" method="post">
                                <?php echo e(csrf_field()); ?>

                                PHILIPPE VIGNARD 14
                                <input type="hidden" name="codeDevis"
                                       value="<?php echo e($reservation->getDevis()->getCodeDevis()); ?>">
                                <button class="btn btn-primary"
                                        type="submit">Valider le DEVIS</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php else: ?>
            <h2><span class="badge float-right btn-secondary">DEVIS
                    VALIDé</span></h2>
            <?php endif; ?>
        </div>
        <div class="card-body ">
            <p>

                Montant total du devis : <?php echo e($reservation->getDevis()->getMontantDevis()); ?>


                Nombre total de container : <?php echo e($reservation->getDevis()->getNbContainers()); ?>

            </p>
            <table class="table table-sm table-striped">
                <thead class="thead-dark ">
                    <tr>
                        <th>Type de container</th>
                        <th>Quantité</th>
                    </tr>
                    <?php
                    foreach ($reservation->getReservers() as $ligneDeReservation):
                        $typeContainer = $ligneDeReservation->getTypecontainer();
                        ?>
                        <tr>
                            <td>
                                <?php echo e($typeContainer->getlibelletypecontainer()); ?>

                            </td>
                            <td>
                                <?php echo e($ligneDeReservation->getqtereserver()); ?>

                            </td>
                        </tr>
                    <?php endforeach; ?>
            </table>
        </div>
    </div>
    <br>
    <br>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php else: ?>
<p class="">
    Vous n'avez pas de devis en cours
</p>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>