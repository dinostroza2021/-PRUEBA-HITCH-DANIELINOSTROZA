<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="description">Descripción</label>
            <input type="text" name="description" id="description" class="form-control" placeholder="descripcion..." value="{{ old('description', $payment->description ?? '') }}">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="price">Precio</label>
            <input type="number" name="price" id="price" class="form-control" placeholder="precio..." value="{{ old('price', $payment->price ?? '') }}">
        </div>
    </div>
</div>