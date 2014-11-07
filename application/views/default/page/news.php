		</div><!-- end .centercolumn -->
		</div><!-- end #header-inner -->
	</div><!-- end #container-top -->
	
	<div id="container-content">
		<div id="content-inner">
			<div class="centercolumn">
				<div id="page-title"><h1>News</h1></div><!-- end #page-title -->
				<div id="page-content">
					<div class="col-left">

	<?php 
 	foreach ($row as $news):
	echo "
	<h3>".$news['title']."</h3>
	<h6>".$news['date']."</h6>
        <p>".$news['content']."</p>
        <h6>Posted by: Admin</h6><hr />";
	endforeach; 
	unset($news);
        ?>
					
					</div><!-- end .col-left -->
					
        <?php include (ROOT . DS . 'application' . DS . 'views' . DS . TEMPLATE . DS . $this->_controller . DS . 'sidebar.php'); ?>


					<div class="clear"></div>
				</div><!-- end #page-content -->
			</div><!-- end .centercolumn -->
		</div><!-- end #content-inner -->
	</div><!-- end #container-content -->
