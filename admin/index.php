<?php
    require 'inc/session.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Dashboard  &dash; Real Estate Investment For Everyone</title>
	<?php require 'inc/toplink.php' ?>
</head>
<body>
					<?php require 'inc/header.php'; ?>
                    <div class="col-xxl-9">
                        <div class="main__content">
                            <div class="collapse__sidebar">
                                <h4>Dashboard</h4>
                                <a href="javascript:void(0)" class="collapse__sidebar__btn">
                                    <i class="fa-solid fa-bars-staggered"></i>
                                </a>
                            </div>
                            <div class="main__content-dashboard">
                                <div class="row">
                                    
                                    <div class=" row">
                                        <!-- <div class="main__content-dashboard__sidebar"> -->
                                           
                                            <div class="dashboard-single__box col-md-6">
                                                <div class="intro">
                                                    <h5>Last withdrawals</h5>
                                                    <a href="withdraw">Show All<i
                                                            class="fa-solid fa-arrow-right-long"></i></a>
                                                </div>
                                                <?php
                                                $select = mysqli_query($connect, "SELECT * FROM withdrawal ORDER BY id DESC LIMIT 6");
                                                  
                                                    $n = 1;
                                                    foreach($select AS $ky){
                                                        $sql = mysqli_query($connect, "SELECT * FROM users WHERE id = '{$ky['user_id']}' LIMIT 1");
                                                        $row = mysqli_fetch_array($sql);
                                                        
                    ?>
                                                <div class="last-income">
                                                    <div class="group">
                                                        <img src="../assets/images/team/<?php echo $row['image']; ?>" alt="Last Income" />
                                                        <div>
                                                            <h6 class="text-capitalize"><?php echo $row['firstname']." ".$row['lastname']; ?></h6>
                                                            <p class="secondary"><?php echo $ky['date']; ?></p>
                                                        </div>
                                                    </div>
                                                    <h6>$<?php echo number_format($ky['amount']); ?></h6>
                                                </div>
                                                <hr>
                                            <?php } ?>
                                                
                                            </div>
                                            <div class="dashboard-single__box col-md-6">
                                                <!-- New Investments -->
                                                <div class="intro">
                                                    <h5>New Investments</h5>
                                                    <a href="properties">Show All<i
                                                            class="fa-solid fa-arrow-right-long"></i></a>
                                                </div>
                                                <?php
                                                 $sql = mysqli_query($connect, "SELECT * FROM properties WHERE status = 1 ORDER BY  id DESC LIMIT 3");
                    
                                                 foreach ($sql as $key) {
                                                    $i_total = mysqli_query($connect, "SELECT SUM(amount_invested) AS amount FROM investments WHERE property_id = '{$key['id']}'");
                                                    $i_sum = mysqli_fetch_array($i_total);
                                                    $i_investors = mysqli_query($connect, "SELECT DISTINCT user_id FROM investments WHERE property_id = '{$key['id']}'");

                                                    $i_count = mysqli_num_rows($i_investors);
                                                ?>
                                                <div class="new-invest">
                                                    <div class="poster">
                                                        <a href="properties">
                                                            <img src="../assets/images/property/<?php echo $key['image']; ?>" alt="San Francisco" />
                                                        </a>
                                                    </div>
                                                    <div class="invest-content">
                                                        <div class="item__head__left">
                                                            <h6><?php echo $key['location']; ?></h6>
                                                            <div class="progress__type progress__type--two">
                                                                <div class="progress">
                                                                    <div class="progress-bar" role="progressbar"
                                                                        aria-valuenow="25" aria-valuemin="0"
                                                                        aria-valuemax="100"></div>
                                                                </div>
                                                                <div class="project__info">
                                                                    <p class="project__has"><span
                                                                            class="project__has__investors"><?php echo $i_count; ?>
                                                                             Investor(s) </span> | <span
                                                                            class="project__has__investors__amount"><i
                                                                                class="fa-solid fa-dollar-sign"></i>
                                                                           <?php echo number_format($i_sum['amount'],0 ); ?></span> <span
                                                                            class="project__has__investors__percent">(<?php echo number_format($i_sum['amount']*100/$key['price'], 2)  ; ?>%)</span>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                                
                                               
                                            </div>
                        <div class="investment-table">
        <div class="intro">
            <h5>Users</h5>
        </div>
            <div class="table-wrapper">
                <table>
                    <tr>
                        <th>S/N</th>
                        <th>NAME</th>
                        <th>EMAIL</th>
                        <th>DATE</th>
                        <th>ACTION</th>
                    </tr>
                    <?php
                        $select_all = mysqli_query($connect, "SELECT * FROM users WHERE level = 0 LIMIT 10");
                        $n = 1;
                        foreach($select_all AS $key){

                    ?>
                    <tr>
                        <td>
                           <?php echo $n++; ?>
                        </td>
                        <td><?php echo $key['firstname']. " ".$key['lastname']; ?></td>
                        <td style="font-size: 13px;">
                        <?php echo $key['email']; ?>
                    </td>
                        <td><?php echo $key['date']; ?></td>
                        <td>
                             <a href="user_details.php?id=<?php echo md5($key['id']); ?>" class="fa-solid fa-pen text-primary"></a>
                            </td>
                        <!-- <td></td> -->
                    </tr>
                        <?php } ?>
                        
                </table>
            </div>
        </div>


                                <div class="dashboard-single__box investment-single-box">
                                    <div class="intro">
                                        <h5 class="investo">Investment Chart</h5>
                                      
                                    </div>
                                    <div id="ChartTwo"></div>
                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ==== #dashboard section end ==== -->

    
	<?php require 'inc/footer.php' ?>
	<?php require 'inc/footlink.php' ?>
      <script type="text/javascript">
     
    
         // investment chart two
    var investment = {
      colors: ["#1FAA5C"],
      chart: {
        type: "area",
        height: 530,
        zoom: {
          enabled: false,
        },
        toolbar: {
          show: false,
        },
        sparkline: {
          enabled: false,
        },
      },
      series: [
        {
          name: "Invested",
          data: [<?php 
            $sel = mysqli_query($connect, "SELECT SUM(amount_invested) AS total FROM investments WHERE status =1 GROUP BY month ORDER BY month ASC");
                foreach ($sel as $key ) {
                    echo $key['total'].",";
                }
             ?>],
        },
      ],
      dataLabels: {
        enabled: false,
      },
      stroke: {
        curve: "smooth",
        width: 2,
      },
      fill: {
        type: "gradient",
        colors: ["#1FAA5C"],
        gradient: {
          shadeIntensity: 1,
          opacityFrom: 1,
          opacityTo: 0.1,
          stops: [0, 100],
        },
      },
      markers: {
        hover: {
          size: 8,
          strokeWidth: 4,
          colors: ["#ffffff"],
          strokeColors: ["#51CCA9"],
        },
      },
      xaxis: {
        axisTicks: {
          show: true,
        },
        categories: [<?php 
            $sel = mysqli_query($connect, "SELECT DISTINCT month FROM investments WHERE status = 1 ORDER BY month ASC");
                foreach ($sel as $key ) {
                    $t = strtotime(1, '0'.$key['month']);
                    echo '"'.date("F", mktime(0,0,0,$key['month'],10)).'",';
                }
             ?>],
      },
      yaxis: {
        show: true,
        opposite: false,
        labels: {
          formatter: function (value) {
            return "$" + value;
          },
        },
      },
      legend: {
        horizontalAlign: "left",
      },
      responsive: [{
        breakpoint: 767,
        options: {
          chart: {
            maxWidth: '100%',
            height: 250,
            sparkline: {
              enabled: false
            }
          },
        },
    }]
    };

    var investChartTwo = document.getElementById("ChartTwo");
    if (investChartTwo != null) {
      var chartsInvestTwo = new ApexCharts(
        document.querySelector("#ChartTwo"),
        investment
      );
      chartsInvestTwo.render();
    }
    

    </script>

</body>
</html>