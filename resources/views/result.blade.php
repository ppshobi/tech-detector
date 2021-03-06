@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2" id="print">
            <h2>The Requested Domain </h2>
            <div class="domain">{{ $domain }}</div>
            <h2>Whois Raw Data</h2>
            <table class="table">
                <tr>
                    <td>
                        <pre class="whois">
                            {{ $result['rawdata'][0] }}
                        </pre>
                    </td>
                </tr>
            </table>
            <table class="table">
                <tr>
                    <td>IP Address</td>
                    <td>
                        @foreach((array)$ipv4 as $ip)
                          {{ $ip }}<br/>
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <td>IP Location</td>
                    <td>
                        <span style="font-weight: bold">Country -</span> {{ $iplocation->country_name }} <br/>
                        <span style="font-weight: bold">Region - </span> {{ $iplocation->region_name }} <br/>
                        <span style="font-weight: bold"> City - </span> {{ $iplocation->city }} <br/>
                        <span style="font-weight: bold">Latitude -</span> {{ $iplocation->latitude }} <br/>
                        <span style="font-weight: bold">Longitude - </span>{{ $iplocation->longitude }} <br/>
                    </td>
                </tr>
                <tr>
                    <td>Nameserver</td>
                    <td>@foreach((array)$result['nameserver'] as $nameserver)
                        {{ $nameserver }}<br/>
                        @endforeach
                    </td>
                </tr>      
                    @foreach($technologies as $technology)
                        <tr>
                            @foreach($technology['categories'] as $c) 
                                @foreach($c as $m)
                                    <td> {{ $m }} </td>
                                @endforeach
                            @endforeach
                            <td> <img class="icons" src="images/icons/{{ $technology['icon'] }}">{{ $technology['name'] }}  </td>
                            <td> {{ $technology['version'] }} </td>
                        </tr>
                    @endforeach 
                </table>
        </div>
        <div class="col-md-8 col-md-offset-2">
            <button id="report" class="btn btn-success pull-right">Print</button>  
        </div>

    </div>

</div>

@endsection

