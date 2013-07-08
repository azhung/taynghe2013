<?php include_once('views/_header.php'); ?>			
	<h1>Menu of Gordon&#39;s Crown</h1>
			<div id="sidebar">
				<h2>Jump to ...</h2>
				<ul>
                	<?php
                    	foreach($cat as $ct){ ?>
							<li><a href="#<?php echo $ct['link']; ?>" onclick="goToByScroll('<?php echo $ct['link']; ?>');"><?php echo $ct['cat_name']; ?></a></li>
						<?php }
					?>										
				</ul>
			</div>
			<div id="foods">
				<?php foreach($cat as $ct){ ?>
                <h2><a class="category" name="<?php echo $ct['link']; ?>"><?php echo $ct['cat_name']; ?></a></h2>		
				<h3 class="rating">Rating: <?php foreach($catMdl->showAvgCat($ct['cat_id']) as $avgCat) echo round($avgCat['trungbinh'], 2).' ('. $avgCat['soluong']; ?> ratings)</h3>
				<div class="category">
					<div class="foodcategory_image">
						<img src="<?php echo ROOT.'public/menu/'.$ct['img']; ?>" alt="" />
					</div>
					<ul>	
                    	<?php
                        	$titFood = $catMdl->getFoodById($ct['cat_id']);
							foreach ($titFood as $tit){
							?>
							<li>
							<a href="<?php echo ROOT.'food/'.$tit['alias']; ?>" title="<?php echo $tit['food_name'].'-'.$tit['price']; ?>"><?php echo $tit['food_name'].'-'.$tit['price']; ?></a>
							</li>	
                            <?php
							}
						?>				
												
					</ul>
				</div>	
                <?php } ?>						
			</div>			
<?php include_once('views/_footer.php'); ?>