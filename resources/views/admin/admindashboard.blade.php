    @extends('layouts.adminnav')
    @section('head')
        <style>
            canvas {
                max-width: 400px;
                max-height: 400px;
            }

            .chart-section {
                flex-basis: 50%;
                flex: 1;
            }

            .content-section {
                flex-basis: 50%;
                flex: 1;
            }
        </style>
    @endsection

    @section('content')
        <!-- Content -->

        <!-- Dashboard Content -->

        <div class="w-100 border d-flex">
            <div class="chart-section">
                <div class="fluid-container">
                    <canvas id="myChart" class="mx-auto"></canvas>

                </div>
                <div class="fluid-container text-center">
                    <h3>Total Borrowed Books</h3>
                </div>
            </div>



            <div class="content-section ">
                <div class="d-flex gap-5">
                    <div class="card-section">
                        <div class="card-info">
                            <i class="fas fa-user fa-2x"></i>
                            <h2>{{ $users }}</h2>
                            <p>Total User Base</p>
                        </div>
                        <div class="card-info">
                            <i class="fas fa-book fa-2x"></i>
                            <h2>{{ $books }}</h2>
                            <p>Total Book Count</p>
                        </div>
                        <div class="card-info">
                            <i class="fas fa-book-open fa-2x"></i>
                            <h2>{{ $books }}</h2>
                            <p>New Books</p>
                        </div>
                    </div>


                    <div class="card-section">
                        <div class="">
                            <div class="overdue-borrowers">
                                <h5>Overdue Borrowers</h5>
                                <div class="borrower-item">
                                    <span>John Doe</span>
                                    <span>Borrowed ID: 2</span>
                                </div>
                                <div class="borrower-item">
                                    <span>Jane Smith</span>
                                    <span>Borrowed ID: 3</span>
                                </div>
                                <div class="borrower-item">
                                    <span>David Lee</span>
                                    <span>Borrowed ID: 4</span>
                                </div>
                                <div class="borrower-item">
                                    <span>Karen Thomas</span>
                                    <span>Borrowed ID: 5</span>
                                </div>
                                <div class="borrower-item">
                                    <span>Robert Miller</span>
                                    <span>Borrowed ID: 6</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="">
                    <div class="admins-section">
                        <h5>BookMate Admins</h5>
                        @foreach ($admin as $admin)
                            <div class="admin-item">
                                <span>{{ $admin->name }}</span><br>
                                <span>Admin ID: {{ $admin->id }}</span>
                            </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>



        <!-- BookMate Admins -->

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script>
            // Fetch the JSON data from the Laravel endpoint
            fetch("{{ route('chartData') }}")
                .then(response => response.json())
                .then(data => {
                    // Create the Chart.js chart
                    const ctx = document.getElementById('myChart').getContext('2d');
                    const myChart = new Chart(ctx, {
                        type: 'pie', // Change this to 'line', 'pie', etc. if needed
                        data: data,
                        options: {
                            responsive: true,
                            plugins: {
                                legend: {
                                    display: true,
                                    position: 'bottom',
                                },
                            },
                            scales: {
                                y: {
                                    beginAtZero: true,
                                },
                            },
                        },
                    });
                })
                .catch(error => console.error('Error fetching chart data:', error));
        </script>

        <!-- Bootstrap JS and dependencies -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        </body>

        </html>
    @endsection
