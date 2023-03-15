 </div>
      <div class="modal-footer  ">
        
        <button 
        style="background: #023E8A!important;"
          type="button" 
          wire:click.prevent="resetUI()" 
          id="button-close" 
          class="btn btn-dark close-btn btn-sm" 
          data-dismiss="modal">
          <b>CERRAR</b>
        </button>

        
        <button 
          style="background: #023E8A!important;"
          type="button" 
          wire:click.prevent="Store()" 
          class="btn btn-dark close-modal" 
          id="button-save">          
          <b>GUARDAR</b>
        </button>
       

      </div>
    </div>
  </div>
</div>