@include('common.modalHead')

<div class="row">
	
<div class="col-sm-12 col-md-8">
	<div class="form-group">
		<label >Nombre</label>
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
		<label >Teléfono</label>
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
		<label >Email</label>
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
		<label >Contraseña</label>
		<input 
			type="password" 
			wire:model.lazy="password" 
			class="form-control"   >
		@error('password') <span class="text-danger er">{{ $message}}</span>@enderror
	</div>
</div>
<div class="col-sm-12 col-md-6">
	<div class="form-group">
		<label >Estatus</label>
		<select wire:model="statusid" class="form-control">
			<option value="Elegir" disabled>Elegir</option>
			@foreach($status as $status)
			<option value="{{$status->id}}">{{$status->name}}</option>
			@endforeach
		</select>
		@error('status') <span class="text-danger er">{{ $message}}</span>@enderror
	</div>
</div>
<div class="col-sm-12 col-md-6">
	<div class="form-group">
		<label >Asignar Role</label>
		<select wire:model.lazy="profile" class="form-control">
			<option value="Elegir" selected>Elegir</option>
			@foreach($roles as $role)
			<option value="{{$role->name}}" selected>{{$role->name}}</option>
			@endforeach
		</select>
		@error('profile') <span class="text-danger er">{{ $message}}</span>@enderror
	</div>
</div>

<div class="col-sm-12 col-md-6">
	<div class="form-group">
		<label >Imágen de Perfil</label>
		<input 
			type="file" 
			wire:model="image" 
			accept="image/x-png, image/jpeg, image/gif" 
			class="form-control">
		@error('image') <span class="text-danger er">{{ $message}}</span>@enderror
		

	</div>
</div>
<span>
    <img 
		src="{{asset('storage/users/' . $image)}}"                    
        class="rounded"
		id="modal-img">
    <p>{{$name}}</p>
</span>
</div>


@include('common.modalFooter')