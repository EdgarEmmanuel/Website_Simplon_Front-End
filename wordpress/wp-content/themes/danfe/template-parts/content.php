<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package danfe
 */
 global $danfe_theme_options;
  $danfe_read_more = esc_html( $danfe_theme_options['danfe-read-more-text'] );
  $danfe_blog_meta = $danfe_theme_options['danfe-blog-hide-meta'];
  $danfe_show_content = $danfe_theme_options['danfe-show-content'];
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('boxed'); ?>>
	<div class="post-wrapper">
		<!--post thumbnal options-->
		<div class="post-thumb">
			<a href="<?php the_permalink(); ?>">
			 <?php danfe_post_thumbnail(); ?>
			</a>
		</div><!-- .post-thumb-->

		<div class="post-content-wrapper">
			<div class="post-header">
				    <?php if($danfe_blog_meta ==1 ){ ?>
					    <time>
					    	<?php
								if ( 'post' === get_post_type() ) : ?>
									<div class="entry-meta">
										<?php danfe_posted_on(); ?>
									</div><!-- .entry-meta -->
								<?php
							endif; ?>
					    </time>
					<?php } ?>
					<?php if($danfe_blog_meta ==1 ){ ?>
				    <span class="post-tag">
						<?php $posttags = get_the_tags();

						if( !empty( $posttags ))
						{
						?>
							<p>
								<?php
									$count = 0;
									if ( $posttags ) 
									{
									  foreach( $posttags as $danfetag )
									   {
											$count++;
											if ( 1 == $count )
											  {
											   echo $danfetag->name;
										      }
									    }
				                    } ?>
							</p>
					<?php } ?>
				    </span>
				<?php } ?>
				<?php if($danfe_blog_meta ==1 ){ ?>
				    <span class="post-category">
				    	<?php
	                       $categories = get_the_category();
	                       if ( ! empty( $categories ) ) {
	                          echo '<a href="'.esc_url( get_category_link( $categories[0]->term_id ) ).'" title="' . esc_html__('Post Category', 'danfe') . '">'.esc_html( $categories[0]->name ).'</a>';
	                      }                                 
	                  ?>
				    </span>
				<?php } ?>
			</div>
			<div class="post-title">
				<?php
				if ( is_single() ) :
					the_title( '<h1 class="entry-title">', '</h1>' );
				else :
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif; ?>
			</div><!-- .entry-header -->


			<div class="post-content">
			<?php 
					if (is_singular()) :
	                the_content();
	            else :
	                if ( $danfe_show_content == 'excerpt' ) {
	                    the_excerpt();
	                } else {
	                    the_content();
	                }
	            endif;
            ?>
			</div><!-- .entry-content -->

			<div class="post-footer">
				<?php if($danfe_blog_meta ==1 ){ ?>
					<div class="post-footer-right">
						<span><i class="fa fa-commenting-o"></i> <?php echo get_comments_number(); ?> <a href="<?php comments_link(); ?>"><?php echo esc_html__('Comments', 'danfe') ?></a> </span>
					</div>
				<?php } ?>
				<a href="<?php the_permalink(); ?>" class="btn btn-more">
					<?php echo $danfe_read_more; ?> 
				</a>
			</div>
		</div>
	</div>
</article><!-- #post-## -->
