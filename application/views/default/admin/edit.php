<?php global $pager; ?>
<?php display_msg(); ?>

			<h2 class="ico_mug">Editing News</h2>
			
			
			
			<form action="" method="post">
			<input type='hidden' name='editnews' value='1' />
			<div><input id="post_title" name="title" type="text" size="30" tabindex="1" value="<?php echo $row[0]['title'];?>" /></div> 
			<div id="form_middle_cont" class="clearfix"> 
			<div class="left"><textarea id="markItUp" name="content" cols="80" rows="10"><?php echo $row[0]['content'];?></textarea></div> 
			<div class="left form_sidebar"> 
			
				<p> 
					<span id="status">Status: Editing... </span> 
				<input type="submit" value="Edit" id="save" /> 
				</p> 
			</div> 
			</div> 
			</form> 
			

		</div><!-- end #postedit -->
		
		
		
	
		
			
			
			
	 </div>
		
