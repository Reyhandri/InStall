<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="admin.css" />
    <link
      rel="stylesheet"
      href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css"/>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"/>
    <link rel="stylesheet" 
      href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css'>
    <link rel="icon" href="../img/1.png" type ="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="chart.js"></script>
  </head>
  <body>

    <input type="checkbox" id="nav-toggle"> 
    
    <!-- Sidebar -->
    <div class="sidebar">
      <div class="sidebar-brand">
          <h2><span class="img"><img src="../img/1.png" style="width: 50px; height: 50px; justify-content: center;"></span><span>InStall</span></h2>
          <h2></h2>  
      </div>
      <div class="sidebar-menu">
        <ul>  
          <li></li>
          <li>
            <a href="" ><span class="las la-igloo"></span><span> Beranda </span></a>
          </li>
          <br>
          <li>
            <a href="logout.php"><span class="bx bx-log-out icon"></span><span> Logout </span></a>
          </li>
        </ul>
      </div>
    </div>
    
    <!-- Sidebar -->

    <!-- main content -->
    <div class="main-content">
      <header>
        <h2>
            <!-- Button to show sidebar -->
          <label for="nav-toggle">
            <span class="las la-bars"></span>
          </label>
            <!-- Button to show sidebar -->
          Dashboard
        </h2>

        <div class="user-wrapper">
          <img src="../img/1.png" width="40px" height="40px" alt="" />
          <div>
            <?php
            session_start();

            $email = $_SESSION['email'];
            if(!empty($email)) {
              echo "<h4>Selamat Datang!</h4>";
              echo $email;
            }
            ?>     
          </div>
        </div>
      </header>
      <main>
        <div class="cards">
          <div class="card-single">
            <div>
              <?php
              require "../connect.php";
              $sql = mysqli_query($conn, "SELECT id FROM pengguna ORDER BY id");
              $row = mysqli_num_rows($sql);

              echo '<h1>'.$row.'</h1>';

              ?>
              <span>Total Akun Terdaftar</span>
            </div>
            <div>
              <span class="las la-users"></span>
            </div>
          </div>
          <div class="card-single">
            <div>
            <?php
              require "../connect.php";
              $sql = mysqli_query($conn, "SELECT id FROM penawaran ORDER BY id");
              $row = mysqli_num_rows($sql);

              echo '<h1>'.$row.'</h1>';

              ?>
              <span>Total Penawaran</span>
            </div>
            <div>
              <span class="las la-clipboard-list"></span>
            </div>
          </div>
          <div class="card-single">
            <div>
            <?php
              require "../connect.php";
              $sql = mysqli_query($conn, "SELECT * FROM bisnis ORDER BY id");
              $row = mysqli_num_rows($sql);

              echo '<h1>'.$row.'</h1>';
              
              ?>
              <span>Total Bisnis</span>
            </div>
            <div>
              <span class="las la-shopping-bag"></span>
            </div>
          </div>
          <div class="card-single">
            <div>
            <?php
              require "../connect.php";
              $sql = mysqli_query($conn, "SELECT id FROM pengguna WHERE id_jenis = 2 ORDER BY id");
              $row = mysqli_num_rows($sql);

              echo '<h1>'.$row.'</h1>';

              ?>
              <span>Total Akun Investor</span>
            </div>
            <div>
              <span class="lab la-google-wallet"></span>
            </div>
          </div>
          <div class="card-single">
            <div>
            <?php
              require "../connect.php";
              $sql = mysqli_query($conn, "SELECT id FROM pengguna WHERE id_jenis = 3 ORDER BY id");
              $row = mysqli_num_rows($sql);

              echo '<h1>'.$row.'</h1>';

              ?>
              <span>Total Akun Pengusaha</span>
            </div>
            <div>
              <span class="lab la-google-wallet"></span>
            </div>
          </div>
          <div class="card-single">
            <div>
            <?php
              require "../connect.php";
              $sql = mysqli_query($conn, "SELECT id FROM pengguna WHERE id_jenis = 4 ORDER BY id");
              $row = mysqli_num_rows($sql);

              echo '<h1>'.$row.'</h1>';

              ?>
              <span>Total Akun Pembeli</span>
            </div>
            <div>
              <span class="lab la-google-wallet"></span>
            </div>
          </div>
        </div>
        <div class="recent-grid">
        <div class="projects">
            <div class="card">
              <div class="card-header">
              <div class="card-body">
                    <div class="row">
                          <div class="d-flex justify-content-between align-items-center mb-3">
                              <h2 class="card-title card-title-dash">PERSENTASE USER</h2>
                              <div class="chart-container">
                              <?php
                                require "../connect.php";
                                $sql = "SELECT jenis, COUNT(id_jenis) AS jumlah_pengguna
                                        FROM pengguna
                                        GROUP BY jenis";
                                $result = $conn->query($sql);

                                // Prepare the arrays for labels and data
                                $data = array();
                                $labels = array();

                                // Fetch the data from the result set
                                if (mysqli_num_rows($result) > 0) {
                                  while ($row = mysqli_fetch_assoc($result)) {
                                    array_push($data, $row["jumlah_pengguna"]);
                                    array_push($labels, $row["jenis"]);
                                  }
                                }

                                // Close the database connection
                                $conn = null;
                                ?>

                            <div class="chart-container">
                              <canvas id="pieChart"></canvas>
                            </div>
                            </div>
                      </div>
                </div>
                </div>
          </div>
            </div>
        </div>
        <br>
          <div class="projects">
            <div class="card">
              <div class="card-header">
                <h2>List User</h2>
              </div>
              <div class="card-body">
               <div class="table-responsive">
                 <table width="100%">
                  <thead>
                    <tr>
                      <td>ID</td>
                      <td>Jenis Akun</td>
                      <td>Nama</td>
                      <td>Email</td>
                      <td>Password</td>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    require "../connect.php";

                    $sql = mysqli_query($conn, "SELECT * FROM pengguna");
                    $count = mysqli_num_rows($sql);
                    
                    if($count > 0) {
                      while ($fetchData =  mysqli_fetch_array($sql)) {
                        $idP = $fetchData['id'];
                        $jenisP = $fetchData['jenis'];
                        $namaP = $fetchData['nama'];
                        $emailP = $fetchData['email'];
                        $passP = $fetchData['password'];
                        echo "
                        <tr>
                          <td>$idP</td>
                          <td>$jenisP</td>
                          <td>$namaP</td>
                          <td>$emailP</td>
                          <td>$passP</td>
                        </tr>
                        ";
                      }
                    }
                    ?>
                    
                  </tbody>
                </table>
               </div>
              </div>
            </div>
          </div>
          <br>
          <div class="projects">
             <div class="card">
              <div class="card-header">
                <h2>List Penawaran</h2>
              </div>
              <div class="card-body">
               <div class="table-responsive">
                 <table width="100%">
                  <thead>
                    <tr>
                      <td>Id</td>
                      <td>Nama Bisnis</td>
                      <td>Nama Penawar</td>
                      <td>Harga Asli</td>
                      <td>Harga Tawar</td>
                      <td>Telepon</td>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    require "../connect.php";

                    $sql = mysqli_query($conn, "SELECT * FROM penawaran");
                    $count = mysqli_num_rows($sql);
                    
                    if($count > 0) {
                      while ($fetchData =  mysqli_fetch_array($sql)) {
                        $idPn = $fetchData['id'];
                        $idBisnisPn = $fetchData['id_bisnis'];

                        $namaBisnisPn = $fetchData['namaBisnis'];
                        $namaPenawarPn = $fetchData['namaPenawar'];
                        $hargaAsliPn = $fetchData['hargaAsli'];
                        $hargaTawarPn = $fetchData['hargaTawar'];
                        $notelp = $fetchData['notelp'];
                        echo "
                        <tr>
                          <td>$idPn</td>
                          <td>$namaBisnisPn</td>
                          <td>$namaPenawarPn</td>
                          <td>$hargaAsliPn</td>
                          <td>$hargaTawarPn</td>
                          <td>$notelp</td>
                        </tr>
                        ";
                      }
                    }
                    ?>  
                    
                  </tbody>
                </table>
               </div>
          </div>
        </div>
      </main>
    </div>
    <script>
        // Access the data and labels from PHP
        var data = <?php echo json_encode($data); ?>;
        var labels = <?php echo json_encode($labels); ?>;
        // Create the pie chart
        var ctx = document.getElementById('pieChart').getContext('2d');
        var pieChart = new Chart(ctx, {
          type: 'pie',
            data: {
              labels: labels,
              datasets: [{
                data: data,
                backgroundColor: [
                  '#744042',
                  '#FF6384',
                  '#36A2EB',
                  '#FFCE56',
                   // Add more colors if needed
                 ]
              }]
            }
           });
    </script>
  </body>
</html>
