@extends('backend.layouts.master')

@section ('title', 'Teams')

@section('content')

    <div class="side-app">
        <div class="page-header">
            <h4 class="page-title">Teams</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Teams</a></li>
                <li class="breadcrumb-item active" aria-current="page">Teams List</li>
            </ol>
        </div>
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <p>{{ $message }}</p>
        </div>
        @endif
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="container" style="font-weight:bold;"></div>
                        <a style="float:right; width: 150px;" class="btn btn-primary" href="{{ route('teams.create') }}">Add Team</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="teamDetails" class="table table-striped table-bordered w-100">
                                <thead>
                                    <tr>
                                        <th>S.N</th>
                                        <th>Logo</th>
                                        <th>Name</th>
                                        <th>Club State</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('after-scripts')
    {{-- For DataTables --}}

    <script>

        $(document).ready(function() {
            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });
            oTable = $('#teamDetails').DataTable({
                "processing": true,
                "serverSide": true,
                ajax: {
                    url: '{{ route('teams-data') }}',
                    type: 'post',
                },
                "columns": [

                {data: 'sn', name: 'sn'},
                {data: 'logo_uri', name: 'logo_uri'},
                {data: 'name', name: 'name'},
                {data: 'club_state', name: 'club_state'},
                {data: 'action', name: 'action', searchable: false,className:'noPrint', orderable: false},

                ],
                searchDelay: 500
            });

        });

        
    </script>
@endsection