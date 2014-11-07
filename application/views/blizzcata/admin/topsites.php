	

		<div id="main_panel_container" class="left">
			<div id="dashboard">
				<h2 class="ico_mug">Dashboard</h2>
				<div class="clearfix">
				<div class="left quickview">
	<form action="<?php echo BASE_PATH."/admin/topsites/";?>" method="post">
	Add topsite:<br /><br />
	
	<input type="text" name="addtopsitename" value="Topsite name"/><br /><br />
	<input type="text" name="addtopsiteurl" value="http://Topsite URL"/><br /><br />
	<input type="text" name="addtopsiteimage" value="Topsite image"/><br /><br />
	<input type="submit" value="Add topsite!"/>
	
	</form>
				</div>
				<div class="quickview left">
				<h3>Delete TopSite</h3>
	<form action="" method="post">
	
	<select name="deletetopsite">
	<?php foreach($topsites as $topsites):
	echo '<option value="'.$topsites['id'].'">'.$topsites['name'].'</option>';
	endforeach; ?>
	</select> <input type="submit" value="Delete!"/></form>
				
				</div>
				
				</div>
			</div><!-- end #dashboard -->
			
			
			
			
			</div>
			
				<?php include (ROOT . DS . 'application' . DS . 'views' . DS . TEMPLATE . DS . $this->_controller . DS . 'sidebar.php'); ?>

			
		</div><!-- end #content_main -->
		
		
		
		
	
	
	
		
	    </div><!-- end #content -->
	    
		   
