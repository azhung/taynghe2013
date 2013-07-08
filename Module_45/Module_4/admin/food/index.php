<?php include_once('views/_header.php'); ?>

			<?php 
				if (isset($_POST['ok'])){
					echo $_POST['tag'];
				}
			?>

			<p><a href="<?php echo ROOT; ?>" title="&larr; Back to the menu">&larr; Back to the menu</a></p>
			<h1><?php echo $foodInfo['food_name'].'-'.$foodInfo['price']; ?></h1>
			<div class="food">
				<h3 class="category"><?php echo $catInfo['cat_name']; ?></h3>
				<!-- food specific image is optional, but looks nice -->
				<div class="food_image">
					<img src="<?php echo ROOT.'public/menu/'.$foodInfo['img']; ?>" alt="<?php echo $foodInfo['food_name'].'-'.$foodInfo['price']; ?>" />
				</div>
				<div class="food_description">
					<p>
						<?php echo $foodInfo['descript']; ?>
					</p>
				</div>
			
				<h3>Tags: &nbsp;</h3>
				<div id="tags-wrapper">                	
                	<?php foreach ($tagView as $tg){ ?>                
					<div class="tag" id="tag<?php echo $tg['tag_id']; ?>">
						<a href="<?php echo ROOT.'tags/'.$tg['tag_name']; ?>" title="Show where this tag is being used"><?php echo $tg['tag_name']; ?></a>
                        (<a href="#" onclick="Tag.deleteTag(<?php echo $tg['tag_id'].','.$foodInfo['food_id']; ?>); return false;" title="Remove tag on the left">Remove</a>)                       
					</div>					                                        
                    <?php } ?>
                    
					<div class="message"></div>
					&nbsp;
				</div>
					<div id="tagform">
						<form action="" method="post" id="newtagform">
							<input type="hidden" id="idMenu" value="<?php echo $foodInfo['food_id']; ?>">
							<fieldset class="input">
								<div class="text" id="tag_list">
									<label for="taglist">Add an existing tag:</label>
									<select id="taglist" name="tag">							
										<option value="0">-select-</option>										
										<?php
                                        	foreach($selectList as $sl){ ?>
												<option value="<?php echo $sl['tag_id']; ?>"><?php echo $sl['tag_name']; ?></option>
											<?php }
										?>
									</select>
									<span class="message"></span>
								</div>
								<div class="text" id="tag_add">
									<label for="tagnew">Add a new tag:</label>
									<input type="text" id="tagnew"/>
									<span class="message"></span>
								</div>
							</fieldset>
							<fieldset class="submit">
								<div class="submit">
									<input type="button" value="Submit tag" onclick="Tag.save()" name="ok" />
									<span class="message"></span>
								</div>
							</fieldset>                            
						</form>
                        
                                                
					</div>				
				<h3>Rating: &nbsp;</h3>
				<div id="ratings-wrapper">
					<div id="rating"><?php foreach($viewRate as $vr) echo round($vr['trungbinh'], 1).'('.$vr['soluong'].' ratings)'; ?></div>
					<!-- the admin does not need to add a rating -->			
				</div>					
			</div>
			<p><a href="<?php echo ROOT; ?>menu" title="&larr; Back to the menu">&larr; Back to the menu</a></p>
<?php include_once('views/_footer.php'); ?>