<!--
 * Copyright: DRIOUECHE Mohammed
 * Last Update: 3 Sptember 2020
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Smart window</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

  <script>
    window.onload = function() {
      var lineChart = new CanvasJS.Chart("lineChartContainer", {
        animationEnabled: true,
        theme: "light2",
        title: {
          text: "Last 24 Hours Lux Values",
          fontWeight: "normal"
        },
        data: [{
          type: "line",
          indexLabelFontSize: 16,
          dataPoints: [{
              y: 450
            },
            {
              y: 414
            },
            {
              y: 460
            },
            {
              y: 450
            },
            {
              y: 500
            },
            {
              y: 480
            },
          ]
        }]
      });
      var pieChart = new CanvasJS.Chart("pieChartContainer", {
        animationEnabled: true,
        title: {
          text: "Window Shades Summary (since deploiement)",
          fontWeight: "normal"
        },
        data: [{
          type: "pie",
          startAngle: 0,
          yValueFormatString: "##0.00\"%\"",
          indexLabel: "{label} {y}",
          dataPoints: [{
              y: 60,
              label: "UP"
            },
            {
              y: 40,
              label: "DOWN"
            }
          ]
        }]
      });
      lineChart.render();
      pieChart.render();

    }
  </script>
</head>

<body>
  <!-- NavBar -->
  <nav class="navbar navbar-dark bg-primary">
    <a class="navbar-brand" href="#">SMART WINDOW</a>
  </nav>

  <!-- Body -->
  <div class="container">
    <div class="row">
      <!-- First line -->
      <!-- First col -->
      <div class="col" style="margin: 5px;">
        <div class="border rounded border-primary" style="padding: 5px;">
          <div id="lineChartContainer" style="height: 370px; width: 100%;"></div>
        </div>
      </div>

      <!-- Second col -->
      <div class="col" style="margin: 5px;">
        <div class="border rounded border-primary" style="padding: 5px;">
          <div id="pieChartContainer" style="height: 370px; width: 100%;"></div>
        </div>
      </div>

      <!-- Second line -->
      <div class="w-100"></div>
      <!-- First col -->
      <div class="col" style="margin: 5px;">
        <div class="border rounded border-primary " style="padding: 5px;">
          <div class="d-flex justify-content-center">
            <h3>Command Window Shades </h3>
          </div>
          <div>
            <p>The shades are actual down, do you wanna move it up?</p>
          </div>
          <div class="d-flex justify-content-center">
            <button class="btn btn-outline-primary" type="submit">UP</button>
          </div>
        </div>
      </div>

      <!-- Second col -->
      <div class="col" style="margin: 5px;">
        <div class="border rounded border-primary" style="padding: 5px;">
          <div class="d-flex justify-content-center">
            <h3>Window Shades History</h3>
          </div>
          <div>
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Date</th>
                  <th scope="col">Action</th>
                  <th scope="col">Type</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>22 june 2020 15:20</td>
                  <td>UP</td>
                  <td>Manual</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

    </div>
  </div>
</body>

</html>