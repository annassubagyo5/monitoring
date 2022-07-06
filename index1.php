<?php
  require("koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
?>

<!DOCTYPE html>
<html>
  <head>
  <!-- <meta http-equiv="refresh" content="5"> -->
  </head>
    <body>
      <style>
        #wntable {
          border-collapse: collapse;
          width: 50%;
        }

        #wntable td, #wntable th {
          border: 1px solid #ddd;
          padding: 8px;
        }

        #wntable tr:nth-child(even){background-color: #f2f2f2;}

        #wntable tr:hover {background-color: #ddd;}

        #wntable th {
          padding-top: 12px;
          padding-bottom: 12px;
          text-align: left;
          background-color: #00A8A9;
          color: white;
        }
      </style>
      
      
      <div id="cards" class="cards" align="center">
          <h1> Data Sensor Kelembaban Warriornux</h1>
          <table id="wntable">
          <tr>
            <th>No</th>
            <th>Data</th>
            <th>Waktu</th>
          </tr>
          <?php

            $sql = mysqli_query($koneksi, "SELECT * FROM curah_hujan ORDER BY id DESC");

          if(mysqli_num_rows($sql) == 0){ 
            echo '<tr><td colspan="14">Data Tidak Ada.</td></tr>'; // jika tidak ada entri di database maka tampilkan 'Data Tidak Ada.'
          }else{ // jika terdapat entri maka tampilkan datanya
            $no = 1; // mewakili data dari nomor 1
            while($row = mysqli_fetch_array($sql)){ // fetch query yang sesuai ke dalam array
              echo '
              <tr>
                <td>'.$no.'</td>
                <td>'.$row['data_hujan'].'</td>
                <td>'.$row['waktu'].'</td>
              </tr>
              ';
              $hasil[] = $row['data_hujan'];
              // $hujan = $hasil[$no-1];
              $no++; // mewakili data kedua dan seterusnya
              
            }
            $hujan = json_encode($hasil);
            echo $hujan;
            $annas = json_decode($hujan);

            // echo $annas['id'];
          }

          
          ?>
        </table>
        <div style="width: 800px; height: 800px;">
          <canvas id="myChart"></canvas>
        </div>
      </div>
      <?php 
        $yoga = 2;
        // $annas = 5;
      ?>
  </body>
  <script type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
  <script>
    var curah = 1;
    console.log(curah);
    var xValues = [50,60,70,80,90,100,110,120,130, 140];
    var yValues = ["<?php echo $hasil[0] ?>","<?php echo $hasil[1] ?>"];
    new Chart("myChart", {
      type: "line",
      data: {
        labels: xValues,
        datasets: [{
          fill: false,
          lineTension: 0,
          backgroundColor: "rgba(0,0,255,1.0)",
          borderColor: "rgba(0,0,255,0.1)",
          data: yValues
        }]
      },
      options: {
        legends: {display: false},
        scales: {
          yAxes: [{ticks: {min:0, max:20}}]
        }
      }
    });
  </script>
</html>