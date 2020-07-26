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
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('boxed'); ?>>
	<div class="post-wrapper">
		<!--post thumbnal options-->
		<div class="post-thumb">
			<a href="<?php the_permalink(); ?>">
			 <?php the_post_thumbnail( 'full' ); ?>
			</a>
		</div><!-- .post-thumb-->

		<div class="post-content-wrapper">
			<div class="post-header">
				    <time>
				    	<?php
							if ( 'post' === get_post_type() ) : ?>
								<div class="entry-meta">
									<?php danfe_posted_on(); ?>
								</div><!-- .entry-meta -->
							<?php
						endif; ?>
				    </time>
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
										  { ?>
										   <a href="<?php echo get_category_link( $danfetag ); ?>"><?php echo $danfetag->name; ?></a>
									    <?php  }
								    }
			                    } ?>
						</p>
					<?php   } ?>
				    </span>
				    <span class="post-category">
				    	<?php
	                       $categories = get_the_category();
	                       if ( ! empty( $categories ) ) {
	                          echo '<a href="'.esc_url( get_category_link( $categories[0]->term_id ) ).'" title="' . esc_html__('Post Format Quote', 'danfe') . '">'.esc_html( $categories[0]->name ).'</a>';
	                      }                                 
	                  ?>
				    </span>
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
				<blockquote class="primary-quote">
					<?php the_excerpt(); ?>
				</blockquote>
			</div><!-- .entry-content -->

			<div class="post-footer">
					<div class="post-footer-right">
						<span><i class="fa fa-commenting-o"></i> <?php echo get_comments_number(); ?> <a href="<?php comments_link(); ?>"><?php echo esc_html__('Comments', 'danfe') ?></a> </span>
					</div>
				<a href="<?php the_permalink(); ?>" class="btn btn-more">
					<?php echo $danfe_read_more; ?> 
				</a>
			</div>
		</div>
	</div>
</article><!-- #post-## -->
