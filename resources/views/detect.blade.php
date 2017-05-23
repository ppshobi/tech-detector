@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Detect</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/detect') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('domain') ? ' has-error' : '' }}">
                            <label for="domain" class="col-md-4 control-label">Enter Domain Name</label>

                            <div class="col-md-6">
                                <input id="domain" placeholder="eg: http://google.com" type="domain" class="form-control" name="domain" value="{{ old('domain') }}" required autofocus>

                                @if ($errors->has('domain'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('domain') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Detect
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
