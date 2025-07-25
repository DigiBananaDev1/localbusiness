@extends('admin.layouts.app')
@section('title', 'Sellers-Admin')
@section('content')
    <div class="container py-4">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-title"><i class="fas fa-plus me-2"></i>Add Vendors</h5>
                    <a href="{{ route('admin.users') }}" class="btn btn-secondary me-2">Back</a>
                </div>
            </div>
            <div class="card-body">

                {{-- create vendor add form with business image --}}
                <form action="{{ route('admin.add_vendor') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-6 mb-3">
                            <label>GST Number:</label>
                            <input class="form-control" type="text" name="gst_no"
                                value="{{ old('gst_no', $vendor->gst_no) }}" required />
                            @error('gst_no')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Business Name:</label>
                            <input class="form-control" type="text" name="business_name"
                                value="{{ old('business_name', $vendor->business_name) }}" required />
                            @error('business_name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Mobile:</label>
                            <input class="form-control" type="text" name="mobile"
                                value="{{ old('mobile', $vendor->mobile) }}" required>
                            @error('mobile')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Contact Person Name:</label>
                            <input class="form-control" type="text" name="name"
                                value="{{ old('name', $vendor->name) }}" required>
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>


                        <div class="col-md-6 mb-3">
                            <label>WhatsApp No:</label>
                            <input class="form-control" type="text" name="whatsapp_no"
                                value="{{ old('whatsapp_no', $vendor->whatsapp_no) }}">
                            @error('whatsapp_no')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Pin Code:</label>
                            <input class="form-control" type="text" name="pin_code"
                                value="{{ old('pin_code', $vendor->pin_code) }}" required>
                            @error('pin_code')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Block Number / Building Name:</label>
                            <input class="form-control" type="text" name="block_building"
                                value="{{ old('block_building', $vendor->block_building) }}" required>
                            @error('block_building')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Street / Colony Name:</label>
                            <input class="form-control" type="text" name="street_colony"
                                value="{{ old('street_colony', $vendor->street_colony) }}" required>
                            @error('street_colony')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Area:</label>
                            <textarea class="form-control" rows="1" name="area" required>{{ old('area', $vendor->area) }}</textarea>
                            @error('area')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Landmark:</label>
                            <input class="form-control" type="text" name="landmark"
                                value="{{ old('landmark', $vendor->landmark) }}" required>
                            @error('landmark')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>State:</label>
                            <select class="form-control" name="state" id="state-dropdown" required>
                                <option value="">Select Your State</option>
                                @foreach ($states as $state)
                                    <option value="{{ $state->name }}"
                                        {{ old('state', $vendor->state) == $state->name ? 'selected' : '' }}>
                                        {{ $state->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('state')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>City:</label>
                            <select class="form-control" name="city" id="city-dropdown" required>
                                <option value="">Select City</option>
                            </select>
                            @error('city')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- <div class="col-md-6 mb-3">
                            <label>Category:</label>
                            <select class="form-control" name="categories" required>
                                <option value="" disabled>Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $category->id == old('categories', $vendor->categories) ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('categories')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div> --}}

                        <div class="col-md-6 mb-3">
                            <label>Business Type</label><br>
                            @php
                                $oldBusinessTypes = old(
                                    'business_type_ids',
                                    $vendor->businessTypes->pluck('id')->toArray(),
                                );
                            @endphp
                            @foreach ($businessTypes as $type)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="business_type_ids[]"
                                        value="{{ $type->id }}" id="type_{{ $type->id }}"
                                        {{ in_array($type->id, $oldBusinessTypes) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="type_{{ $type->id }}">
                                        {{ ucfirst($type->name) }}-Based Business
                                    </label>
                                </div>
                            @endforeach
                            @error('business_type_ids')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Search Terms:</label>
                            <textarea class="form-control" rows="1" name="search_terms">{{ old('search_terms', $vendor->search_terms) }}</textarea>
                            @error('search_terms')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Email:</label>
                            <input class="form-control" type="email" name="email"
                                value="{{ old('email', $vendor->email) }}">
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Description:</label>
                            <input class="form-control" type="text" name="description"
                                value="{{ old('description', $vendor->description) }}">
                            @error('description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Business Profile Image</label>
                            <input class="form-control" type="file" name="image">
                            @error('image')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Add Vendor</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

{{-- I have not failed. I've just found 10,000 ways that won't work. - Thomas Edison --}}
