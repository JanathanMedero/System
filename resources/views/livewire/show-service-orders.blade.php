<div>
    <!-- Bordered Table -->
    <div class="card">
        <div class="row">
            <div class="col-lg-4 mt-2">
                <h4 class="mt-4 mx-4 mb-0"><strong>Tabla de ordenes de servicio</strong></h4>
            </div>
            <div class="col-lg-8 mt-4 px-4">
                <div class="row d-flex justify-content-end">
                    <div class="col-md-12 px-4">
                        <div class="input-group input-group-merge">
                            <span class="input-group-text" id="basic-addon-search31"><i class="bx bx-search"></i></span>
                            <input type="number" wire:model="search" class="form-control" placeholder="Buscar orden de venta (Ingrese el no. de orden)... "aria-label="Search..."/>
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
                            <th>No. Orden</th>
                            <th>Cliente</th>
                            <th>Fecha de creación de orden</th>
                            <th>Sucursal</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse($orders as $order)

                        <tr>
                            <td><strong>{{ $order->id }}</strong></td>
                            <td>{{ $order->client->name }}</td>
                            <td>{{ $order->created_at->diffForHumans() }}</td>
                            <td>
                                @if($order->office_id == 1)
                                <span class="badge bg-primary">Sucursal Matriz</span>
                                @else
                                <span class="badge bg-warning">Sucursal Virrey</span>
                                @endif
                            </td>
                            <td>
                                @if($order->status == 'active')
                                <span class="badge bg-success">Activa</span>
                                @else
                                <span class="badge bg-danger">Cancelada</span>
                                @endif
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col-md-4">
                                        <a href="{{ route('serviceOrder.show', $order->id) }}" type="button" class="btn rounded-pill btn-info"> <span class="tf-icons bx bx-show"></span>&nbsp;Mostrar orden</a>
                                    </div>
                                    <div class="col-md-4 mx-2">
                                        {{-- <a type="button" href="#" class="btn rounded-pill btn-danger">Cancelar orden</a> --}}

                                        @if($order->status == 'active')
                                        <form class="form-delete mx-2" action="{{ route('serviceOrder.updateStatus', $order->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn rounded-pill btn-danger">
                                                <span class="tf-icons bx bx-trash"></span>&nbsp; Cancelar orden
                                            </button>
                                        </form>
                                        @else
                                        <form class="form-active mx-2" action="{{ route('serviceOrder.updateStatus', $order->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn rounded-pill btn-success">
                                                <span class="tf-icons bx bx-check"></span>&nbsp; Activar orden
                                            </button>
                                        </form>
                                        @endif

                                    </div>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5"><h3 class="mb-0 text-center"><strong>No se encontró ningúna orden de servicio</strong></h3></td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 d-flex justify-content-end px-4">
                {{-- <div class="mx-2">{{ $clients->links('vendor.pagination.custom_pagination') }}</div> --}}
            </div>
        </div>
    </div>
    <!--/ Bordered Table -->
</div>

@section('extra-js')
<script src="{{ asset('assets/js/sweetalert2.all.min.js') }}"></script>


<script>
    $('.form-delete').submit(function(e){
        e.preventDefault();
        Swal.fire({
            title: '¿Estas seguro de cancelar esta orden?',
            // text: "Esta acción no se puede revertir",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Cancelar orden',
            cancelButtonText: 'Cerrar'
        }).then((result) => {
            if (result.value) {
                this.submit();
            }
        })
    });
</script>

<script>
    $('.form-active').submit(function(e){
        e.preventDefault();
        Swal.fire({
            title: '¿Estas seguro de activar esta orden?',
            // text: "Esta acción no se puede revertir",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Activar orden',
            cancelButtonText: 'Cerrar'
        }).then((result) => {
            if (result.value) {
                this.submit();
            }
        })
    });
</script>

@endsection

