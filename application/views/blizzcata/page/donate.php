                      
			</div><!-- end .centercolumn -->
		</div><!-- end #header-inner -->
	</div><!-- end #container-top -->
	
	<div id="container-content">
		<div id="content-inner">
			<div class="centercolumn">
				<div id="page-title"><h1>Donations</h1></div><!-- end #page-title -->
				<div id="page-content">
					<div class="col-center">
                      <div id="tabledata" class="section"> 
			 
                      	<table id="table"> 
			<thead> 
			<tr> 
				<th><input type="checkbox" class="noborder" /></th> 
				<th>Title </th> 
				<th>Status</th> 
				
				<th>Amount</th>
				<th>Buy</th>
			</tr> 
			</thead> 
			<tbody> 
					
			<?php
			//$total_amount = '';
			foreach ($usrow as $row):
			?>
			<tr>
			<td class="table_check"><input type="checkbox" class="noborder"></td>
			<td class="table_date"><?php echo $row['title'];?></td>
         	        <td class="table_title"><img src="<?php echo $html->includeImage($row['status'].".gif");?>"/></td>
         	        <td class="table_title"><?php echo $row['amount'];?>$ Dollares</td>
         	        <td class="table_title"><a href="<?php echo BASE_PATH."/page/checkout/".$row['id'].""?>"><img src="<?php echo $html->includeImage('buy_now.gif');?>"/></a></td>
         	        </td>	
         	        </tr> 
         <?php 
         endforeach;
         unset($row);
          ?>
        

			</tbody> 
		</table> 
	
			
			<div class="pagination"> 
				<span class="pages">Page 1 of 3&#8201;</span> 
				<span class="current">1</span> 
				<a href="#" title="2">2</a> 
				<a href="#" title="3">3</a> 
				<a href="#" >&raquo;</a> 
			</div> 
		</div> <!-- end #tabledata --> 
					
					</div><!-- end .col-left -->

					<div class="clear"></div>
				</div><!-- end #page-content -->
			</div><!-- end .centercolumn -->
		</div><!-- end #content-inner -->
	</div><!-- end #container-content -->

