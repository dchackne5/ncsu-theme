<?php
/**
 * The template for displaying 404 pages (Not Found)
 */

get_header() ?>
<?php get_sidebar() ?>

<section id="content" role="main">
	<h6 class="screen-reader-text">Content</h6>

			<div id="post-0" class="post error404 not-found">
				<h2 class="entry-title"><?php _e( 'Not Found', 'sandbox' ) ?></h2>
				<div class="entry-content">
					<p><?php _e( 'Apologies, but we were unable to find what you were looking for. Perhaps  searching will help.', 'sandbox' ) ?></p>
				</div>
				<form id="searchform-404" class="blog-search" method="get" action="<?php bloginfo('home') ?>">
					<div>
						<input id="s-404" name="s" class="text" type="text" value="<?php the_search_query() ?>" size="40" />
						<input class="button" type="submit" value="<?php _e( 'Find', 'sandbox' ) ?>" />
					</div>
				</form>
			</div><!-- .post -->

            </section>
            <!-- end #content -->
                 
<?php get_sidebar('right') ?>                                      
<?php get_footer() ?>