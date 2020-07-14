@extends('backend.layouts.master')

@section ('title', 'Match')

@section('content')

    <div class="side-app">
        <div class="page-header">
            <h4 class="page-title">Match</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('matches.index') }}">Match</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Match</li>
            </ol>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="mb-0 card-title">Add Match</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('matches.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    
                                    <div class="form-group ">
                                        <label class="form-label">First Team</label>
                                        <select class="form-control select2 custom-select" name="first_team_id" data-placeholder="">
                                            <option label="--Select--">
                                            </option>
                                            @if(count($team_data) > 0)
                                                @foreach($team_data as $key => $value)
                                                    <option value="{{ $value->id }}" {{ $value->id == old('first_team_id') ? 'selected' : ''  }}>{{ $value->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @if ($errors->has('first_team_id'))
                                        <span class=" text-danger">{{ $errors->first('first_team_id') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Result</label>
                                        <select class="form-control select2 custom-select selectResult" name="result" data-placeholder="Choose one">
                                            <option label="--Select--">
                                            </option>
                                            <option value="0" {{ '0' == old('result') ? 'selected' : ''  }}>Draw</option>
                                            <option value="1" {{ '1' == old('result') ? 'selected' : ''  }}>Winner</option>
                                        </select>
                                        @if ($errors->has('result'))
                                            <span class=" text-danger">{{ $errors->first('result') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group chooseWinner" style="{{ old('result') != '1' ? 'display:none' : ''}}">
                                        <div class="form-label">Winner</div>
                                        <div class="custom-controls-stacked">
                                            <label class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="winner_team_id" value="1" {{ old('winner_team_id') == '1' ? 'checked' : '' }}>
                                                <span class="custom-control-label">First Team</span>
                                            </label>
                                            <label class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="winner_team_id" value="2" {{ old('winner_team_id') == '2' ? 'checked' : '' }} >
                                                <span class="custom-control-label">Second Team</span>
                                            </label>
                                        </div>
                                        @if ($errors->has('winner_team_id'))
                                            <span class=" text-danger">{{ $errors->first('winner_team_id') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="form-label">Second Team</label>
                                        <select class="form-control select2 custom-select" name="second_team_id" data-placeholder="Choose one">
                                            <option label="--Select--">
                                            </option>
                                            @if(count($team_data) > 0)
                                                @foreach($team_data as $key => $value)
                                                    <option value="{{ $value->id }}" {{ $value->id == old('second_team_id') ? 'selected' : ''  }}>{{ $value->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @if ($errors->has('second_team_id'))
                                        <span class=" text-danger">{{ $errors->first('second_team_id') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <div class="wd-200 mg-b-30">
                                            <label class="form-label">Scheduled Date</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                                                    </div>
                                                </div><input name="scheduled_date" class="form-control fc-datepicker" placeholder="MM/DD/YYYY" type="text" value="{{ old('scheduled_date') }}">
                                            </div>
                                        
                                            @if ($errors->has('scheduled_date'))
                                                <span class=" text-danger">{{ $errors->first('scheduled_date') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="orm-group">
                                        <button type="submit" class="btn btn-primary">Save Team</button>
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