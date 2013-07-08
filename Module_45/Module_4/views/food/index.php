<?php include_once('views/_header.php'); ?>			
			<p><a href="<?php echo ROOT; ?>menu" title="&larr; Back to the menu">&larr; Back to the menu</a></p>
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
                	
                    <?php
                    	foreach ($tagView as $tg){
						?>
                    		<div class="tag" id="tag<?php echo $tg['tag_id']; ?>">
                                <a href="<?php echo ROOT.'tags/'.$tg['tag_name']; ?>" title="Show where this tag is being used"><?php echo $tg['tag_name']; ?></a>
                            </div>    
                        <?php
						}
					?>
										
					&nbsp;
				</div>
				<h3>Rating: &nbsp;</h3>
				<div id="ratings-wrapper">
					<div id="rating"><?php foreach($viewRate as $vr) echo round($vr['trungbinh'], 1).'('.$vr['soluong'].' ratings)'; ?></div>
					<div id="ratingswitch" style="visibility:visible">
						<a href="#" onclick="toggleRatingForm()">Add a rating</a>
					</div>
                    <?php 
						if (isset($_POST['rate'])){
							?>
                            <div id="ratingform" >
						<form action="" method="post" id="newratingform1">
							<fieldset class="input">
								<div class="text" id="rating_input">
									<label for="rating">Select your rating:</label>
									<select name="rating" id="rating">							
										<option value="1">1 bad</option>
										<option value="2">2</option>
										<option value="3">3 ok</option>
										<option value="4">4</option>
										<option value="5" selected>5 delicious</option>
									</select>
									<span class="message"></span>
								</div>
								<div class="text" id="rating_captcha">
									<label for="captcha_input">Type in the text from the image:</label>
									<!-- captcha image: do not store on filesystem, but generate dynamically - modify path in /media/js/rating.js -->
									<img src="" name="captcha_image" id="captcha_image" alt="Image with text to type in" title="Image with text to type in">
									<input type="text" name="captcha_input" id="captcha_input" size="5" maxlength="5"/>
									<span class="message"></span>
								</div>
							</fieldset>
							<fieldset class="submit">
								<div class="submit">
									<input type="submit" value="Submit rating" name="rate"/>
									<span class="message"><?php echo $rate; ?></span>
								</div>
							</fieldset>
						</form>
					</div>
                            <?php
						}
					?>
					<div id="ratingform" style="visibility:collapse; height:0px">
						<form action="" method="post" id="newratingform">
							<fieldset class="input">
								<div class="text" id="rating_input">
									<label for="rating">Select your rating:</label>
									<select name="rating" id="rating">							
										<option value="1">1 bad</option>
										<option value="2">2</option>
										<option value="3">3 ok</option>
										<option value="4">4</option>
										<option value="5" selected>5 delicious</option>
									</select>
									<span class="message"></span>
								</div>
								<div class="text" id="rating_captcha">
									<label for="captcha_input">Type in the text from the image:</label>
									<!-- captcha image: do not store on filesystem, but generate dynamically - modify path in /media/js/rating.js -->
									<img src="" name="captcha_image" id="captcha_image" alt="Image with text to type in" title="Image with text to type in">
									<input type="text" name="captcha_input" id="captcha_input" size="5" maxlength="5"/>
									<span class="message"></span>
								</div>
							</fieldset>
							<fieldset class="submit">
								<div class="submit">
									<input type="submit" value="Submit rating" name="rate"/>
									<span class="message"><?php echo $rate; ?></span>
								</div>
							</fieldset>
						</form>
					</div>				
				</div>					
			</div>
			<p><a href="<?php echo ROOT; ?>menu" title="&larr; Back to the menu">&larr; Back to the menu</a></p>            
<?php include_once('views/_footer.php'); ?>