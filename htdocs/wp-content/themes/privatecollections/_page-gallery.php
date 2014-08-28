<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap cf">     
                                                
                                                <div id="gallery-images" class="d-img-gallery">
                                                    <section class="slider">
                                                        <?php
                                                        
                                                        $gallery = array();
                                                        
                                                        global $nggdb;
                                                        $nextg = new $nggdb;
                                                        
                                                        $gallery_images = $nextg->get_gallery(2);
                                                        
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
                                                            <section data-state="closed" class="category-dropdown cf">
                                                                <div>
                                                                    <h2>Architectural Pieces&nbsp;&nbsp;&nbsp;<i class="fa fa-angle-down"></i></h2>
                                                                    <ul class="invisible">
                                                                        <a href=""><li>Architectural Pieces</li></a>
                                                                        <a href=""><li>Furniture</li></a>
                                                                        <a href=""><li>Decorative Pieces</li></a>
                                                                        <a href=""><li>Lighting</li></a>
                                                                        <a href=""><li>New Hand Made Items</li></a>
                                                                    </ul>
                                                                </div>
                                                            </section>

                                                            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                                                                <?php if($post->post_content !== "") : ?>

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

                                                                <?php endif; ?>

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
                                                    
						</div><!-- close #main -->
                                                
                                
				</div>

			</div>
                        
                        <div id="bg-dim"></div>

<?php get_footer(); ?>
