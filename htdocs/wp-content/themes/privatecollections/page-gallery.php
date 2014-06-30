<?php
/*
 Template Name: Gallery
*/
?>

<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap cf">
                                    
						<div id="main" class="m-all t-all d-main cf" role="main">

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

						</div><!-- close #main -->
                                                
                                                <div id="gallery-images" class="m-all t-all d-img">
                                                    
                                                        <div class="img-overlay-panel">
                                                            <img class="gallery-image flex flex-square" src="<?php echo get_template_directory_uri() ?>/library/images/temp/_T3V9535.jpg" />
                                                            
                                                            <div class="overlay">
                                                                <p>Pin this piece to your enquiry list.</p>
                                                            </div>
                                                       </div>
                                                    
                                                </div>
                                                
                                                <div id="gallery-nav" class="m-all t-all d-gallerynav">
                                                    
                                                    <ul>
                                                        <li class="gallery-thumb current-img" data-img-id="_T3V9535.jpg">
                                                            <div class="img-overlay-panel" />
                                                                <img class="flex" src="http://placehold.it/109x109" />
                                                                
                                                                <div class="overlay hidden" />
                                                                    <img src="<?php echo get_template_directory_uri() ?>/library/images/ui/preload.gif" />
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="gallery-thumb" data-img-id="_T3V9536.jpg">
                                                            <div class="img-overlay-panel" />
                                                                <img class="flex" src="http://placehold.it/109x109" />
                                                                
                                                                <div class="overlay hidden" />
                                                                    <img src="<?php echo get_template_directory_uri() ?>/library/images/ui/preload.gif" />
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="gallery-thumb" data-img-id="_T3V9537.jpg">
                                                            <div class="img-overlay-panel" />
                                                                <img class="flex" src="http://placehold.it/109x109" />
                                                                <div class="overlay hidden" />
                                                                    <img src="<?php echo get_template_directory_uri() ?>/library/images/ui/preload.gif" />
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    
                                                </div>
                                    
				</div>

			</div>
                        
                        <div id="bg-dim"></div>

<?php get_footer(); ?>
