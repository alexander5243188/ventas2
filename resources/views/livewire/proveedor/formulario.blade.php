@include('common.modalHead')

<div class="row">
	
<div class="col-sm-12 col-md-12">
	<div class="form-group">
		<label style="color: #000000;"><b>Nmbre alejandra</b></label>
		<input type="text" wire:model.lazy="name" 
		class="form-control product-name" placeholder="Nombre" autofocus >
		@error('name') <span class="text-danger er">{{ $message}}</span>@enderror
	</div>
</div>
<div class="col-sm-12 col-md-8">
	<div class="form-group">
		<label style="color: #000000;"><b>Dirección</b></label>
		<input 
			type="text"  
			wire:model.lazy="addres" 
			class="form-control" 
			placeholder="Dirección">
		@error('addres') <span class="text-danger er">{{ $message}}</span>@enderror
	</div>
</div>
<div class="col-sm-12 col-md-4">
	<div class="form-group">
		<label style="color: #000000;"><b>Departamento</b></label>
            <select wire:model='departmentid' class="form-control">
                <!-- <option value="Elegir" disabled>Elegir</option> -->
				<option value="Elegir" disabled>Elegir</option>				
                <!-- <option value="Elegir">Elegir</option> -->
                @foreach($departments as $depa)
                <option value="{{$depa->id}}" >{{$depa->name}}</option>
                @endforeach
            </select>
            @error('departmentid') <span class="text-danger er">{{ $message}}</span>@enderror
    </div>
</div>
<div class="col-sm-12 col-md-12">
	<div class="form-group">
		<label style="color: #000000;"><b>Correo electronico</b></label>
		<input 
			type="email" 			
			wire:model.lazy="email" 
			class="form-control" 
			placeholder="Correo electronico" >
		@error('email') <span class="text-danger er">{{ $message}}</span>@enderror
	</div>
</div>
<div class="col-sm-12 col-md-4">
	<div class="form-group">
		<label style="color: #000000;"><b>Número telefonico</b></label>
		<input  
			type="text" 			
			wire:model.lazy="phone" 
			class="form-control" 
			placeholder="" >
		@error('phone') <span class="text-danger er">{{ $message}}</span>@enderror
	</div>
</div>
<div class="col-sm-12 col-md-4">
	<div class="form-group">
		<label style="color: #000000;"><b>NIT</b></label>
		<input  
			type="number" 			
			wire:model.lazy="nit" 
			class="form-control" 
			placeholder="" >
		@error('nit') <span class="text-danger er">{{ $message}}</span>@enderror
	</div>
</div>


<div class="col-sm-12 col-md-12">
	<div class="form-group">
		<label style="color: #000000;"><b>Que mercaderia ofrece</b></label>
		
		<input 
			type="text"  
			wire:model.lazy="description" 
			class="form-control" 
			placeholder="" >
		@error('description') <span class="text-danger er">{{ $message}}</span>@enderror
	</div>
</div>



</div>




@include('common.modalFooter')

