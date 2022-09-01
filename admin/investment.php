<?php
    require 'inc/session.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Dashboard</title>
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
                                <div class="breadcrumb-dashboard">
                                    <h5>Investments</h5>
                                    <div>
                                        <a href="index">Home</a>
                                        <i class="fa-solid fa-arrow-right-long"></i>
                                        <a href="javascript:void(0)">Investments</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="investment-table">
                                            <div class="intro">
                                                <h5>Transactions</h5>
                                            </div>
                                            <div class="table-wrapper">
                                                <table>
                                                    <tr>
                                                        <th>Project</th>
                                                        <th>Investor</th>
                                                        <th>Amount Invested</th>
                                                        <th>Date Invested</th>
                                                    </tr>
                                                     <?php
                                                    $select = mysqli_query($connect, "SELECT * FROM investments WHERE status = 1 LIMIT 10");
                                                    $n = 1;
                                                    foreach($select AS $key){
                                                        $sql = mysqli_query($connect, "SELECT * FROM users WHERE id = '{$key['user_id']}' LIMIT 1");
                                                        $row = mysqli_fetch_array($sql);
                                                        $project = mysqli_query($connect, "SELECT * FROM properties WHERE id = '{$key['property_id']}' LIMIT 1");
                                                        $pro = mysqli_fetch_array($project);

                    ?>
                                                    <tr>
                                                        <td>
                                                            <img src="../assets/images/property/<?php echo $pro['image']; ?>" alt="<?php echo $pro['image']; ?>" />
                                                           <?php echo $pro['address']; ?>
                                                        </td>
                                                        <td><?php echo $row['firstname'] . " " .$row['firstname']; ?></td>
                                                        <td>$<?php echo number_format($key['amount_invested']); ?></td>
                                                        <td><?php echo $key['day'].".".$key['month'].".".$key['year']; ?></td>
                                                    </tr>
                                                <?php } ?>
                                                    
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="investment-sidebar">
                                            <div class="statistics">
                                                <h5>Statistics</h5>
                                                <hr />
                                                <div class="group">
                                                    <img src="../assets/images/icons/wallet.png" alt="Wallet" />
                                                    <div>
                                                        <h4>$
                                                            <?php 
                                                            $sel = mysqli_query($connect, "SELECT SUM(amount_invested) AS total FROM investments WHERE status = 1"); 
                                                            foreach($sel AS $amt){echo number_format($amt['total'], 2);}

                                                                ?>
                                                        </h4>
                                                        <p>Total Amount Invested</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="explore">
                                                <img src="../assets/images/icons/explore.png" alt="Explore" />
                                                <div class="group">
                                                    <h6>Explore More</h6>
                                                    <p class="secondary">Investment opportunities</p>
                                                    <a href="properties"
                                                        class="button button--effect">Explore</a>
                                                </div>
                                            </div>
                                        </div>
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