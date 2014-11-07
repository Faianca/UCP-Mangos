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
						<div class="text">BanList</div>										
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
<a href="<?php echo BASE_PATH;?>/page/kills/"><span class="titlecontents">
<span class="arc_title arc_news">Top Kills</span></span></a> 
<a href="#"><span class="titlecontents">
<span class="arc_title arc_news">Arena Ladder</span></span></a> 
<a href="<?php echo BASE_PATH;?>/page/arena/2"><span class="arc_title arc_news"> - 2x2</span></a>				
<a href="<?php echo BASE_PATH;?>/page/arena/3"><span class="arc_title arc_news"> - 3x3</span></a>				
<a href="<?php echo BASE_PATH;?>/page/arena/5"><span class="arc_title arc_news"> - 5x5</span></a>				

<a class="selected" href="<?php echo BASE_PATH;?>/page/banlist/"><span class="titlecontents">
<span class="arc_title arc_news">Ban List</span></span></a> 
                </div> 
                
                <div class="archivenews"> 
                	 
              

	
              <dl> 
                 
	<a id="151500"></a>         <dt class="open"><span class="date"></span>

     <span class="title">Ban List!</span></dt> 
        <dd> 
            <div class="text"> 
           <?php 

		echo "<center><table id=\"dataTable\">
		<THEAD><tr><th>accID:</th><th align=\"center\">User:</th>
		<th align=\"center\">Reason:</th><th>Ban Data</th>
		<th>Unban Data</th></tr></THEAD>";  
		foreach($row as $result_data):  
			echo "<tr><td align=\"center\">".$result_data["id"]."</td>";  
			echo "<td align=\"center\">".$result_data["username"]."</td>";  
			echo "<td align=\"center\">".$result_data["banreason"]."</td>";  
			echo "<td align=\"center\">".date("d.m.Y H:m",$result_data["bandate"])."</td>";
			echo "<td align=\"center\">".date("d.m.Y H:m",$result_data["unbandate"])."</td>";       
			echo "</tr>";  
		endforeach;  
		
	
		echo "</table></center>";  ?>	
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
		
		
	
