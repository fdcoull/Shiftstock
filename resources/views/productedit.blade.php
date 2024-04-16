{{-- resources/views/productedit.blade.php --}}
@extends('app')

@section('content')
<div class="container">
    <h1>Edit Listing</h1>
    <form action="{{ route('product.update', $listing->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="{{ $listing->title }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" required>{{ $listing->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="packaging">Packaging</label>
            <input type="text" name="packaging" id="packaging" value="{{ $listing->packaging }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="weight">Weight</label>
            <input type="number" name="weight" id="weight" value="{{ $listing->weight }}" class="form-control">
            <select name="weight_unit">
            <option value="KG">Kilogram</option>
            <option value="G">Gram</option>
            <option value="TN">Metric Tonne</option>
            <option value="OZ">Ounce</option>
            <option value="LB">Pound</option>
            <option value="ST">Stone</option>
		    </select>
        </div>

        <div class="form-group">
            <label for="quantity_inhand">Quantity In Hand</label>
            <input type="number" name="quantity_inhand" id="quantity_inhand" value="{{ $listing->quantity_inhand }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" name="price" id="price" value="{{ $listing->price }}" class="form-control" required>
            <select name="currency">
            <option value="GBP">British Pound</option>
            <option value="EUR">Euro</option>
            <option value="USD">US Dollar</option>
            </select>
        </div>

        <div class="form-group">
            <label for="age">Age</label>
            <input type="number" name="age" id="age" value="{{ $listing->age }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="expiry">Expiry Date</label>
            <input type="date" name="expiry" id="expiry" value="{{ $listing->expiry }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="itemImage">Update Images</label>
            <input type="file" class="form-control-file" id="itemImage" name="images[]" multiple>
        </div>

        <button type="submit" class="btn btn-primary">Update Listing</button>
    </form>
</div>
@endsection
