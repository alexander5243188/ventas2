@include('common.modalHead')

<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="form-group">
            <label style="color: #000000;"><b>Registra una marca</b></label>
            <input 
                type="text" 
                wire:model.lazy="name" 
                class="form-control" 
                placeholder="Nombre de la marca" 
                autofocus 
            >
            @error('name') <span class="text-danger er">{{ $message}}</span>@enderror
        </div>    
    </div>
  
</div>
@include('common.modalFooter')