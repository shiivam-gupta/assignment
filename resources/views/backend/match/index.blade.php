@extends('backend.layouts.master')

@section ('title', 'Match')

@section('content')

    <div class="side-app">
        <div class="page-header">
            <h4 class="page-title">Match</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Match</a></li>
                <li class="breadcrumb-item active" aria-current="page">Match List</li>
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
                        <a style="float:right; width: 150px;" class="btn btn-primary" href="{{ route('matches.create') }}">Add Match</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="teamDetails" class="table table-striped table-bordered w-100">
                                <thead>
                                    <tr>
                                        <th>S.N</th>
                                        <th>First Team</th>
                                        <th>Second Team</th>
                                        <th>Result</th>
                                        <th>Winner Team</th>
                                        <th>Scheduled Date</th>
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
                    url: '{{ route('matches-data') }}',
                    type: 'post',
                },
                "columns": [

                {data: 'sn', name: 'sn'},
                {data: 'first_team_id', name: 'first_team_id'},
                {data: 'second_team_id', name: 'second_team_id'},
                {data: 'result', name: 'result'},
                {data: 'winner_team_id', name: 'winner_team_id'},
                {data: 'scheduled_date', name: 'scheduled_date'},
                {data: 'action', name: 'action', searchable: false,className:'noPrint', orderable: false},

                ],
                searchDelay: 500
            });

        });

        
    </script>
@endsection