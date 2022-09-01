<div>
    <div class="modal fade" tabindex="-1" id="edit_{{ $product->id }}" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel4">Editar producto {{ $product->id }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form>
                    <div class="modal-body">
                        <div class="row mb-3">
                            <div class="col-6">
                                <label for="brand" class="form-label">Marca</label>
                                <input type="text" wire:model="brand" id="brand" class="form-control" name="brand" placeholder="Ingrese la marca" value="{{ $brand }}" required />
                            </div>
                            <div class="col-6">
                                <label for="public_price" class="form-label">Precio público</label>
                                <input type="number" id="public_price" class="form-control" name="public_price" placeholder="Ingrese el precio al público" onClick="this.select();" wire:model="public_price" min="1" required />
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <label for="description" class="form-label">Descripción</label>
                                <textarea class="form-control" id="description" rows="3" name="description" placeholder="Ingrese una breve descripción" wire:model="description" required>{{ $description }}</textarea>
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
                                    <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }} >{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col">
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

                        @if(is_null($product->image))
                        <p style="color: red; font-size: 18px;" class="text-center mt-2 mb-0"><strong>Este producto no cuenta con ningúna imágen actualmente</strong></p>
                        @endif

                        @if($file == null)
                        <div class="row d-flex justify-content-center">
                            <div class="col-4">
                                @if($product->image)
                                <h3 class="text-center"><strong>Visualización de imágen</strong></h3>
                                <img src="{{ asset('uploads/'.$product->image) }}" class="img-fluid">
                                @endif
                            </div>
                        </div>
                        @endif

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar</button>
                        @if($product->image)
                        <button type="button" wire:loading.attr="disabled" wire:target="file" wire:click="deleteImage({{ $product->id }})" class="btn btn-danger">Eliminar imágen</button>
                        @endif
                        <button type="button" wire:loading.attr="disabled" wire:target="file" wire:click="updateProduct({{ $product->id }})" class="btn btn-info">Actualizar producto</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
