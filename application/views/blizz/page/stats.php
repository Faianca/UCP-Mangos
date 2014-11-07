<?php global $serverinfo; ?>

	<div class="subcontents"> 
		<div class="middle bg-subpage"> 
            <div class="wrapper"> 
	<div class="breadcrumb breadcrumbsub"> 
		<div class="left"></div> 
		<div class="center"> 
			<div class="ref"> 
				<div class="contents"> 
					<div class="link"><a href="<?php echo BASE_PATH;?>">Home</a></div>						
					<div class="arrowsm"></div>									
						<div class="text">Statistics</div>										
				</div> 
			</div>				
		</div> 
		<div class="right"></div> 
	</div> 
		<div class="contents">        
             <div class="flashTextHeightPlaceholder"> 
            		<div id="flashtextcontainer0" class="flashtextcontainer" > 
		<h1>Statistics!</h1> 
		
	</div> 
 
            </div>
            <div class="newsarchive"> 
                <div class="archive_nav"> 
<a class="selected" href="index.html"><span class="titlecontents">
<span class="arc_title arc_news">Statistics</span></span>
</a> 
<a href="<?php echo BASE_PATH;?>/page/kills/"><span class="titlecontents">
<span class="arc_title arc_news">Top Kills</span></span></a> 
<a href="<?php echo BASE_PATH;?>/page/arena/2"><span class="titlecontents">
<span class="arc_title arc_news">Arena Ladder</span></span></a>
<a href="<?php echo BASE_PATH;?>/page/arena/2"><span class="arc_title arc_news"> - 2x2</span></a>				
<a href="<?php echo BASE_PATH;?>/page/arena/3"><span class="arc_title arc_news"> - 3x3</span></a>				
<a href="<?php echo BASE_PATH;?>/page/arena/5"><span class="arc_title arc_news"> - 5x5</span></a>	
<a href="<?php echo BASE_PATH;?>/page/banlist/"><span class="titlecontents">
<span class="arc_title arc_news">Ban List</span></span></a> 
                </div> 
                
                <div class="archivenews"> 
                	 
              

	
              <dl> 
                 
	<a id="151500"></a>         <dt class="open"><span class="date"></span>

     <span class="title">Server Statistics!</span>
 	<center>
					<form action="" method="post"> 
	Choose Realm:
	<select name="realm">
	<?php
	$i= 1;
	if(!empty($realms)):
	foreach($realms as $realms):
	echo '<option value="'.$realms['id'].'">'.$realms['name'].'</option>';
	$i++;
	endforeach;
	else : 
	echo "<option>There is no realms realms</option>";
	endif;
	?>
	<input type="submit" class="button" value="Go!"/></select>
	</form>		</center><br>
			<?php if($session->is_set('realmid')): ?>
</dt> 
        <dd> 
            <div class="text"> 
            <?php echo "<UL id=\"quick-info\">";
echo "<li><h2>Realmname: ".$realmname[0]['name']."</h2></li>";
	  echo "<li>Online: ".$serverinfo->get_online()."</li>";
	  echo "<li>Uptime: ".$serverinfo->get_uptime()."</li>";
	  echo "<li>Players Online: ".$serverinfo->get_playersonline()."</li>";
	  echo "<li>Max Online: ".$serverinfo->get_maxonline()."</li>";
	  echo "<li>Client: ".VERSION."</li>";
	  echo "<li>Realm: ".REALMLIST."</li></UL><div class=\"clear\"></div>";
	endif; ?>		
            </div> 
        </dd>   
	                        <dd class="footer"></dd>
	 
                    
 
                       
                    </dl> 
                </div> 
            </div> 
		</div>            
            </div> 
        </div> 
	</div> 					
