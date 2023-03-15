<!-------------------------------------------------------------------------------MODAL BUSQUEDA--->
<div>
	<div class="">
		<button class="btn btn-md btn-block btn-success" data-toggle="modal" data-target="#modalSearchProduct">
			<i class="fas fa-search"></i>
			BUSCAR PRODCUTOS
		</button>		
	</div>
</div>
<!------------------------------------------------------------------------------->
<!-----------------------------------------------------------------------------CLIENTE-->
<div class="connect-sorting mb-2">
<div class="input-group">	
  <span class="input-group-text"><strong>Datos Cliente</strong></span>
  <input type="text" aria-label="nombre_cliente" class="form-control product-name" wire:model.lazy="nombre_cliente"  placeholder="Nombre cliente" autofocus required style="outline: none;">
  <input type="text" aria-label="cedula_cliente" class="form-control product-name" wire:model.lazy="cedula_cliente" placeholder="Cedula de identidad" autofocus required>
</div>
</div>
<!------------------------------------------------------------------------------->
<div class="connect-sorting">

<!-------------------------------------------------------------------- CLIENTE -->

<!-------------------------------------------------------------------- CLIENTE -->
	
<div class="connect-sorting-content">
	<div class="card simple-title-task ui-sortable-handle">
		<div class="card-body">
			
		@if($total > 0)
		<div class="table-responsive tblscroll" style="max-height: 950px; overflow: hidden">
			<table class="table table-bordered table-striped mt-1">
				<thead class="text-white" id="table-head" style="background: #3B3F5C;">
					<tr>
						<th width="10%"></th>
						<th class="table-th text-left text-white"  width="">DESCRIPCIÓN</th>
						<th class="table-th text-center text-white">PRECIO</th>
						<th width="13%" class="table-th text-center text-white">CANT</th>
						<th class="table-th text-center text-white">IMPORTE</th>
						<!-- <th class="table-th text-center text-white" width="50px">ACCIONES</th> -->
						<th class="table-th text-center text-white">OPCIONES</th>
					</tr>
				</thead>
				<tbody>
					@foreach($cart as $item)
					<tr>
						<td class="text-center table-th">
							@if(count($item->attributes) > 0)
							<span>
								<img 
									src="{{ asset('storage/products/' . $item->attributes[0]) }}" 
									alt="imágen de producto" 
									height="40" 
									width="40" 
									class="rounded">
							</span>
							@endif
						</td>
						<td><h6>{{$item->name}}</h6></td>
						<td class="text-center"><h6>Bs{{number_format($item->price,2)}}</h6></td>
						<td>
							<input 
								type="number" 
								id="r{{$item->id}}"
								wire:change="updateQty({{$item->id}}, $('#r' + {{$item->id}}).val() )"
								style="font-size: 1rem!important"
								class="form-control text-center" 
								value="{{$item->quantity}}"
																							
							>
						</td>
						<td class="text-center">
							<h6>
								Bs{{number_format($item->price * $item->quantity,2)}}
							</h6>
						</td>
						<td class="text-center">
							<div>
							<button 
								wire:click.prevent="decreaseQty({{$item->id}})" 
								class="btn mbmobile btn-warning" 
								id="button-minus">
								<i class="fas fa-minus"></i>
							</button>						
							<button 
								wire:click.prevent="increaseQty({{$item->id}})" 
								class="btn mbmobile btn-info"
								id="button-plus">								
								<i class="fas fa-plus"></i>
							</button>
							</div>
							<br>
							<div>
							<button 
								onclick="Confirm('{{$item->id}}', 'removeItem', '¿CONFIRMAS ELIMINAR EL REGISTRO?')" 
								class="btn mbmobile btn-danger"
								id="button-delete">
								<i class="fas fa-trash-alt"></i>
							</button>
							</div>

						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		@else
		<h5 class="text-center text-muted">Agrega productos a la venta</h5>
		@endif

<!--
		<div wire:loading.inline wire:target="saveSale">
			<h4 class="text-danger text-center">Guardando Venta...</h4>
		</div>
	-->



		</div>
	</div>
</div>


</div>	

