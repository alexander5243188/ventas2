 </div>
      <div class="modal-footer">
        
        <button
          style="background: #023E8A!important;" 
          type="button" 
          wire:click.prevent="resetUI()" 
          id="button-close" 
          class="btn btn-dark close-btn btn-sm" 
          data-dismiss="modal">
          CERRAR
        </button>

        @if($selected_id < 1)
        <button 
          style="background: #023E8A!important;"
          type="button" 
          wire:click="$refresh"
          wire:click.prevent="Store()"          
          class="btn btn-dark close-modal" 
          id="button-save">          
          <b>GUARDAR</b>
        </button>
        @else
        <button 
          style="background: #023E8A!important;"
          type="button" 
          wire:click="$refresh"
          wire:click.prevent="Update()"           
          class="btn btn-dark close-modal" 
          id="button-update">
          <b>ACTUALIZAR</b>
        </button>
        @endif

      </div>
    </div>
  </div>
</div>