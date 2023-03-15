@include('common.modalHead')

<div class="row">
	
<div class="col-sm-12 col-md-8">
	<div class="form-group">
		<label><h6><b>Nombre</b></h6></label>
		<input 
			type="text" 
			wire:model.lazy="name" 
			class="form-control" 
			placeholder=""  >
		@error('name') <span class="text-danger er">{{ $message}}</span>@enderror
	</div>
</div>
<div class="col-sm-12 col-md-4">
	<div class="form-group">
		<label><h6><b>Teléfono</b></h6></label>
		<input 
			type="text" 
			wire:model.lazy="phone" 
			class="form-control" 
			placeholder="" 
			maxlength="10" >
		@error('phone') <span class="text-danger er">{{ $message}}</span>@enderror
	</div>
</div>
<div class="col-sm-12 col-md-6">
	<div class="form-group">
		<label><h6><b>Email</b></h6></label>
		<input 
			type="text" 
			wire:model.lazy="email" 
			class="form-control" 
			placeholder=""  >
		@error('email') <span class="text-danger er">{{ $message}}</span>@enderror
	</div>
</div>
<div class="col-sm-12 col-md-6">
	<div class="form-group">
		<label><h6><b>Contraseña</b></h6></label>
		<input 
			type="password" 
			wire:model.lazy="password" 
			class="form-control"   >
		@error('password') <span class="text-danger er">{{ $message}}</span>@enderror
	</div>
</div>
<div class="col-sm-12 col-md-6">
	<div class="form-group">
		<label><h6><b>Estatus</b></h6></label>
		<select wire:model="statusid" class="form-control">
			<option value="Elegir" disabled>Elegir</option>
			@foreach($status as $status)
			<option value="{{$status->id}}">{{$status->name}}</option>
			@endforeach
		</select>
		@error('statusid') <span class="text-danger er">{{ $message}}</span>@enderror
	</div>
</div>
<div class="col-sm-12 col-md-6">
	<div class="form-group">
		<label><h6><b>Asignar Rol</b></h6></label>
		<select wire:model.lazy="profile" class="form-control">
			<option value="Elegir" selected>Elegir</option>
			
			<option value="Almacen" selected>Almacen</option>
			<option value="Vendedor" selected>Vendedor</option>
			
		</select>
		@error('profile') <span class="text-danger er">{{ $message}}</span>@enderror
	</div>
</div>

<div class="col-sm-12 col-md-12">
	<div class="form-group custom-file">
		<label class="custom-file-label"><h6><b>Imágen de Perfil</b></h6></label>
		<input 
			type="file" 
			wire:model="image" 
			accept="image/x-png, image/jpeg, image/gif" 
			class="custom-file-input form-control">
		@error('image') <span class="text-danger er">{{ $message}}</span>@enderror

	</div>
</div>



</div>


@include('common.modalFooter')