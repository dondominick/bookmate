@extends('layouts.usernav')


@section('head')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endsection
@section('content')
    <!-- Widgets -->
    <div class="widgets">
        <div class="widget">
            <div class="widget-icon">📘</div>
            <a href="{{ url('/borrowed-books') }}"><button class="btn btn-outline-light mt-4">Your Borrowed
                    Book List</button></a>
        </div>
        <div class="widget">
            <div class="widget-icon">↩️</div>
            <a href="{{ url('/user/returnbook') }}"><button class="btn btn-outline-light mt-4">Your
                    Returned Book List</button></a>
        </div>
        <div class="widget">
            <div class="widget-icon">🔍</div>
            <a href="{{ url('/browser') }}"><button class="btn btn-outline-light mt-4">Let's browse
                    available book inventory</button></a>
        </div>
    </div>

    <div class="quote">
        "Embarking on the journey of reading fosters personal growth, nurturing a path towards excellence
        and the refinement of character."
        <br>~ SisTeam
    </div>

    <div class="chart-section">
        <div class="">
            <canvas id="myPieChart" width="400" height="400"></canvas>

        </div>
        <div class="legend">
            <div class="legend-item">
                <div class="legend-color color-borrowed"></div>
                <span>Total Borrowed Books: </span>
                <span>{{ $borrowed }}</span>
            </div>
            <div class="legend-item">
                <div class="legend-color color-returned"></div>
                <span>Total Returned Books: </span>
                <span>{{ $returned }}</span>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script>
        // fetch("{{ route('userChartData') }}")
        //     .then(response => response.json())
        //     .then(data => {
        //             console.log(data);
        //         }

        //     ).error(error => console.error('Error fetching'));
    </script>
    <script>
        const ctx = document.getElementById('myPieChart').getContext('2d');
        const data = {
            labels: ['Borrowed', 'Returned'],
            datasets: [{
                data: [{{ $borrowed }}, {{ $returned }}],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.6)',
                    'rgba(54, 162, 235, 0.6)',
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                ],
                borderWidth: 1
            }]
        };
        const myPieChart = new Chart(ctx, {
            type: 'pie',
            data: data,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        enabled: true
                    }
                }
            }
        });
    </script>
@endsection
