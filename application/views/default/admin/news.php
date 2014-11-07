<?php global $pager;?>
		<div id="postedit" class="clearfix"> 
			<h2 class="ico_mug">Add new post</h2> 
			<?php echo $msgOK; display_msg();?>
			<br>
			<form action="<?php echo BASE_PATH."/admin/news/";?>" method="post">
			<input type='hidden' name='news' value='1' />
			<div><input id="post_title" name="title" type="text" size="30" tabindex="1" value="Type title" /></div> 
			<div id="form_middle_cont" class="clearfix"> 
			<div class="left"><textarea id="markItUp" name="content" cols="80" rows="10"></textarea></div> 
			<div class="left form_sidebar"> 
			
				<p> 
					<span id="status">Status: Writing a new... </span> 
				<input type="submit" value="Save" id="save" /> 
				</p> 
			</div> 
			</div> 
			</form> 
			
		</div><!-- end #postedit --> 
		
		<div id="tabledata" class="section"> 
			<h2 class="ico_mug">News</h2> 
	<table id="table">
			<thead>
			<tr>
				
				<th>Date </th>
				<th>Title</th>
				<th>Actions</th>
				<th>Status</th>
			</tr>
			</thead>
			<tbody>
			
	<?php foreach ($usrow as $row):?>
	<tr>
	
          <td class="table_date"><?php echo $row['date'];?>.</td>
          <td class="table_title"><a href="<?php echo BASE_PATH;?>/admin/news/<?php echo $row['newsid'];?>"><?php echo $row['title'];?></a></td>
          <td>
          <a href="<?php echo BASE_PATH;?>/public/index.php?id=<?php echo $row['newsid']; ?>&url=admin/active/1"><img src="<?php echo $html->includeImage('../../admin/img/accept.jpg'); ?>" alt="publish" title="Publish"></a>
          <a href="<?php echo BASE_PATH;?>/public/index.php?id=<?php echo $row['newsid']; ?>&url=admin/active/0"><img src="<?php echo $html->includeImage('../../admin/img/cancel.jpg'); ?>" alt="notpublisj" title="Not Publish" ></a>
          <a href="<?php echo BASE_PATH;?>/admin/edit/<?php echo $row['newsid'];?>"><img src="<?php echo $html->includeImage('../../admin/img/edit.jpg'); ?>" alt="edit" title="Edit"></a>
          <a href="<?php echo BASE_PATH;?>/admin/del/<?php echo $row['newsid'];?>"><img src="<?php echo $html->includeImage('../../admin/img/delete.png'); ?>" alt="cancel" title="Delete"></a>
          </td>	
         <td>
         <?php echo ($row['active'] == '1')? '<span class="approved">Publish' : '<span class="notapproved">Not Published'?>
         </span></td>
        </tr>
         <?php endforeach;?>
        <?php unset($row);?>
			
			
			</tbody>
		</table>
			
			<div class="pagination"> 
				<?php echo $pager->display_pages();?>
			</div> 
		</div> <!-- end #tabledata --> 
	
	
	
		
	    </div><!-- end #content -->
		
		
		
	
		
