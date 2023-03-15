<div class="row sales layout-top-spacing">

    <div class="col-sm-12">

        <div class="widget">

            <div class="widget-heading">
                <h4 class="card-title text-center"><b>{{$componentName}}</b></h4>
            </div>

            <div class="widget-content">
                <div class="row">
                    <div class="col-sm-12 col-md-3"><!--USA 3 COLUMNAS IZQUERDA-->
                        <div class="row">
                            
                            <div class="col-sm-12">
                                <h6>Elige el producto</h6>
                                <div class="form-group">
                                    <select wire:model="productId" class="form-control">
                                        <option value="0">Todos</option> 
                                        @foreach($products as $almacen)
                                        <option value="{{$almacen->id}}">{{$almacen->name}}</option>                                
                                        @endforeach
                                    </select>
                                </div>
                            </div>   
                            <div class="col-sm-12">
                                <h6>Elige el tipo de reporte</h6>
                                <div class="form-group">
                                    <select wire:model="reportType" class="form-control">
                                        <option value="0">Día</option> 
                                        <option value="1">Fecha</option>        
                                    </select>
                                </div>
                            </div>                          

                            <div class="col-sm-12 mt-2">
                                <h6>Fecha desde</h6>
                                <div class="form-group">
                                    <input type="text" wire:model="dateFrom" class="form-control flatpickr" placeholder="Click para elegir">
                                </div>
                            </div>

                            <div class="col-sm-12 mt-2">
                                <h6>Fecha hasta</h6>
                                <div class="form-group">
                                    <input type="text" wire:model="dateTo" class="form-control flatpickr" placeholder="Click para elegir">
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <button wire:click="$refresh" class="btn btn-dark btn-block" id="button-consult" style="background: #023E8A!important;" >
                                    <b>Consultar</b>
                                </button>

                                <a class="btn btn-warning btn-block button-generate {{count($data) <1 ? 'disabled' : '' }}" 
                                href="{{ url('reportalmacen/pdf' . '/' . $productId . '/' . $reportType . '/' . $dateFrom . '/' . $dateTo) }}" target="_blank"><b>Generar PDF</b></a>                               
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-9"> <!--USA 9 COLUMNAS-->
                        <!--TABLE-->
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped mt-1">
                                <thead class="text-white" id="table-head" style="background: #023E8A!important;" >
                                    <tr>
                                        <th class="table-th text-white text-center">FOLIO</th>                                       
                                        <th class="table-th text-white text-center">PRODUCTO</th> 
                                        <th class="table-th text-white text-center"></th>
                                        <th class="table-th text-white text-center"></th> 
                                        <th class="table-th text-white text-center">CANTIDADES</th>                                       
                                        <th class="table-th text-white text-center">FECHA</th>
                                    </tr>
                                </thead>
                                <tbody>                                   
                                    @if(count($data) <1)
                                        <tr><td colspan="7"><h5>Sin Resultados</h5></td></tr>
                                    @endif
                                    @foreach($data as $d)
                                    <tr>                                                                       
                                        <td class="text-center"><h6>{{$d->id}}</h6></td>                               
                                        <td class="text-center"><h6>{{$d->producto}}</h6></td>  
                                        <td class="text-center"><h6>{{strtolower($d->ingreso)}}</h6></td>
                                        <td class="text-center"><h6>{{strtolower($d->salida)}}</h6></td> 
                                        <td class="text-center"><h6>{{$d->stock}}</h6></td>
                                        <td class="text-center">
                                            <h6>
                                                {{\Carbon\Carbon::parse($d->fecha)->format('d-m-Y')}}
                                            </h6>
                                        </td> 
                                        
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>  
                                         
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  
  
</div>
<script>
    document.addEventListener('DOMContentLoaded', function(){
        flatpickr(document.getElementsByClassName('flatpickr'),{
            enableTime: false,
            dateFormat: 'Y-m-d',
            locale: {
                firstDayofWeek: 1,
                weekdays: {
                    shorthand: ["Dom", "Lun", "Mar", "Mié", "Jue", "Vie", "Sáb"],
                    longhand: [
                    "Domingo",
                    "Lunes",
                    "Martes",
                    "Miércoles",
                    "Jueves",
                    "Viernes",
                    "Sábado",
                    ],
                },
                months: {
                    shorthand: [
                    "Ene",
                    "Feb",
                    "Mar",
                    "Abr",
                    "May",
                    "Jun",
                    "Jul",
                    "Ago",
                    "Sep",
                    "Oct",
                    "Nov",
                    "Dic",
                    ],
                    longhand: [
                    "Enero",
                    "Febrero",
                    "Marzo",
                    "Abril",
                    "Mayo",
                    "Junio",
                    "Julio",
                    "Agosto",
                    "Septiembre",
                    "Octubre",
                    "Noviembre",
                    "Diciembre",
                    ],
                },

            }

        })


        //eventos
        window.livewire.on('show-modal', Msg =>{
            $('#modalDetails').modal('show')
        })
    })

    function rePrint(saleId)
    {
        window.open("print://" + saleId,  '_self').close()
    }
</script>
