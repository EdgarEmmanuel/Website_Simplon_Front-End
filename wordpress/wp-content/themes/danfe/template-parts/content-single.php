<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package danfe
 */
global $danfe_theme_options;
        $danfe_single_meta = $danfe_theme_options['danfe-hide-meta'];
         $danfe_single_image = $danfe_theme_options['danfe-hide-image'];
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post-wrapper">
		<!--post thumbnal options-->
		<?php if($danfe_single_image == 1 ){ ?> 
			<div class="post-thumb">
				<a href="<?php the_permalink(); ?>">
				 <?php danfe_post_thumbnail(); ?>
				</a>
			</div><!-- .post-thumb-->
		<?php } ?>

		<div class="post-content-wrapper">
			<div class="post-header">
			    <?php if($danfe_single_meta ==1 ){ ?>
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
				<?php if($danfe_single_meta ==1 ){ ?>
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
				<?php } ?>
				<?php if($danfe_single_meta ==1 ){ ?>
			    <span class="post-category">
			    	<?php
                       $categories = get_the_category();
                       if ( ! empty( $categories ) ) {
                          echo '<a href="'.esc_url( get_category_link( $categories[0]->term_id ) ).'" title="' . esc_html__('Post Single', 'danfe') . '">'.esc_html( $categories[0]->name ).'</a>';
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
					the_content( sprintf(
						/* translators: %s: Name of current post. */
						wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'danfe' ), array( 'span' => array( 'class' => array() ) ) ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					) );

					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'danfe' ),

						'after'  => '</div>',
					) );
				?>
			</div><!-- .entry-content -->
			<div class="post-order">
				<?php
					the_post_navigation( array(
						'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'danfe' ) . '</span> ' .

							'<span class="screen-reader-text">' . __( 'Next post:', 'danfe' ),

						'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'danfe' ) . '</span> ' .

							'<span class="screen-reader-text">' . __( 'Previous post:', 'danfe' ),
					) );
					/**
                     * danfe_related_posts hook
                     * 
                     * @since Danfe 1.0.0
                     * @hooked danfe_related_posts
                     */
	                do_action('danfe_related_posts' ,get_the_ID() );
				?>
			</div>
		</div>
	</div>
</article><!-- #post-## -->