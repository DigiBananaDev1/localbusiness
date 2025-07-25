<style>
    .disabled-link {
        pointer-events: none;
        opacity: 0.5;
    }
</style>
<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <div class="sb-sidenav-menu-heading">Core</div>
            <a class="nav-link" href="{{ route('venderdashboard') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
            </a>
            @php
                // dd(vars: $loggedInVendor->businessTypes);
                $vendorUser = Auth::guard('vendor')->user();
            @endphp
            @if (Auth::guard('vendor')->user()->status == 1)

                @forelse ($loggedInVendor->businessTypes as $businessType)
                    {{-- {{ $businessType->name }} --}}
                    @if ($businessType->name == 'service')
                        <a class="nav-link collapsed"
                            href="{{ route('vendor.viewServices', ['vendor_id' => Auth::guard('vendor')->user()->id]) }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-cube"></i></div>
                            Service
                        </a>
                    @elseif ($businessType->name == 'product')
                        <a class="nav-link collapsed"
                            href="{{ route('vendor.viewproducts', ['vendor_id' => Auth::guard('vendor')->user()->id]) }}">
                           
                            <div class="sb-nav-link-icon"><i class="fas fa-cube"></i></div>
                            Product
                        </a>
                    @elseif ($businessType->name == 'product' && $businessType->name == 'service')
                        <a class="nav-link collapsed"
                            href="{{ route('vendor.viewServices', ['vendor_id' => Auth::guard('vendor')->user()->id]) }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-cube"></i></div>
                            Service
                        </a>
                        <a class="nav-link collapsed"
                            href="{{ route('vendor.viewServices', ['vendor_id' => Auth::guard('vendor')->user()->id]) }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-cube"></i></div>
                            Product
                        </a>
                    @endif
                @empty
                @endforelse
                <a class="nav-link collapsed"
                    href="{{ route('vendor.viewServices', ['vendor_id' => Auth::guard('vendor')->user()->id]) }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-cube"></i></div>
                    Service / Product
                </a>
                <a class="nav-link collapsed"
                    href="{{ route('vendor.showQueries', ['vendor_id' => Auth::guard('vendor')->user()->id]) }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                    Queries
                </a>
            @else
                <a class="nav-link collapsed disabled-link"
                    href="{{ route('vendor.viewServices', ['vendor_id' => Auth::guard('vendor')->user()->id]) }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-cube"></i></div>
                    Service / Product
                </a>

                <a class="nav-link collapsed disabled-link"
                    href="{{ route('vendor.showQueries', ['vendor_id' => Auth::guard('vendor')->user()->id]) }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                    Queries
                </a>
            @endif
        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div class="small">Logged in as:</div>
        {{ Auth::guard('vendor')->user()->business_name }}
    </div>
</nav>
