<div class="modal fade" tabindex="-1" id="product_{{ $sale->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel4">Número de venta: {{ $sale->id }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-3">
                    <div class="col-4">
                        <label for="sku" class="form-label">SKU del producto</label>
                        <input type="text" id="sku" class="form-control" name="sku" placeholder="Ingrese la marca" value="{{ $sale->sku_product }}" readonly />
                    </div>
                    <div class="col-4">
                        <label for="brand" class="form-label">Marca</label>
                        <input type="text" id="brand" class="form-control" name="brand" placeholder="Ingrese la marca" value="{{ $sale->brand }}" readonly />
                    </div>
                    <div class="col-4">
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
                    <div class="col-6">
                        <label for="total" class="form-label">Venta total</label>
                        <input type="number" id="total" class="form-control" name="total" value="{{ $sale->total }}" readonly />
                    </div>
                    <div class="col-6">
                        <label for="office" class="form-label">Vendido en</label>
                        <input type="text" id="office" class="form-control" name="office" value="{{ $sale->office }}" readonly />
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