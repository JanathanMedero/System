<div>
	<!-- Bordered Table -->
	<div class="card">
		<div class="row">
			<div class="col-lg-3 mt-2">
				<h4 class="mt-4 mx-4 mb-0"><strong>Tabla de inventario</strong></h4>
			</div>
			<div class="col-lg-5 mt-4 px-4">
				<div class="row d-flex justify-content-end">
					<div class="col-md-12 px-4">
						<div class="input-group input-group-merge">
							<span class="input-group-text" id="basic-addon-search31"><i class="bx bx-search"></i></span>
							<input type="text" wire:model="search" class="form-control" placeholder="Buscar producto"aria-label="Search..."/>
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-4 d-flex justify-content-around mt-4">
				<div>
					<button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#new-category">Agregar categoría</button>
				</div>
				<div>
					<button type="button" wire:click="clearData()" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#new-product">Nuevo producto</button>
				</div>
			</div>

			<div class="modal fade" id="new-category" tabindex="-1" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel1">Nueva categoría</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<form action="{{ route('category.store') }}" method="POST">
							@csrf
							<div class="modal-body">
								<div class="row">
									<div class="col mb-3">
										<label for="nameBasic" class="form-label">Nombre de la categoría</label>
										<input type="text" id="nameBasic" name="name" class="form-control" placeholder="Ingrese el nombre de la categoría" required />
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar</button>
								<button type="submit" class="btn btn-primary">Guardar</button>
							</div>
						</form>
					</div>
				</div>
			</div>

			<div class="modal fade" id="new-product" tabindex="-1" aria-hidden="true" wire:ignore.self>
				<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel4">Nuevo producto</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<form wire:submit.prevent="storeProduct">
							<div class="modal-body">
								<div class="row mb-3">
									<div class="col-4">
										<label for="brand" class="form-label">Marca</label>
										<input type="text" wire:model="brand" id="brand" class="form-control" name="brand" placeholder="Ingrese la marca" required />
									</div>
									<div class="col-4">
										<label for="description" class="form-label">Descripción</label>
										<input type="text" id="description" class="form-control" name="description" placeholder="Ingrese una breve descripción" wire:model="description" required />
									</div>
									<div class="col-4">
										<label for="public_price" class="form-label">Precio público</label>
										<input type="number" id="public_price" class="form-control" name="public_price" placeholder="Ingrese el precio al público" onClick="this.select();" wire:model="public_price" min="1" required />
									</div>
								</div>
								<div class="row mb-3">
									<div class="col-4">
										<label for="dealer_price" class="form-label">Precio distribuidor</label>
										<input type="number" id="dealer_price" class="form-control" name="dealer_price" placeholder="Ingrese el precio de distribuidor" onClick="this.select();" wire:model="dealer_price" min="1"/>
									</div>
									<div class="col-4">
										<label for="stock_matriz" class="form-label">Existencias en matriz</label>
										<input type="number" min="0" id="stock_matriz" class="form-control" placeholder="Ingrese las existencias en matriz" onClick="this.select();" wire:model="stock_matriz" required />
									</div>
									<div class="col-4">
										<label for="stock_virrey" class="form-label">Existencias en virrey</label>
										<input type="number" id="stock_virrey" class="form-control" placeholder="Ingrese las existencias en virrey" min="0" onClick="this.select();"  wire:model="stock_virrey" required />
									</div>
								</div>
								<div class="row mb-3">
									<div class="col-4">
										<label for="investment" class="form-label">Inversión</label>
										<input type="number" min="0" id="investment" class="form-control" name="investment" placeholder="Ingrese la inversión" onClick="this.select();" wire:model="investment" step="0.01" required />
									</div>
									<div class="col-4">
										<label for="key_sat" class="form-label">Clave del SAT</label>
										<input type="text" id="key_sat" class="form-control" name="key_sat" placeholder="Ingrese la clave del SAT" min="0" wire:model="key_sat" required />
									</div>
									<div class="col-4">
										<label for="description_sat" class="form-label">Descripción del SAT</label>
										<input type="text" id="description_sat" class="form-control" name="description_sat" placeholder="Ingrese la descripción del SAT" wire:model="description_sat" min="0" required />
									</div>
								</div>

								<div class="row mb-3">
									<div class="col-4">
										<label for="stock_total" class="form-label">Existencias totales</label>
										<input type="number" id="stock_total" class="form-control" name="stock_total" placeholder="Ingrese las existencias totales" wire:model="stock_total" value="{{ $stock_matriz + $stock_virrey }}" min="0" required disabled />
									</div>

									<div class="col-4">
										<label for="gain_public" class="form-label">Ganancia a público</label>
										<input type="number" disabled id="gain_public" class="form-control" name="gain_public" placeholder="Ingrese la ganancia al público" wire:model="gain_public" min="0" step="0.01" required />
									</div>
									<div class="col-4">
										<label for="dealer_profit" class="form-label">Ganancia a distribuidor</label>
										<input type="number" disabled id="dealer_profit" class="form-control" name="dealer_profit" placeholder="Ingrese la ganancia a distribuidor" wire:model="dealer_profit" min="0" step="0.01" required />
									</div>
								</div>
								<div class="row mb-3">

									<div class="col">
										<label for="category" class="form-label">Seleccione una categoría</label>
										<select class="form-select" wire:model="category_id" name="category_id" id="category" aria-label="Default select example">
											<option selected disabled>Seleccione una categoría</option>
											@foreach($categories as $category)
											<option value="{{ $category->id }}">{{ $category->name }}</option>
											@endforeach
										</select>
									</div>

								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar</button>
								<button type="submit" class="btn btn-primary">Guardar producto</button>
							</div>
						</form>
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
							<th>Descripción</th>
							<th>Marca</th>
							<th>Categoría</th>
							<th>Precio público</th>
							<th>Existencias</th>
							<th>Acciones</th>
						</tr>
					</thead>
					<tbody>

						@forelse($products as $product)

						<tr>
							<td><strong>{{ $product->id }}</strong></td>
							<td>{{ Str::limit($product->description, 40) }}</td>
							<td>{{ $product->brand }}</td>
							<td>{{ $product->category->name }}</td>
							<td>${{ $product->public_price }}</td>
							<td>
								@if($product->stock_total > 0)
								{{ $product->stock_total }}
								@else
								<span class="badge rounded-pill bg-danger">Sin existencias</span>
								@endif
							</td>
							<td>
								<div class="d-flex justify-content-around">
									{{-- <div>
										<button type="button" class="btn rounded-pill btn-danger">Eliminar</button>
									</div> --}}
									<div>
										{{-- <button type="button" class="btn rounded-pill btn-info" data-bs-toggle="modal" data-bs-target="#edit-product-{{ $product->id }}">Ver</button> --}}

										<button wire:click="edit({{ $product->id }})" type="button" class="btn rounded-pill btn-info" data-bs-toggle="modal" data-bs-target="#edit">Ver</button>

										{{-- <button wire:click="edit({{ $product->id }})" type="button" class="btn rounded-pill btn-info" data-bs-toggle="modal" data-bs-target="#edit-product">
											Ver
											<div class="spinner-border spinner-border-sm text-primary" role="status">
												<span class="visually-hidden">Loading...</span>
											</div>
										</button> --}}

										@if($modal)
										@include('livewire.edit')
										@endif


									</div>
								</div>

								{{-- <div>
									<div class="modal fade" id="edit-product-{{ $product->id }}" tabindex="-1" aria-hidden="true" wire:ignore.self>
										<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="exampleModalLabel4">Editar producto {{ $product->id }}</h5>
													<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
												</div>
												<form>
													<div class="modal-body">
														<div class="row mb-3">
															<div class="col-4">
																<label for="brand" class="form-label">Marca</label>
																<input type="text" wire:model="brand" id="brand" class="form-control" name="brand" placeholder="Ingrese la marca" value="{{ $product->brand }}" required />
															</div>
															<div class="col-4">
																<label for="description" class="form-label">Descripción</label>
																<input type="text" id="description" class="form-control" name="description" placeholder="Ingrese una breve descripción" wire:model="description" value="{{ $product->description }}" required />
															</div>
															<div class="col-4">
																<label for="public_price" class="form-label">Precio público</label>
																<input type="number" id="public_price" class="form-control" name="public_price" placeholder="Ingrese el precio al público" onClick="this.select();" wire:model="public_price" min="1" required />
															</div>
														</div>
														<div class="row mb-3">
															<div class="col-4">
																<label for="dealer_price" class="form-label">Precio distribuidor</label>
																<input type="number" id="dealer_price" class="form-control" name="dealer_price" placeholder="Ingrese el precio de distribuidor" onClick="this.select();" wire:model="dealer_price" min="1"/>
															</div>
															<div class="col-4">
																<label for="stock_matriz" class="form-label">Existencias en matriz</label>
																<input type="number" min="0" id="stock_matriz" class="form-control" placeholder="Ingrese las existencias en matriz" onClick="this.select();" wire:model="stock_matriz" required />
															</div>
															<div class="col-4">
																<label for="stock_virrey" class="form-label">Existencias en virrey</label>
																<input type="number" id="stock_virrey" class="form-control" placeholder="Ingrese las existencias en virrey" min="0" onClick="this.select();"  wire:model="stock_virrey" required />
															</div>
														</div>
														<div class="row mb-3">
															<div class="col-4">
																<label for="investment" class="form-label">Inversión</label>
																<input type="number" min="0" id="investment" class="form-control" name="investment" placeholder="Ingrese la inversión" onClick="this.select();" wire:model="investment" step="0.01" required />
															</div>
															<div class="col-4">
																<label for="key_sat" class="form-label">Clave del SAT</label>
																<input type="text" id="key_sat" class="form-control" name="key_sat" placeholder="Ingrese la clave del SAT" min="0" wire:model="key_sat" required />
															</div>
															<div class="col-4">
																<label for="description_sat" class="form-label">Descripción del SAT</label>
																<input type="text" id="description_sat" class="form-control" name="description_sat" placeholder="Ingrese la descripción del SAT" wire:model="description_sat" min="0" required />
															</div>
														</div>

														<div class="row mb-3">
															<div class="col-4">
																<label for="stock_total" class="form-label">Existencias totales</label>
																<input type="number" id="stock_total" class="form-control" name="stock_total" placeholder="Ingrese las existencias totales" wire:model="stock_total" value="{{ $stock_matriz + $stock_virrey }}" min="0" required disabled />
															</div>

															<div class="col-4">
																<label for="gain_public" class="form-label">Ganancia a público</label>
																<input type="number" disabled id="gain_public" class="form-control" name="gain_public" placeholder="Ingrese la ganancia al público" wire:model="gain_public" min="0" step="0.01" required />
															</div>
															<div class="col-4">
																<label for="dealer_profit" class="form-label">Ganancia a distribuidor</label>
																<input type="number" disabled id="dealer_profit" class="form-control" name="dealer_profit" placeholder="Ingrese la ganancia a distribuidor" wire:model="dealer_profit" min="0" step="0.01" required />
															</div>
														</div>
														<div class="row mb-3">

															<div class="col">
																<label for="category" class="form-label">Seleccione una categoría</label>
																<select class="form-select" wire:model="category_id" name="category_id" id="category" aria-label="Default select example">
																	<option selected disabled>Seleccione una categoría</option>
																	@foreach($categories as $category)
																	<option value="{{ $category->id }}">{{ $category->name }}</option>
																	@endforeach
																</select>
															</div>

														</div>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar</button>
														<button type="submit" class="btn btn-info">Actualizar producto</button>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div> --}}


								{{-- @livewire('modal-edit-product', ['product_id' => $product->id]) --}}

							</td>
						</tr>
						@empty
						<tr>
							<td colspan="6"><h3 class="mb-0 text-center"><strong>Sin productos en el inventario</strong></h3></td>
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

