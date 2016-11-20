@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2>The Requested Domain</h2>
            {{$domain}}
            <h2>Whois Data</h2>
            <table>
                <tr>
                    <td>Name</td>
                    <td>{{$result['name']}}</td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>@foreach($result['status'] as $status)
                        {{$status}}
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <td>Nameserver</td>
                    <td>@foreach($result['nameserver'] as $nameserver)
                        {{$nameserver}}
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <td>IPS</td>
                    <td>
                                         
                    </td>
                </tr>
            </table>

            <hr/>
            <pre>
          <?php  print_r($result); ?>
            </pre>
        </div>
    </div>
</div>
@endsection
