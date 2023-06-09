<div class="row sales layout-top-spacing">

    <div class="col-sm-12">
        <div class="widget">
            <div class="widget-heading">
                <h4 class="card-title text-center"><b>{{$componentName}}</b></h4>
            </div>

            <div class="widget-content">
                <div class="row">
                    <div class="col-sm-12 col-md-3">
                        <div class="row">
                            <div class="col-sm-12">
                                <h6>Elige el usuario</h6>
                                <div class="form-group">
                                    <select wire:model="userId" class="form-control">
                                        <option value="0" disabled>Elegir</option>                                        
                                        <option value="{{Auth()->user()->id}}">{{Auth()->user()->name}}</option>
                                    </select>
                                </div>
                            </div> 
                            <div class="col-sm-12">
                                <h6>Elige el tipo de reporte</h6>
                                <div class="form-group">
                                    <select wire:model="reportType" class="form-control">
                                        <option value="0">Ventas del día</option> 
                                        <option value="1">Ventas por fecha</option>        
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
                                <button wire:click="$refresh" class="btn btn-block btn-dark" id="button-consult" style="background: #023E8A!important;" >
                                    <b>Consultar</b>
                                </button>

                                <a class="btn btn-warning btn-block button-generate {{count($data) <1 ? 'disabled' : '' }}" 
                                href="{{ url('report/pdf' . '/' . $userId . '/' . $reportType . '/' . $dateFrom . '/' . $dateTo) }}" target="_blank"><b>Generar PDF</b></a>
                                
                                <!--
                                <a  class="btn btn-block button-export {{count($data) <1 ? 'disabled' : '' }}" 
                                href="{{ url('report/excel' . '/' . $userId . '/' . $reportType . '/' . $dateFrom . '/' . $dateTo) }}" target="_blank">Exportar a Excel</a>
                                -->
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-9">
                        <!--TABLAE-->
                        <div class="table-responsive">
                            <table class="table table-bordered table striped mt-1">
                                <thead class="text-white" id="table-head" style="background: #023E8A!important;" >
                                    <tr>
                                        <th class="table-th text-white text-center">FOLIO</th>
                                        <th class="table-th text-white text-center">PRODUCTO</th>
                                        <th class="table-th text-white text-center">TOTAL PAGAGO</th>
                                        <th class="table-th text-white text-center">PRODUCTOS VENDIDOS</th>
                                        <th class="table-th text-white text-center">ESTADO DE VENTA</th>
                                        <th class="table-th text-white text-center">USUARIO</th>
                                        <th class="table-th text-white text-center">FECHA</th>
                                        <th class="table-th text-white text-center" >ACCIONES</th>
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
                                        <td class="text-center"><h6>Bs{{number_format($d->total,2)}}</h6></td>
                                        <td class="text-center"><h6>{{$d->items}}</h6></td>                                   
                                        <td class="text-center"><h6>{{strtolower($d->status)}}</h6></td>
                                        <td class="text-center"><h6>{{$d->user}}</h6></td>   
                                        <td class="text-center">
                                            <h6>
                                                {{\Carbon\Carbon::parse($d->created_at)->format('d-m-Y')}}
                                            </h6>
                                        </td>    
                                        <td class="text-center" >
                                            <button 
                                                style="background: #0054DC!important;" 
                                                wire:click.prevent="getDetails({{$d->id}})"
                                                class="btn btn-sm "
                                                id="button-list">
                                                <i class="fas fa-list" style='color:white'></i>
                                            </button>
                                            <!--
                                            <button type="button" onclick="rePrint({{$d->id}})"
                                                class="btn btn-sm"
                                                id="button-print">
                                                <i class="fas fa-print"></i>
                                            </button>
                                            -->
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
    @include('livewire.reports.sales-detail')
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
