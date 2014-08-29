<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap cf">

						<div id="main" class="m-main t-main d-main cf" role="main">
                                                    
                                                    <div id="content-measure" class="cf">
                                                        
                                                        <section data-state="closed" class="category-dropdown cf">
                                                            <div>
                                                                <h2>Gallery</h2>
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
                                                                                        <p><?php _e( 'This is the error message in the index.php template.', 'bonestheme' ); ?></p>
										</footer>
									</article>

							<?php endif; ?>

                                                    </div>
                                                    
						</div>
                                                    
				</div>

			</div>

                        <!--<div id="bg-dim"></div>-->
                        
<?php get_footer(); ?>
