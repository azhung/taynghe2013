<?php include_once('views/_header.php'); ?>
			<h1>Menus with tag "fish"</h1>
			<div id="tags-wrapper" class="category">
				<ul>
                	<?php foreach($tagView as $tgv){ ?>
					<li>
						<a href="<?php echo ROOT.'food/'.$tgv['alias']; ?>" title="<?php echo $tgv['food_name']; ?>"><?php echo $tgv['food_name']; ?></a>
					</li>
                    <?php } ?>
					
				</ul>					
			</div>
<?php include_once('views/_footer.php'); ?>