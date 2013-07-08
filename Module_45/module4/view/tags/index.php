<?php include_once('view/_header.php'); ?>
			<h1>Menus with tag "<?php echo $tagName; ?>"</h1>
			<div id="tags-wrapper" class="category">
				<ul>
                	<?php foreach($tgView as $tg){ ?>
					<li>
						<a href="<?php echo ROOT.'article/'.$tg['alias']; ?>" title="Go to detail view of Davy&#39;s classic prawn cocktail - &pound;7.85"><?php echo $tg['title']; ?> - &pound;<?php echo $tg['price']; ?></a>
					</li>
                    <?php } ?>					
				</ul>					
			</div>
<?php include_once('view/_footer.php'); ?>