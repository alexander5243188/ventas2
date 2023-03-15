<div wire:ignore.self class="modal fade" id="modalDetails" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header" id="table-head">
        <h5 class="modal-title text-white">
        	<b>Detalle # {{$saleId}}</b>
        </h5>
        <h6 class="text-center text-warning" wire:loading>POR FAVOR ESPERE</h6>
      </div>
      <div class="modal-body">

        <div class="table-responsive">
          <table class="table table-bordered table striped mt-1">
            <thead class="text-white" id="table-head" style="background: #3B3F5C;">
              <tr>
                <th class="table-th text-white text-center">FOLIO</th>
                <th class="table-th text-white text-center">PRODUCTO</th>
                <th class="table-th text-white text-center">PRECIO</th>
                <th class="table-th text-white text-center">CANT</th>
                <th class="table-th text-white text-center">IMPORTE</th>
              </tr>
            </thead>
            <tbody>
            
              @foreach($details as $d)
              <tr>
                <td class='text-center'><h6>{{$d->stock}</h6></td>       
                
              </tr>
              @endforeach
            </tbody>
            
            
          </table>         
        </div>

      </div>
      <div class="modal-footer">        
        <button type="button" class="btn btn-dark close-btn text-info" data-dismiss="modal">CERRAR</button>
      </div>
    </div>
  </div>
</div>