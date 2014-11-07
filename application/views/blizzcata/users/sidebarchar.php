 <div class="side-right">
					<div class="widget-area">
						<div class="widget-box">
							<ul>
								<li class="widget-container">
								<h2 class="widget-title">Choose your Character</h2>
								<div class="lineleft">
								<div class="lineleft-b">
								<ul>
									<li><a href="#"><?php
									global $chars, $char, $points;
									$chars->get_chares(); 
									?></a></li>
								<li>
								<?php 
								if($session->is_set('realmid')):
								if($session->is_set('guid')) 
								{
								echo "Char: ".$chars->get_charname($session->value('guid'))."<br>";
								echo "Race: ".$char->get_race()."<br>"; 
								echo "Class: ".$char->get_class()."<br>";
								echo "Gender: ".$char->get_gender()."<br>";
								echo "Points: ".$points->get_points()."<br>"; 
								
								}
								?>
								<b>
	</li>
								</ul>
								</div>
								</div>
								</li>
							</ul>
						</div><!-- end widget-box -->
					</div><!-- end widget-area -->
					<div class="widget-area">
							<ul>
								<li class="widget-container">
								<h2 class="widget-title">Advertise with us</h2>
								<img src="<?php echo $html->includeImage('tf1.jpg'); ?>" alt="" />
							
								</li>
							</ul>
					</div><!-- end widget-area -->
					<div class="widget-area">
							<ul>
								<li class="widget-container">
								<h2 class="widget-title">Hint</h2>
									<div class="box">
										<p>Please use the Menu Account.
										It has another dropdown menu with the entire tools.</p>
										<span class="arrow-testimonial"><img src="<?php echo $html->includeImage('arrow-testimonial.gif'); ?>" alt="" /></span>
									</div>
								</li>
							</ul>
					</div><!-- end widget-area -->
					</div><!-- end .side-right -->