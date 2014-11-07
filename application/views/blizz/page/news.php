
	<div class="subcontents"> 
		<div class="middle bg-subpage"> 
            <div class="wrapper"> 
	<div class="breadcrumb breadcrumbsub"> 
		<div class="left"></div> 
		<div class="center"> 
			<div class="ref"> 
				<div class="contents"> 
					<div class="link"><a href="/en-gb/">Home</a></div>						
					<div class="arrowsm"></div>									
						<div class="text">News Archive</div>										
				</div> 
			</div>				
		</div> 
		<div class="right"></div> 
	</div> 
		<div class="contents">        
            <div class="flashTextHeightPlaceholder"> 
            		<div id="flashtextcontainer0" class="flashtextcontainer" > 
		<h1>News Archive</h1> 
		
	</div> 
 
            </div> 
            <div class="newsarchive"> 
                <div class="archive_nav"> 
<a class="selected"                                    href="index.html"><span class="titlecontents"><span class="arc_title arc_news"> 
                                        Current News
								</span></span></a> 
<a                                     href="?d=2010-9"><span class="titlecontents"><span class="arc_title arc_news"> 
                                        September 2010
								</span></span></a> 
<a                                     href="?d=2010-8"><span class="titlecontents"><span class="arc_title arc_news"> 
                                        August 2010
								</span></span></a> 
<a                                     href="?d=2010-7"><span class="titlecontents"><span class="arc_title arc_news"> 
                                        July 2010
								</span></span></a> 
<a                                     href="?d=2010-6"><span class="titlecontents"><span class="arc_title arc_news"> 
                                        June 2010
								</span></span></a> 
<a                                     href="?d=2010-5"><span class="titlecontents"><span class="arc_title arc_news"> 
                                        May 2010
								</span></span></a> 
<a                                     href="?d=2010-4"><span class="titlecontents"><span class="arc_title arc_news"> 
                                        April 2010
								</span></span></a> 
<a                                     href="?d=2010-3"><span class="titlecontents"><span class="arc_title arc_news"> 
                                        March 2010
								</span></span></a> 
<a                                     href="?d=2010-2"><span class="titlecontents"><span class="arc_title arc_news"> 
                                        February 2010
								</span></span></a> 
<a                                     href="?d=2010-1"><span class="titlecontents"><span class="arc_title arc_news"> 
                                        January 2010
								</span></span></a> 
<a                                     href="?d=2009-12"><span class="titlecontents"><span class="arc_title arc_news"> 
                                        December 2009
								</span></span></a> 
<a                                     href="?d=2009-11"><span class="titlecontents"><span class="arc_title arc_news"> 
                                        November 2009
								</span></span></a> 
<a                                     href="?d=2009-10"><span class="titlecontents"><span class="arc_title arc_news"> 
                                        October 2009
								</span></span></a> 
<a                                     href="?d=2009-9"><span class="titlecontents"><span class="arc_title arc_news"> 
                                        September 2009
								</span></span></a> 
<a                                     href="?d=2009-8"><span class="titlecontents"><span class="arc_title arc_news"> 
                                        August 2009
								</span></span></a> 
<a                                     href="?d=2009-7"><span class="titlecontents"><span class="arc_title arc_news"> 
                                        July 2009
								</span></span></a> 
<a                                     href="?d=2009-6"><span class="titlecontents"><span class="arc_title arc_news"> 
                                        June 2009
								</span></span></a> 
<a                                     href="?d=2009-5"><span class="titlecontents"><span class="arc_title arc_news"> 
                                        May 2009
								</span></span></a> 
<a                                     href="?d=2009-4"><span class="titlecontents"><span class="arc_title arc_news"> 
                                        April 2009
								</span></span></a> 
<a                                     href="?d=2009-3"><span class="titlecontents"><span class="arc_title arc_news"> 
                                        March 2009
								</span></span></a> 
<a                                     href="?d=2009-2"><span class="titlecontents"><span class="arc_title arc_news"> 
                                        February 2009
								</span></span></a> 
<a                                     href="?d=2009-1"><span class="titlecontents"><span class="arc_title arc_news"> 
                                        January 2009
								</span></span></a> 
                </div> 
                <div class="archivenews"> 
                	<div class="currentnewsmonth"> 
	                		<div id="flashtextcontainer1" class="flashtextcontainer" > 
		<h2>Current News</h2> 
	</div> 
 
                    </div> 
              

	
              <dl> 
                 
              <?php foreach ($row as $news): ?>
	<a id="151500"></a> 
        <dt class="open"><span class="date"><?php echo $news['date']; ?>"</span>
     <span class="title"><?php echo $news['title']; ?></span></dt> 
        <dd> 
            <div class="text"> 
           <?php echo $news['content']; ?>     
            </div> 
        </dd>   
	                        <dd class="footer"></dd>
	 
	<?php 
		endforeach;
		unset($news); ?>
                    
 
                       
                    </dl> 
                </div> 
            </div> 
		</div>            
            </div> 
        </div> 
	</div> 
