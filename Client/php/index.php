<!--
 * Copyright: 		DRIOUECHE Mohammed
 * Created : 		  3 September 2020
 * Last Update: 	5 September 2020
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Smart window</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

  <?php
  // Connexion à la base de données
  //$dbh = new PDO("sqlite: ../database/smartwindow.db");
  $dbh = new PDO("sqlite:/home/mohammed/0_Smart_Window/Client/database/smartwindow.db");
  // Requête de selection
  $sql = "SELECT * FROM ldr ORDER BY _timestamp DESC LIMIT 5";
  // Affichage des résultats
  $res = array();
  $i = 0;
  foreach ($dbh->query($sql) as $row) {
    $res[$i] = json_encode(array('timestamp' => $row[0], 'value' => $row[1]));
    $i = $i + 1;
  }
  $dbh = null;
  ?>

  <script type="text/javascript">
    var obj = '<?php echo json_encode($res); ?>';

    obj = obj.replace('["{', '');
    obj = obj.replace('}"]', '');


    obj = obj.split('}","{');
    var data = new Array();
    //obj is now an rray of ["timestamp":"2020-09-02 19:18:35","value":"582000"]
    for (let i = 0; i < obj.length; i++) {
      let temp = {
        x: 0,
        y: 0
      };
      temp.x = parseInt(obj[i].substring(23, 32).replace(':', '').replace(':', ''));
      temp.y = parseInt(obj[i].substring(43, obj[i].length - 1));

      data.push(temp);
    }

    window.onload = function() {
      var lineChart = new CanvasJS.Chart("lineChartContainer", {
        animationEnabled: true,
        theme: "light2",
        title: {
          text: "Last 24 Hours Lux Values",
          fontWeight: "normal"
        },
        axisX: {
          valueFormatString: "##:##:##",
        },
        data: [{
          type: "line",
          indexLabelFontSize: 16,
          dataPoints: data
        }]
      });
      lineChart.render();

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
      <div class="col-12" style="margin: 5px;">
        <div class="border rounded border-primary" style="padding: 5px;">
          <div id="lineChartContainer" style="height: 370px; width: 100%;"></div>
        </div>
      </div>

      <!-- Second line -->
      <div class="w-100"></div>

      <!-- First col -->

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
                <?php
                // Connexion à la base de données
                //$dbh = new PDO("sqlite:/../database/smartwindow.db");
                $dbh = new PDO("sqlite:/home/mohammed/0_Smart_Window/Client/database/smartwindow.db");
                // Requête de selection
                $sql = "SELECT * FROM motor_history ORDER BY _timestamp DESC LIMIT 5";
                // Affichage des résultats
                foreach ($dbh->query($sql) as $row) {
                  echo "<tr>
                  <td>" . $row[0] . "</td>
                  <td style='text-transform: uppercase;'>" . $row[1] . "</td>
                  <td>" . $row[2] . "</td>
                </tr>";
                }
                $dbh = null;
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <!-- Second col -->
      <div class="col" style="margin: 5px;">
        <div class="border rounded border-primary " style="padding: 5px;">

          <div class="d-flex justify-content-center">
            <h3>Command Window Shades </h3>
          </div>
          <?php
          //Functions
          function opposite_direction($position)
          {
            if ($position == "down") {
              return "up";
            } else {
              return "down";
            }
          }
          function display_form()
          {
            echo '<form method = "post">';
            echo '<div class="d-flex justify-content-center">';
            echo '<button class="btn btn-outline-primary" type="submit" name="change_position" value="change_position"> Move Shades </button>';
            echo '</div>';
            echo '</form>';
          }
          //Body
          $position = exec("sh /home/mohammed/0_Smart_Window/Serveur/shell_scripts/get_motor_position.sh", $position);
          echo "<p>The shades are actual " . $position . ", do you wanna move it " . opposite_direction($position) . "?</p>";

          if (!isset($_POST["change_position"])) {
            display_form();
          } else {
            //exec("sh ./../Serveur/shell_scripts/change_motor_position.sh");
            $myfile = fopen("/home/mohammed/0_Smart_Window/Serveur/servo_motor.txt", "w");
            fwrite($myfile, opposite_direction($position));
            fclose($myfile);

            // Database
            //$dbh = new PDO("sqlite:/../database/smartwindow.db");
            $dbh = new PDO("sqlite:/home/mohammed/0_Smart_Window/Client/database/smartwindow.db");
            $sql = "INSERT INTO motor_history VALUES (datetime('now'), " . $dbh->quote(opposite_direction($position)) . ",'Manual' )";
            $dbh->exec($sql);
            $dbh = null;

            echo "Executed!, Go Back to Update Screen!";
          }
          ?>
        </div>
      </div>

    </div>
  </div>
  <footer class="page-footer font-small blue pt-4">
    <div class="footer-copyright text-center py-3">© 2020 Copyright:
      <a href="https://github.com/driouecheMed"> Drioueche Mohammed</a>
    </div>
  </footer>

</body>

</html>