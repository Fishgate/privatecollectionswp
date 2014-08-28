<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap cf">

                                        <div id="gallery-images" class="d-img-gallery">
                                            
                                            <section class="slider">
                                                <?php

                                                $gallery = array();

                                                global $nggdb;
                                                $nextg = new $nggdb;

                                                $attached_gallery = get_post_meta( $post->ID, '_pc_attached_gallery', true );
                                                
                                                $gallery_images = $nextg->get_gallery($attached_gallery);

                                                foreach($gallery_images as $image) {                                                            
                                                    $thumburl = content_url('gallery/' . $image->slug . $image->thumbFolder . $image->meta_data['thumbnail']['filename']);

                                                    array_push( $gallery, array($image->imageURL, $thumburl) );
                                                }

                                                ?>

                                                <div class="img-overlay-panel" data-prod-code="awesomeproduct001">
                                                    <div id="slider" class="flexslider">
                                                        <ul class="slides">
                                                            <?php

                                                            foreach($gallery as $images) {                                                                        
                                                                echo '<li><img src="'. $images[0] .'" /></li>';
                                                            }

                                                            ?>
                                                        </ul>
                                                    </div>

                                                    <div class="overlay">
                                                        <p>Pin this piece to your enquiry list.</p>
                                                    </div>
                                                </div>

                                                <div id="carousel" class="flexslider">
                                                    <ul class="slides carousel">
                                                        <?php

                                                        foreach($gallery as $thumbs) {                                                                        
                                                            echo '<li><img src="'. $thumbs[1] .'" /></li>';
                                                        }

                                                        ?>
                                                    </ul>
                                                </div>

                                            </section>
                                            
                                        </div><!-- close #gallery-images -->
                                    
					<div id="main" class="m-main t-main d-main-gallery cf" role="main">

						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                                                        <section data-state="closed" class="category-dropdown cf">
                                                            <div>
                                                                <h2><?php $cat = get_the_category(); echo $cat[0]->name; ?></h2>
                                                            </div>
                                                        </section>
                                            
							<article id="post-<?php the_ID(); ?>" <?php post_class('cf'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
                                                            
                                                            <header class="article-header">

                                                                <h2 class="entry-title single-title" itemprop="headline"><?php the_title(); ?></h2>

                                                                <p class="byline vcard">
                                                                    <?php printf( __( 'Posted <time class="updated" datetime="%1$s" pubdate>%2$s</time> by <span class="author">%3$s</span>', 'bonestheme' ), get_the_time('Y-m-j'), get_the_time(get_option('date_format')), get_the_author_link( get_the_author_meta( 'ID' ) )); ?>
                                                                </p>

                                                            </header> <?php // end article header ?>

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

                                                            <footer class="article-footer">

                                                                <?php printf( __( 'Filed under: %1$s', 'bonestheme' ), get_the_category_list(', ') ); ?>

                                                                <?php the_tags( '<p class="tags"><span class="tags-title">' . __( 'Tags:', 'bonestheme' ) . '</span> ', ', ', '</p>' ); ?>

                                                            </footer> <?php // end article footer ?>

                                                            <?php //comments_template(); ?>

                                                        </article> <?php // end article ?>
                                            
                                                        <div id="gallery-thumbs" class="m-all t-all d-all cf">
                                                            
                                                            <div id="thumbs-container">
                                                                
                                                                <div class="current m-gall-thumb-1-of-2 t-gall-thumb-1-of-5 d-gall-thumb-1-of-4"><a href="#"><img class="flex" src="http://placehold.it/145x145&text=hello" /></a></div>
                                                                <div class="m-gall-thumb-1-of-2 t-gall-thumb-1-of-5 d-gall-thumb-1-of-4"><a href="#"><img class="flex" src="http://placehold.it/145x145&text=hello" /></a></div>
                                                                <div class="m-gall-thumb-1-of-2 t-gall-thumb-1-of-5 d-gall-thumb-1-of-4"><a href="#"><img class="flex" src="http://placehold.it/145x145&text=hello" /></a></div>
                                                                <div class="m-gall-thumb-1-of-2 t-gall-thumb-1-of-5 d-gall-thumb-1-of-4"><a href="#"><img class="flex" src="http://placehold.it/145x145&text=hello" /></a></div>
                                                                <div class="m-gall-thumb-1-of-2 t-gall-thumb-1-of-5 d-gall-thumb-1-of-4"><a href="#"><img class="flex" src="http://placehold.it/145x145&text=hello" /></a></div>
                                                                <div class="m-gall-thumb-1-of-2 t-gall-thumb-1-of-5 d-gall-thumb-1-of-4"><a href="#"><img class="flex" src="http://placehold.it/145x145&text=hello" /></a></div>
                                                                <div class="m-gall-thumb-1-of-2 t-gall-thumb-1-of-5 d-gall-thumb-1-of-4"><a href="#"><img class="flex" src="http://placehold.it/145x145&text=hello" /></a></div>
                                                                <div class="m-gall-thumb-1-of-2 t-gall-thumb-1-of-5 d-gall-thumb-1-of-4"><a href="#"><img class="flex" src="http://placehold.it/145x145&text=hello" /></a></div>
                                                                <div class="m-gall-thumb-1-of-2 t-gall-thumb-1-of-5 d-gall-thumb-1-of-4"><a href="#"><img class="flex" src="http://placehold.it/145x145&text=hello" /></a></div>
                                                                <div class="m-gall-thumb-1-of-2 t-gall-thumb-1-of-5 d-gall-thumb-1-of-4"><a href="#"><img class="flex" src="http://placehold.it/145x145&text=hello" /></a></div>
                                                                <div class="m-gall-thumb-1-of-2 t-gall-thumb-1-of-5 d-gall-thumb-1-of-4"><a href="#"><img class="flex" src="http://placehold.it/145x145&text=hello" /></a></div>
                                                                <div class="m-gall-thumb-1-of-2 t-gall-thumb-1-of-5 d-gall-thumb-1-of-4"><a href="#"><img class="flex" src="http://placehold.it/145x145&text=hello" /></a></div>
                                                                <div class="m-gall-thumb-1-of-2 t-gall-thumb-1-of-5 d-gall-thumb-1-of-4"><a href="#"><img class="flex" src="http://placehold.it/145x145&text=hello" /></a></div>
                                                                <div class="m-gall-thumb-1-of-2 t-gall-thumb-1-of-5 d-gall-thumb-1-of-4"><a href="#"><img class="flex" src="http://placehold.it/145x145&text=hello" /></a></div>
                                                                <div class="m-gall-thumb-1-of-2 t-gall-thumb-1-of-5 d-gall-thumb-1-of-4"><a href="#"><img class="flex" src="http://placehold.it/145x145&text=hello" /></a></div>
                                                                <div class="m-gall-thumb-1-of-2 t-gall-thumb-1-of-5 d-gall-thumb-1-of-4"><a href="#"><img class="flex" src="http://placehold.it/145x145&text=hello" /></a></div>
                                                                <div class="m-gall-thumb-1-of-2 t-gall-thumb-1-of-5 d-gall-thumb-1-of-4"><a href="#"><img class="flex" src="http://placehold.it/145x145&text=hello" /></a></div>
                                                                <div class="m-gall-thumb-1-of-2 t-gall-thumb-1-of-5 d-gall-thumb-1-of-4"><a href="#"><img class="flex" src="http://placehold.it/145x145&text=hello" /></a></div>
                                                                <div class="m-gall-thumb-1-of-2 t-gall-thumb-1-of-5 d-gall-thumb-1-of-4"><a href="#"><img class="flex" src="http://placehold.it/145x145&text=hello" /></a></div>
                                                                <div class="m-gall-thumb-1-of-2 t-gall-thumb-1-of-5 d-gall-thumb-1-of-4"><a href="#"><img class="flex" src="http://placehold.it/145x145&text=hello" /></a></div>
                                                                <div class="m-gall-thumb-1-of-2 t-gall-thumb-1-of-5 d-gall-thumb-1-of-4"><a href="#"><img class="flex" src="http://placehold.it/145x145&text=hello" /></a></div>
                                                                <div class="m-gall-thumb-1-of-2 t-gall-thumb-1-of-5 d-gall-thumb-1-of-4"><a href="#"><img class="flex" src="http://placehold.it/145x145&text=hello" /></a></div>
                                                                <div class="m-gall-thumb-1-of-2 t-gall-thumb-1-of-5 d-gall-thumb-1-of-4"><a href="#"><img class="flex" src="http://placehold.it/145x145&text=hello" /></a></div>
                                                                <div class="m-gall-thumb-1-of-2 t-gall-thumb-1-of-5 d-gall-thumb-1-of-4"><a href="#"><img class="flex" src="http://placehold.it/145x145&text=hello" /></a></div>
                                                                <div class="m-gall-thumb-1-of-2 t-gall-thumb-1-of-5 d-gall-thumb-1-of-4"><a href="#"><img class="flex" src="http://placehold.it/145x145&text=hello" /></a></div>
                                                                <div class="m-gall-thumb-1-of-2 t-gall-thumb-1-of-5 d-gall-thumb-1-of-4"><a href="#"><img class="flex" src="http://placehold.it/145x145&text=hello" /></a></div>
                                                                <div class="m-gall-thumb-1-of-2 t-gall-thumb-1-of-5 d-gall-thumb-1-of-4"><a href="#"><img class="flex" src="http://placehold.it/145x145&text=hello" /></a></div>
                                                                <div class="m-gall-thumb-1-of-2 t-gall-thumb-1-of-5 d-gall-thumb-1-of-4"><a href="#"><img class="flex" src="http://placehold.it/145x145&text=hello" /></a></div>
                                                                <div class="m-gall-thumb-1-of-2 t-gall-thumb-1-of-5 d-gall-thumb-1-of-4"><a href="#"><img class="flex" src="http://placehold.it/145x145&text=hello" /></a></div>
                                                                <div class="m-gall-thumb-1-of-2 t-gall-thumb-1-of-5 d-gall-thumb-1-of-4"><a href="#"><img class="flex" src="http://placehold.it/145x145&text=hello" /></a></div>
                                                                <div class="m-gall-thumb-1-of-2 t-gall-thumb-1-of-5 d-gall-thumb-1-of-4"><a href="#"><img class="flex" src="http://placehold.it/145x145&text=hello" /></a></div>
                                                                <div class="m-gall-thumb-1-of-2 t-gall-thumb-1-of-5 d-gall-thumb-1-of-4"><a href="#"><img class="flex" src="http://placehold.it/145x145&text=hello" /></a></div>
                                                                <div class="m-gall-thumb-1-of-2 t-gall-thumb-1-of-5 d-gall-thumb-1-of-4"><a href="#"><img class="flex" src="http://placehold.it/145x145&text=hello" /></a></div>
                                                                <div class="m-gall-thumb-1-of-2 t-gall-thumb-1-of-5 d-gall-thumb-1-of-4"><a href="#"><img class="flex" src="http://placehold.it/145x145&text=hello" /></a></div>
                                                                <div class="m-gall-thumb-1-of-2 t-gall-thumb-1-of-5 d-gall-thumb-1-of-4"><a href="#"><img class="flex" src="http://placehold.it/145x145&text=hello" /></a></div>
                                                                
                                                            </div>
                                                            
                                                        </div>

						<?php endwhile; ?>

						<?php else : ?>

							<article id="post-not-found" class="hentry cf">
                                                            <header class="article-header">
                                                                <h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
                                                            </header>
                                                            
                                                            <section class="entry-content">
                                                                <p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
                                                            </section>
                                                            
                                                            <footer class="article-footer">
                                                                <p><?php _e( 'This is the error message in the single.php template.', 'bonestheme' ); ?></p>
                                                            </footer>
							</article>

						<?php endif; ?>

					</div>

				</div>

			</div>
                            
                        <div id="bg-dim"></div>

<?php get_footer(); ?>
