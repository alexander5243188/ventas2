@include('common.head')


<div class="row">
<div class="col-sm-12 col-md-8">
	<div class="form-group">
		<label >Nombre</label>
		<input type="text" wire:model.lazy="name" 
		class="form-control product-name" placeholder="" autofocus >
		@error('name') <span class="text-danger er">{{ $message}}</span>@enderror
	</div>
</div>

<div class="col-sm-12 col-md-4">
	<div class="form-group">
		<label >Código</label>
		<input type="text" wire:model.lazy="barcode" 
		class="form-control"
		{{ $selected_id > 0 ? 'disabled' : '' }} 		
		placeholder="" >
		@error('barcode') <span class="text-danger er">{{ $message}}</span>@enderror
	</div>
</div>

<div class="col-sm-12 col-md-4">
	<div class="form-group">
		<label >Precio de compra</label>
		<input  
			type="text" 
			data-type='currency' 
			wire:model.lazy="cost" 
			class="form-control" 
			placeholder="" >
		@error('cost') <span class="text-danger er">{{ $message}}</span>@enderror
	</div>
</div>

<div class="col-sm-12 col-md-4">
	<div class="form-group">
		<label >Precio de venta</label>
		<input 
			type="text" 
			data-type='currency' 
			wire:model.lazy="price" 
			class="form-control" 
			placeholder="" >
		@error('price') <span class="text-danger er">{{ $message}}</span>@enderror
	</div>
</div>

<div class="col-sm-12 col-md-4">
	<div class="form-group">
		<label >Cantidad de producto</label>
		<input 
			type="number"  
			wire:model.lazy="stock" 
			class="form-control" 
			placeholder="" >
		@error('stock') <span class="text-danger er">{{ $message}}</span>@enderror
	</div>
</div>

<div class="col-sm-12 col-md-4">
<div class="form-group">
	<label>Alertas</label>
	<select wire:model='alertid' class="form-control">
		<option value="Elegir" disabled>Elegir</option>
		@foreach($alerts as $ale)
		<option value="{{$ale->id}}">{{$ale->name}}</option>
		@endforeach
	</select>
	@error('alertid') <span class="text-danger er">{{ $message}}</span>@enderror
</div>
</div>


<div class="col-sm-12 col-md-4">
<div class="form-group">
	<label>Categoría</label>
	<select wire:model='categoryid' class="form-control">
		<option value="Elegir" disabled>Elegir</option>
		@foreach($categories as $category)
		<option value="{{$category->id}}" >{{$category->name}}</option>
		@endforeach
	</select>
	@error('categoryid') <span class="text-danger er">{{ $message}}</span>@enderror
</div>
</div>


<div class="col-sm-12 col-md-4">
        <div class="form-group">
            <label>Marca</label>
            <select wire:model='brandid' class="form-control">
                <option value="Elegir" disabled>Elegir</option>
                @foreach($brands as $brand)
                <option value="{{$brand->id}}" >{{$brand->name}}</option>
                @endforeach
            </select>
            @error('brandid') <span class="text-danger er">{{ $message}}</span>@enderror
        </div>
    </div>

 



	<div class="col-sm-12 col-md-4">
        <div class="form-group">
            <label>País</label>
            <select wire:model='countryid' class="form-control">
                <option value="Elegir" disabled>Elegir</option>
                @foreach($countries as $country)
                <option value="{{$country->id}}" >{{$country->name}}</option>
                @endforeach
            </select>
            @error('countryid') <span class="text-danger er">{{ $message}}</span>@enderror
        </div>
    </div>





	<div class="col-sm-12 col-md-4">
        <div class="form-group">
            <label>Mayorista</label>
            <select wire:model='wholesalerid' class="form-control">
                <option value="Elegir" disabled>Elegir</option>
                @foreach($wholesalers as $wholesaler)
                <option value="{{$wholesaler->id}}" >{{$wholesaler->name}}</option>
                @endforeach
            </select>
            @error('wholesalerid') <span class="text-danger er">{{ $message}}</span>@enderror
        </div>
    </div>
	<div class="col-sm-12 col-md-4">
        <div class="form-group">
            <label>Proveedor</label>
            <select wire:model='proveedorid' class="form-control">
                <option value="Elegir" disabled>Elegir</option>
                @foreach($proveedors as $proveedor)
                <option value="{{$proveedor->id}}" >{{$proveedor->name}}</option>
                @endforeach
            </select>
            @error('proveedorid') <span class="text-danger er">{{ $message}}</span>@enderror
        </div>
    </div>





	<div class="col-sm-12 col-md-2">
        <div class="form-group">
            <label>Estante</label>
            <select wire:model='shelfid' class="form-control">
                <option value="Elegir" disabled>Elegir</option>
                @foreach($shelves as $shelf)
                <option value="{{$shelf->id}}" >{{$shelf->name}}</option>
                @endforeach
            </select>
            @error('shelfid') <span class="text-danger er">{{ $message}}</span>@enderror
        </div>
    </div>




	<div class="col-sm-12 col-md-2">
        <div class="form-group">
            <label>Niveles</label>
            <select wire:model='levelid' class="form-control">
                <option value="Elegir" disabled>Elegir</option>
                @foreach($levels as $level)
                <option value="{{$level->id}}" >{{$level->name}}</option>
                @endforeach
            </select>
            @error('levelid') <span class="text-danger er">{{ $message}}</span>@enderror
        </div>
    </div>
	<div class="col-sm-12 col-md-3">
		<div class="form-group">
			<label >Tipo comprobante</label>
			<select wire:model="type" class="form-control">
				<option value="Elegir">Elegir</option>
				<option value="FACTURA">FACTURA</option>
				<option value="RECIBO">RECIBO</option>
				<option value="OTRO">OTRO</option>
			</select>
			@error('type') <span class="text-danger er">{{ $message}}</span>@enderror
		</div>
	</div>
	<div class="col-sm-12 col-md-3">
		<div class="form-group">
			<label >Serie comprobante</label>
			<input type="number" wire:model.lazy="seriecomprobante" 
			class="form-control product-name" placeholder="Serie comprobante" autofocus >
			@error('seriecomprobante') <span class="text-danger er">{{ $message}}</span>@enderror
		</div>
	</div>
	

</div>
<div class="col-sm-12 col-md-8">
	<div class="form-group custom-file">
		<input type="file" class="custom-file-input form-control" wire:model="image"
		accept="image/x-png, image/gif, image/jpeg"  
		>
		<label class="custom-file-label">Imágen {{$image}}</label>
		@error('image') <span class="text-danger er">{{ $message}}</span>@enderror
	</div>	
</div>

	

	



@include('common.footer')
