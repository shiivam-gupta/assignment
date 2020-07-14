@extends('backend.layouts.master')

@section ('title', 'Teams')

@section('content')

    <div class="side-app">
        <div class="page-header">
            <h4 class="page-title">Teams</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('teams.index') }}">Teams</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Team</li>
            </ol>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="mb-0 card-title">Edit Team</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('teams.update',$team->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Team</label>
                                        <input type="text" class="form-control" name="name" placeholder="Team name" value="{{$team->name ? $team->name :  old('name') }}">
                                        @if ($errors->has('name'))
                                            <span class=" text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                    @if($team)
                                        <div class="form-group">
                                            <label class="form-label">Previous Logo Uri</label>
                                            <img src="{{ asset($team->logo_uri) }}" alt="{{ $team->name }}}" height="100px" width="100px">
                                        </div>
                                    @endif
                                    <div class="form-group">
                                        <label class="form-label">Logo Uri</label>
                                        <input type="file" accept="image" class="form-control" name="logo_uri" >
                                        @if ($errors->has('logo_uri'))
                                            <span class=" text-danger">{{ $errors->first('logo_uri') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Club State</label>
                                        <input type="text" class="form-control" name="club_state" placeholder="Club State Name" value="{{ $team->club_state ? $team->club_state : old('club_state') }}">
                                        @if ($errors->has('club_state'))
                                            <span class=" text-danger">{{ $errors->first('club_state') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Update Team</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('after-scripts')

@endsection