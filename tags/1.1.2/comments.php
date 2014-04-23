<?php 
if(post_password_required()) : ?>
<p><?php _e("This article is password protected", "cwp");?></p>
<?php return; endif; ?>
<section id="comments-section" class="article-section">
	<div class="sec-top">
		<h2><i class="icon-comments"></i> <?php comments_number(__('No Comments','cwp'), __('One Comment','cwp'), __('% Comments','cwp')); ?></h2>
	</div><!-- end .sec-top -->

<?php if(have_comments()): ?>



	<div class="comments-wrap">
		<ul class="comment-list">
			<?php wp_list_comments('callback=cwp_comments'); ?>
		</ul><!-- end .comment-list -->

		<!-- Comments Nav! -->
		<?php if(get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
			<div class="older-comments"><?php previous_comments_link(_e('Older Comments','cwp')); ?></div>
			<div class="newer-comments"><?php next_comments_link(_e('Newer Comments','cwp')); ?></div>
			<div class="clearfix"></div>
		<?php endif; ?>
		<!-- Comments Nav -->
	</div><!-- end .comments-wrap -->

<?php elseif (!comments_open() && !is_page() && post_type_supports(get_post_type(), 'comments')) : ?>
	<p><?php _e("Comments are closed.", "cwp"); ?></p>
<?php endif; ?> 

<?php get_template_part('comment-form'); ?>
</section><!-- end #comments-section -->
	
							

