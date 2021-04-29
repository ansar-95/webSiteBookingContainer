<?php

namespace App\Http\Model;

use App\Http\Model\Base\Devis as BaseDevis;

/**
 * Skeleton subclass for representing a row from the 'devis' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 */
class Devis extends BaseDevis
{
    public function getDatedevis() {
        return date('d/m/Y',$this->datedevis);
    }

}
