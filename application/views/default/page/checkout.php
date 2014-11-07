<?php global $paypal; ?>
       
			</div><!-- end .centercolumn -->
		</div><!-- end #header-inner -->
	</div><!-- end #container-top -->
	
	<div id="container-content">
		<div id="content-inner">
			<div class="centercolumn">
				<div id="page-title"><h1>Checkout</h1></div><!-- end #page-title -->
				<div id="page-content">
					<div class="col-center">
<?php if($session->is_set('guid')): ?>
	<h2>Cart Description</h2><p>
Name: <strong><?php echo $row[0]['title'];?></strong> <br>
Amount: <strong><?php echo $row[0]['amount'].$donate->get_currency();?></strong><br>
Total to Pay: <strong><?php echo $row[0]['amount'].$donate->get_currency();?></strong><br>
Character: <strong><?php echo $chars->get_charname($session->value('guid'));?></strong>
<br>
</p>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post">  
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="business" value="<?php echo $donate->get_mail(); ?>">
<input type="hidden" name="item_name" value="<?php echo $row[0]['title'];?>">
<input type="hidden" name="item_number" value="<?php echo $row[0]['id']; ?>_<?php echo $session->value('guid');?>">
<input type="hidden" name="amount" value="<?php echo $row[0]['amount'];?>">
<input type="hidden" name="currency_code" value="<?php echo $donate->get_currency(); ?>">
<input type="hidden" name="return" value="<?php echo BASE_PATH;?>/page/thankyou/">
<input type="hidden" name="cancel_return" value="<?php echo BASE_PATH;?>">
<input type="hidden" name="notify_url" value="<?php echo BASE_PATH;?>/paypal/paypal.php">
<input type="submit" class="button" name="pay" value="Pay Now" />
</form>
<?php else: 
?>
Choose your Character First
<?php 
$chars->get_charesdonation(); 
endif; ?>	

</div><!-- end .col-left -->

					<div class="clear"></div>
				</div><!-- end #page-content -->
			</div><!-- end .centercolumn -->
		</div><!-- end #content-inner -->
	</div><!-- end #container-content -->
