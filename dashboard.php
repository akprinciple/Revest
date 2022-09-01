<?php

        require 'inc/session.php';

        ?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <?php require 'inc/toplink.php'; ?>

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
                                    <div class="col-lg-5">
                                        <div class="main__content-dashboard__chart">
                                            <div class="balance-report__wrapper dashboard-single__box">
                                                <div class="balance-report">
                                                    <div>
                                                        <h4>$<?php 

                                              $sel = mysqli_query($connect, "SELECT SUM(amount) AS total FROM earnings WHERE user_id = '{$ses_row['id']}'");
                                              $rw = mysqli_fetch_array($sel);
                                               $sl = mysqli_query($connect, "SELECT SUM(amount) AS total FROM withdrawal WHERE user_id = '{$ses_row['id']}' && status = 1");
                                              $r = mysqli_fetch_array($sl);
                                              echo number_format($rw['total']-$r['total']);

                                            ?>
                                                         </h4>
                                                        <p class="secondary">Total Withdrawable Income</p>
                                                    </div>
                                                    
                                                </div>
                                                <hr />
                                                <div class="group">
                                                    <div class="group-inner">
                                                        <p>Amount Invested</p>
                                                        <h6><img src="assets/images/icons/invested.png"
                                                                alt="Invested" />$<?php 
                                                                $selt = mysqli_query($connect, "SELECT SUM(amount_invested) AS total FROM investments WHERE user_id = '{$ses_row['id']}' && status = 1");
                                              $r = mysqli_fetch_array($selt);
                                              echo number_format($r['total']);
                                                                 ?></h6>
                                                    </div>
                                                    <div class="group-inner">
                                                        <p>Total Earnings</p>
                                                        <h6><img src="assets/images/icons/earned.png"
                                                                alt="Earned" />$<?php  
                                                                $sel = mysqli_query($connect, "SELECT SUM(amount) AS total FROM earnings WHERE user_id = '{$ses_row['id']}'");
                                                                $rw = mysqli_fetch_array($sel); 
                                                                echo number_format($rw['total']);
                                                                ?></h6>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="dashboard-single__box">
                                                <div class="intro">
                                                    <h5>My Investments</h5>
                                                    <a href="investment">Show All<i
                                                            class="fa-solid fa-arrow-right-long"></i></a>
                                                </div>
                                                <?php
                                                      
                                                    $project = mysqli_query($connect, "SELECT * FROM properties WHERE id = ANY (SELECT DISTINCT property_id FROM investments WHERE user_id = '{$ses_row['id']}' && status = 1) LIMIT 4");
                                                       while ($pro = mysqli_fetch_array($project)) {
                                                         
                                                        
                                                 ?>
                                                <div class="property-wrap">
                                                    <div class="poster">
                                                        <a href="property-details?id=<?php echo md5($pro['id']); ?>">
                                                            <img src="assets/images/property/<?php echo $pro['image']; ?>" alt="<?php echo $pro['image']; ?>" />
                                                        </a>
                                                    </div>
                                                    <h4><a href="investment"><?php echo $pro['location']; ?></a></h4>
                                                    <p><i class="fa-solid fa-location-dot"></i><?php echo $pro['address']; ?></p>
                                                </div>
                                            <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="main__content-dashboard__sidebar">
                                            <div class="dashboard-single__box card-alt">
                                                <div class="dashboard-single__box">
                                                <h5 class="investo">Investment Chart</h5>
                                                <div id="ChartTwo"></div>
                                            </div>
                                                </div>
                                            </div>
                                            <br><br>
                                            <div class="dashboard-single__box ">
                                                <div class="intro">
                                                    <h5>Last Income</h5>
                                                    <a href="withdraw">Show All<i
                                                            class="fa-solid fa-arrow-right-long"></i></a>
                                                </div>
                                                <?php 
                                                    $select = mysqli_query($connect, "SELECT * FROM withdrawal WHERE user_id = '{$ses_row['id']}' && status = 1 ORDER BY id DESC LIMIT 3");
                                                  
                                                    
                                                    foreach($select AS $key){
                                                 ?>
                                                <div class="last-income">
                                                    <div class="group">
                                                        <img src="assets/images/icons/earned.png" alt="Last Income" />
                                                        <div>
                                                            <h6><?php echo $key['payment_type']; ?></h6>
                                                            <p class="secondary"><?php echo $key['date']; ?></p>
                                                        </div>
                                                    </div>
                                                    <h6>$<?php echo number_format($key['amount']); ?></h6>
                                                </div>
                                                <?php } ?>
                                                
                                            </div>
                                            <div class="dashboard-single__box">
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
                                                        <a href="property-details?id=<?php echo md5($key['id']); ?>">
                                                            <img src="assets/images/property/<?php echo $key['image']; ?>" alt="<?php echo $key['image']; ?>" />
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
                                                                        Investor(s)</span> | <span
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

    <!-- ==== footer section start ==== -->
    <?php require 'inc/footer.php'; ?>
    <?php require 'inc/footlink.php'; ?>
    <script type="text/javascript">
       // investment chart two
    var investment = {
      colors: ["#1FAA5C"],
      chart: {
        type: "area",
        height: 230,
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
            $s = mysqli_query($connect, "SELECT SUM(amount_invested) AS total FROM investments WHERE user_id = '{$ses_row['id']}' && status =1 GROUP BY month ORDER BY month ASC");
                foreach ($s as $ky ) {
                    echo $ky['total'].",";
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
            $sel = mysqli_query($connect, "SELECT DISTINCT month FROM investments WHERE user_id= '{$ses_row['id']}' && status = 1 ORDER BY month ASC");
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