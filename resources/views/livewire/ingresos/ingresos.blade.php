<div class="row sales layout-top-spacing">

	<div class="col-sm-12 ">
		<div class="widget widget-chart-one">
			<div class="widget-heading">
				<h4 class="card-title"><b>{{$componentName}}</b> | {{$pageTitle}}</b></h4>			
				<ul class="tabs tab-pills">	
				</ul>
			</div>			
            @include('common.searchbox')		
			<div class="widget-content">			

				<div class="table-responsive">
					<table  class="table table-bordered table-striped  mt-1">
						<thead class="text-white" style="background: #023E8A!important;" ">
							<tr>
								<th class="table-th text-white">N°</th>	
								<th class="table-th text-center text-white">Registrado por</th>
								<th class="table-th text-center text-white">Proveedor</th>
								<th class="table-th text-center text-white">Productos</th>
                                <th class="table-th text-center text-white">Tipo comprobante</th>
								<th class="table-th text-center text-white">Serie</th>
                                <th class="table-th text-center text-white">Fecha ingreso</th>
								<th class="table-th text-center text-white">Cantidad produto</th>
								<th class="table-th text-center text-white">Añadir</th>                          
								<th class="table-th text-center text-white">exportar</th> 
								
							</tr>
						</thead>
						<tbody>	
                        @foreach ($data as $product)					
							<tr>
								<td><h6>{{$product->id}}</h6></td>
								<td><h6>{{$product->user}}</h6></td>                                
                                <td><h6>{{$product->wholesaler}}</h6></td>
								<td><h6>{{$product->product}}</h6></td>
                                <td><h6>{{$product->vaucher}}</h6></td>
                                <td><h6>{{$product->seriecomprobante}}</h6></td>
                                <td><h6>{{$product->created_at}}</h6></td>
								<td><h6>{{$product->stock}}</h6></td>
							
                                <td><h6>
													
										<a href="javascript:void(0);" class="btn btn-danger mtmobil" data-toggle="modal" data-target="#theModal">Agregar</a>
									
								</h6></td>                             
								<td>
								<a 	style="background: #013440!important;" 
											href="javascript:void(0)" 
											wire:click.prevent="Store({{$product->id}})" 
											class="btn mtmobile" 
											id="button-edit"
											title="Editar producto">
											<i class="fas fa-edit"></i>
										</a>
								</td>
								<td class="text-center">	
									<a href="javascript:void(0);"  class="btn btn-dark mtmobil" title="Exportar pdf">
										<i class="fas fa-print"></i>
									</a>
								</td>

							</tr>

                            @endforeach
						</tbody>
					</table>
					{{ $data->links()}}

					

				</div>

				

			</div>
		</div>
	</div>
	@include('livewire.ingresos.form')
</div>





<script>
	document.addEventListener('DOMContentLoaded', function () {  

		//events
		window.livewire.on('product-added', msg => {$('#theModal').modal('hide') });
		window.livewire.on('product-updated', msg => {$('#theModal').modal('hide')});
		window.livewire.on('product-deleted', msg => {// noty
		});
		window.livewire.on('modal-show', msg => {$('#theModal').modal('show')});
		window.livewire.on('modal-hide', msg => {$('#theModal').modal('hide')});
		window.livewire.on('hidden.bs.modal', msg => {$('.er').css('display', 'none')});
		$('#theModal').on('hidden.bs.modal', function(e) {$('.er').css('display', 'none')})
		$('#theModal').on('shown.bs.modal', function(e) {$('.product-name').focus()	})
		

		

	})


	
</script>
