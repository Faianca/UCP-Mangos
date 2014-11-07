<?php global $session; ?>

			<div class="centercontainer">

				<div class="newscontainer">
					<div class="newsheader">
						<div class="latestnews"></div>
                        <div class="facebookicon"><a href="http://www.facebook.com/blizzard" title="Blizzard on Facebook"></a></div>
						<div class="rssicon"><a href="page/news/" title="RSS Feed"></a></div>
                        <div class="viewallnews"><a href="page/news/">View all news</a></div>
                    </div>
				<div id="newsbox">
						<dl class="sliderbox" id="slider2">                        
						<?php   
						global $db;
						$sql = ("SELECT * FROM ".DB_UCP.".news WHERE active = '1' ORDER BY newsid DESC LIMIT 0,4");
 							$row = $db->fetch_all($sql);
 							foreach ($row as $news):
 						?>							
	<dt><span class="date">
             15-Oct-2010
        </span><span class="title"><?php echo $news['title'];?></span></dt>
        <dd>
            	<div class="thumb"><img src="<?php echo $html->includeImage('blizzcon-2010.jpg'); ?>"/></div>
            <div class="text">
            <?php echo $news['content'];?>                
            </div>
        </dd>                            
      <?php  endforeach; 
	     unset($news);
	     $db->close();
	?>
						</dl>

					</div> 
				</div> 
       
       
     <a href="page/connect/" class="spotlight1" style="background-image: url(<?php echo $html->includeImage('frontpage/en-gb/spotlight-panda.jpg'); ?>);"></a>
  
                
      <a href="users/donate/" class="spotlight2" style="background-image: url(<?php echo $html->includeImage('frontpage/en-gb/spotlight-wowtrial-thrall5.jpg'); ?>);"></a>
      
				
			</div>                 
		</div>        
	</div>
	<script type="text/javascript">
        var slider2=new accordion.slider("slider2");
        slider2.init("slider2",0,"open");

	</script>


