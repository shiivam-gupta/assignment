@extends('backend.layouts.master')

@section ('title', 'Points')

@section('content')

    <div class="side-app">
        <div class="page-header">
            <h4 class="page-title">Points</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Points</a></li>
                <li class="breadcrumb-item active" aria-current="page">Points List</li>
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
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="teamDetails" class="table table-striped table-bordered w-100">
                                <thead>
                                    <tr>
                                        <th>S.N</th>
                                        <th>Team Name</th>
                                        <th>Matches</th>
                                        <th>Points</th>
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
                    url: '{{ route('points-data') }}',
                    type: 'post',
                },
                "columns": [
                    {data: 'sn', name: 'sn'},
                    {data: 'team_id', name: 'team_id'},
                    {data: 'total_match', name: 'total_match'},
                    {data: 'points', name: 'points'},
                ],
                searchDelay: 500
            });

        });

        
    </script>
@endsection