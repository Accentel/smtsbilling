<style>
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

</style>




<div id="navbar" class="navbar navbar-default          ace-save-state">
			<div class="navbar-container ace-save-state" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left">
					<a href="dashboard.php" class="navbar-brand">
						<small>
							
							<?php echo $schoolname; ?>
						</small>
					</a>
				</div>
				<div id="clock"></div>
				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						

						

						

						<li class="light-blue dropdown-modal">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="smts.png" width="48" height="48" alt="Jason's Photo" />
								<span class="user-info">
									<small>Welcome,</small>
									<?php echo $name; ?>
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								
                                                                
                                                                
								
<li>
									<a href="change_pass.php">
										<i class="ace-icon fa fa-power-off"></i>
										Change Password
									</a>
								</li>
								

								<li>
									<a href="logout.php">
										<i class="ace-icon fa fa-power-off"></i>
										Logout
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div><!-- /.navbar-container -->
		</div>

		<script>
        function updateClock() {
            var now = new Date();
            var hours = now.getHours();
            var minutes = now.getMinutes();
            var seconds = now.getSeconds();
            var timeString = pad(hours) + ':' + pad(minutes) + ':' + pad(seconds);
            document.getElementById('clock').textContent = timeString;
            setTimeout(updateClock, 1000);
        }

        function pad(number) {
            if (number < 10) {
                return '0' + number;
            }
            return number;
        }

        updateClock();
    </script>

    <!-- inline scripts related to this page -->
    <script>
        function updateClock() {
            var now = new Date();
            var hours = now.getHours();
            var minutes = now.getMinutes();
            var seconds = now.getSeconds();
            var timeString = pad(hours) + ':' + pad(minutes) + ':' + pad(seconds);
            document.getElementById('clock').textContent = timeString;
            setTimeout(updateClock, 1000);
        }

        function pad(number) {
            if (number < 10) {
                return '0' + number;
            }
            return number;
        }

        updateClock();
    </script>