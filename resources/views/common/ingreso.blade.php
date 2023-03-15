</div>
      <div class="modal-footer ">
        
        <button 
          type="button" 
          wire:click.prevent="resetUI()" 
          id="button-close" 
          class="btn close-btn btn-sm" 
          data-dismiss="modal">
          <b>CERRAR</b>
        </button>

    
        <button 
          type="button" 
          wire:click.prevent="Store()" 
          class="btn close-modal" 
          id="button-save">          
          <b>GUARDAR</b>
        </button>
       

      </div>
    </div>
  </div>
</div>