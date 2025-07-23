@extends('admin.layouts.app')
@section('title', 'Dashboard - Admin')
@section('content')

    <h1 class="mt-4">Dashboard</h1>
    <div class="row">
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-area me-1"></i>
                    Queries Chart
                </div>
                <div class="card-body"><canvas id="myQueriesChart" width="100%" height="60"></canvas></div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-bar me-1"></i>
                    Vendor Leads Chart
                </div>
                <div class="card-body"><canvas id="myLeadsChart" width="100%" height="60"></canvas></div>
            </div>
        </div>
    </div>
    <script>
        const labels = @json($labels);
        const values = @json($values);
        const queryLabels = @json($queryLabels);
        const queryValues = @json($queryValues);

        const ctx = document.getElementById('myQueriesChart').getContext('2d');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: queryLabels,
                datasets: [{
                    label: 'Queries',
                    data: queryValues,
                    backgroundColor: "rgba(2,117,216,1)",
                    borderColor: "rgba(2,117,216,1)",
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                    }
                }
            },
        });
        const ctx1 = document.getElementById('myLeadsChart').getContext('2d');

        new Chart(ctx1, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Leads',
                    data: values,
                    backgroundColor: "rgba(2,117,216,1)",
                    borderColor: "rgba(2,117,216,1)",
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                    }
                }
            },
        });
    </script>

@endsection