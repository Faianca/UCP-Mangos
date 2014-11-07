			</div><!-- end .centercolumn -->
		</div><!-- end #header-inner -->
	</div><!-- end #container-top -->
	
	<div id="container-content">
		<div id="content-inner">
			<div class="centercolumn">
				<div id="page-title"><h1>Ban List</h1></div><!-- end #page-title -->
				<div id="page-content">
					<div class="col-left">			
		<?php 

		echo "<center><table id=\"dataTable\">
		<THEAD><tr><th>accID:</th><th align=\"center\">User:</th>
		<th align=\"center\">Reason:</th><th>Ban Starts</th>
		<th>Ban Ends</th></tr></THEAD>";  
		foreach($row as $result_data):  
			echo "<tr><td align=\"center\">".$result_data["id"]."</td>";  
			echo "<td align=\"center\">".$result_data["username"]."</td>";  
			echo "<td align=\"center\">".$result_data["banreason"]."</td>";  
			echo "<td align=\"center\">".date("d.m.Y H:m",$result_data["bandate"])."</td>";
			echo "<td align=\"center\">".date("d.m.Y H:m",$result_data["unbandate"])."</td>";       
			echo "</tr>";  
		endforeach;  
		
	
		echo "</table></center>";  ?>
		
		<hr />
					</div><!-- end .col-left -->
					           <?php include (ROOT . DS . 'application' . DS . 'views' . DS . TEMPLATE . DS . $this->_controller . DS . 'sidepage.php'); ?>

					<div class="clear"></div>
				</div><!-- end #page-content -->
			</div><!-- end .centercolumn -->
		</div><!-- end #content-inner -->
	</div><!-- end #container-content -->

