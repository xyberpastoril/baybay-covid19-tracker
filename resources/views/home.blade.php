@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h1 class="m-0">Current Active Cases</h1>
                    <p>Last 2 weeks</p>
                    <div class="container-fluid">
                        <div class="row">
                            
                        </div>
                    </div>

                    <canvas id="myChart" width="640" height="360"></canvas>
                    
                    <p class="mt-1 mb-0"><span class="text-muted">Source: </span>Baybay City Health Office<i> through Baybay City Updates</i></p>
                    <p class=" m-0"><span class="text-muted">Last Updated:</span> {{ $lastUpdated ? $lastUpdated->format('M. d, g:i a') : 'Never' }}</p>
                    
                    <button class="btn btn-sm btn-primary" type="button" data-toggle="collapse" data-target="#referencesList" aria-expanded="false" aria-controls="referencesList">
                        See references
                    </button>
                    <div class="collapse mt-2" id="referencesList">
                        <div class="card card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <th>Date</th>
                                        <th>URL</th>
                                    </thead>
                                    @for($i = 0; $i < 14; $i++)
                                        @if($confirmed[$i] != null)
                                            <tr>
                                                <td>{{ date('m/d/Y', strtotime($dateLabels[$i])) }}</td>
                                                <td>
                                                    <a 
                                                    href="{{ $references[$i] }}" 
                                                    
                                                    target="_blank">
                                                        {{ $references[$i] }}
                                                    </a>
                                                </td>
                                            </tr>
                                        @endif
                                        {{-- @if($confirmed[$i] != null && $probable[$i] != null && $suspected[$i] != null)
                                            <tr>
                                                <td class="pt-3">{{ date('m/d/Y', strtotime($dateLabels[$i])) }}</td>
                                                <td>
                                                    <a 
                                                    href="{{ '#' }}" 
                                                    class="btn btn-sm btn-primary" 
                                                    role="button" 
                                                    target="_blank">
                                                        {{ $references[$i] }}
                                                    </a>
                                                </td>
                                            </tr>

                                        @endif --}}
                                    @endfor
                                    
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mt-3 mt-md-0">
            @if($latest != null)
                <div class="card">
                    <div class="card-body">
                        <h4 class="m-0">Active Cases for {{ $dateLabels[$latest] }}</h4>
                        <p></p>
                        <div>
                            <p class="m-0">Confirmed:</p>
                            <p class="display-4 text-danger">{{ $confirmed[$latest] }}</p>
                        </div>
                        <div>
                            <p class="m-0">Probable:</p>
                            <p class="display-4 text-primary">{{ $probable[$latest] }}</p>
                        </div>
                        <div>
                            <p class="m-0">Suspected:</p>
                            <p class="display-4 text-info">{{ $suspected[$latest] }}</p>
                        </div>
                    </div>
                </div>
            @else
                <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FBaybayCityUpdates&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=true&show_facepile=false&appId=282767489761400" width="340" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
            @endif
            
        </div>
    </div>
</div>

<script>                    
    /** LINE GRAPH **/
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: {!! json_encode($dateLabels) !!},
            datasets: [
                {
                    label: 'Confirmed',
                    data: {!! json_encode($confirmed) !!},
                    borderColor: '#d9534f',
                    borderWidth: 3
                },
                {
                    label: 'Probable',
                    data: {!! json_encode($probable) !!},
                    borderColor: '#0275d8',
                    borderWidth: 2
                },
                {
                    label: 'Suspected',
                    data: {!! json_encode($suspected) !!},
                    borderColor: '#5bc0de',
                    borderWidth: 1
                },
            ]
        },
        options: {
            spanGaps: true,
            responsive: true,
            interaction: {
                intersect: false,
                mode: 'index',
            },
            scales: {
                x: {
                    display: true,
                    title: {
                        display: true,
                        text: 'Date'
                    }
                },
                y: {
                    beginAtZero: true,
                    display: true,
                    title: {
                        display: true,
                        text: 'Number of Cases'
                    }
                }
            }
        }
    });
    /** END LINE-GRAPH **/
</script>
@endsection
