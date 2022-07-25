<div>
	<!-- Bordered Table -->
	<div class="card">
		<div class="row">
			<div class="col-lg-4 mt-2">
				<h4 class="mt-4 mx-4 mb-0"><strong>Tabla de inventario</strong></h4>
			</div>
			<div class="col-lg-6 mt-4 px-4">
				<div class="row d-flex justify-content-end">
					<div class="col-md-12 px-4">
						<div class="input-group input-group-merge">
							<span class="input-group-text" id="basic-addon-search31"><i class="bx bx-search"></i></span>
							<input type="text" wire:model="search" class="form-control" placeholder="Buscar producto"aria-label="Search..."/>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-2 d-flex justify-content-end mt-4">
				<button type="button" class="btn btn-success mx-4" data-bs-toggle="modal" data-bs-target="#new-product">Nuevo producto</button>
			</div>

			<div class="modal fade" id="new-product" tabindex="-1" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel4">Modal title</h5>
							<button
							type="button"
							class="btn-close"
							data-bs-dismiss="modal"
							aria-label="Close"
							></button>
						</div>
						<div class="modal-body">
							<div class="row">
								<div class="col mb-3">
									<label for="nameExLarge" class="form-label">Name</label>
									<input type="text" id="nameExLarge" class="form-control" placeholder="Enter Name" />
								</div>
							</div>
							<div class="row g-2">
								<div class="col mb-0">
									<label for="emailExLarge" class="form-label">Email</label>
									<input type="text" id="emailExLarge" class="form-control" placeholder="xxxx@xxx.xx" />
								</div>
								<div class="col mb-0">
									<label for="dobExLarge" class="form-label">DOB</label>
									<input type="text" id="dobExLarge" class="form-control" placeholder="DD / MM / YY" />
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
								Close
							</button>
							<button type="button" class="btn btn-primary">Save changes</button>
						</div>
					</div>
				</div>
			</div>


		</div>
		<div class="row">

		</div>
		<div class="card-body">
			<div class="table-responsive text-nowrap">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>SKU</th>
							<th>Categoría</th>
							<th>Precio público</th>
							<th>Existencias</th>
							<th>Acciones</th>
						</tr>
					</thead>
					<tbody>

						@forelse($products as $product)

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
							<td class="d-flex justify-content-between">
								<div>
									<a href="{{ route('saleOrder.edit', $order->id) }}" type="button" class="btn rounded-pill btn-info"> <span class="tf-icons bx bx-show"></span>&nbsp;Mostrar orden</a>
								</div>

								@if($order->status == 'active')
								<div>
									<form class="form-delete mx-2" action="{{ route('saleOrder.updateStatus', $order->id) }}" method="POST">
										@csrf
										<button type="submit" class="btn rounded-pill btn-danger">
											<span class="tf-icons bx bx-trash"></span>&nbsp; Cancelar orden
										</button>
									</form>
								</div>
								@else
								<div>
									<form class="form-active mx-2" action="{{ route('saleOrder.updateStatus', $order->id) }}" method="POST">
										@csrf
										<button type="submit" class="btn rounded-pill btn-success">
											<span class="tf-icons bx bx-check"></span>&nbsp; Activar orden
										</button>
									</form>
								</div>
								@endif

							</td>
						</tr>
						@empty
						<tr>
							<td colspan="5"><h3 class="mb-0 text-center"><strong>Sin productos en el inventario</strong></h3></td>
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

