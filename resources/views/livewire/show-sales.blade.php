<div>
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
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6"><h3 class="mb-0 text-center"><strong>No se encontró ningúna venta</strong></h3></td>
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

