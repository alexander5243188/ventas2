<div wire:ignore.self class="modal fade modal-fullscreen" id="modalSearchProduct" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!--DENTRO DEL MODAL HEADER ESTA EL BUSCADOR -->
                <div class="modal-header">

                    <div class="input-group">
                        <input type="text" wire:model="search" id="modal-search-input" placeholder="Puedes buscar por nombre del producto..." class="form-control">
                        <div class="input-group-prepend">
                            <span class="input-group-text input-gp" style="background: #023E8A!important;">
                                <i class="fas fa-search"></i>
                            </span>
                        </div>
                    </div>

                </div>
                <div class="modal-body">
                    <div class="row p-2">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped mt-1">
                                <thead class="text-white" style="background: #023E8A!important;">
                                    <tr>
                                        <th width="4%"></th>
                                        <th class="table-th text-left text-white">DESCRIPCIÓN</th>
                                        <th width="13%" class="table-th text-center text-white">PRECIO</th>
                                        
                                        <th class="table-th text-center text-white">MARCA</th>
                                        <th class="table-th text-center text-white">
                                            
                                      
                                            
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($products as $product)
                                    <tr>
                                        <td>
                                            <span>
                                                <img src="{{ asset('storage/products/' . $product->imagen ) }}" alt="img" height="50" width="50" class="rounded">
                                            </span>
                                        </td>
                                        <td>
                                            <div class="text-left">
                                                <h6><b>{{$product->name}}</b></h6>
                                                <small class="text-info"></small>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <h6>Bs{{ number_format($product->price,2)}}</h6>
                                        </td>
                                       
                                        <td class="text-center">
                                            <h6>{{$product->graciela}}</h6>
                                        </td>
                                        <td class="text-center">
                                            <button wire:click.prevent="$emit('scan-code-byid',{{$product->id}})" class="btn btn-dark">
                                                <i class="fas fa-cart-arrow-down mr-1"></i>
                                                AGREGAR
                                            </button>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6">SIN RESULTADOS</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark close-btn btn-sm" data-dismiss="modal" style="background: #023E8A!important;">CERRAR VENTANA</button>
                </div>
            </div>
        </div>
    </div>