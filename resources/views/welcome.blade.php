@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h1 class="m-0">Current Cases</h1>
                    <p>Last 2 weeks</p>

                    <canvas id="myChart" width="640" height="360"></canvas>
                    
                    <p class="mt-1 mb-0">Data gathered from Baybay City Health Office through Baybay City Updates</p>
                    <p class="text-muted m-0">Last Updated: August 9, 2021 9:43 am</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FBaybayCityUpdates&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=true&show_facepile=false&appId=282767489761400" width="340" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
        </div>
    </div>
</div>

<script>                    
    /** LINE GRAPH **/
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [
                'Jul. 26', 'Jul. 27', 'Jul. 28', 'Jul. 29', 'Jul. 30', 'Jul. 31', 'Aug. 1', 
                'Aug. 2', 'Aug. 3', 'Aug. 4', 'Aug. 5', 'Aug. 6', 'Aug. 7', 'Aug. 8'
            ],
            datasets: [
                {
                    label: 'Confirmed',
                    data: [
                        14, 11, 14, 14, 18, 19, 23,
                        23, 24, 25, 22, 26, 27, 31
                    ],
                    borderColor: 'rgba(255, 0, 0, 1)',
                    borderWidth: 3
                },
                {
                    label: 'Probable',
                    data: [
                        9, 8, 8, 8, 10, 11, 12,
                        14, 17, 15, 15, 15, 15, 18
                    ],
                    borderColor: 'rgba(0,0,255, 1)',
                    borderWidth: 1.5
                },
            ]
        },
        options: {
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
