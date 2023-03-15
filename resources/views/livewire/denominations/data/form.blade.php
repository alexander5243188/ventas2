@include('common.modalHead')


<div class="row">
<div class="col-sm-12 col-md-6">
	<div class="form-group">
		<label >Tipo</label>
		<select wire:model="typeid" class="form-control">
			<option value="Elegir" disabled>Elegir</option>
			@foreach($type as $type)
			<option value="{{$type->id}}">{{$type->name}}</option>
			@endforeach
		</select>
		@error('type') <span class="text-danger er">{{ $message }}</span> @enderror
	</div>
</div>
<div class="col-sm-12 col-md-6">	
	<label >Valor</label>
	<div class="input-group">		
		<div class="input-group-prepend">
			<span class="input-group-text">
				<span class="fas fa-edit">
				</span>
			</span>
		</div>
		<input 
			type="number" 
			wire:model.lazy="value" 
			class="form-control" 
			placeholder="" 
			maxlength="25">
	</div>
	@error('value') <span class="text-danger er">{{ $message }}</span> @enderror
</div>

<div class="col-sm-12">
	<div class="form-group custom-file">
		<input 
			type="file" 
			class="custom-file-input form-control" 
			wire:model="image" 
			accept="image/x-png, image/gif, image/jpeg" >
		<label  class="custom-file-label">Imágen {{$image}}</label>
		@error('image') <span class="text-danger er">{{ $message }}</span> @enderror
		<span>
                <img 
					src="{{asset('storage/denominations/' . $image)}}"    
                    id="modal-img"
                    class="rounded">                
            </span>
	</div>
</div>



</div>



@include('common.modalFooter')