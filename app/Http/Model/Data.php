<?php

namespace App\Http\Model;

use PDO;
use DateTime;
use Exception;

class Data {

    
    static function init() {
        return new PDO(Data::$dsn, "root", "root");
    }

    static private $dsn = 'mysql:host=localhost;dbname=tholdi_reservation';
    
        
}
