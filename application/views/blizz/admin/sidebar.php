<div id="sidebar" class="right"> 
				<h2 class="ico_mug">Sidebar</h2> 
			<ul id="menu"> 
				<li> 
					<a href="#" class="ico_posts">News</a> 
					<ul> 
						<li><?php echo $html->link('Edit News', 'admin/news/');?></li> 
						<li><?php echo $html->link('Add News', 'admin/news/');?></li> 
						<li><?php echo $html->link('Delete News', 'admin/news/');?></li> 
					</ul> 
					<a href="#" class="ico_page">Pages</a> 
					<ul> 
						<li><a href="#">Edit pages</a></li> 
						<li><a href="#">Add page</a></li> 
						<li><a href="#">Manage pages</a></li> 
					</ul> 
					<a href="#" class="ico_user">Users</a> 
					<ul> 
						<li><?php echo $html->link('Create User', 'admin/user/');?></li> 
						<li><?php echo $html->link('Edit User', 'admin/user/');?></li> 
						<li><?php echo $html->link('Delete User', 'admin/user/');?></li> 
					</ul> 
					<a href="#" class="ico_settings">Settings</a> 
					<ul> 
						<li><a href="#">Database</a></li> 
						<li><a href="#">Themes</a></li> 
						<li><a href="#">Options</a></li> 
					</ul> 
					
					
				</li> 
		
				
			</ul> 
 
			</div><!-- end #sidebar --> 