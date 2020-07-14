@extends('backend.layouts.master')

@section ('title', 'Players')

@section('content')

    <div class="side-app">
        <div class="page-header">
            <h4 class="page-title">Players</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('teams.index') }}">Team</a></li>
                <li class="breadcrumb-item"><a href="{{ route('players.index',['team_id' =>$team_data->id ]) }}">Players</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Player</li>
            </ol>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="mb-0 card-title">Edit Player  for: {{ isset($team_data->name) ? $team_data->name : ''  }}</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('players.update',$player->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">First Name</label>
                                        <input type="text" class="form-control" name="firstname" placeholder="First Name" value="{{ $player->firstname ? $player->firstname : old('firstname') }}">
                                        @if ($errors->has('firstname'))
                                            <span class=" text-danger">{{ $errors->first('firstname') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Jersey Number</label>
                                        <input type="text" class="form-control" name="jersey_number" placeholder="Jersey Number" value="{{ $player->jersey_number ? $player->jersey_number : old('jersey_number') }}">
                                        @if ($errors->has('jersey_number'))
                                            <span class=" text-danger">{{ $errors->first('jersey_number') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Matches</label>
                                        <input type="text" class="form-control" name="matches" placeholder="Matches" value="{{ $player->matches ? $player->matches : old('matches') }}">
                                        @if ($errors->has('matches'))
                                            <span class=" text-danger">{{ $errors->first('matches') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Highest Score</label>
                                        <input type="text" class="form-control" name="highest_score" placeholder="Highest Score" value="{{ $player->highest_score ? $player->highest_score : old('highest_score') }}">
                                        @if ($errors->has('highest_score'))
                                            <span class=" text-danger">{{ $errors->first('highest_score') }}</span>
                                        @endif
                                    </div>
                                     @if($player)
                                        <div class="form-group">
                                            <label class="form-label">Previous Image Uri</label>
                                            <img src="{{ asset($player->image_uri) }}" alt="{{ $player->firstname }}" height="100px" width="100px">
                                        </div>
                                    @endif

                                    <div class="form-group">
                                        <label class="form-label">Image Uri</label>
                                        <input type="file" accept="image" class="form-control" name="image_uri" >
                                        @if ($errors->has('image_uri'))
                                            <span class=" text-danger">{{ $errors->first('image_uri') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Last Name</label>
                                        <input type="text" class="form-control" name="lastname" placeholder="Last Name" value="{{ $player->lastname ? $player->lastname : old('lastname') }}">
                                        @if ($errors->has('lastname'))
                                            <span class=" text-danger">{{ $errors->first('lastname') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Country</label>
                                        <input type="text" class="form-control" name="country" placeholder="Country" value="{{ $player->country ? $player->country : old('country') }}">
                                        @if ($errors->has('country'))
                                            <span class=" text-danger">{{ $errors->first('country') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Runs</label>
                                        <input type="text" class="form-control" name="runs" placeholder="Runs" value="{{ $player->runs ? $player->runs : old('runs') }}">
                                        @if ($errors->has('runs'))
                                            <span class=" text-danger">{{ $errors->first('runs') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Total Fifties</label>
                                        <input type="text" class="form-control" name="total_fifties" placeholder="Total Fifties" value="{{ $player->total_fifties ? $player->total_fifties : old('total_fifties') }}">
                                        @if ($errors->has('total_fifties'))
                                            <span class=" text-danger">{{ $errors->first('total_fifties') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Total Hundreds</label>
                                        <input type="text" class="form-control" name="total_hundreds" placeholder="Total Hundreds" value="{{ $player->total_hundreds ? $player->total_hundreds : old('total_hundreds') }}">
                                        @if ($errors->has('total_hundreds'))
                                            <span class=" text-danger">{{ $errors->first('total_hundreds') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="orm-group">
                                        <button type="submit" class="btn btn-primary">Update Player</button>
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