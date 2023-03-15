@include('common.modalHead')

<div class="row">
<div class="col-sm-12 col-md-8">
	<div class="form-group">
		<label style="color: #000000;"><b>Nuevo valor del IVA</b></label>
		<input 
            type="text" 
            wire:model.lazy="tax" 
		    class="form-control product-name" 
            placeholder="" 
            autofocus 
        >
		@error('tax') <span class="text-danger er">{{ $message}}</span>@enderror
	</div>
</div>
</div>
@include('common.modalFooter')
