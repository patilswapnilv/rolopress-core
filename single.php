<?php get_header(); ?>

		<?php rolopress_before_container(); // Before container hook ?>
		<div id="container">
        <?php rolopress_before_main(); // Before main hook ?>
        <div id="main">
			<?php rolopress_before_info(); // Before info hook ?>
			<div id="info">
<?php the_post(); ?>
 			<h2 class="page-title">
            <?php _e(get_the_term_list( $post->ID, 'type', ' ', ', ', ': ' ));?><?php the_title(); ?>
									rolo_contact-single
            </h2>
					<div id="entry-<?php the_ID(); ?>" class="<?php rolopress_entry_class(); ?>">
					<?php rolopress_before_entry(); // Before entry hook ?>
					<div class="entry-meta">
                    <span class="meta-prep meta-prep-author"><?php _e('Owner: ', 'rolopress'); ?></span>
                    <span class="author"><a href="<?php echo get_author_link( false, $authordata->ID, $authordata->user_nicename ); ?>" title="<?php printf( __( 'View all items by %s', 'rolopress' ), $authordata->display_name ); ?>"><?php the_author(); ?></a></span>
                    <span class="meta-sep"> | </span>
                    <span class="meta-prep meta-prep-entry-date"><?php _e('Last updated: ', 'rolopress'); ?></span>
                    <span class="entry-date"><abbr class="published" title="<?php the_time('Y-m-d\TH:i:sO') ?>"><?php the_time( get_option( 'date_format' ) ); ?></abbr></span>
					</div><!-- .entry-meta -->
					<div class="entry-main group">
						<?php if ( rolo_type_is( 'contact' ) ) rolo_contact_full(get_the_ID());  ?>
						<?php if ( rolo_type_is( 'company' ) ) rolo_company_full(get_the_ID());  ?>
                 	</div><!-- .entry-main -->
					<div class="entry-utility group">
					<?php printf( __( 'This entry has been assigned to %1$s%2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>. Follow any notes here with the <a href="%5$s" title="Comments RSS to %4$s" rel="alternate" type="application/rss+xml">RSS feed for this item</a>.', 'rolopress' ),
                    get_the_category_list(', '),
                    get_the_tag_list( __( ' and tagged ', 'rolopress' ), ', ', '' ),
                    get_permalink(),
                    the_title_attribute('echo=0'),
                    comments_rss() ) ?>
<?php if ( ('open' == $post->comment_status) && ('open' == $post->ping_status) ) : // Comments and trackbacks open ?>
						<?php printf( __( '<a class="comment-link" href="#respond" title="Add a note">Add a note</a> or leave a trackback: <a class="trackback-link" href="%s" title="Trackback URL for your item" rel="trackback">Trackback URL</a>.', 'rolopress' ), get_trackback_url() ) ?><?php elseif ( !('open' == $post->comment_status) && ('open' == $post->ping_status) ) : // Only trackbacks open ?>
						<?php printf( __( 'Notes are closed, but you can leave a trackback: <a class="trackback-link" href="%s" title="Trackback URL for your item" rel="trackback">Trackback URL</a>.', 'rolopress' ), get_trackback_url() ) ?><?php elseif ( ('open' == $post->comment_status) && !('open' == $post->ping_status) ) : // Only notes open ?>
						<?php _e( 'Trackbacks are closed, but you can <a class="comment-link" href="#respond" title="Add a note">Add a note</a>.', 'rolopress' ) ?><?php elseif ( !('open' == $post->comment_status) && !('open' == $post->ping_status) ) : // Comments and trackbacks closed ?>
						<?php _e( 'Both notes and trackbacks are currently closed.', 'rolopress' ) ?><?php endif; ?>
					</div><!-- .entry-utility -->
                    <?php rolopress_after_entry(); // After entry hook ?>
                    </div><!-- #post-<?php the_ID(); ?> -->
<?php comments_template( '/notes.php' ); ?> 
					</div><!-- #info -->
					<?php rolopress_after_info(); // After info hook ?>
					</div><!-- #main -->
                    <?php rolopress_after_main(); // After main hook ?>
					</div><!-- #container -->
                    <?php rolopress_after_container(); // After container hook ?>
<?php get_sidebar(); ?>
	<?php get_footer(); ?>