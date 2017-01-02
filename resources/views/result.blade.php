@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2>Dummy</h2>
            <pre>
               
            </pre>
            <h2>The Requested Domain</h2>
            {{$domain}}
            <h2>Ip Address</h2>
                <table class="table">
                    <tr>
                        <td>IPV4</td>
                        <td>
                            @foreach((array)$ipv4 as $ip)
                            {{$ip}}<br/>
                            @endforeach
                        </td>
                    </tr>
                </table>
            <h2>Whois Raw Data</h2>
           
            <hr/>
            <pre>
                {{$result['rawdata'][0]}}
            </pre>
            <table class="table">
                <tr>
                    <td>Nameserver</td>
                    <td>@foreach((array)$result['nameserver'] as $nameserver)
                        {{$nameserver}}<br/>
                        @endforeach
                    </td>
                </tr>               
            </table>
            <table class="table">
                <tr>
                    <td>Content Management System</td>
                    <td>
                        @if($technologies['cms'])
                            {{ $technologies['cms'] }}
                        @else
                            "<b> CMS can't Be identified</b>"
                        @endif

                    </td>
                </tr>
            </table>
            
            
        </div>
    </div>
</div>
@endsection
