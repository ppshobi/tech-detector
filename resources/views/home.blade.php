@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <ul class="list-group">
                        <a href="/"><li class="list-group-item"> Fingerprint new Website</li></a>
                        <a href="/"><li class="list-group-item"> Saved Data</li></a>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
