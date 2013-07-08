<?php include_once('view/_header.php'); ?>			
            <h1>Menu of Gordon&#39;s Crown</h1>
			<div id="sidebar">
				<h2>Jump to ...</h2>
				<ul>                					
                    <?php
                    	foreach ($menu as $mn){ ?>
							<li><a href="#<?php echo $mn['link']; ?>" onclick="goToByScroll('<?php echo $mn['link']; ?>');"><?php echo $mn['name']; ?></a></li>		
						<?php }
					?>
				</ul>
			</div>
            
			<div id="foods">
				<?php foreach ($menu as $mn){ ?>                                
                
                <h2><a class="category" name="<?php echo $mn['link']; ?>"><?php echo $mn['name']; ?></a></h2>		
				<h3 class="rating">Rating:<?php foreach($menuRate->showRateCategory($mn['menu_id']) as $rc){ echo round($rc['tong'], 2).' ('.$rc['col'].' ratings)'; } ?></h3>
				<div class="category">
					<div class="foodcategory_image">
						<img src="<?php echo $root.'public/menu/'.$mn['image']; ?>" alt="<?php echo $mn['title']; ?>" />
					</div>
					<ul>	
                    	
                        <?php 
							$title = $item->getCategory($mn['menu_id']);
							foreach ($title as $tit)
							{ ?>
                        
                        	<li>
								<a href="<?php echo ROOT.'article/'.$tit['alias']; ?>" title="<?php echo $tit['title'].'-'.$tit['price']; ?>"><?php echo $tit['title']; ?></a>
							</li>
                        
                        <?php } ?>						
					</ul>
				</div>                                																
				<?php } ?>					
			</div>			
            
<?php include_once('view/_footer.php'); ?>            