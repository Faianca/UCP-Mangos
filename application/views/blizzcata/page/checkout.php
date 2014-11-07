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
<h2>Cart Description</h2><p>
Name: <strong><?php echo $row[0]['title'];?></strong> <br>
Amount: <strong><?php echo $row[0]['amount'].$paypal->get_currency();?></strong><br>
Total to Pay: <strong><?php echo $row[0]['amount'].$paypal->get_currency();?></strong><br><br>
</p>
<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_cart">
<input type="hidden" name="upload" value="1">
<input type="hidden" name="business" value="<?php echo $paypal->get_mail(); ?>">
<input type="hidden" name="item_name_1" value="<?php echo $row[0]['title'];?>">
<input type="hidden" name="item_number_1" value="<?php echo $row[0]['id']; ?>">
<input type="hidden" name="quantity_1" value="1">
<input type="hidden" name="amount_1" value="<?php echo $row[0]['amount'];?>">
<input type="hidden" name="quantity_1" value="1">
<input type="hidden" name="currency_code" value="<?php echo $paypal->get_currency(); ?>">
<input type="hidden" name="lc" value="US">
<input type="hidden" name="rm" value="2">
<input type="hidden" name="shipping_1" value="0">
<input type="hidden" name="return" value="http://90.199.210.156/mvcplat/page/thankyou/">
<input type="hidden" name="cancel_return" value="http://90.199.210.156//mvcplat/">
<input type="hidden" name="notify_url" value="http://90.199.210.156/mvcplat/page/paypal/<?php echo $user; ?>">
<input type="submit" class="button" name="pay" value="Pay Now" />
</form>

</div><!-- end .col-left -->

					<div class="clear"></div>
				</div><!-- end #page-content -->
			</div><!-- end .centercolumn -->
		</div><!-- end #content-inner -->
	</div><!-- end #container-content -->
