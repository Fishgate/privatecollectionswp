<?php
/*
 Template Name: Home Page
*/
?>

<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap cf">

						<div id="main" class="m-main t-main d-main cf" role="main">
                                                        <div id="content-measure" class="cf">
                                                                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                                                                    <article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

                                                                            <section class="entry-content cf" itemprop="articleBody">
                                                                                    <?php
                                                                                            // the content (pretty self explanatory huh)
                                                                                            the_content();

                                                                                            /*
                                                                                             * Link Pages is used in case you have posts that are set to break into
                                                                                             * multiple pages. You can remove this if you don't plan on doing that.
                                                                                             *
                                                                                             * Also, breaking content up into multiple pages is a horrible experience,
                                                                                             * so don't do it. While there are SOME edge cases where this is useful, it's
                                                                                             * mostly used for people to get more ad views. It's up to you but if you want
                                                                                             * to do it, you're wrong and I hate you. (Ok, I still love you but just not as much)
                                                                                             *
                                                                                             * http://gizmodo.com/5841121/google-wants-to-help-you-avoid-stupid-annoying-multiple-page-articles
                                                                                             *
                                                                                            */
                                                                                            wp_link_pages( array(
                                                                                                    'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'bonestheme' ) . '</span>',
                                                                                                    'after'       => '</div>',
                                                                                                    'link_before' => '<span>',
                                                                                                    'link_after'  => '</span>',
                                                                                            ) );
                                                                                    ?>
                                                                            </section> <?php // end article section ?>

                                                                            <?php comments_template(); ?>

                                                                    </article>

                                                                    <?php endwhile; else : ?>

                                                                                    <article id="post-not-found" class="hentry cf">
                                                                                            <header class="article-header">
                                                                                                    <h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
                                                                                            </header>
                                                                                            <section class="entry-content">
                                                                                                    <p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
                                                                                            </section>
                                                                                            <footer class="article-footer">
                                                                                                    <p><?php _e( 'This is the error message in the page.php template.', 'bonestheme' ); ?></p>
                                                                                            </footer>
                                                                                    </article>

                                                                    <?php endif; ?>


                                                                    <div class="m-all t-all d-all cf">

                                                                            <div class="feature feature-m-1of1 feature-t-1of2 feature-d-1of2">
                                                                                <div><img class="flex" src="http://placehold.it/295x200&text=hello" alt="http://placehold.it/295x200" /></div>
                                                                                <h2>New Collection</h2>
                                                                                <p class="date-stamp">00-00-0000</p>
                                                                            </div>

                                                                            <div class="feature feature-m-1of1 feature-t-1of2 feature-d-1of2 last"> <?php //.last on every 2th iteration ?>
                                                                                <div><img class="flex" src="http://placehold.it/295x200&text=hello" alt="http://placehold.it/295x200" /></div>
                                                                                <h2>Latest Piece</h2>
                                                                                <p class="date-stamp">00-00-0000</p>
                                                                            </div>

                                                                    </div>

                                                                    <div id="album-features-thumbs" class="m-all t-all d-all cf">

                                                                            <?php
                                                                            
                                                                            $categories = get_categories('exclude=1,8');
                                                                            
                                                                            foreach($categories as $category) {
                                                                                ?>
                                                                        
                                                                                <div class="album-feature album-m-1of2 album-t-1of5 album-d-1of5">
                                                                                    <a href="<?php echo get_category_link($category->term_id); ?>">
                                                                                    <p><?php echo $category->name; ?></p>
                                                                                    </a>
                                                                                </div>
                                                                        
                                                                                <?php
                                                                            }
                                                                            
                                                                            ?>
                                                                        
                                                                    </div>
                                                        </div>
						</div>
                                    
				</div>

			</div>

<?php get_footer(); ?>