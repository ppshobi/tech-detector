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
                            "<b>HTML, XHTML</b>"
                        @endif

                    </td>
                </tr>
            </table>
            <table class="table">
                <tr>
                    <td>Server Information</td>
                    <td>
                        @if($server_info['server'])
                            {{ current($server_info['server']) }}
                        @else
                            "<b>Sever Info Was Not Avilable</b>"
                        @endif

                    </td>
                    
                </tr>
                <tr>
                    <td>
                        Powered By
                    </td>
                    <td>
                        @if($server_info['poweredby'])
                            {{ current($server_info['poweredby']) }}
                        @else
                            "<b>Programming Language was Not detected</b>"
                        @endif

                    </td>
                </tr>
            </table>
            
            
        </div>
    </div>
</div>
@endsection
