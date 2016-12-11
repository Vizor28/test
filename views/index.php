<?require 'header.php';?>
	
	<div class="container">
		<div class="row">
			<?foreach($categories as $category){?>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="h2"><?=$category["category"]["name"]?> - <a href="/<?=$category["category"]["alias"]?>/">link</a></div>
			</div>
			<?if(!empty($category["children"])){?>
				<?foreach($category["children"] as $children){?>
				<div class="col-lg-offset-1 col-lg-11 col-md-offset-1 col-md-11 col-sm-12 col-xs-12">
					<div class="h3"><?=$children["name"]?> - <a href="/<?=$category["category"]["alias"]?>/<?=$children["alias"]?>/">link</a></div>
				</div>
				<?}?>
			<?}?>
			
			<?}?>
		</div>
	</div>
	
<?require 'footer.php';?>