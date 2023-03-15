<div class="row sales layout-top-spacing">

	<div class="col-sm-12 ">
		<div class="widget widget-chart-one">
			<div class="widget-heading">
				<h4 class="card-title">{{$componentName}} | {{$pageTitle}}</b></h4>			
				<ul class="tabs tab-pills">					
					<li><a 
						style="background: #023e8a!important;"
							href="javascript:void(0);" 
							class="tabmenu bg-dark" 
							data-toggle="modal" 
							data-target="#theModal">
							Registrar nuevo proveedor
						</a>
					</li>					
				</ul>
			</div>			
			@include('common.searchbox')	
			<div class="widget-content">			

				<div class="table-responsive">
					<table  class="table table-bordered table-striped  mt-1">
						<thead class="text-white" style="background: #023e8a!important;">
							<tr>
								<th class="table-th text-white">NOMBRE</th>	
								<th class="table-th text-center text-white">NIT</th>
								<th class="table-th text-center text-white">N° TELEFÓNICO</th>
								<th class="table-th text-center text-white">PRODUCTOS QUE OFERTA</th>							
								<th class="table-th text-center text-white">ACTUALIZAR</th>
							</tr>
						</thead>
						<tbody>

                     @foreach($data as $proveedor)					
							<tr>
								<td><h6>{{$proveedor->name}}</h6></td>								
								<td class="text-center"><h6 class="badge badge-success">{{$proveedor->nit}}</h6></td>								
								<td class="text-center"><h6 class="badge badge-dark">{{$proveedor->phone}}</h6></td>
								<td class="text-center" width="300" height="200" ><h6>{{$proveedor->description}}</h6></td>								
								<td class="text-center">	
									<a  
										style="background: #013440!important;"
										href="javascript:void(0)"  
										wire:click.prevent="Edit({{$proveedor->id}})"  
										class="btn btn-dark mtmobile" 
										title="Editar datos proveedor">
										<i class="fas fa-edit"></i>
									</a>
									
                           @if($proveedor->products->count() < 1 ) 
									<a 
										href="javascript:void(0);"  
										class="btn btn-danger" 
										title="Eliminar proveedor">
										<i class="fas fa-trash"></i>
									</a>	
                           @endif			

								</td>

							</tr>

							@endforeach
						</tbody>
					</table>
					{{$data->links()}}
				</div>
			</div>
		</div>
	</div>

	@if ($selected_id < 1)
		@include('livewire.proveedor.form') 
    @else if ($selected_id > 1)
		@include('livewire.proveedor.form')	
    @endif
		
    
		
</div>



<script>
	document.addEventListener('DOMContentLoaded', function () {  
		
		window.livewire.on('product-added', msg => {$('#theModal').modal('hide') });
		window.livewire.on('product-updated', msg => {$('#theModal').modal('hide')});
		window.livewire.on('product-deleted', msg => {// noty
		});
		window.livewire.on('modal-show', msg => {$('#theModal').modal('show')});

		window.livewire.on('alejandra', msg => {$('#theModalAlejandra').modal('show')});

		window.livewire.on('modal-hide', msg => {$('#theModal').modal('hide')});
		window.livewire.on('hidden.bs.modal', msg => {$('.er').css('display', 'none')});
		$('#theModal').on('hidden.bs.modal', function(e) {$('.er').css('display', 'none')})
		$('#theModal').on('shown.bs.modal', function(e) {$('.product-name').focus()	})

	});


	
</script>