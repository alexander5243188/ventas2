@include('common.modalHead')

<div class="row">
<!-- ------------------------------------------------------------------->	
<div class="col-sm-12 col-md-8">
	<div class="form-group">
		<label style="color: #000000;" ><b>Nombre</b></label>
		<input 
			type="text" 
			wire:model.lazy="name" 
			class="form-control product-name" 
			placeholder="Nombre del producto" 
			autofocus >
		@error('name') <span class="text-danger er">{{ $message}}</span>@enderror
	</div>
</div>



<!-- ------------------------------------------------------------------->	

<!-- ------------------------------------------------------------------->	
<div class="col-sm-12 col-md-4">
	<div class="form-group">
		<label style="color: #000000;" > <b>Precio de compra</b> </label>
		<input  
			type="text" 
			data-type='currency' 
			wire:model.lazy="cost" 
			class="form-control" 
			placeholder="Precio de compra" >
		@error('cost') <span class="text-danger er">{{ $message}}</span>@enderror
	</div>
</div>

<div class="col-sm-12 col-md-4">
	<div class="form-group">
		<label style="color: #000000;" ><b>Precio de venta</b></label>
		<input 
			type="text" 
			data-type='currency' 
			wire:model.lazy="price" 
			class="form-control" 
			placeholder="Precio de venta" >
		@error('price') <span class="text-danger er">{{ $message}}</span>@enderror
	</div>
</div>

<div class="col-sm-12 col-md-4">
	<div class="form-group">
		<label style="color: #000000;"><b>Cantidad de producto</b></label>
		<input 
			type="number"  
			wire:model.lazy="stock" 
			class="form-control" 
			placeholder="Ingrese la cantidad" >
		@error('stock') <span class="text-danger er">{{ $message}}</span>@enderror
	</div>
</div>
<!-- ------------------------------------------------------------------->	
<!--
<div class="col-sm-12 col-md-4">
<div class="form-group">
	<label>Alertas</label>	
		@foreach($alerts as $ale)
		<option value="{{$ale->id}}">{{$ale->name}}</option>
		@endforeach
	
	@error('alertid') <span class="text-danger er">{{ $message}}</span>@enderror
</div>
</div> -->


<!-- ------------------------------------------------------------------->	
<div class="col-sm-12 col-md-4">
<div class="form-group">
	<label style="color: #000000;"> <b>Categoría</b></label>
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
            <label style="color: #000000;"><b>Marca</b></label>
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
            <label 
				style="color: #000000; width: 200px;">
				<b>País</b>
			</label>
            <select wire:model='countryid'  class="form-control">
                <option value="Elegir" disabled>Elegir</option>
                @foreach($countries as $country)
                <option value="{{$country->id}}" >{{$country->name}}</option>
                @endforeach
            </select>
            @error('countryid') <span class="text-danger er">{{ $message}}</span>@enderror
        </div>
    </div>

<!-- ------------------------------------------------------------------->	

<!-- ------------------------------------------------------------------->	

	<div class="col-sm-12 col-md-4">
        <div class="form-group">
            <label style="color: #000000;"><b>Proveedor</b></label>
            <select wire:model='proveedorid' class="form-control">
                <option value="Elegir" disabled>Elegir</option>
                @foreach($proveedors as $proveedor)
                <option value="{{$proveedor->id}}" >{{$proveedor->name}}</option>
                @endforeach
            </select>
            @error('proveedorid') <span class="text-danger er">{{ $message}}</span>@enderror
        </div>
    </div>





	<div class="col-sm-12 col-md-4">
        <div class="form-group">
            <label style="color: #000000;"><b>Estante</b></label>
            <select wire:model='shelfid' class="form-control">
                <option value="Elegir" disabled>Elegir</option>
                @foreach($shelves as $shelf)
                <option value="{{$shelf->id}}" >{{$shelf->name}}</option>
                @endforeach
            </select>
            @error('shelfid') <span class="text-danger er">{{ $message}}</span>@enderror
        </div>
    </div>




	<div class="col-sm-12 col-md-4">
        <div class="form-group">
            <label style="color: #000000;"><b>Nivel</b></label>
            <select wire:model='levelid' class="form-control">
                <option value="Elegir" disabled>Elegir</option>
                @foreach($levels as $level)
                <option value="{{$level->id}}" >{{$level->name}}</option>
                @endforeach
            </select>
            @error('levelid') <span class="text-danger er">{{ $message}}</span>@enderror
        </div>
    </div>
<!-- ------------------------------------------------------------------->	
<div class="col-sm-12 col-md-12">
	<div class="form-group custom-file">
		<input type="file" class="custom-file-input form-control" wire:model="image"
		accept="image/x-png, image/gif, image/jpeg"  
		>
		<label class="custom-file-label">Imágen</label>
		@error('image') <span class="text-danger er">{{ $message}}</span>@enderror
	</div>	
</div>
<!-- ------------------------------------------------------------------->	



@include('common.modalFooter')
