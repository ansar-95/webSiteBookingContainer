<?php $__env->startSection('title'); ?>

<h1> Réservation (étape 2) </h1>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<form action="<?php echo e(route("AjouterLigneReservation")); ?>" method="post">
    <?php echo e(csrf_field()); ?>

    <div class="row justify-content-around">
        <div class="col-lg-5">
            <div class="card">
                <div class="card-header">
                    Sélection d'une quantité de container
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="container">Liste des containers</label>
                        <select class="custom-select" id="container" name="container">
                            
                             <?php $__currentLoopData = $typeContainer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unTypeContainer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($unTypeContainer["numTypeContainer"]); ?>">
                               <?php echo e($unTypeContainer["libelleTypeContainer"]); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            
                        </select> 

                    </div>

                    <div class="form-group">
                        <label class="control-label" for="quantite">Quantité</label>
                        <input type="number"  id="quantite" name="quantite" class="form-control" placeholder="Saisir la quantité">
                    </div>  
                    <br>
                    <div class="form-group float-right">
                        <button type="submit" id="buttonAddContainer" name="buttonAddContainer" class="btn btn-primary btn-lg">Ajouter container</button>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="card">
                <div class="card-header">
                    Lignes de réservation
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                
                                <?php $__currentLoopData = $typeContainer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unTypeDeContainer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(array_key_exists("qteReserver",$unTypeDeContainer)): ?>
                                     <tr>
                                     <td><?php echo e($unTypeDeContainer['libelleTypeContainer']); ?></td>
                                     <td><?php echo e($unTypeDeContainer['qteReserver']); ?></td>
                                     </tr>
                                     <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                
                            </tr>
                        </thead>
                        <tbody>
                            
                            <tr>

                                <td></td>
                                <td></td>
                                
                            </tr>

                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>

    </div>
</form> 
<br><br>


<div class="row">
    <div class="col-lg-8">

    </div>
    <div class="col-lg-4">
        <form action="<?php echo e(route("FinaliserLaReservation")); ?>"" method="post" >
            <?php echo e(csrf_field()); ?>

            <button type="submit" id="buttonAddReservation" name="buttonAddReservation" class="btn btn-primary btn-lg">
                Valider la demande de réservation
            </button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </form>

    </div>
</div>






<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>