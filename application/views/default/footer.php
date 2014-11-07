<div id="container-bottom">
		<div id="bottom">
			<div id="bottom-glow">
			<div class="centercolumn">
				<div class="column">
					<div class="col">
						<h2>About Us</h2>
						<p><img src="<?php echo $html->includeImage('t_about.jpg'); ?>" alt="" class="alignleft">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent non nisl feugiat ante viverra ullamcorper ut eget nisi. 
Donec adipiscing condimentum dolor eu volutpat. Nulla dolor ligula, aliquet in consequat quis, varius vel arcu.</p>
					</div><!-- end .col -->
					<div class="col">
						<h2>News</h2>
						<ul>
						<?php   
						global $db;
						$sql = ("SELECT * FROM ".DB_UCP.".news ORDER BY newsid DESC LIMIT 0,5");
 							$row = $db->fetch_all($sql);
 							foreach ($row as $news):
							echo "
						<li><a href='".BASE_PATH."/page/news/'>".$news['title']."</a></li>";
							endforeach; 
							unset($news);
							$db->close();
						?>
						</ul>
					</div><!-- end .col -->
					<div class="col nomargin">
						<h2>Info</h2>
						<ul>
						<li><strong>Blizz wow</strong><br>
						  1234 Address City,re3434<br>
						  City, Country<br>
						  Phone: 0800-123456<br>
						  Fax: 0800-123456<br><span>
						  Email: <a class="linkclass" href="mailto:"></a></span><br><span>
						  Website: <a class="linkclass" href="<?php echo SITEURL;?>"><?php echo SITEURL;?></a></span></li>
						</ul>
					</div><!-- end .col -->
				</div><!-- end #column -->
				<div class="clear"></div><!-- clear float -->
				<div id="social-icon">
					<ul>
						<li><a href="#"><img src="<?php echo $html->includeImage('icon_linkedln.png'); ?>" alt=""></a></li>
						<li><a href="#"><img src="<?php echo $html->includeImage('icon_fb.png'); ?>" alt=""></a></li>
						<li><a href="#"><img src="<?php echo $html->includeImage('icon_twitter.png'); ?>" alt=""></a></li>
						<li><a href="#"><img src="<?php echo $html->includeImage('icon_rss.png'); ?>" alt=""></a></li>
					</ul>
				</div><!-- end #social-icon -->
			</div><!-- end .centercolumn -->
			</div><!-- end #bottom-glow -->
		</div><!-- end #bottom -->

	<div id="footer">
			<div class="centercolumn">
				<div id="footer-right"><img src="<?php echo $html->includeImage('logo_footer.png'); ?>" alt=""></div><!-- end #footer-right -->
				<div id="footer-left">Copyright (C) 2010 UCPMangos By Jorge Meireles. All rights reserved</div><!-- end #footer-left -->
			</div><!-- end .centercolumn -->
		</div>
	</div><!-- end #container-bottom -->
	
</div><!-- end #wrapper -->
</body>
</html>

