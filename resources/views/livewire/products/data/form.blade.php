@include('common.modalHead')

<div class="row">
	<!--------------------------------------------------------------->
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
<!--------------------------------------------------------------->

<!--------------------------------------------------------------->
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
		<label >Cantidad de productos</label>
		<input 
			type="number"  
			wire:model.lazy="stock" 
			class="form-control" 
			placeholder="" >
		@error('stock') <span class="text-danger er">{{ $message}}</span>@enderror
	</div>
</div>

<!--------------------------------------------------------------->




<!--------------------------------------------------------------->
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
            <label>Nivel</label>
            <select wire:model='levelid' class="form-control">
                <option value="Elegir" disabled>Elegir</option>
                @foreach($levels as $level)
                <option value="{{$level->id}}" >{{$level->name}}</option>
                @endforeach
            </select>
            @error('levelid') <span class="text-danger er">{{ $message}}</span>@enderror
        </div>
    </div>
<!--------------------------------------------------------------->

<!--------------------------------------------------------------->
	<div class="col-sm-12 col-md-8">
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
<!--------------------------------------------------------------->




<!--------------------------------------------------------------->
<div class="col-sm-12 col-md-8">
	<div class="form-group custom-file">
		<input type="file" class="custom-file-input form-control" wire:model="image"
		accept="image/x-png, image/gif, image/jpeg"  
		>
		<label class="custom-file-label">Imágen {{$image}}</label>
		@error('image') <span class="text-danger er">{{ $message}}</span>@enderror
	</div>
</div>
<span>
                <img 
					src="{{asset('storage/products/' . $image)}}"
                    
                    id="modal-img"
                    class="rounded">
                <p>{{$name}}</p>
            </span>



</div>
<!--------------------------------------------------------------->



@include('common.modalFooter')
