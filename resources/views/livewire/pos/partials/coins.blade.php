<div class="row mt-3">
	<div class="col-sm-12">
		
		<div class="connect-sorting">

			

			<div class="container">
				<div class="row">
			
					@foreach($denominations as $d)
					<div class="col-sm mt-2">
				
						<button 
							wire:click.prevent="ACash({{$d->value}})" 
							class="btn btn-block den btn-dark" id="button-denomination" style="background: #023E8A!important;">
							{{ $d->value >0 ? 'Bs' . number_format($d->value,2, '.', '') : 'EXACTO' }}
						</button>
					</div>
					@endforeach
				
				</div>
			</div>

			<div class="connect-sorting-content mt-4">
				<div class="card simple-title-task ui-sortable-handle">
					<div class="card-body">
						<div class="input-group input-group-md mb-3">
							<div class="input-group-prepend">
								<span 
									class="input-group-text input-gp hideonsm" 
									id="button-effective"
									style="background: #023E8A!important;">Efectivo						
								</span>
							</div>
							<input type="number" id="cash"
								wire:model="efectivo"
								wire:keydown.enter="saveSale"
								class="form-control text-center" value="{{$efectivo}}" 							
							>
							<div class="input-group-append">
								<span 
									wire:click.prevent="limpiar()" 
									wire:click="$set('efectivo', 0)" 
									class="input-group-text" 
									id="button-backspace">
									<i class="fas fa-backspace fa-2x" style='color:red'></i>
								</span>
							</div>
						</div>

						<h4 class="text-muted">Cambio: Bs{{number_format($change,2)}}</h4>

						<div class="row justify-content-between mt-6">
							<div class="col-sm-12 col-md-12 col-lg-6 ">
								@if($total > 0)
									<button  
										onclick="Confirm('','clearCart','¿SEGURO DE ELIMINAR EL CARRITO?')" 
										class="btn mtmobile btn-danger"
										id="button-cancel"
									>
										<b>CANCELAR</b>
									</button>
								@endif
							</div>
							<div class="col-sm-12 col-md-12 col-lg-6">
								@if($efectivo>= $total && $total > 0)
									<button								
										wire:click.prevent="saveSale" 
										class="btn btn-md btn-block btn-dark"
										id="button-save"
										
									>
										<b>GUARDAR</b>
									</button>
								@endif
							</div>						
						</div>
						<br>
						<div class="row justify-content-between mt-6">
							<div class="col-sm-12 col-md-12 col-lg-12">	
								<a 
									class="btn btn-md btn-block btn-success" 
									href="{{ URL::to('/rutaAlejandra/pdf') }}">
									<b>IMPRIMIR</b>
								</a>												
							</div>
						</div>						
					</div>
				</div>
				<!--
				<div class="col-sm-12 mt-1 text-center">
					<p class="text-muted">Reimprimir última factura </p>
				</div> -->
			</div>
		</div>
	</div>
</div>
</div>