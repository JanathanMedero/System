@extends('layouts.dashboard')

@section('title')
<title>Categorías - Pyscom</title>
@endsection

@section('content')

<div class="card">
	<div class="row">
		<div class="col-lg-4 mt-2">
			<h4 class="mt-4 mx-4 mb-0"><strong>Tabla de categorias</strong></h4>
		</div>
		<div class="col-lg-8 mt-4">
			<div class="row">
				<div class="col-lg-12 d-flex justify-content-end px-4">
					<button type="button" class="btn btn-warning mx-2" data-bs-toggle="modal" data-bs-target="#new-category">Agregar categoría</button>
				</div>

				{{-- modal --}}
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
			</div>
		</div>
	</div>
	<div class="card-body">
		<div class="table-responsive text-nowrap">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>id</th>
						<th>Nombre de la categoría</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>

					@forelse($categories as $category)

					<tr>
						<td><strong>{{ $category->id }}</strong></td>
						<td>{{ $category->name }}</td>
						
						<td>
							<form class="form-delete mx-2" action="#" method="POST">
								@method('DELETE')
								@csrf
								<button type="submit" class="btn rounded-pill btn-danger">Eliminar</button>
							</form>
						</td>
					</tr>
					@empty
					<tr>
						<td colspan="3"><h3 class="mb-0 text-center"><strong>No se encontró ningúna categoría</strong></h3></td>
					</tr>
					@endforelse
				</tbody>
			</table>
		</div>
	</div>
</div>

@endsection