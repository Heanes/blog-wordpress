<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<section class="content">
		<span class="new-ico" style="z-index: 9;">图 片</span>
		<div class="entry-content-img">
			<figure class="image-format">
				<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>" ><?php all_img($post->post_content);?></a>
			</figure>
			<div class="clear"></div>
		</div>
	</section>
</article>