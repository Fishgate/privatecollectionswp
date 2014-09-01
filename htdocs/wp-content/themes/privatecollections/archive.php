<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap cf">

						<div id="main" class="m-main t-main d-main cf" role="main">
                                                    
                                                    <div id="content-measure" class="cf">
                                                        
                                                        <section data-state="closed" class="category-dropdown cf">
                                                            <div>
                                                                <?php if (is_category()) { ?>
                                                                        <h2>
                                                                            <?php single_cat_title(); ?>
                                                                        </h2>

                                                                <?php } elseif (is_tag()) { ?>
                                                                        <h2>
                                                                            <?php single_tag_title(); ?>
                                                                        </h2>

                                                                <?php } elseif (is_author()) {
                                                                        global $post;
                                                                        $author_id = $post->post_author;
                                                                ?>
                                                                        <h2>
                                                                            <span><?php _e( 'Posts By:', 'bonestheme' ); ?></span> <?php the_author_meta('display_name', $author_id); ?>
                                                                        </h2>
                                                                <?php } elseif (is_day()) { ?>
                                                                        <h2>
                                                                            <span><?php _e( 'Daily Archives:', 'bonestheme' ); ?></span> <?php the_time('l, F j, Y'); ?>
                                                                        </h2>

                                                                <?php } elseif (is_month()) { ?>
                                                                        <h2>
                                                                            <span><?php _e( 'Monthly Archives:', 'bonestheme' ); ?></span> <?php the_time('F Y'); ?>
                                                                        </h2>

                                                                <?php } elseif (is_year()) { ?>
                                                                        <h2>
                                                                            <span><?php _e( 'Yearly Archives:', 'bonestheme' ); ?></span> <?php the_time('Y'); ?>
                                                                        </h2>
                                                                <?php } ?>
                                                            </div>
                                                        </section>
							
                                                        <div id="gallery-thumbs" class="m-all t-all d-all cf">
                                                            
                                                                <div id="thumbs-container">
                                                        
                                                                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                                                                    <?php if(has_post_thumbnail()): //if it has no featured image, its not going to work in this layout ?>
                                                                    
                                                                        <div class="m-gall-thumb-1-of-2 t-gall-thumb-1-of-5 d-gall-thumb-1-of-4">
                                                                            <a title="<?php get_the_title(); ?>" href="<?php the_permalink(); ?>">
                                                                                <?php $post_thumb = new post_thumbnail(); ?>
                                                                                
                                                                                <img class="flex" src="<?php echo $post_thumb->get_src(); ?>" alt="<?php echo $post_thumb->get_alt(); ?>" />
                                                                            </a>
                                                                            
                                                                        </div>
                                                                    
                                                                    <?php endif; ?>

                                                                <?php endwhile; ?>

                                                                </div>
                                                            
                                                        </div>

							<?php else : ?>

									<article id="post-not-found" class="hentry cf">
										<header class="article-header">
											<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
										</header>
										<section class="entry-content">
											<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
										</section>
										<footer class="article-footer">
                                                                                        <p><?php _e( 'This is the error message in the archive.php template.', 'bonestheme' ); ?></p>
										</footer>
									</article>

							<?php endif; ?>

                                                     </div>
                                                    
						</div>

				</div>

			</div>

<?php get_footer(); ?>
