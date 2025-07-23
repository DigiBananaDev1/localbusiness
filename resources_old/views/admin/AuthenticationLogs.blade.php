@extends('admin.layouts.app')
@section('title', 'Dashboard-Admin-Activity')
@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Activity Logs</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Logged In At</th>
                                            <th>Logged Out At</th>
                                            <th>Browser</th>
                                            <th>Platform</th>
                                            <th>Platform Version</th>
                                            <th>Lattitude</th>
                                            <th>Longitude</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($authenticationLogs as $log)
                                            <tr>
                                                <td>{{ $log->logged_in_at }}</td>
                                                <td>{{ $log->logged_out_at }}</td>
                                                <td>{{ $log->browser }}</td>
                                                <td>{{ $log->platform }}</td>
                                                <td>{{ $log->platform_version }}</td>
                                                <td>{{ $log->lattitude }}</td>
                                                <td>{{ $log->longitude }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {{ $authenticationLogs->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
