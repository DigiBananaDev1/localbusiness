@extends('vendor.layouts.app')
@section('title', 'profile - Vendor')
@section('content')

    <h1 class="mt-4">Profile</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Profile</li>
    </ol>
    @if ($errors->any())
        <div class="toast align-items-center text-bg-danger border-0" id="error-toast" role="alert" aria-live="assertive"
            aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                    aria-label="Close"></button>
            </div>
        </div>
    @endif
    <div class="py-5">
        @if (!empty($vendor->image))
            <a href="{{ asset('public/images/vendor/' . $vendor->image) }}" class="" target="_blank">
                <img src="{{ asset('public/images/vendor/' . $vendor->image) }}" alt="vendor profile"
                    class="img-fluid w-25 border border-3 border-dark rounded">
            </a>
        @endif
    </div>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-user me-1"></i>
            Profile Update
        </div>
        <form action="{{ route('updatevendorprofile', $vendor->id) }}" method="post" enctype="multipart/form-data">
            <div class="card-body">
                @csrf
                <div class="form-group row">
                    <div class="col-md-6 mb-3">

                        <label>Business Name:</label>
                        <input class="form-control" type="text" name="business_name"
                            value="{{ old('business_name', $vendor->business_name) }}" required />
                        @error('business_name')
                            <small class="alert alert-danger">{{ $message }}</>
                            @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Contact Person Name:</label>
                        <input class="form-control" type="text" name="name" value="{{ old('name', $vendor->name) }}"
                            required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Mobile:</label>
                        <input class="form-control" type="text" name="mobile"
                            value="{{ old('mobile', $vendor->mobile) }}" required>
                        @error('mobile')
                            <small class="alert alert-danger">{{ $message }}</>
                            @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>WhatsApp No:</label>
                        <input class="form-control" type="text" name="whatsapp_no"
                            value="{{ old('whatsapp_no', $vendor->whatsapp_no) }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Pin Code:</label>
                        <input class="form-control" type="text" name="pin_code"
                            value="{{ old('pin_code', $vendor->pin_code) }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Block Number / Building Name:</label>
                        <input class="form-control" type="text" name="block_building"
                            value="{{ old('block_building', $vendor->block_building) }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Street / Colony Name:</label>
                        <input class="form-control" type="text" name="street_colony"
                            value="{{ old('street_colony', $vendor->street_colony) }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Area:</label>
                        <textarea class="form-control" rows="1" name="area" required> {{ old('area', $vendor->area) }}</textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Landmark:</label>
                        <input class="form-control" type="text" name="landmark"
                            value="{{ old('landmark', $vendor->landmark) }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>State:</label>
                        <select class="form-control" name="state" id="state-dropdown" required>
                            <option value="">Select Your State</option>
                            @foreach ($states as $state)
                                <option value="{{ $state->name }}"
                                    {{ old('state', $vendor->state) == $state->name ? 'selected' : '' }}>
                                    {{ $state->name }}</option>
                            @endforeach
                        </select>
                        @error('state')
                            <small class="alert alert-danger">{{ $message }}</>
                            @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>City:</label>
                        <select class="form-control" name="city" id="city-dropdown" required>
                            <option value="">Select City</option>
                        </select>
                        @error('city')
                            <small class="alert alert-danger">{{ $message }}</>
                            @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Category:</label>
                        <select class="form-control" name="categories" required>
                            <option value="" selected disabled>Select Category</option>

                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ $category->id == $vendor->categories ? 'selected' : '' }}>{{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <!-- <div class="col-md-6 mb-3">
                            <label>Type:</label>
                            <input class="form-control" type="text" name="type" value="{{ old('type', $vendor->type) }}" required>
                        </div> -->

                    {{-- <div class="col-md-6 mb-3">
                        <label>Business Type</label><br>
                        @foreach ($businessTypes as $type)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="business_type_ids[]"
                                    value="{{ $type->id }}" id="type_{{ $type->id }}">
                                <label class="form-check-label" for="type_{{ $type->id }}">
                                    {{ ucfirst($type->name) }}-Based Business
                                </label>
                            </div>
                        @endforeach
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

                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Search Terms:</label>
                        <textarea class="form-control" rows="1" name="search_terms">{{ old('search_terms', $vendor->search_terms) }}</textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Email:</label>
                        <input class="form-control" type="email" name="email"
                            value="{{ old('email', $vendor->email) }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Description:</label>
                        <input class="form-control" type="description" name="description"
                            value="{{ old('description', $vendor->description) }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Profile Image</label>
                        <input class="form-control" type="file" name="image"
                            value="{{ old('image', $vendor->image) }}">

                    </div>

                </div>

            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const stateDropdown = document.getElementById('state-dropdown');
            const cityDropdown = document.getElementById('city-dropdown');

            stateDropdown.addEventListener('change', function() {
                const state = this.value;
                const url = "{{ route('cities') }}" + `?state=${state}`;
                cityDropdown.innerHTML = '<option value="">Loading...</option>';

                if (state) {
                    fetch(url)
                        .then(response => response.json())
                        .then(data => {
                            cityDropdown.innerHTML = '<option value="">Select City</option>';
                            data.cities.forEach(city => {
                                const option = document.createElement('option');
                                option.value = city.city;
                                option.textContent = city.city;
                                cityDropdown.appendChild(option);
                            });
                        })
                        .catch(error => {
                            console.error('Error fetching cities:', error);
                            cityDropdown.innerHTML = '<option value="">Failed to load cities</option>';
                        });
                } else {
                    cityDropdown.innerHTML = '<option value="">Select City</option>';
                }
            });
        });
    </script>
@endsection
