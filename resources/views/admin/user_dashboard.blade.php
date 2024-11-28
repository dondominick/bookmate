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
        <!-- Dashboard Content -->

        <div class="w-100 border my-5 d-flex">
            <table class="table ">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>Username</th>
                        <td>Status</td>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td scope="row">{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if ($user->status == 'offline')
                                    <span class="bg-danger rounded-5 px-3"></span><br>Offlne
                                @endif

                                @if ($user->status == 'online')
                                    <span class="bg-success rounded-5 px-3"></span><br>Online
                                @endif
                            </td>

                            <td class="d-flex justify-content-center flex-column gap-3">
                                <button class="btn bg-primary">Update</button>
                                <button class="btn bg-danger">Delete</button>


                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>



        <!-- BookMate Admins -->

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script>
            // Get the context of the canvas element
            const ctx = document.getElementById('myPieChart').getContext('2d');

            // Define the data for the pie chart
            const data = {
                labels: ['Red', 'Blue', 'Yellow'], // Labels for each slice
                datasets: [{
                    data: [300, 50, 100], // Data values for each slice
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.6)', // Red
                        'rgba(54, 162, 235, 0.6)', // Blue
                        'rgba(255, 206, 86, 0.6)' // Yellow
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)'
                    ],
                    borderWidth: 1
                }]
            };

            // Create the pie chart
            const myPieChart = new Chart(ctx, {
                type: 'pie', // Specify the chart type
                data: data,
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top', // Position of the legend
                        },
                        tooltip: {
                            enabled: true
                        }
                    }
                }
            });
        </script>

        <!-- Bootstrap JS and dependencies -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        </body>

        </html>
    @endsection
