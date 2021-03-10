@extends('layouts.default')

@section('title')

<h3>
 Statistique mensuel (réservations en cours, validées ou
effectuées)
</h3>
<h5>
 Nombre de réservations par mois
</h5>
@endsection
@section('content')
<div class="row">
 <div id="perf_div" style="width:800px;border:1px solid
black"></div>
 {!!
\Lava::render('ColumnChart', 'nombreDeReservationParMois',
'perf_div')
!!}
</div>


@endsection