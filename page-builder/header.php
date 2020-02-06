<div class="page-header navbar navbar-fixed-top">
            <div class="page-header-inner ">
                <!-- logo start -->
                <div class="page-logo" style="padding: 0;">
                    <a href="index.php" style="width: 100%;height: 100%;">
<?php 
$FindLogo = $connecDB->query("SELECT * FROM Images WHERE HotelID = '".$_SESSION['HotelID']."' AND TableName = 'logo' AND TableRow = '$ID' AND Active = 'y' LIMIT 1");
if(mysqli_num_rows($FindLogo) > 0){
    while($rowb = $FindLogo->fetch_array()){

        echo '<div style="background-image: url(/uploads/'.$rowb['FileName'].'); background-position: center;background-size: contain;width: 100%;height: 100%;"></div>';
    }
}else{
    echo '<span class="logo-default" style=" padding: 10px 20px 0px 30px;" >'.$_SESSION['HotelName'].'</span>';
}
?>
                        
                     </a>
                </div>
                <!-- logo end -->
                <ul class="nav navbar-nav navbar-left in">
                    <li><a href="#" class="menu-toggler sidebar-toggler"><i class="icon-menu"></i></a></li>
                </ul>
                <!-- 
                 <form class="search-form-opened" action="#" method="GET">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search..." name="query">
                        <span class="input-group-btn">
                          <a href="javascript:;" class="btn submit">
                             <i class="icon-magnifier"></i>
                           </a>
                        </span>
                    </div>
                </form>
            -->
                <!-- start mobile menu -->
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                    <span></span>
                </a>
               <!-- end mobile menu -->
                <!-- start header menu -->
                <div class="top-menu">
                    <ul class="nav navbar-nav pull-right">
                        <!-- start language menu -->
                         
                        <!-- end language menu -->
                        <!-- start notification dropdown -->
                         
                        <!-- end notification dropdown -->
                        <!-- start message dropdown -->
                         
                        <!-- end message dropdown -->
                        <!-- start manage user dropdown -->
                        <li class="dropdown dropdown-user">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <span class="username username-hide-on-mobile">Welcome, <?php echo $_SESSION['UserName']; ?> </span> 
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-default">
                                <li>
                                    <a href="/login-system/logout.php">
                                        <i class="icon-logout"></i> Log Out </a>
                                </li>
                            </ul>
                        </li>
                        <!-- end manage user dropdown 
                        <li class="dropdown dropdown-quick-sidebar-toggler">
                             <a id="headerSettingButton" class="mdl-button mdl-js-button mdl-button--icon pull-right" data-upgraded=",MaterialButton">
                               <i class="material-icons">more_vert</i>
                            </a>
                        </li>
                        -->
                    </ul>
                </div>
            </div> 
            <!-- start horizontal menu -->
            <div class="navbar-custom">
                <div class="hor-menu hidden-sm hidden-xs">
                    <ul class="nav navbar-nav">
                        <li class="mega-menu-dropdown <?php if(basename($_SERVER['PHP_SELF']) == 'index.php') echo ' active open'; ?>">
                            <a href="/index.php"><i class="fas fa-columns"></i>  Your Dashboard
                                <span class="selected"></span> 
                            </a>
                             
                        </li>
                        
                         
                         
                        <li class="classic-menu-dropdown mega-menu-dropdown <?php if(basename($_SERVER['PHP_SELF']) == 'edit-hotel.php' || basename($_SERVER['PHP_SELF']) ==  'view-rooms.php' || basename($_SERVER['PHP_SELF']) == 'view-buildings.php' || basename($_SERVER['PHP_SELF']) == 'edit-building.php' ) echo ' active open'; ?>">
                                <a href="" class=" megamenu-dropdown" data-close-others="true"> <i class="fas fa-hotel"></i> My Hotel
                                <i class="fa fa-angle-down"></i>
                                <span class="arrow "></span>
                            </a>
                            <ul class="dropdown-menu pull-left">
                                <li class="submenu">
                                    <a href="/edit-hotel.php">
                                        <i class="fa fa-user-md" aria-hidden="true"></i> Hotel Details</a>
                                </li>
                                <li class="divider"> </li>
                                <li class="submenu">
                                    <a href="view-rooms.php">
                                        <i class="fa fa-user-md" aria-hidden="true"></i> All Rooms
                                    </a>
                                </li>
                                <li class="submenu">
                                    <a href="/view-buildings.php">
                                        <i class="fa fa-user-md" aria-hidden="true"></i> All Buildings
                                    </a>
                                </li>
                                
                            </ul>
                        </li>
                        <li class="classic-menu-dropdown mega-menu-dropdown">
                                <a href="" class=" megamenu-dropdown" data-close-others="true"> <i class="fas fa-address-book"></i>Bookings
                                <i class="fa fa-angle-down"></i>
                                <span class="arrow "></span>
                            </a>
                            <ul class="dropdown-menu pull-left">
                                <li class="submenu">
                                    <a href="/add-booking.php">
                                        <i class="fa fa-user-md" aria-hidden="true"></i> New Booking</a> 
                                </li>
                                <li class="submenu">
                                    <a href="/view-bookings.php">
                                        <i class="fa fa-user-md" aria-hidden="true"></i> View Bookings</a> 
                                </li>
                            </ul>
                        </li>
                         <li class="classic-menu-dropdown mega-menu-dropdown">
                                <a href="" class=" megamenu-dropdown" data-close-others="true"> <i class="fas fa-tools"></i>Staff
                                <i class="fa fa-angle-down"></i>
                                <span class="arrow "></span>
                            </a>
                            <ul class="dropdown-menu pull-left">
                                <li class="submenu">
                                    <a href="/add-staff.php">
                                        <i class="fa fa-user-md" aria-hidden="true"></i> Add Staff</a> 
                                </li>
                            </ul>
                        </li>
                         
                        
                         
                         
                         
                         
                    </ul>
                </div>                          
            </div>
            <!-- end horizontal menu -->
        </div>