<div>
    <div class="row d-flex justify-content-end">
        <div class="col-lg-4 d-flex justify-content-end">
            <button type="button" class="btn rounded-pill btn-success mx-4 mb-4" data-bs-toggle="modal" data-bs-target="#chart">
                <span class="tf-icons bx bx-pie-chart-alt"></span>&nbsp; Generar reporte de venta
            </button>
        </div>
    </div>

    <div class="modal fade" id="chart" tabindex="-1" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Seleccione un rango de fechas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('report.chart') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col mb-3">
                                <label for="nameBasic" class="form-label">Fecha de inicio</label>
                                <input class="form-control" type="date" name="start" id="date_start" disabled>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="nameBasic" class="form-label">Fecha de fin</label>
                                <input class="form-control" type="date" name="end" id="date_end" disabled>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-check mt-1">
                                    <input name="option" class="form-check-input" type="radio" id="dates" value="dates">
                                    <label class="form-check-label" for="dates"> Seleccione un rango de fechas </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 mt-2">
                                <div class="form-check mt-1">
                                    <input name="option" class="form-check-input" type="radio" value="today" id="today">
                                    <label class="form-check-label" for="today"> Reporte diario (Mostrar ventas de hoy) </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 mt-2">
                                <div class="form-check mt-1">
                                    <input name="option" class="form-check-input" type="radio" value="month" id="month">
                                    <label class="form-check-label" for="month"> Reporte mensual (Mostrar ventas de este mes) </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary" id="button_send" disabled>Generar reporte</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bordered Table -->
    <div class="card">
        <div class="row">
            <div class="col-lg-4 mt-2">
                <h4 class="mt-4 mx-4 mb-0"><strong>Tabla de ventas</strong></h4>
            </div>
            <div class="col-lg-8 mt-4 px-4">
                <div class="row d-flex justify-content-end">
                    <div class="col-md-12 px-4">
                        <div class="input-group input-group-merge">
                            <span class="input-group-text" id="basic-addon-search31"><i class="bx bx-search"></i></span>
                            <input type="text" wire:model="search" class="form-control" placeholder="Buscar orden de venta (Ingrese el no. de orden)... "aria-label="Search..."/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No. venta</th>
                            <th>Marca</th>
                            <th>Cantidad</th>
                            <th>Categoría</th>
                            <th>Sucursal</th>
                            <th>Fecha de venta</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse($sales as $sale)

                        <tr>
                            <td><strong>{{ $sale->id }}</strong></td>
                            <td>{{ $sale->brand }}</td>
                            <td>{{ $sale->quantity }}</td>
                            <td>{{ $sale->category }}</td>
                            <td>{{ $sale->office }}</td>
                            <td>{{ $sale->created_at->diffForHumans() }}</td>
                            <td class="d-flex justify-content-around">
                                <button type="button" class="btn rounded-pill btn-info" data-bs-toggle="modal" data-bs-target="#product_{{ $sale->id }}">
                                    Ver
                                </button>

                                <div class="modal fade" tabindex="-1" id="product_{{ $sale->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel4">Número de venta: {{ $sale->id }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row mb-3">
                                                    <div class="col-6">
                                                        <label for="brand" class="form-label">Marca</label>
                                                        <input type="text" id="brand" class="form-control" name="brand" placeholder="Ingrese la marca" value="{{ $sale->brand }}" readonly />
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="public_price" class="form-label">Precio público</label>
                                                        <input type="number" id="public_price" class="form-control" name="public_price" placeholder="Ingrese el precio al público" value="{{ $sale->public_price }}" readonly />
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-4">
                                                        <label for="quantity" class="form-label">unidades vendidas</label>
                                                        <input type="number" id="quantity" class="form-control" name="quantity" placeholder="Ingrese las existencias totales" value="{{ $sale->quantity }}" readonly />
                                                    </div>
                                                    <div class="col-4">
                                                        <label for="category" class="form-label">Categoría</label>
                                                        <input type="text" id="category" class="form-control" name="category" value="{{ $sale->category }}" readonly />
                                                    </div>
                                                    <div class="col-4">
                                                        <label for="sell" class="form-label">Fecha de venta</label>
                                                        <input class="form-control" type="date" name="date_of_sale" id="date_of_sale" value="{{ date('Y-m-d', strtotime($sale->created_at)) }}" readonly>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-12">
                                                        <label for="description" class="form-label">Descripción</label>
                                                        <textarea id="description" class="form-control" name="description" cols="4" style="resize: none;" readonly>{{ $sale->description }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <form class="form-delete mx-2" action="{{ route('sale.destroy', $sale->id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn rounded-pill btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7"><h3 class="mb-0 text-center"><strong>No se encontró ningúna venta</strong></h3></td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 d-flex justify-content-end px-4">
               {{--  {{ $orders->links('vendor.pagination.bootstrap-4') }} --}}
           </div>
       </div>
   </div>
   <!--/ Bordered Table -->
</div>
