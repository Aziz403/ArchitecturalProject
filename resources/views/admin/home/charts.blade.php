<!-- column -->
<div class="col">
  <div class="card">
    <div class="card-body" style="margin-bottom: 13px">
      <h4 class="card-title">Occupations Chart</h4>
    </div>
    <div>
      <div style="padding: 10px">
        <form id="jobs-index-date" action="{{route('admin.home')}}" class="m-2">
          <div class="form-group row">
            <div class="col-4"><input style="min-width: 150px" type="date" name="date_start" value="{{$date_start}}" class="form-control"></div>
            <div class="col-4"><input style="min-width: 150px" type="date" name="date_end" value="{{$date_end}}" class="form-control"></div>
            <div class="col-1"></div>
            <input type="submit" value="Filter" onclick="document.getElementById('jobs-index-date').submit()" class="col-3"/>
          </div>
        </form>
      </div>            
    </div>
  </div>
</div>

<div class="row">
  <div class="col-lg-4">
    <div class="card">
      <div class="card-body" style="margin-bottom: 13px">
        <h4 class="card-title">Occupations Chart</h4>
      </div>
      <div>
        <div style="padding: 10px">
          <canvas id="workersChart"></canvas>
        </div>            
      </div>
    </div>
  </div>
  <!-- column -->
  <!-- column -->
  <div class="col-lg-8">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Revenue Chart</h4>
      </div>
      <div>
        <div style="padding: 10px">
          <canvas id="jobsInWeekChart"></canvas>
        </div>            
      </div>
    </div>
  </div>
</div>
  <!-- column -->

  

  <script>
    const workersChartLabels = {!! json_encode($lables_occupations) !!}

    const workersChartValues = {!! json_encode($data_occupations) !!}
  
    const workersChartData = {
      labels: workersChartLabels,
      datasets: [{
        label: 'Occupations',
        backgroundColor: [
          'rgb(255, 99, 132)',
          'rgb(162, 210, 255)',
          'rgb(255, 225, 98)',
          'rgb(121, 82, 179)',
          'rgb(0, 193, 212)',
          'rgb(40, 255, 191)',
        ],
        hoverOffset: 4,
        data: workersChartValues,
      }]
    };
  
    const workersChartConfig = {
      type: 'pie',
      data: workersChartData,
      options: {}
    };


    const workersChart = new Chart(
      document.getElementById('workersChart'),
      workersChartConfig
    );

  </script>
  
  <script>
    const ctx = document.getElementById('jobsInWeekChart').getContext('2d');
    const jobsInWeekChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($lables_dates) !!},
            datasets: [{
                label: 'Total revenue / DH',
                data: {!! json_encode($data_dates) !!},
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
  </script>
  
