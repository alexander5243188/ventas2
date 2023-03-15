<div wire:ignore.self class="modal fade " id="theModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-dark" id="modal-head" style="background: #023E8A!important;">
        <h5 class="modal-title text-white">
        <b>{{ $selected_id > 0 ? 'Actualizar' : 'Ingreso nuevo' }} {{$componentName}}</b>
        </h5>
        <h6 class="text-center text-warning" wire:loading>POR FAVOR ESPERE REGISTRNADO</h6>
      </div>
      <div class="modal-body">


        