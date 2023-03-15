<div class="row sales layout-top-spacing">
	
	<div class="col-sm-12">
		<div class="widget widget-chart-one">
			<div class="widget-heading">
				<h4 class="card-title">
					<b> {{$componentName}} | {{$pageTitle}}</b>
				</h4>
				<ul class="tabs tab-pills">
					<li>
						
					</li>
				</ul>
			</div>
			@include('common.searchbox')

			<div class="widget-content">
				
				<div class="table-responsive">
					<table class="table table-bordered table-striped mt-1">
						<thead class="text-white" style="background: #023e8a!important;">
							<tr>
								
								<th class="table-th text-white">NOMBRE</th>
								<th class="table-th text-white text-center">CEDULA DE IDENTIDAD</th>
                                <th class="table-th text-white text-center">FECHA DE REGISTRO</th>
								
							</tr>
						</thead>
						<tbody>
                            @foreach($data as $cliente)
							<tr>
															
								<td><h6>{{ $cliente->name == null ? ('Sin nombre') : $cliente->name }}</h6></td>
								<td class="text-center"><h6>{{ $cliente->ci ==null ? ('Sin cedula') : $cliente->ci}}</h6></td>
                                <td class="text-center"><h6>{{$cliente->created_at}}</h6></td>
							</tr>
                            @endforeach
						</tbody>
					</table>
					{{ $data->links()}}
				</div>
			</div>
		</div>
	</div>	
</div>


<script>
	document.addEventListener('DOMContentLoaded', function(){

	});
</script>