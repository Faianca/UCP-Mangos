
	<div id="postedit" class="clearfix">

	<h2 class="ico_mug">Broadcast</h2> 
			<?php echo $msgOK;?>
			<br>
			<form action="<?php echo BASE_PATH."/admin/broadcast/";?>" method="post">
			<input type='hidden' name='broadcast' value='1' />
			<div id="form_middle_cont" class="clearfix"> 
			<div class="left">
			<textarea id="markItUp" name="content" cols="80" rows="10"><?php echo $broadcast; ?></textarea></div> 
			<div class="left form_sidebar"> 
			
				<p> 
					<span id="status">Status: Waiting for approval... </span> 
				<input type="submit" value="Save" id="save" /> 
				</p> 
			</div> 
			</div> 
			</form> 
	
		
		</div><!-- end #postedit --> 
		
	
	
		
	    </div><!-- end #content -->
	    
		
		
