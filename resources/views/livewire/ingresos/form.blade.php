@include('common.modalHead')

<div class="row">
<div class="col-sm-12 col-md-8">
	<div class="form-group">
		<label style="color: #000000;" ><b>Cantidad de producto</b></label>
		<input 
            type="text" 
            wire:model.lazy="stock" 
		    class="form-control product-name" 
            placeholder="" 
            autofocus 
        >		
	</div>
	<div class="form-group">
		<label style="color: #000000;"><b>Precio de compra</b></label>
		<input 
            type="text" 
            wire:model.lazy="cost" 
		    class="form-control product-name" 
            placeholder="" 
            autofocus 
        >		
	</div>
	<div class="form-group">
		<label style="color: #000000;"><b>Precio de venta</b></label>
		<input 
            type="text" 
            wire:model.lazy="price" 
		    class="form-control product-name" 
            placeholder="" 
            autofocus 
        >		
	</div>
</div>
</div>
@include('common.ingreso')
