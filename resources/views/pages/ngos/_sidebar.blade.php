<div class="card shadow-sm border-0 dashboard-card mb-3">
    <div class="card-body p-2">
        <div class="list-group list-group-flush">
            <a href="{{ route('ngo.dashboard') }}"
               class="list-group-item list-group-item-action {{ request()->routeIs('ngo.dashboard') ? 'active' : '' }}">
                <i class="bi bi-speedometer2 me-2"></i> Dashboard
            </a>
            <a href="{{ route('ngo.profile') }}"
               class="list-group-item list-group-item-action {{ request()->routeIs('ngo.profile') ? 'active' : '' }}">
                <i class="bi bi-person-badge me-2"></i> Profile
            </a>
            <a href="{{ route('ngo.orders') }}"
               class="list-group-item list-group-item-action {{ request()->routeIs('ngo.orders') ? 'active' : '' }}">
                <i class="bi bi-box-seam me-2"></i> Orders
            </a>
            <a href="{{ route('ngo.settings') }}"
               class="list-group-item list-group-item-action {{ request()->routeIs('ngo.settings') ? 'active' : '' }}">
                <i class="bi bi-gear me-2"></i> Settings
            </a>
        </div>
    </div>
</div>
