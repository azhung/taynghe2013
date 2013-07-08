<?php include_once('view/_header.php'); ?>
	
   			<p><a href="<?php echo ROOT; ?>menu" title="&larr; Back to the menu">&larr; Back to the menu</a></p>
			<h1><?php echo $article['title'].' - '.$article['price']; ?></h1>
			<div class="food">
				<h3 class="category"><?php echo $tieude;?></h3>
				<!-- food specific image is optional, but looks nice -->
				<div class="food_image">
					<img src="<?php echo ROOT.'public/menu/'.$article['img']; ?>" alt="Davy&#39;s classic prawn cocktail - &pound;7.85" />
				</div>
				<div class="food_description">
					<p>
						<?php echo $article['descrip']; ?>
					</p>
				</div>
				
				<h3>Tags: &nbsp;</h3>
				<div id="tags-wrapper">
                	<?php foreach($tag as $tg){ ?>
					<div class="tag" id="tag<?php echo $tg['tag_id']; ?>">
						<a href="<?php echo ROOT.'tags/'.$tg['name'];?>" title="Show where this tag is being used"><?php echo $tg['name']; ?></a>
					</div>										
                    <?php } ?>
				</div>
                
                
				<h3>Rating: &nbsp;</h3>
				<div id="ratings-wrapper">
					<div id="rating"><?php foreach($avg as $ag){ echo round($ag['avg'], 2).' ('.$ag['col'].' ratings)'; } ?></div>
					<div id="ratingswitch" style="visibility:visible">
						<a href="#" onclick="toggleRatingForm()">Add a rating</a>
					</div>                    
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
									<img src="" name="captcha_image" id="captcha_image" alt="Image with text to type in" title="Image with text to type in" />
									<input type="text" name="captcha_input" id="captcha_input" size="5" maxlength="5"/>
									<span class="message"></span>
								</div>
							</fieldset>
							<fieldset class="submit">
								<div class="submit">
									<input type="submit" name="ok" value="Submit rating" />
									<span class="message"></span>
								</div>
							</fieldset>
						</form>
					</div>				
				</div>					
			</div>
			<p><a href="<?php echo ROOT; ?>menu" title="&larr; Back to the menu">&larr; Back to the menu</a></p>

<?php include_once('view/_footer.php'); ?>