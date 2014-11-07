	

		<div id="main_panel_container" class="left">
			<div id="dashboard">
				<h2 class="ico_mug">Dashboard</h2>
				<div class="clearfix">
				<div class="left quickview">
					<h3>Overview</h3>
					<ul>
					<li>Server Online: <span class="number"><?php echo $serveronline; ?></span></li>
					<li>Server Uptime: <span class="number">3</span></li>
					<li>Max Players: <span class="number"><?php echo $maxplayers; ?></span></li>
					<li>Players Online: <span class="number"><?php echo $playersonline; ?></span></li>
					<li>Horde: <span class="number"><?php echo $horde; ?></span></li>
					<li>Alliance: <span class="number"><?php echo $alliance; ?></span></li>
					</ul>
				</div>
				<div class="quickview left">
					<h3>Statistic</h3>
					<ul>
					<li>Number of Chars: <span class="number"><?php echo $listchars; ?></span></li>
					<li>Number of Accounts: <span class="number"><?php echo $listacc; ?></span></li>
					<li>Accounts Banned: <span class="number"><?php echo $getban; ?></span></li>
					<li>Things to do: <span class="number">3</span></li>
					<li>GMs: <span class="number">31</span></li>
					<li>Donation Total Money: <span class="number">230</span></li>
					</ul>
				</div>
				<div id="chart" class="left">
					<h3>Visits today</h3>
					<div id="placeholder" style="position: relative; "><canvas width="180" height="95"></canvas><canvas style="position:absolute;left:0px;top:0px;" width="180" height="95"></canvas><div class="tickLabels" style="font-size:smaller;color:#000"><div style="position:absolute;top:79px;left:2px;width:30px;text-align:center" class="tickLabel">0.0</div><div style="position:absolute;top:79px;left:79.5px;width:30px;text-align:center" class="tickLabel">0.5</div><div style="position:absolute;top:79px;left:157px;width:30px;text-align:center" class="tickLabel">1.0</div><div style="position:absolute;top:66px;right:168px;width:12px;text-align:right" class="tickLabel">0</div><div style="position:absolute;top:33px;right:168px;width:12px;text-align:right" class="tickLabel">5</div><div style="position:absolute;top:0px;right:168px;width:12px;text-align:right" class="tickLabel">10</div></div></div><!-- CHART -->
					<br>
				</div>	
				</div>
			</div><!-- end #dashboard -->
			
			
			
			<div id="shortcuts" class="clearfix">
				<h2 class="ico_mug">Panel shortcuts</h2>
				<ul>
					<li class="first_li"><a href=""><img src="<?php echo $html->includeImage('../../admin/img/theme.jpg'); ?>" alt="themes"><span>Themes</span></a></li>
					<li><a href=""><img src="<?php echo $html->includeImage('../../admin/img/statistic.jpg'); ?>" alt="statistics"><span>Statistics</span></a></li>
					<li><a href=""><img src="<?php echo $html->includeImage('../../admin/img/ftp.jpg'); ?>" alt="FTP"><span>FTP</span></a></li>
					<li><a href=""><img src="<?php echo $html->includeImage('../../admin/img/users.jpg'); ?>" alt="Users"><span>Users</span></a></li>
					<li><a href=""><img src="<?php echo $html->includeImage('../../admin/img/comments.jpg'); ?>" alt="Comments"><span>Comments</span></a></li>
					<li><a href=""><img src="<?php echo $html->includeImage('../../admin/img/gallery.jpg'); ?>" alt="Gallery"><span>Gallery</span></a></li>
					<li><a href=""><img src="<?php echo $html->includeImage('../../admin/img/security.jpg'); ?>" alt="Security"><span>Security</span></a></li>
					
				</ul>
			</div><!-- end #shortcuts -->
			</div>
			
				<?php include (ROOT . DS . 'application' . DS . 'views' . DS . TEMPLATE . DS . $this->_controller . DS . 'sidebar.php'); ?>

			
		</div><!-- end #content_main -->
		
		
	

		
	    </div><!-- end #content -->
	    
		   