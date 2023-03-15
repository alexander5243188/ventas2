@include('common.head')

<div class="row">

<input type="hidden" wire:model.lazy="name" class="form-control product-name" placeholder="" autofocus >
<input  type="hidden" wire:model.lazy="barcode" class="form-control" {{ $selected_id > 0 ? 'disabled' : '' }} placeholder="" >

	<div class="col-sm-12 col-md-4">
		<div class="form-group">
			<label style="color: #000000;" ><b>Fecha de ingreso</b></label>
			<input  
				type="date" 
				data-type='currency' 
				wire:model="fechaIngresoAlmacen" 
				class="form-control"
				placeholder="Click para elegir">
			@error('fechaIngresoAlmacen') <span class="text-danger er">{{ $message}}</span>@enderror
		</div>
	</div> 

	<div class="col-sm-12 col-md-8">
		<div class="form-group">
			<label style="color: #000000;"><b>Seleccionar producto</b></label>
			<select wire:model='productoid' class="form-control">
				<option value="" >Elegir</option>
				@foreach($products as $producto)
					<option value="{{$producto->id}}">{{$producto->name}}</option>
				@endforeach
			</select>
			@error('productoid') <span class="text-danger er">{{ $message}}</span>@enderror
		</div>
	</div>


	<div class="col-sm-12 col-md-8">
		<div class="form-group">
			<label style="color: #000000;"><b>Proveedor</b></label>
			<select wire:model='proveedorid' class="form-control">
				<option value="" >Elegir</option>
				@foreach($proveedors as $pro)
					<option value="{{$pro->id}}">{{$pro->name}}</option>
				@endforeach
			</select>	
			@error('proveedorActualizado') <span class="text-danger er">{{ $message}}</span>@enderror
		</div>
	</div>

	<div class="col-sm-12 col-md-4">
		<div class="form-group">
			<label style="color: #000000;"><b>Cantidad</b></label>
			<input			
				type="number"  
				wire:model.lazy="cantidadProductoActualizado" 
				class="form-control" 
				placeholder="Ingreso de productos " >		
			@error('cantidadProductoActualizado') <span class="text-danger er">{{ $message}}</span>@enderror
		</div>
	</div>

	


</div>




@include('common.footer')
