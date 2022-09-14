<div>
    @if(Auth::user()->role->id == 1)
    <div class="row">
        <div class="col d-flex justify-content-end mb-4">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter">Importar usuarios
            </button>

            <div class="modal fade" id="modalCenter" tabindex="-1" style="display: none;" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Importar usuarios</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('clients.import') }}" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row my-4">
                            @csrf
                            <label for="clientsImport" class="form-label">Seleccione el archivo de excel a importar (.xlsx)</label>
                            <input class="form-control" type="file" id="clientsImport" name="clients">
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
</div>
@endif

<!-- Bordered Table -->
<div class="card">

    <div class="d-sm-flex px-4 mt-4 d-none d-sm-block justify-content-between align-items-center d-lg-none">
        <div style="margin-right: 1.5rem;">
            <h4 class="mb-0"><strong>Tabla de clientes</strong></h4>
        </div>
        <div style="flex-grow: 8" class="ml-4">
            <div class="input-group input-group-merge">
                <span class="input-group-text" id="basic-addon-search31"><i class="bx bx-search"></i></span>
                <input type="text" wire:model="search" class="form-control" placeholder="Buscar cliente... "aria-label="Search..."/>
            </div>
        </div>    
    </div>

    <div class="d-sm-flex px-4 mt-4 d-none d-sm-block justify-content-end align-items-center d-lg-none">
        <div>
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createClient">Nuevo cliente</button>
        </div>
    </div>

    <div class="d-none d-sm-none d-lg-flex px-4 mt-4 d-sm-block justify-content-between align-items-center d-lg-block">
        <div style="margin-right: 1.5rem;">
            <h4 class="mb-0"><strong>Tabla de clientes</strong></h4>
        </div>
        <div style="flex-grow: 8" class="ml-4">
            <div class="input-group input-group-merge">
                <span class="input-group-text" id="basic-addon-search31"><i class="bx bx-search"></i></span>
                <input type="text" wire:model="search" class="form-control" placeholder="Buscar cliente... "aria-label="Search..."/>
            </div>
        </div>
        <div style="margin-left: 1.5rem;">
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createClient">Nuevo cliente</button>
        </div>    
    </div>



    <div class="row px-2 d-block d-sm-none">
        <div class="col-12 px-4 mt-4 d-flex justify-content-center">
            <h4 class="mb-0"><strong>Tabla de clientes</strong></h4>
        </div>
        <div class="col-12 px-4 mt-4">
            <div class="input-group input-group-merge">
                <span class="input-group-text" id="basic-addon-search31"><i class="bx bx-search"></i></span>
                <input type="text" wire:model="search" class="form-control" placeholder="Buscar cliente... "aria-label="Search..."/>
            </div>
        </div>
        <div class="d-grid col-12 mt-3 px-4">
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createClient">Nuevo cliente</button>
        </div>
    </div>

    {{-- modal --}}
    <div class="modal fade" id="createClient" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Ingrese los datos del cliente</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('client.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col mb-3">
                                <label for="name" class="form-label">Nombre Completo</label>
                                <input type="text" id="name" name="name" class="form-control" placeholder="Ingrese el nombre del cliente" required minlength="3" />
                            </div>
                        </div>
                        <div class="row g-2 mb-3">
                            <div class="col-12 mb-0">
                                <label for="rfc" class="form-label">RFC (Opcional)</label>
                                <input type="text" id="rfc" name="rfc" class="form-control" placeholder="Ingrese el RFC del cliente" />
                            </div>
                            <div class="col-12 mb-0">
                                <label for="phone" class="form-label">Telefono (Opcional)</label>
                                <input type="number" id="phone" name="phone" class="form-control" placeholder="Ingrese el teléfono del cliente"/>
                            </div>
                        </div>
                        <div class="row g-2 mb-3">
                            <div class="col-12 mb-0">
                                <label for="street" class="form-label">Calle (Opcional)</label>
                                <input type="text" id="street" name="street" class="form-control" placeholder="Ingrese la calle del cliente" />
                            </div>
                            <div class="col-12 mb-0">
                                <label for="number" class="form-label">Número (Opcional)</label>
                                <input type="number" min="1" id="number" name="number" class="form-control" placeholder="Ingrese el número de casa"/>
                            </div>
                        </div>
                        <div class="row g-2 mb-3">
                            <div class="col-12 mb-0">
                                <label for="suburb" class="form-label">Colonia (Opcional)</label>
                                <input type="text" id="suburb" name="suburb" class="form-control" placeholder="Ingrese la colonia del cliente" />
                            </div>
                            <div class="col-12 mb-0">
                                <label for="cp" class="form-label">Código Postal (Opcional)</label>
                                <input type="number" min="1" id="cp" name="cp" class="form-control" placeholder="Ingrese el código postal"/>
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

    <div class="card-body">
        <div class="table-responsive text-nowrap">
            <table class="table table-bordered clients_table">
                <thead>
                    <tr>
                        <th>No. cliente</th>
                        <th>Nombre</th>
                        <th>Teléfono</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse($clients as $client)

                    <tr>
                        <td>
                            {{ $client->id }}
                        </td>
                        <td>
                            <strong>{{ $client->name }}</strong>
                        </td>
                        @if(is_null($client->phone))
                        <td>N/A</td>
                        @else
                        <td>{{ $client->phone }}</td>
                        @endif
                        <td>
                            <div class="d-flex">
                                <div>
                                    <button type="button" class="btn rounded-pill btn-info" data-bs-toggle="modal" data-bs-target="#modalCenter-{{ $client->slug }}">Editar
                                    </button>
                                </div>
                                <div class="mx-2">
                                    <a type="button" href="{{ route('service.all', $client->slug) }}" class="btn rounded-pill btn-success">Nuevo servicio</a>
                                </div>

                                <div>
                                    <a type="button" href="#" class="btn rounded-pill btn-warning">Servicios</a>
                                </div>

                                <div class="modal fade" id="modalCenter-{{ $client->slug }}" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <div class="modal-title flex">
                                                    {{ $client->name }}
                                                </div>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('client.update', $client->slug) }}" method="POST">
                                                @method('PUT')
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col mb-3">
                                                            <label for="name" class="form-label">Nombre Completo</label>
                                                            <input type="text" id="name" name="name" class="form-control" placeholder="Ingrese el nombre del cliente" value="{{ $client->name }}" required minlength="3" />
                                                        </div>
                                                    </div>
                                                    <div class="row g-2 mb-3">
                                                        <div class="col-12 mb-0">
                                                            <label for="rfc" class="form-label">RFC (Opcional)</label>
                                                            <input type="text" id="rfc" name="rfc" class="form-control" placeholder="Ingrese el RFC del cliente" value="{{ $client->rfc }}" />
                                                        </div>
                                                        <div class="col-12 mb-0">
                                                            <label for="phone" class="form-label">Teléfono (Opcional)</label>
                                                            <input type="number" id="phone" name="phone" class="form-control" placeholder="Ingrese el teléfono del cliente" value="{{ $client->phone }}" />
                                                        </div>
                                                    </div>
                                                    <div class="row g-2 mb-3">
                                                        <div class="col-12 mb-0">
                                                            <label for="street" class="form-label">Calle (Opcional)</label>
                                                            <input type="text" id="street" name="street" class="form-control" placeholder="Ingrese la calle del cliente" value="{{ $client->street }}" />
                                                        </div>
                                                        <div class="col-12 mb-0">
                                                            <label for="suburb" class="form-label">Colonia (Opcional)</label>
                                                            <input type="text" id="suburb" name="suburb" class="form-control" placeholder="Ingrese la colonia del cliente" value="{{ $client->suburb }}" />
                                                        </div>
                                                    </div>
                                                    <div class="row g-2 mb-3">
                                                        <div class="col mb-0">
                                                            <label for="number" class="form-label">Número (Opcional)</label>
                                                            <input type="number" id="number" name="number" class="form-control" placeholder="Ingrese el número de casa" value="{{ $client->number }}" />
                                                        </div>
                                                        <div class="col mb-0">
                                                            <label for="cp" class="form-label">Código Postal (Opcional)</label>
                                                            <input type="number" id="cp" name="cp" class="form-control" placeholder="Ingrese el código postal" value="{{ $client->cp }}" />
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
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4"><h3 class="mb-0 text-center"><strong>No se encontró ningún cliente</strong></h3></td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="row d-none d-md-block">
        <div class="col-lg-12 d-flex justify-content-end px-4">
            <div class="mx-2">{{ $clients->links('vendor.pagination.bootstrap-4') }}</div>
        </div>
    </div>
    <div class="row d-block d-md-none">
        <div class="col-lg-12 d-flex justify-content-end px-4">
            <div class="mx-2">{{ $clients->links('vendor.pagination.pagination-responsive') }}</div>
        </div>
    </div>
</div>
<!--/ Bordered Table -->
</div>

