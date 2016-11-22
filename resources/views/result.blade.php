@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2>The Requested Domain</h2>
            {{$domain}}
            <h2>Ip Address</h2>
                <table>
                    <tr>
                        <td>IPV4</td>
                        <td>
                            @foreach($ipv4 as $ip)
                            {{$ip}}
                            @endforeach
                        </td>
                    </tr>
                </table>
            <h2>Whois Raw Data</h2>
            <hr/>
            <pre>
                {{$result['rawdata'][0]}}
            </pre>
            <table>
                <tr>
                    <td>Nameserver</td>
                    <td>@foreach($result['nameserver'] as $nameserver)
                        {{$nameserver}}
                        @endforeach
                    </td>
                </tr>               
            </table>
            
            
        </div>
    </div>
</div>
@endsection
