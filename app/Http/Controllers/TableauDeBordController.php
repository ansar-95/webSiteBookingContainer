<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Model\Data;

class TableauDeBordController extends Controller
{
    public function nombreDeReservationParMois(Request $request) {

    $utilisateur = $request->session()->get('utilisateur');

    $codeUtilisateur = $utilisateur->getCode();//version Propel
    $nbReservationParMoisPourUnUtilisateur =Data::obtenirNombreDeReservationParMoisPourUnUtilisateur($codeUtilisateur);
    $donneesStatistiques = \Lava::DataTable();
    $donneesStatistiques->addStringColumn('Mois & Année')->addNumberColumn('Nombre de réservation');
    
    foreach ($nbReservationParMoisPourUnUtilisateur as $nbReservationDuMois) {
        $donneesStatistiques->addRow([$nbReservationDuMois["moisAnneeDeReservation"],
        $nbReservationDuMois["nbReservationParMoisPourUnUtilisateur"]]);
    }
    $lavaColumnChart = \Lava::ColumnChart('nombreDeReservationParMois', $donneesStatistiques, [
    'title' => 'Nombre de réservation par mois',
    'titleTextStyle' => [
            'color' => '#eb6b2c',
            'fontSize' => 14
        ]
    ]);
    
    
    return view('tableauDeBord.nombreDeReservationParMois', compact('lavaColumnChart'));

    }
}
