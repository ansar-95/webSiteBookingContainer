<?php $__env->startSection('title'); ?>

<h2> Réservation  </h2>
<h4> le <?php echo e(date('d-m-Y')); ?></h4>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<form action="<?php echo e(route("AjouterReservation")); ?>"  method="post">
    <?php echo e(csrf_field()); ?>

    <div class="row">

        <div class="card-deck">

            <div class="card">
                <div class="card-header bg-info">
                    <h5>Date de mise à disposition et de restitution</h5>
                </div>
                <div class="card-body">
                    <div class="col-lg-10">
                        <div class="form-group">

                            <label class="control-label" for="dateDebutReservation">Date de début</label>
                            <input type="date"  min="<?php echo e(date('Y-m-d')); ?>" id="dateDebutReservation" name="dateDebutReservation" class="form-control" placeholder="date de début de la réservation">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="dateFinReservation">Date de fin</label>
                            <input type="date" min="<?php echo e(date('Y-m-d')); ?>"  id="dateFinReservation" name="dateFinReservation" class="form-control" placeholder="date de fin de la réservation">
                        </div>  

                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header bg-info">
                    <h5> Mise à disposition et restitution </h5>
                </div>

                <div class="card-body">
                    <div class="col-lg-10">
                        <div class="form-group">

                            <label for="codeVilleMiseDisposition">Ville de mise à disposition</label>
                            <select class="custom-select" id="codeVilleMiseDisposition" name="codeVilleMiseDisposition">
                                
                                <?php $__currentLoopData = $collectionVilles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $uneVille): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($uneVille["codeVille"]); ?>">
                                    <?php echo e($uneVille["nomVille"]); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                
                            </select>  

                        </div>
                        <div class="form-group">

                            <label for="codeVilleRendre">Ville de restitution</label>
                            <select class="custom-select" id="codeVilleRendre" name="codeVilleRendre">
                                
                                 <?php $__currentLoopData = $collectionVilles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $uneVille): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($uneVille["codeVille"]); ?>">
                                    <?php echo e($uneVille["nomVille"]); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                
                            </select>  

                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header bg-info">
                    <h5>Information(s) complémentaire(s)</h5>
                </div>
                <div class="card-body">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="control-label" for="volumeEstime">Volume estimé</label>
                            <input type="number"  id="volumeEstime" name="volumeEstime" class="form-control" placeholder="Saisir la valeur estimée">
                        </div>  

                    </div>
                </div>
            </div>

        </div>

    </div>
    <br><br>



    <div class="container">

        <div class="float-right">
            <button type="submit" id="validerReservation" class="btn btn-primary btn-lg">Suivant</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </div>
    </div>

</form>



<?php if(isset($message)): ?>

<div class="modal fade bd-example-modal-sm" id="message" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <?php echo e($message); ?>

        </div>
    </div>
</div>  
<script>
    $('#message').modal('show');
</script>

<?php endif; ?>


<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>