<?php echo $msgOK; ?>
	<div id="postedit" class="clearfix">
	<div id="panels" class="clearfix"> 
			<div class="panel photo left"> 
		
				<h2 class="ico_mug">Global Settings</h2> 				
	<form action="<?php echo BASE_PATH."/admin/update_settings_site/"; ?>" method="post">
	Site Name:
    	<input type="text" name="sitename" value="<?php echo $settings['sitename']; ?>"/><br /><br />
	Forum Link:
		<input type="text" name="forum" value="<?php echo $settings['forum']; ?>"/><br /><br />
	Site Offline:
    	<select name="underconstruction">
	<option value="0">No</option>
	<option value="1">Yes</option>
	</select><br><br>
	<input type="submit" value="Update!"/>
	</form>
			</div><!-- end #photo --> 
			<div class="panel todo left"> 
				<h2 class="ico_mug">PayPal Settings</h2> 
	
	<form action="<?php echo BASE_PATH."/admin/update_settings_paypal/"; ?>" method="post">
	Paypal Email:
    	<input type="text" name="email" value="<?php echo $settings['email']; ?>"/><br /><br />
	Currency:
    	<input type="text" name="currency" value="<?php echo $settings['currency']; ?>"/><br><br>
		<input type="submit" value="Update!"/>
	</form>
			</div><!-- end #todo --> 
		
		</div><!-- end #panels --> 
	<div id="tabledata" class="section"> 
			<h2 class="ico_mug">Templates</h2> 
		<table id="table"> 
			<thead> 
			<tr> 
				
				<th>Version</th> 
				<th>Template Name</th> 
				<th>Description</th> 
				<th>Author</th>
				<th>CHOOSE</th>
			</tr> 
			</thead> 
			<tbody> 
	<?php 
	foreach($directories as $value):
	   if(is_dir($target.$value)):
	   $xml = simplexml_load_file($target.$value."/info.xml");  
	 ?>				
	
	<tr>
          <td class="table_date"><?php echo $xml->version;?></td>
          <td class="table_title"><?php echo $xml->name;?></td>
          <td class="table_title"><?php echo $xml->description;?></td>
          <td class="table_title"><?php echo $xml->author;?></td>
          <td class="table_title">
          <?php if($value == 'admin'):
            echo "admin"; ?>
           <?php else: 
           if($template == $value):
           ?>
          <span class="approved">Active</span>
          <?php else: ?>
          <a href="<?php echo BASE_PATH;?>/admin/updatesettings/<?php echo $value;?>">
          <img src="<?php echo $html->includeImage('../../admin/img/accept.jpg'); ?>" alt="edit" title="Use This Template"></a>         
          <?php endif; ?>
          <?php endif; ?>
         </td>
        </tr>
       
         <?php 
          endif; 
          endforeach; ?>

			</tbody> 
		</table> 
	
		
		</div><!-- end #postedit --> 
		
	
	
		
	    </div><!-- end #content -->
	    
		
		
