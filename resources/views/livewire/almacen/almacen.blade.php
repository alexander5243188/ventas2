<div class="row sales layout-top-spacing">
	<div class="col-sm-12">
		<div class="widget widget-chart-one">
			<div class="widget-heading">
				<h4 class="card-title"><b> {{$componentName}} | {{$pageTitle}}</b></h4>				
			</div>
			<!--Boton de ingreso nuevo registro ---------------------------------------------------------->
			<div class="container">
				<div class="row">
					<div class="col"></div>					
					<div class="col">
					
					
					
						@can('boton_registrar_cantidades')
						<button 
							class="btn btn-success" 
							type="button"
							href="javascript:void(0)" 
							class="tabmenu" 
							id="button-add"
							data-toggle="modal" 
							data-target="#theModal"
							title="Ingreso de cantidad de mercaderia" 
							style="width: 100%; font-weight:  bolder;">
							<strong> REGISTRO DE CANTIDADES DE PRODUCTO </strong>
						</button>
						@endcan
					</div>
					<div class="col"></div>
				</div>
			</div>
			<!-- ---------------------------------------------------------->
			</br>
			<!--Boton de ingreso nuevo registro ---------------------------------------------------------->
			<div class="container">
				<div class="row">
					<div class="col"><h6>Elige el producto para la consulta.</h6></div>
					<div class="col">						
						<div class="form-group">
							<select wire:model="productId" class="form-control">
								<option value=""  >Selecciona</option>
								@foreach($products as $lista)
								<option value="{{$lista->id}}">{{$lista->name}}</option>
								@endforeach
							</select>
						</div>
					</div>	
					<div class="col">
					<a 
						class="btn btn-dark" 						
						wire:click.prevent="reporteProducto()" 						
						
						data-toggle="collapse" 
						href="#" 
						role="button" 
						aria-expanded="false" 
						aria-controls="">
						Consulta
					</a> 
					</div>									
				</div>
			</div>
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="" id="">
							<div class="table-responsive">
								<table class="table table-bordered table striped mt-1">
									<thead class="text-white" id="table-head" style="background: #3B3F5C;">
										<tr>
											<th class="table-th text-white"></th>						
											<th class="table-th text-white text-center">CANTIDADES INGRESADAS</th>		
											<th class="table-th text-white text-center">CANTIDADES VENDIDAS</th>
											<th class="table-th text-white text-center">TOTAL RESTANTE</th>				
											
										</tr>
            						</thead>
									<tbody>
									<tr>
											<td class="text-center font-weight-bold">TOTALES</td>
											<td class="text-center"> <strong>{{$totalIngreso}}</strong></td>
											<td class="text-center"><strong>{{number_format($totalSalida,0)}}</strong></td>	
											<td class="text-center"><strong>{{number_format($totalStock,0)}}</strong></td>
											<td></td>
										</tr>
										             
            						</tbody>
            						<tfoot>
																			
            						</tfoot>
          						</table>								     
        					</div>
						</div>
					</div>
				</div>
			</div>
			<!-- ---------------------------------------------------------->	
				 @include('common.searchbox')
			
			<div class="widget-content">
				<div class="table-responsive">
					<table class="table table-bordered table-striped mt-1">
						<thead class="text-white" id="table-head" style="background: #3B3F5C;">
							<tr>
								<th class="table-th text-white">PRODUCTO</th>						
								<th class="table-th text-white text-center"></th>		
								<th class="table-th text-white text-center"></th>		
								<th class="table-th text-white text-center">ESTANTE</th>
								<th class="table-th text-white text-center">NIVEL</th>								
								<th class="table-th text-white text-center">CANTIDADES</th>																												
								<th class="table-th text-white text-center">FECHA</th>	
							
							</tr>
						</thead>
						<tbody>
							@foreach($data as $product)
							<tr>
								<td><h6 class="text-left">{{$product->nombre}}</h6></td>	
								<td ><h6 class="text-center ">{{$product->ingreso}}</h6></td>
								<td ><h6 class="text-center">{{$product->salida}}</h6></td>
								<td><h6 class="text-center badge-primary">{{$product->estante}}</h6></td>
								<td><h6 class="text-center badge-primary">{{$product->nivel}}</h6></td>
								<td>
									<h6 class="text-center {{$product->stock <= $product->alert ? 'text-danger' : '' }} ">
										{{$product->stock}}
									</h6>
								</td>
								<td ><h6 class="text-center">{{$product->fecha}}</h6></td>									
							
							</tr>
							@endforeach
						</tbody>
					</table>
					{{$data->links()}}   
				</div>
			</div>
		</div>
	</div>
        @include('livewire.almacen.data.alejandra')
 
</div>



</div>














<script>
	document.addEventListener('DOMContentLoaded', function() {

		window.livewire.on('product-added', msg => {$('#theModal').modal('hide') });
		window.livewire.on('product-updated', msg => {$('#theModal').modal('hide')});
		window.livewire.on('product-deleted', msg => {// noty
		});
		window.livewire.on('modal-show', msg => {$('#theModal').modal('show')});
		window.livewire.on('modal-show', msg => {$('#ALEJANDRA').modal('show')});

		window.livewire.on('modal-hide', msg => {$('#theModal').modal('hide')});
		window.livewire.on('hidden.bs.modal', msg => {$('.er').css('display', 'none')});
		$('#theModal').on('hidden.bs.modal', function(e) {$('.er').css('display', 'none')})
		$('#theModal').on('shown.bs.modal', function(e) {$('.product-name').focus()	})



	});

</script>