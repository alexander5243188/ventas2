<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link rel="stylesheet" href="{{ public_path('css/custom_pdf.css') }}">
	<link rel="stylesheet" href="{{ public_path('css/custom_page.css') }}">

	<style>
		@page {
            margin: 2cm 2cm;
            font-size: 1em;
        }

        body {
            margin: 3cm 0cm 2cm;
        }

        header {			
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 150px;
  			width: 100%;           	
            text-align: center;
            line-height: 25px;
        }

        footer {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;
            text-align: center;
            line-height: 35px;		
        }
		.columna {
			width:33%;
			float:left;
		}
		



















.table-items thead th {
    font-weight: bold;
    padding: 5px 2px;
    text-align: center;
    vertical-align: middle;
    background-color: #515365;
    color: #ffffff;
}

.table-items tbody td {
    padding: 3px 2px;
    vertical-align: top;
    border: 1px solid #eeeeee;
}

.table-items > tbody > tr:nth-child(odd) {
    background-color: #f9f9f9;
}

.table-items tfoot td {
    padding: 3px 2px;
    vertical-align: middle;
    border: 1px solid #eeeeee;
}

.table-secundary td {
    background-color: #F6F6F6;
    border: 1px dotted #D6D6D6;
}

.table-footer td {
    background-color: #FCFCFC;
    border: 1px dotted #EEEEEE;
}

	</style>	
	<title>Reporte de inventario</title>
	

</head>
<body>
	<header>
		<div class="columna">
		<h4>Reporte de inventario</h4>
		
		</div>
		<div class="columna">
			<span style="font-size: 22px">COMERCIAL FUENTES</span>
			<br>
				@if($reportType == 0)
					<span style="font-size: 16px"><strong>{{ \Carbon\Carbon::now()->format('d-M-Y')}}</strong></span>
				@else
					<span style="font-size: 16px"><strong>{{$dateFrom}} al {{$dateTo}}</strong></span>
				@endif
			<br>
			
					
		</div>
		<div class="columna">
			<br>
			<br>
			<span style="font-size: 14px">Producto: {{$product}}</span>	
		</div>				
	</header>


    	
       	

	
		<table cellpadding="0" cellspacing="0" class="table-items" width="100%">
			<thead >
				<tr>
					<!-- <th colspan="1" width="">USUARIO</th> -->
					<!-- <th colspan="1" width="">FOLIO</th> -->
					<th colspan="1" width="">PRODUCTO</th>
					<th colspan="1" width="">SALIDA</th>
					<th colspan="1" width="">INGRESO</th>
					<th colspan="1" width="">RESTANTE</th>
					<th colspan="1" width="">FECHA REGISTRO</th>
				</tr>
			</thead>
			<tbody class="table table-striped ">
				@foreach($data as $item)
				<tr>
					<!-- <td colspan="1" align="center" >{{$item->nombrevendedor}}</td> -->
					<!-- <td colspan="1" align="center" >{{$item->id}}</td> -->
					<td colspan="1" align="left" >{{$item->producto}}</td>
					<td colspan="1" align="center" >{{$item->stockS}}</td>
					<td colspan="1" align="center" >{{$item->stockI}}</td>
					<td colspan="1" align="center"></td>	
					<td colspan="1" align="center">{{$item->fecha}}</td>					
				</tr>
				@endforeach
			</tbody>
			<tfoot>
				<tr>
					<td class="text-center"><span><b>Total</b></span></td>					
					<td class="text-center">{{$data->sum('stockS')}}</td>
					<td class="text-center">{{$data->sum('stockI')}}</td>
					<td colspan="1" class="text-center">
						<span><strong> {{ $data->sum('stockI') - $data->sum('stockS') }}</strong></span>
					</td>
				</tr>
			</tfoot>
		</table>







	<footer>	</footer>

	<script type="text/php">
        if ( isset($pdf) ) {
            $pdf->page_script('
                $font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "normal");
                $pdf->text(270, 820, "Pág $PAGE_NUM de $PAGE_COUNT", $font, 10);
            ');
        }
    	</script>
</body>
</html>