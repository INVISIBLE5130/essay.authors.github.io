<?php
$fcomments = json_decode(file_get_contents('cache/fcomments.json'));

function ashuffle (&$arr) {
    uasort($arr, function ($a, $b) {
        return rand(-1, 1);
    });
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>slider</title>
	<link href="https://fonts.googleapis.com/css2?family=Lato:wght@100;300;400;700;900&family=Raleway:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
	<link media="all" rel="stylesheet" href="css/main.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" defer></script>
	<script>window.jQuery || document.write('<script src="js/jquery-3.3.1.min.js" defer><\/script>')</script>
	<script src="js/jquery.main.js" defer></script>
</head>
<body>
	<div id="wrapper">
		<div class="testimonial-section" style="background-image: url(images/section-bg.png);">
			<div class="container">
				<div class="heading-block">
					<div class="heading-area">
						<h2> Need a custom essay?</h2>
						<span class="text">We will write it for you.</span>
						<a target=_top href="/order" class="testimonial-btn">Order now</a>
					</div>
				</div>
				<div class="testimonial-slider">
					<?php
					$t = 1;
					$aarr_fcomments = (array)$fcomments;
					ashuffle($aarr_fcomments);
					foreach ($aarr_fcomments as $item)
					{
					?>
					<div class="slide">
						<div class="testimonial-block">
							<div class="cite-holder">
								<span class="author-image">
									<img src="<?=(((count($item->picture_image)>0))?"data:image/webp;base64,".($item->picture_image[0]->data):"/images/image02.png")?>" alt="image-description">
								</span>
								<div class="rating-info-area">
									<div class="rating-info">
										<span class="rating-text"><?=$item->score?>/10</span>
										<ul class="rating-list">
											<?php for ($i=1;$i<=10;$i++) { ?>
											<li <?=($item->score>=$i?'class="active"':"")?>></li>
											<?php } ?>
										</ul>
										<span class="time"><?=rand(2,36)?> hours ago</span>
									</div>
									<strong class="name"><?=$item->name?></strong>
								</div>
							</div>
							<span class="quote"><?=$item->comment?></span>
							<div class="info-text">
								<strong class="info-title"><?=$item->sign?></strong>
								<p> The best students essay writing service from east to west!</p>
							</div>
						</div>
					</div>
					<?php $t++; } ?>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
