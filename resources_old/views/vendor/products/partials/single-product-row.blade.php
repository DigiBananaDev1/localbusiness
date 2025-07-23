@php
    $index = isset($index) ? (int) $index : 0;
@endphp

<div class="card mb-4 product-group">
    <div class="card-header bg-light d-flex justify-content-between align-items-center">
        <strong>Product # {{ $index + 1 }}</strong>
        <button type="button" class="btn btn-sm btn-danger remove-row">Remove</button>
    </div>
    <div class="card-body row">
        <div class="col-md-6 mb-3">
            <label>Name:</label>
            <input type="text" name="products[{{ $index }}][name]" class="form-control"
                value="{{ old('products.' . $index . '.name') }}" required>
        </div>
        <div class="col-md-6 mb-3">
            <label>MRP:</label>
            <input type="number" name="products[{{ $index }}][mrp]" class="form-control"
                value="{{ old('products.' . $index . '.mrp') }}">
        </div>
        <div class="col-md-6 mb-3">
            <label>Price:</label>
            <input type="number" name="products[{{ $index }}][price]" class="form-control"
                value="{{ old('products.' . $index . '.price') }}" required>
        </div>
        <div class="col-md-6 mb-3">
            <label>Slot:</label>
            <input type="number" name="products[{{ $index }}][bunch]" class="form-control"
                value="{{ old('products.' . $index . '.bunch') }}">
        </div>
        <div class="col-md-6 mb-3">
            <label>Category:</label>
            <select name="products[{{ $index }}][category_id]" class="form-select" required>
                <option value="">-- Select Category --</option>
                @foreach ($categories as $main)
                    <option value="{{ $main->id }}"
                        {{ old('products.' . $index . '.category_id') == $main->id ? 'selected' : '' }}>
                        {{ $main->name }}
                    </option>
                    @foreach ($main->children as $sub)
                        <option value="{{ $sub->id }}"
                            {{ old('products.' . $index . '.category_id') == $sub->id ? 'selected' : '' }}>
                            -- {{ $sub->name }}
                        </option>
                        @foreach ($sub->children as $child)
                            <option value="{{ $child->id }}"
                                {{ old('products.' . $index . '.category_id') == $child->id ? 'selected' : '' }}>
                                ---- {{ $child->name }}
                            </option>
                        @endforeach
                    @endforeach
                @endforeach
            </select>
        </div>
        <div class="col-md-6 mb-3">
            <label>Description:</label>
            <textarea name="products[{{ $index }}][description]" class="form-control" rows="2" required>{{ old('products.' . $index . '.description') }}</textarea>
        </div>
        <div class="col-md-6 mb-3">
            <label>Image:</label>
            <input type="file" name="products[{{ $index }}][image]" class="form-control">
        </div>
        <div class="col-md-6 mb-3">
            <label>Search Tags:</label>
            <textarea name="products[{{ $index }}][search_tags]" class="form-control" rows="1">{{ old('products.' . $index . '.search_tags') }}</textarea>
        </div>
    </div>
</div>
