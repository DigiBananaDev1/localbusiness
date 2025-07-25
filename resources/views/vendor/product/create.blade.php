@extends('vendor.layouts.app')
@section('title', 'Add Multiple Products')

@section('content')
    <h1 class="mt-4">Add Multiple Products</h1>

    <form action="{{ route('vendor.storeMultipleProducts', $vendor->id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div id="product-rows">
            @include('vendor.products.partials.single-product-row', ['index' => 0])
        </div>

        <div class="my-3 text-end">
            <button type="button" id="add-more" class="btn btn-secondary">+ Add Product</button>
        </div>

        <div class="text-end">
            <button type="submit" class="btn btn-primary">Submit All</button>
        </div>
    </form>

    {{-- Template to clone (contains placeholders like __INDEX__) --}}
    <template id="product-template">
        <div class="card mb-4 product-group">
            <div class="card-header bg-light d-flex justify-content-between align-items-center">
                <strong>Product # <span class="product-number">__INDEX_PLUS_1__</span></strong>
                <button type="button" class="btn btn-sm btn-danger remove-row">Remove</button>
            </div>
            <div class="card-body row">
                <div class="col-md-6 mb-3">
                    <label>Name:</label>
                    <input type="text" name="products[__INDEX__][name]" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label>MRP:</label>
                    <input type="number" name="products[__INDEX__][mrp]" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Price:</label>
                    <input type="number" name="products[__INDEX__][price]" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Slot:</label>
                    <input type="number" name="products[__INDEX__][bunch]" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Category:</label>
                    <select name="products[__INDEX__][category_id]" class="form-select" required>
                        <option value="">-- Select Category --</option>
                        @foreach ($categories as $main)
                            <option value="{{ $main->id }}">{{ $main->name }}</option>
                            @foreach ($main->children as $sub)
                                <option value="{{ $sub->id }}">-- {{ $sub->name }}</option>
                                @foreach ($sub->children as $child)
                                    <option value="{{ $child->id }}">---- {{ $child->name }}</option>
                                @endforeach
                            @endforeach
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Description:</label>
                    <textarea name="products[__INDEX__][description]" class="form-control" rows="2" required></textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Image:</label>
                    <input type="file" name="products[__INDEX__][image]" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Gallery Images:</label>
                    <input type="file" name="products[{{ $index }}][gallery][]" class="form-control" multiple>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Search Tags:</label>
                    <textarea name="products[__INDEX__][search_tags]" class="form-control" rows="1"></textarea>
                </div>
            </div>
        </div>
    </template>

    <script>
        let productIndex = 1;

        document.getElementById('add-more').addEventListener('click', () => {
            let template = document.getElementById('product-template').innerHTML;

            // Replace placeholders
            let newRow = template
                .replace(/__INDEX__/g, productIndex)
                .replace(/__INDEX_PLUS_1__/g, productIndex + 1);

            document.getElementById('product-rows').insertAdjacentHTML('beforeend', newRow);
            productIndex++;
        });

        // Allow row removal
        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-row')) {
                e.target.closest('.product-group').remove();
            }
        });
    </script>
@endsection
