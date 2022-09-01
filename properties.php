<?php
    require 'inc/dynamic_session.php';
?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    
    
    <?php require 'inc/toplink.php'; ?>
    

</head>

<body>

    <!-- ==== header start ==== -->
    <?php require 'inc/general_header.php'; ?>
    
    <!-- ==== #header end ==== -->

    <!-- ==== banner section start ==== -->
    <section class="banner__alt bg__img" data-background="./assets/images/banner/banner-two-bg.png">
        <div class="container">
            <div class="banner__alt__area">
                <h1 class="neutral-top neutral-bottom">Browse Properties</h1>
            </div>
        </div>
    </section>
    <!-- ==== banner section end ==== -->

    <!-- ==== property filter start ==== -->
    <div class="property__filter">
        <div class="container">
            <div class="property__filter__area">
                <div class="row d-flex align-items-center">
                    <div class="col-lg-12 col-xl-6">
                        <div class="property__search__wrapper">
                            <form action="?">
                                <div class="input">
                                    <input type="search" name="property__search" id="propertySearch"
                                        placeholder="Search for properties' address" value="<?php if(isset($_GET['property__search'])){ echo $_GET['property__search']; } ?>" required="required" />
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </div>
                                <button type="submit" class="button button--effect">Search</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-3">
                        <div class="property__select__wrapper">
                        <form action="properties" class="border-0" id="form1">
                            
                            <select class="location__select" name="property_location">
                                <?php if(isset($_GET['property_location'])) {

                                echo "<option value='{$_GET['property_location']}'>{$_GET['property_location']}</option>";
                                }else{
                                echo "<option data-display='Location'>Select Location</option>";

                                } ?>
                                <option value="Los Angeles">Los Angeles</option>
                                <option value="San Francisco, CA">San Francisco, CA</option>
                                <option value="The Weldon">The Weldon</option>
                                <option value="San Diego">San Diego</option>
                                <!-- <option data-display="Location">Select Location</option> -->
                               
                            </select>
                        </form>
                        
                    </div>
                </div>
                <div class="col-lg-6 col-xl-3">
                    <div class="property__select__wrapper">
                        <select class="property__select" name="property_type" form="form1">
                            <?php if(isset($_GET['property_type'])) {

                                echo "<option value='{$_GET['property_type']}'>{$_GET['property_type']}</option>";
                                }else{
                                echo "<option data-display='Property'>Property Type</option>";

                                } ?>
                            
                            <option value="commercial">Commercial</option>
                            <option value="residential">Residential</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-10"></div>
                    
                <button type="submit" class="button button--effect col-md-2 mt-2" form="form1">Search</button>
                </div>
            </div>
        </div>
    </div>
    <!-- ==== #property filter end ==== -->

    <!-- ==== properties grid section start ==== -->
    <section class="properties__filter section__space__bottom">
        <div class="container wow fadeInUp">
            <div class="properties__filter__wrapper">
                <h6>Showing <span>
                    
                    <?php
                    if(isset($_GET['property__search'])){
                        $k = $_GET['property__search'];
                    $a_sql = mysqli_query($connect, "SELECT * FROM properties WHERE status = 1 && address LIKE '%".$k."%' ");

                    }elseif(isset($_GET['property_location']) && isset($_GET['property_type'])){
                        $a_sql = mysqli_query($connect, "SELECT * FROM properties WHERE status = 1 && location = '{$_GET['property_location']}' && type ='{$_GET['property_type']}'");
                    }else{
                    $a_sql = mysqli_query($connect, "SELECT * FROM properties WHERE status = 1 ");
                    }
                    echo mysqli_num_rows($a_sql);
                    ?>
                </span> properties</h6>
                <div class="grid__wrapper">
                    <select class="grid__select">
                        <option data-display="Sort By">Sort By</option>
                        <option value="grid">Date</option>
                        <option value="list">Price</option>
                    </select>
                    <a href="javascript:void(0)" class="grid__btn grid__view grid__btn__active">
                        <i class="fa-solid fa-grip"></i>
                    </a>
                    <a href="javascript:void(0)" class="grid__btn grid__list">
                        <i class="fa-solid fa-bars"></i>
                    </a>
                </div>
            </div>
            <div class="row property__grid__area__wrapper">
                 <?php
                    if(isset($_GET['property__search'])){
                        $k = $_GET['property__search'];
                    $sql = mysqli_query($connect, "SELECT * FROM properties WHERE status = 1 && address LIKE '%".$k."%' ORDER BY  rand() LIMIT 15");

                    }elseif(isset($_GET['property_location']) && isset($_GET['property_type'])){
                        $sql = mysqli_query($connect, "SELECT * FROM properties WHERE status = 1 && location = '{$_GET['property_location']}' && type ='{$_GET['property_type']}' ORDER BY  rand() LIMIT 15");
                    }else{
                    $sql = mysqli_query($connect, "SELECT * FROM properties WHERE status = 1 ORDER BY  rand() LIMIT 15");
                    }
                    foreach ($sql as $key) {
                           $i_total = mysqli_query($connect, "SELECT SUM(amount_invested) AS amount FROM investments WHERE property_id = '{$key['id']}'");
                    $i_sum = mysqli_fetch_array($i_total);
                    $i_investors = mysqli_query($connect, "SELECT DISTINCT user_id FROM investments WHERE property_id = '{$key['id']}'");

                    $i_count = mysqli_num_rows($i_investors);
                     ?>
                <div class="col-xl-4 col-md-6 property__grid__area__wrapper__inner">
                    <div class="property__list__wrapper property__grid">
                        <div class="row d-flex align-items-center">
                            <div class="property__grid__area__wrapper__inner__two">
                                <div class="property__item__image column__space--secondary">
                                    <div class="img__effect" style="height: 250px; overflow-y: hidden;">
                                        <a href="property-details?id=<?php echo md5($key['id']); ?>">
                                            <img src="assets/images/property/<?php echo $key['image']; ?>" alt="<?php echo $key['image']; ?>" />
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="property__grid__area__wrapper__inner__three">
                                <div class="property__item__content">
                                    <div class="item__head">
                                        <div class="item__head__left">
                                            <h4><?php echo $key['location']; ?></h4>
                                            <p><i class="fa-solid fa-location-dot"></i> 8<?php echo $key['address']; ?>
                                            </p>
                                        </div>
                                        <div class="item__head__right">
                                            <div class="countdown__wrapper">
                                                <p class="secondary"><i class="fa-solid fa-clock"></i> Left to invest
                                                </p>
                                                <div class="countdown">
                                                    <h5>
                                                        <span class="days">00</span><span class="ref">d</span>
                                                        <span class="seperator">:</span>
                                                    </h5>
                                                    <h5>
                                                        <span class="hours"> 00</span><span class="ref">h</span>
                                                        <span class="seperator">:</span>
                                                    </h5>
                                                    <h5>
                                                        <span class="minutes">00</span><span class="ref">m</span>
                                                        <span class="seperator"></span>
                                                    </h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="progress__type progress__type--two">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="25"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <div class="project__info">
                                            <p class="project__has"><span class="project__has__investors"><?php echo $i_count; ?>
                                                Investor(s)</span> | <span class="project__has__investors__amount"><i
                                                        class="fa-solid fa-dollar-sign"></i> <?php echo number_format($i_sum['amount'],0 ); ?></span> <span
                                                    class="project__has__investors__percent">(<?php echo number_format($i_sum['amount']*100/$key['price'], 2)  ; ?>%)</span></p>
                                            <p class="project__goal">
                                                <i class="fa-solid fa-dollar-sign"></i> <?php echo number_format($key['price']); ?> Goal
                                            </p>
                                        </div>
                                    </div>
                                    <div class="item__info">
                                        <div class="item__info__single">
                                            <p>Annual Return</p>
                                            <h6><?php echo $key['returns']; ?>% + 2%</h6>
                                        </div>
                                        <div class="item__info__single">
                                            <p>Maximum Term</p>
                                            <h6><?php echo $key['term']; ?> Months</h6>
                                        </div>
                                        <div class="item__info__single">
                                            <p>Property Type</p>
                                            <h6><?php echo $key['type']; ?></h6>
                                        </div>
                                        <div class="item__info__single">
                                            <p>Distribution</p>
                                            <h6><?php echo $key['distribution']; ?></h6>
                                        </div>
                                    </div>
                                    <div class="item__footer">
                                        <div class="item__security">
                                            <div class="icon__box">
                                                <img src="assets/images/home.png" alt="Security" />
                                            </div>
                                            <div class="item__security__content">
                                                <p class="secondary">Security</p>
                                                <h6>1st-Rank Mortgage</h6>
                                            </div>
                                        </div>
                                        <div class="item__cta__group">
                                            <a href="property-details?id=<?php echo md5($key['id']); ?>#invest" class="button button--effect">Invest Now</a>
                                            <a href="property-details?id=<?php echo md5($key['id']); ?>"
                                                class="button button--secondary button--effect">Details</a>
                                        </div>
                                    </div>
                                    <div class="invest__cta__wrapper">
                                        <div class="countdown__wrapper">
                                            <p class="secondary"><i class="fa-solid fa-clock"></i> Left to invest</p>
                                            <div class="countdown">
                                                <h5>
                                                    <span class="days">00</span><span class="ref">d</span>
                                                    <span class="seperator">:</span>
                                                </h5>
                                                <h5>
                                                    <span class="hours"> 00</span><span class="ref">h</span>
                                                    <span class="seperator">:</span>
                                                </h5>
                                                <h5>
                                                    <span class="minutes">00</span><span class="ref">m</span>
                                                    <span class="seperator"></span>
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="invest__cta">
                                            <a href="property-details?id=<?php echo md5($key['id']); ?>#invest" class="button button--effect">
                                                Invest Now
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
                
                </div>
           
            <div class="cta__btn">
                <a href="properties" class="button button--effect">Load More</a>
            </div>
        </div>
    </section>
    <!-- ==== properties grid section end ==== -->

    <!-- ==== footer section start ==== -->
    <?php require 'inc/general_footer.php'; ?>
    
    <!-- ==== #footer section end ==== -->

   

    <!-- ==== js dependencies start ==== -->

    <?php require 'inc/footlink.php'; ?>


</body>

</html>