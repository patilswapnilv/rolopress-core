
<?php get_header(); ?>
	
		<?php rolopress_before_container(); // Before container hook ?>
		<div id="container">	
			<?php rolopress_before_main(); // Before main hook ?>
			<div id="main">
            
			
<?php the_post(); ?>			
			
				
<?php rewind_posts(); ?>
			
<?php global $wp_query; $total_pages = $wp_query->max_num_pages; if ( $total_pages > 1 ) { ?>
				<div id="nav-above" class="navigation">
					<div class="nav-next"><?php next_posts_link(__( 'Next <span class="meta-nav">&raquo;</span>', 'rolopress' )) ?></div>
					<div class="nav-previous"><?php previous_posts_link(__( '<span class="meta-nav">&laquo;</span> Previous', 'rolopress' )) ?></div>
				</div><!-- #nav-above -->
<?php } ?>			

			<?php rolopress_before_info(); // Before info hook ?>
			<div id="info">		
            
                <h2 class="page-title">
                    <?php $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); echo $term->name; echo " List"; ?>	
                </h2>
				
				<ul class="item-list">

<?php while ( have_posts() ) : the_post(); ?>

				<li id="post-<?php the_ID(); ?>" class="<?php rolopress_entry_class(); ?> menu">
					<?php rolopress_before_entry(); // Before entry hook ?>            

					<div class="entry-main group">
                        rolo_contact-tax-type-contact <?php rolo_contact_summary(get_the_ID()); ?>
					</div><!-- .entry-main -->

					<div class="entry-meta">
						<span class="meta-prep meta-prep-author"><?php _e('By ', 'rolopress'); ?></span>
						<span class="author"><a href="<?php echo get_author_link( false, $authordata->ID, $authordata->user_nicename ); ?>" title="<?php printf( __( 'View all posts by %s', 'rolopress' ), $authordata->display_name ); ?>"><?php the_author(); ?></a></span>
						<span class="meta-sep"> | </span>
						<span class="meta-prep meta-prep-entry-date"><?php _e('Published ', 'rolopress'); ?></span>
						<span class="entry-date"><abbr class="published" title="<?php the_time('Y-m-d\TH:i:sO') ?>"><?php the_time( get_option( 'date_format' ) ); ?></abbr></span>
						<?php edit_post_link( __( 'Edit', 'rolopress' ), "<span class=\"meta-sep\">|</span>\n\t\t\t\t\t\t<span class=\"edit-link\">", "</span>\n\t\t\t\t\t" ) ?>
					</div><!-- .entry-meta -->
                    
                    <div class="entry-summary">	
<?php the_excerpt( __( 'Continue reading <span class="meta-nav">&raquo;</span>', 'rolopress' )  ); ?>
					</div><!-- .entry-summary -->
					
					<div class="entry-utility">
<?php if ( $cats_meow = cats_meow(', ') ) : // Returns categories other than the one queried ?>
						<span class="cat-links"><?php printf( __( 'Also assigned to %s', 'rolopress' ), $cats_meow ) ?></span>
						<span class="meta-sep"> | </span>
<?php endif ?>
						<?php the_tags( '<span class="tag-links"><span class="entry-utility-prep entry-utility-prep-tag-links">' . __('Tagged ', 'rolopress' ) . '</span>', ", ", "</span>\n\t\t\t\t\t\t<span class=\"meta-sep\">|</span>\n" ) ?>
						<span class="notes-link"><?php comments_popup_link( __( 'Write a Note', 'rolopress' ), __( '1 Note', 'rolopress' ), __( '% Notes', 'rolopress' ) ) ?></span>
						<?php edit_post_link( __( 'Edit', 'rolopress' ), "<span class=\"meta-sep\">|</span>\n\t\t\t\t\t\t<span class=\"edit-link\">", "</span>\n\t\t\t\t\t\n" ) ?>
					</div><!-- #entry-utility -->	
     			<?php rolopress_after_entry(); // After entry hook ?>
				</li><!-- #post-<?php the_ID(); ?> -->

<?php endwhile; ?>		
			
				</ul><!-- item-list-->


			</div><!-- #info -->		
			<?php rolopress_after_info(); // After info hook ?>		

<?php global $wp_query; $total_pages = $wp_query->max_num_pages; if ( $total_pages > 1 ) { ?>
				<div id="nav-below" class="navigation">
					<div class="nav-next"><?php next_posts_link(__( 'Next <span class="meta-nav">&raquo;</span>', 'rolopress' )) ?></div>
					<div class="nav-previous"><?php previous_posts_link(__( '<span class="meta-nav">&laquo;</span> Previous', 'rolopress' )) ?></div>
				</div><!-- #nav-below -->
<?php } ?>			
			
			</div><!-- #main -->		
			<?php rolopress_after_main(); // After main hook ?>
		</div><!-- #container -->
		<?php rolopress_after_container(); // After container hook ?>
		
<?php get_sidebar(); ?>	
<?php get_footer(); ?>