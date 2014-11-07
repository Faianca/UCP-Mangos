<?php global $serverinfo, $session; ?>

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
						<div class="text">Top Killers</div>										
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
<a href="<?php echo BASE_PATH;?>/page/stats/"><span class="titlecontents">
<span class="arc_title arc_news">Statistics</span></span>
</a> 
<a  class="selected" href="<?php echo BASE_PATH;?>/page/kills/"><span class="titlecontents">
<span class="arc_title arc_news">Top Kills</span></span></a> 
<a href="#"><span class="titlecontents">
<span class="arc_title arc_news">Arena Ladder</span></span></a>
<a href="<?php echo BASE_PATH;?>/page/arena/2"><span class="arc_title arc_news"> - 2x2</span></a>				
<a href="<?php echo BASE_PATH;?>/page/arena/3"><span class="arc_title arc_news"> - 3x3</span></a>				
<a href="<?php echo BASE_PATH;?>/page/arena/5"><span class="arc_title arc_news"> - 5x5</span></a>				
<a  href="<?php echo BASE_PATH;?>/page/banlist/"><span class="titlecontents">
<span class="arc_title arc_news">Ban List</span></span></a> 
                </div> 
                
                <div class="archivenews"> 
                	 
              

	
              <dl> 
                 
	<a id="151500"></a>         <dt class="open"><span class="date"></span>

     <span class="title">Top 20 Killers!</span></dt> 
        <dd> 
            <div class="text"> 
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
			<?php if($session->is_set('realmid')):	
					echo "<center><h2>Realmname: ".$realmname[0]['name']."</center>";
	echo "<div style=\"margin-left:40px;\"><center><table id=\"dataTable\"><THEAD>
	<tr><th>Rank:</th><th>Username:</th><th>Top Kills:</th></tr></THEAD><TBODY>"; 
	$i = 1;
		foreach($row as $result_data):
			echo "<td>".$i."</td>";
			echo "<td>".$result_data["name"]."</td>";  
			echo "<td>".$result_data["totalKills"]."</td>";   
			echo "</tr>";
			$i++;
		endforeach; 
	echo "</TBODY></table></center></div>";   endif; ?>
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
		
	

				

