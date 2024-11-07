<?php
ob_start();
include('dbconnection/connection.php');
session_start();
if ($_SESSION['user']) {
    $name = $_SESSION['user'];
    include 'dbfiles/org.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'template/headerfile.php'; ?>

<style>
    body {
        margin: 0;
        overflow: hidden;
        background: linear-gradient(to right, #11998e, #38ef7d);
        animation: changeBgColor 15s infinite alternate;
    }

    #particles-js {
        height: 100vh;
        position: absolute;
        width: 100%;
    }

	.img-responsive {
    animation: colorChangeAnimation 15s ease-in-out infinite alternate, fadeInAnimation 5s ease-out;
}

@keyframes colorChangeAnimation {
    0% {
        filter: hue-rotate(0deg);
    }
    50% {
        filter: hue-rotate(180deg);
    }
    100% {
        filter: hue-rotate(360deg);
    }
}

@keyframes fadeInAnimation {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}


    #clock {
        position: absolute;
        top: 5px;
        right: 155px;
        color: whitesmoke;
        font-size: 24px;
        font-family: Arial, sans-serif;
    }

    @keyframes changeBgColor {
        0% {
            background: linear-gradient(to right, #11998e, #38ef7d);
        }

        50% {
            background: linear-gradient(to right, #ee0979, #ff6a00);
        }

        100% {
            background: linear-gradient(to right, #11998e, #38ef7d);
        }
    }

    @keyframes fadeInAnimation {
        0% {
            opacity: 0;
        }

        100% {
            opacity: 1;
        }
    }
</style>
</head>
<body class="no-skin">
    <?php include 'template/logo.php'; ?>

    <div class="main-container ace-save-state" id="main-container">
        <script type="text/javascript">
            try {
                ace.settings.loadState('main-container')
            } catch (e) {}
        </script>

        <div id="sidebar" class="sidebar responsive ace-save-state">
            <script type="text/javascript">
                try {
                    ace.settings.loadState('sidebar')
                } catch (e) {}
            </script>

            <?php include 'template/sidemenu.php' ?>

            <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
                <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
            </div>
        </div>

        <div class="main-content">
            <div class="main-content-inner">
                <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                    <ul class="breadcrumb">
                        <li>
                            <i class="ace-icon fa fa-home home-icon"></i>
                            <a href="#">Home</a>
                        </li>
                        <li>
                            <a href="#">Dashboard</a>
                        </li>
                        <!--<li class="active">Blank Page</li>-->
                    </ul><!-- /.breadcrumb -->

                    <!-- /.nav-search -->
                </div>

                <div class="page-content">
                    <!-- /.ace-settings-container -->

                    <div class="row">
                        <div class="col-xs-12">
                            <!-- PAGE CONTENT BEGINS -->
                            <!-- <div class="col-xs-12 text-center" style="margin-bottom: 30px;"> -->
                            <div class="col-xs-12" align="center" style="margin-bottom: 10px;">
                                <img src="images/smts.png" class="img-responsive" alt="Company Logo">
                            </div>
                            <!-- PAGE CONTENT ENDS -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include('template/footer.php'); ?>

        <!-- <div id="clock"></div> -->

        <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
            <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
        </a>
    </div>

    <!-- basic scripts -->

    <!--[if !IE]> -->
    <script src="assets/js/jquery-2.1.4.min.js"></script>

    <!-- <![endif]-->

    <!--[if IE]>
    <script src="assets/js/jquery-1.11.3.min.js"></script>
    <![endif]-->
    <script type="text/javascript">
        if ('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
    </script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- page specific plugin scripts -->

    <!-- ace scripts -->
    <script src="assets/js/ace-elements.min.js"></script>
    <script src="assets/js/ace.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
    <!-- particles.js -->
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>



    <!-- inline scripts related to this page -->
  
</body>

</html>

<?php

} else {
    session_destroy();
    session_unset();
    header('Location:index.php?authentication failed');
}

?>
