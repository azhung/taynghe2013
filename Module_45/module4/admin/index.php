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
                            <a href="<?php echo ROOT . 'tags/' . $tg['name']; ?>"
                               title="Show where this tag is being used"><?php echo $tg['name']; ?></a>
                            (<a href="#" onclick="Tag.deleteTag(<?php echo $tg['tag_id'] . ',' . $article['food_id']; ?>); return false;"
                                title="Remove tag on the left">Remove</a>)
                        </div>
                    <?php } ?>
                    <div class="message"></div>
				</div>
                
                <div id="tagform">
						<form action="" method="post" id="newtagform">
							<input type="hidden" id="idMenu" value="<?php echo $article['food_id'];?>">
                            <!--__________  Thêm thẻ input này phục vụ validate #newTag _________-->
							<input type="hidden" id="textOk" value="true">
                            <!--__________  End Thêm thẻ input phục vụ validate #newTag _________-->
							<fieldset class="input">
								<div class="text" id="tag_list">
									<label for="taglist">Add an existing tag:</label>
									<select id="taglist">							
										<option value="0">-select-</option>
                                        <?php
                                        	foreach($selectList as $sl){
												?>
												<option value="<?php echo $sl['tag_id']; ?>"><?php echo $sl['name']; ?></option>
                                                <?php
											}
										?>																				
									</select>
									<span class="message"></span>
								</div>
								<div class="text" id="tag_add">
									<label for="tagnew">Add a new tag:</label>
									<input type="text" id="tagnew" onkeyup="Tag.validateNewTag();"/>
									<span class="message"></span>
								</div>
							</fieldset>
							<fieldset class="submit">
								<div class="submit">
									<input type="submit" value="Submit tag" />
									<span class="message"></span>
								</div>
							</fieldset>
						</form>
					</div>				
				<h3>Rating: &nbsp;</h3>
				<div id="ratings-wrapper">
					<div id="rating"><?php foreach($avg as $ag){ echo round($ag['avg'], 2).' ('.$ag['col'].' ratings)'; } ?></div>
					<!-- the admin does not need to add a rating -->			
				</div>			
									
			</div>
			<p><a href="<?php echo ROOT; ?>menu" title="&larr; Back to the menu">&larr; Back to the menu</a></p>
<?php include_once('view/_footer.php'); ?>