@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2" id="print">
            <h2>Your Recent Searches</h2>
            <table class="table">
                @foreach((array)recent_searches as $serach)
                <tr>
                    <td>{{$search['url']}}</td>
                </tr>
                @endforeach
            </table>
            
        </div>
    </div>

</div>

@endsection

