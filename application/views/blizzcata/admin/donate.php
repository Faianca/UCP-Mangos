<?php echo $msgOK; global $pager;?>
	<div id="postedit" class="clearfix">
	<div id="panels" class="clearfix"> 
			<div class="panel photo left"> 
				<h2 class="ico_mug">Add Donation</h2> 	
	<form action="<?php echo BASE_PATH."/admin/donate/"; ?>" method="post">
 
    	<input type="text" name="item" value="Item Name"/><br /><br />
	<select name="status">
    	<?php
    	foreach($status as $status):
	echo '<option value="'.$status.'">Status: '.$status.'</option>';
	endforeach; ?>
	</select>
	<br /><br />
	<input type="text" name="amount" value="Item cost"/><br /><br />
	<input type="submit" value="Add item!"/>
	</form>
			</div><!-- end #photo --> 
			<div class="panel todo left"> 
				<h2 class="ico_mug">Delete Reward</h2> 
	<?php if(empty($row1)):
	echo '<div id="warning" class="info_div"><span class="ico_warning">You Dont Have Donations</span></div>';
	else:
	?>
	<form action="" method="post">
	<select name="deletedonation">
	<?php 
	foreach($row1 as $donate):
	echo '<option value="'.$donate['id'].'">Donate: '.$donate['title'].'</option>';
	endforeach;
	?>
	</select> <input type="submit" value="Delete!"/></form>
	<?php 	endif; ?>;
			</div><!-- end #todo --> 
		
		</div><!-- end #panels --> 
	
	<div id="tabledata" class="section"> 
			<h2 class="ico_mug">Donations Items</h2> 
		<table id="table"> 
			<thead> 
			<tr> 
				<th><input type="checkbox" class="noborder" /></th> 
				<th>ID </th> 
				<th>Package Name</th> 
				<th>Status</th> 
				<th>Amount</th>
				<th>Edit</th>
			</tr> 
			</thead> 
			<tbody> 
					
	<?php
	$total_amount = '';
	foreach ($row1 as $row):?>
	<tr>
	<td class="table_check"><input type="checkbox" class="noborder"></td>
          <td class="table_date"><?php echo $row['id'];?>.</td>
          <td class="table_title"><?php echo $row['title'];?></td>
          <td class="table_title"><img src="<?php echo $html->includeImage(strtolower($row['status']).".gif");?>"/></td>
          <td class="table_title"><?php echo $row['amount'];?>$ Dollares</td>
          <td class="table_title">YES</td>
          
          </td>	
        </tr>
         <?php endforeach;
          unset($row);?>
        

			</tbody> 
		</table> 
	
			
			<div class="pagination">
			<?php echo $pager->display_pages();?>
			</div> 
		</div> <!-- end #tabledata --> 
	
		<div id="tabledata" class="section"> 
			<h2 class="ico_mug">Donations</h2> 
		<table id="table"> 
			<thead> 
			<tr> 
				<th><input type="checkbox" class="noborder" /></th> 
				<th>Date </th> 
				<th>Package Name</th> 
				<th>Amount</th> 
				<th>Char Name</th>
				<th>Realm</th>
				<th>Sent</th>
			</tr> 
			</thead> 
			<tbody> 
					
	<?php
	$total_amount = '';
	foreach ($usrow as $row):?>
	<tr>
	<td class="table_check"><input type="checkbox" class="noborder"></td>
          <td class="table_date"><?php echo $row['date'];?>.</td>
          <td class="table_title"><?php echo $row['item_name'];?></td>
          <td class="table_title"><?php echo $row['amount'];?>$ Dollares</td>
          <td class="table_title"><?php echo $row['username'];?></td>
		            <td class="table_title"><?php echo $row['realm'];?></td>
          <td class="table_title"><?php echo ($row['send'] == '0')? 'No' : 'Yes';?>
		  <a href="<?php echo BASE_PATH;?>/public/index.php?id=<?php echo $row['id']; ?>&url=admin/donateactive/1"><img src="<?php echo $html->includeImage('../../admin/img/accept.jpg'); ?>" alt="Yes" title="Yes"></a>
          <a href="<?php echo BASE_PATH;?>/public/index.php?id=<?php echo $row['id']; ?>&url=admin/donateactive/0"><img src="<?php echo $html->includeImage('../../admin/img/cancel.jpg'); ?>" alt="No" title="No" ></a>
		  </td>
		  
          </td>	
        </tr>
        <?php $total_amount = $total_amount + $row['amount']; ?>
         <?php endforeach;
          unset($row);?>
        

			</tbody> 
		</table> 
	
			
			<div class="pagination">
			<?php echo $pager->display_pages();?>
			</div>
		</div> <!-- end #tabledata --> 
				<div id="success" class="info_div"><span class="ico_success"> <?php
        echo "You have ".$total_amount."$ Dollares";?></span></div> 
		</div><!-- end #postedit --> 
		
	
	
		
	    </div><!-- end #content -->
	    
		
		
