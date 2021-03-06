<div>
    <!-- Bordered Table -->
    <div class="card">
        <div class="row">
            <div class="col-lg-4 mt-2">
                <h4 class="mt-4 mx-4 mb-0"><strong>Tabla de clientes</strong></h4>
            </div>
            <div class="col-lg-8 mt-4">
                <div class="row d-flex justify-content-end">
                    <div class="col-md-9">
                        <div class="input-group input-group-merge">
                            <span class="input-group-text" id="basic-addon-search31"><i class="bx bx-search"></i></span>
                            <input type="text" wire:model="search" class="form-control" placeholder="Buscar cliente... "aria-label="Search..."/>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-success mx-auto" data-bs-toggle="modal" data-bs-target="#modalCenter">Nuevo cliente</button>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
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
                                        <div class="col mb-0">
                                            <label for="rfc" class="form-label">RFC (Opcional)</label>
                                            <input type="text" id="rfc" name="rfc" class="form-control" placeholder="Ingrese el RFC del cliente" />
                                        </div>
                                        <div class="col mb-0">
                                            <label for="phone" class="form-label">Telefono (Opcional)</label>
                                            <input type="number" id="phone" name="phone" class="form-control" placeholder="Ingrese el tel??fono del cliente"/>
                                        </div>
                                    </div>
                                    <div class="row g-2 mb-3">
                                        <div class="col mb-0">
                                            <label for="street" class="form-label">Calle (Opcional)</label>
                                            <input type="text" id="street" name="street" class="form-control" placeholder="Ingrese la calle del cliente" />
                                        </div>
                                        <div class="col mb-0">
                                            <label for="number" class="form-label">N??mero (Opcional)</label>
                                            <input type="number" min="1" id="number" name="number" class="form-control" placeholder="Ingrese el n??mero de casa"/>
                                        </div>
                                    </div>
                                    <div class="row g-2 mb-3">
                                        <div class="col mb-0">
                                            <label for="suburb" class="form-label">Colonia (Opcional)</label>
                                            <input type="text" id="suburb" name="suburb" class="form-control" placeholder="Ingrese la colonia del cliente" />
                                        </div>
                                        <div class="col mb-0">
                                            <label for="cp" class="form-label">C??digo Postal (Opcional)</label>
                                            <input type="number" min="1" id="cp" name="cp" class="form-control" placeholder="Ingrese el c??digo postal"/>
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
        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Correo electr??nico</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse($clients as $client)

                        <tr>
                            <td>
                                <strong>{{ $client->name }}</strong>
                            </td>
                            @if(is_null($client->phone))
                            <td>N/A</td>
                            @else
                            <td>{{ $client->phone }}</td>
                            @endif
                            <td>
                                <div class="row">
                                    <div class="col-md-3">
                                        <button type="button" class="btn rounded-pill btn-info" data-bs-toggle="modal" data-bs-target="#modalCenter-{{ $client->slug }}">Editar
                                        </button>
                                    </div>
                                    <div class="col-md-3">
                                        <a type="button" href="{{ route('service.all', $client->slug) }}" class="btn rounded-pill btn-success">Nuevo servicio</a>
                                    </div>

                                    <div class="modal fade" id="modalCenter-{{ $client->slug }}" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalCenterTitle">Editar empleado: {{ $client->name }}</h5>
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
                                                            <div class="col mb-0">
                                                                <label for="rfc" class="form-label">RFC (Opcional)</label>
                                                                <input type="text" id="rfc" name="rfc" class="form-control" placeholder="Ingrese el RFC del cliente" value="{{ $client->rfc }}" />
                                                            </div>
                                                            <div class="col mb-0">
                                                                <label for="phone" class="form-label">Telefono (Opcional)</label>
                                                                <input type="number" id="phone" name="phone" class="form-control" placeholder="Ingrese el tel??fono del cliente" value="{{ $client->phone }}" />
                                                            </div>
                                                        </div>
                                                        <div class="row g-2 mb-3">
                                                            <div class="col mb-0">
                                                                <label for="street" class="form-label">Calle (Opcional)</label>
                                                                <input type="text" id="street" name="street" class="form-control" placeholder="Ingrese la calle del cliente" value="{{ $client->street }}" />
                                                            </div>
                                                            <div class="col mb-0">
                                                                <label for="number" class="form-label">N??mero (Opcional)</label>
                                                                <input type="number" id="number" name="number" class="form-control" placeholder="Ingrese el n??mero de casa" value="{{ $client->number }}" />
                                                            </div>
                                                        </div>
                                                        <div class="row g-2 mb-3">
                                                            <div class="col mb-0">
                                                                <label for="suburb" class="form-label">Colonia (Opcional)</label>
                                                                <input type="text" id="suburb" name="suburb" class="form-control" placeholder="Ingrese la colonia del cliente" value="{{ $client->suburb }}" />
                                                            </div>
                                                            <div class="col mb-0">
                                                                <label for="cp" class="form-label">C??digo Postal (Opcional)</label>
                                                                <input type="number" id="cp" name="cp" class="form-control" placeholder="Ingrese el c??digo postal" value="{{ $client->cp }}" />
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
                                    {{-- @if(Auth::user()->role->id == 1)
                                    <div class="col-md-6">
                                        <form action="#" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn rounded-pill btn-danger show_confirm">Suspender</button>
                                        </form>
                                    </div>
                                    @endif --}}
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4"><h3 class="mb-0 text-center"><strong>No se encontr?? ning??n cliente</strong></h3></td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 d-flex justify-content-end px-4">
                <div class="mx-2">{{ $clients->links('vendor.pagination.custom_pagination') }}</div>
            </div>
        </div>
    </div>
    <!--/ Bordered Table -->
</div>

