<div>
	<div class="row">
		@if(Auth::user()->role_id == 1)
		<div class="col d-flex justify-content-end">
			<div class="mb-4">
				<button type="button" class="btn btn-primary mx-2" data-bs-toggle="modal" data-bs-target="#importProducts">Importar productos
				</button>
				{{-- <button type="button" class="btn btn-success mx-2">Exportar productos a excel</button> --}}
			</div>
		</div>
		@endif
		<div class="modal fade" id="importProducts" tabindex="-1" style="display: none;" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="modalCenterTitle">Importar productos</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<form action="{{ route('products.import') }}" method="POST" enctype="multipart/form-data">
						@csrf
						<div class="modal-body">
							<div class="row my-4">
								<label for="productsImport" class="form-label">Seleccione el archivo de excel a importar (.xlsx)</label>
								<input class="form-control" type="file" id="productsImport" name="Importproducts">
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar
								</button>
								<button type="submit" class="btn btn-primary">Importar</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- Bordered Table -->
	<div class="card">
		<div class="row">
			<div class="col-lg-3 mt-2">
				<h4 class="mt-4 mx-4 mb-0"><strong>Tabla de inventario</strong></h4>
			</div>
			<div class="col-lg-4 mt-4 px-4">
				<div class="row d-flex justify-content-end">
					<div class="col-md-12 px-4">
						<div class="input-group input-group-merge">
							<span class="input-group-text" id="basic-addon-search31"><i class="bx bx-search"></i></span>
							<input type="text" wire:model="search" class="form-control" placeholder="Buscar producto"aria-label="Search..."/>
						</div>
					</div>
				</div>
			</div>

			@if(Auth::user()->role->id == 1)
			<div class="col-lg-5 d-flex justify-content-around mt-4">
				<div>
					<a type="button" href="{{ route('category.index') }}" class="btn btn-warning">Mostrar categorías</a>
				</div>
				<div>
					<button type="button" wire:click="clearData()" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#new-product">Nuevo producto</button>
				</div>
			</div>
			@else
			<div class="col-lg-5 d-flex justify-content-end mt-4">
				<div class="mx-4">
					<button type="button" wire:click="clearData()" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#new-product">Nuevo producto</button>
				</div>
			</div>
			@endif

			<div class="modal fade" id="new-product" tabindex="-1" aria-hidden="true" wire:ignore.self>
				<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel4">Nuevo producto</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<form wire:submit.prevent="storeProduct" enctype="multipart/form-data">
							<div class="modal-body">
								<div class="row mb-3">
									<div class="col-12 col-md-6">
										<label for="brand" class="form-label">Marca</label>
										<input type="text" wire:model="brand" id="brand" class="form-control" name="brand" placeholder="Ingrese la marca" required />
									</div>
									<div class="col-12 mt-2 col-md-6 mt-md-0">
										<label for="public_price" class="form-label">Precio público</label>
										<input type="number" id="public_price" class="form-control" name="public_price" placeholder="Ingrese el precio al público" onClick="this.select();" wire:model="public_price" min="1" required />
									</div>
									<div class="col-12 mt-2 col-md-12">
										<label for="description" class="form-label">Descripción</label>
										<input type="text" id="description" class="form-control" name="description" placeholder="Ingrese una breve descripción" wire:model="description" required />
									</div>
								</div>
								<div class="row mb-3">
									<div class="col-md-12">
										<label for="dealer_price" class="form-label">Precio distribuidor</label>
										<input type="number" id="dealer_price" class="form-control" name="dealer_price" placeholder="Ingrese el precio de distribuidor" onClick="this.select();" wire:model="dealer_price" min="1"/>
									</div>
									<div class="col-12 col-sm-6 mt-2 col-md-6">
										<label for="stock_matriz" class="form-label">Existencias en matriz</label>
										<input type="number" min="0" id="stock_matriz" class="form-control" placeholder="Ingrese las existencias en matriz" onClick="this.select();" wire:model="stock_matriz" required />
									</div>
									<div class="col-12 col-sm-6 mt-2 col-md-6">
										<label for="stock_virrey" class="form-label">Existencias en virrey</label>
										<input type="number" id="stock_virrey" class="form-control" placeholder="Ingrese las existencias en virrey" min="0" onClick="this.select();"  wire:model="stock_virrey" required />
									</div>
								</div>
								<div class="row mb-3">
									<div class="col-md-12">
										<label for="investment" class="form-label">Inversión</label>
										<input type="number" min="0" id="investment" class="form-control" name="investment" placeholder="Ingrese la inversión" onClick="this.select();" wire:model="investment" step="0.01" required />
									</div>
									<div class="col-md-12 mt-2 col-md-4">
										<label for="key_sat" class="form-label">Clave del SAT</label>
										<input type="text" id="key_sat" class="form-control" name="key_sat" placeholder="Ingrese la clave del SAT" min="0" wire:model="key_sat" />
									</div>
									<div class="col-md-12 mt-2 col-md-4">
										<label for="description_sat" class="form-label">Descripción del SAT</label>
										<input type="text" id="description_sat" class="form-control" name="description_sat" placeholder="Ingrese la descripción del SAT" wire:model="description_sat" min="0" />
									</div>
								</div>

								{{-- <div class="row mb-3">
									<div class="col-4">
										<label for="stock_total" class="form-label">Existencias totales</label>
										<input type="number" id="stock_total" class="form-control" name="stock_total" placeholder="Se calcula automaticamente" wire:model="stock_total" value="{{ $stock_matriz + $stock_virrey }}" min="0" required disabled />
									</div>

									<div class="col-4">
										<label for="gain_public" class="form-label">Ganancia a público</label>
										<input type="number" disabled id="gain_public" class="form-control" name="gain_public" placeholder="Se calcula automaticamente" wire:model="gain_public" min="0" step="0.01" required />
									</div>
									<div class="col-4">
										<label for="dealer_profit" class="form-label">Ganancia a distribuidor</label>
										<input type="number" disabled id="dealer_profit" class="form-control" name="dealer_profit" placeholder="Se calcula automaticamente" wire:model="dealer_profit" min="0" step="0.01" required />
									</div>
								</div> --}}
								<div class="row mb-3">

									<div class="col-12 col-xl-6">
										<label for="category" class="form-label">Seleccione una categoría</label>
										<select class="form-select" id="category" wire:model="category_id" name="category" required>
											<option selected value="">Seleccione una categoría</option>
											@foreach($categories as $category)
											<option value="{{ $category->id }}">{{ $category->name }}</option>
											@endforeach
										</select>
									</div>
									<div class="col-12 col-xl-6 mt-2 mt-xl-0">
										<label for="image" class="form-label">Seleccione una imágen (Opcional)</label>
										<input class="form-control" type="file" name="image" id="image" wire:model="file">
									</div>
								</div>
								<div wire:loading wire:target="file">
									<div class="row d-flex justify-content-center">
										<div>
											Cargando imágen, espere...
											<div class="spinner-border" role="status">
												<span class="visually-hidden"></span>
											</div>
										</div>
									</div>
								</div>
								@if($file)
								<div class="row d-flex justify-content-center">
									<div class="col-4">
										<h3 class="text-center"><strong>Visualización de imágen</strong></h3>
										<img src="{{ $file->temporaryURL() }}" class="img-fluid">
									</div>
								</div>
								@endif
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar</button>
								<button type="submit" wire:loading.attr="disabled" class="btn btn-primary">Guardar producto</button>
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
									<div>
										<button wire:click="edit({{ $product->id }})" type="button" class="btn rounded-pill btn-info" data-bs-toggle="modal" data-bs-target="#edit_{{ $product->id }}">Ver</button>

										@include('livewire.edit')


									</div>
								</div>
							</td>
						</tr>
						@empty
						<tr>
							<td colspan="7"><h3 class="mb-0 text-center"><strong>Sin productos en el inventario</strong></h3></td>
						</tr>
						@endforelse
					</tbody>
				</table>
			</div>
		</div>
		<div class="row d-none d-md-block">
			<div class="col-lg-12 d-flex justify-content-end px-4">
				<div class="mx-2">{{ $products->links('vendor.pagination.pagination-with-livewire') }}</div>
			</div>
		</div>
		<div class="row d-block d-md-none">
			<div class="col-lg-12 d-flex justify-content-end px-4">
				<div class="mx-2">{{ $products->links('vendor.pagination.pagination-responsive-with-livewire') }}</div>
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

	window.addEventListener('swal:confirm', event => {
		swal({
			title: event.detail.message,
			text: event.detail.text,
			icon: event.detail.type,
			buttons: true,
			dangerMode: true,
		})
		.then((willDelete) => {
			if (willDelete) {
				window.livewire.emit('remove');
			}
		});
	});

</script>

@endsection

