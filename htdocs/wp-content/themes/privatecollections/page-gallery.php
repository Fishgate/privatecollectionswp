<?php
/*
 Template Name: Gallery
*/
?>

<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap cf">
                                    
						<div id="main" class="m-all t-all d-main cf" role="main">
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
                                                        
                                                                <div id="gallery-thumbs" class="nano m-all t-all d-all cf">
                                                                    <div class="nano-content">
                                                                        <!--<div class="d-gall-thumb-1-of-4"><a href="#"><img src="http://placehold.it/145x145" /></a></div>
                                                                        <div class="d-gall-thumb-1-of-4"><a href="#"><img src="http://placehold.it/145x145" /></a></div>
                                                                        <div class="d-gall-thumb-1-of-4"><a href="#"><img src="http://placehold.it/145x145" /></a></div>
                                                                        <div class="d-gall-thumb-1-of-4"><a href="#"><img src="http://placehold.it/145x145" /></a></div>
                                                                        <div class="d-gall-thumb-1-of-4"><a href="#"><img src="http://placehold.it/145x145" /></a></div>
                                                                        <div class="d-gall-thumb-1-of-4"><a href="#"><img src="http://placehold.it/145x145" /></a></div>
                                                                        <div class="d-gall-thumb-1-of-4"><a href="#"><img src="http://placehold.it/145x145" /></a></div>-->
                                                                        <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque rhoncus commodo metus, eget gravida tortor scelerisque eu. Pellentesque accumsan eleifend velit, eget tincidunt tellus pretium sed. Aliquam lectus ante, vulputate at sollicitudin ut, convallis eget lectus. Aenean viverra, nisi eget dignissim auctor, velit lorem hendrerit justo, eu ultricies ligula ligula sit amet tortor. Aenean lacinia nibh at orci pellentesque, sit amet porta erat convallis. Vivamus mollis neque at velit vehicula eleifend. Sed condimentum erat a magna gravida, ac tincidunt arcu tincidunt. Nunc quis turpis vulputate, mattis nunc id, hendrerit enim. Vivamus sed velit vitae massa semper venenatis in in risus. Mauris vitae est tincidunt, suscipit sem sed, volutpat arcu. Pellentesque sapien tortor, egestas vel dignissim quis, pharetra sed massa. Suspendisse et pretium velit, non pharetra massa. Etiam convallis ultricies ipsum ut placerat.

    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse tempor nunc et rutrum commodo. Sed fringilla ante eros, in porta est eleifend vitae. Aliquam ac justo et augue porta gravida ut vel elit. Donec ut risus erat. Fusce lobortis eu lectus eu volutpat. Nunc in risus eget diam volutpat elementum. Cras convallis euismod molestie. Nam in eleifend elit. In eget placerat dui, vel dictum ante. Cras interdum tortor urna, eget viverra massa facilisis nec. In in urna ligula. Mauris sodales mattis mauris, vel varius risus sollicitudin non. Sed ullamcorper felis ut velit gravida ultricies. Morbi porta volutpat elit, a gravida arcu adipiscing vitae.

    Duis nec massa lacinia, blandit nisi eget, molestie erat. Donec molestie laoreet tincidunt. Quisque pulvinar eros sit amet est placerat, sed elementum ipsum convallis. Suspendisse nisl justo, sagittis rhoncus mauris sed, eleifend sagittis nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla ullamcorper congue eros. Ut et erat lobortis, tincidunt lectus vitae, lacinia leo. Curabitur bibendum ultricies nulla vel ornare.

    Nullam tincidunt massa a tempus pellentesque. Praesent mattis ultrices elit in convallis. Nunc id risus quam. In eget accumsan leo. Duis gravida tincidunt lorem, vel commodo libero aliquam et. Vestibulum eget rhoncus tortor. Cras eget lacinia lectus. Mauris semper neque at velit tincidunt, vitae volutpat lectus semper. Aenean ac magna tristique, fringilla nisi tincidunt, dignissim magna. Integer blandit enim nisi, vitae iaculis magna malesuada non. Nulla vitae erat a nibh pretium auctor. Praesent id volutpat mauris. Etiam mattis nibh et placerat rutrum. In quis elit ut lacus blandit mattis vel sit amet mi. Interdum et malesuada fames ac ante ipsum primis in faucibus.

    In pulvinar porttitor odio a fermentum. Sed eget pellentesque nisi, non lobortis neque. Vivamus convallis tristique dolor ut rutrum. Duis diam purus, consequat at neque vel, tristique sagittis nisl. Nam velit sapien, venenatis vel ante ac, tincidunt molestie diam. Vestibulum consequat velit justo, sit amet porttitor libero tincidunt eget. Morbi tincidunt, tellus ut egestas gravida, urna sem vestibulum nibh, in tincidunt lectus tellus quis ante. Donec et fringilla diam. //END//</div>
                                                                    </div>
                                                                </div>
                                                    
						</div><!-- close #main -->
                                                
                                                <div id="gallery-images" class="m-all t-all d-img">
                                                    <section class="slider">
                                                        
                                                        <div class="img-overlay-panel" data-prod-code="awesomeproduct001">
                                                            <div id="slider" class="flexslider">
                                                                <ul class="slides">
                                                                    <li><img src="<?php echo get_template_directory_uri() ?>/library/images/temp/kitchen_adventurer_cheesecake_brownie.jpg" /></li>
                                                                    <li><img src="<?php echo get_template_directory_uri() ?>/library/images/temp/kitchen_adventurer_lemon.jpg" /></li>
                                                                    <li><img src="<?php echo get_template_directory_uri() ?>/library/images/temp/kitchen_adventurer_donut.jpg" /></li>
                                                                    <li><img src="<?php echo get_template_directory_uri() ?>/library/images/temp/kitchen_adventurer_caramel.jpg" /></li>
                                                                    <li><img src="<?php echo get_template_directory_uri() ?>/library/images/temp/kitchen_adventurer_cheesecake_brownie.jpg" /></li>
                                                                </ul>
                                                            </div>
                                                            
                                                            <div class="overlay">
                                                                <p>Pin this piece to your enquiry list.</p>
                                                            </div>
                                                        </div>

                                                        <div id="carousel" class="flexslider">
                                                            <ul class="slides carousel">
                                                                <li><img src="<?php echo get_template_directory_uri() ?>/library/images/temp/kitchen_adventurer_cheesecake_brownie.jpg" /></li>
                                                                <li><img src="<?php echo get_template_directory_uri() ?>/library/images/temp/kitchen_adventurer_lemon.jpg" /></li>
                                                                <li><img src="<?php echo get_template_directory_uri() ?>/library/images/temp/kitchen_adventurer_donut.jpg" /></li>
                                                                <li><img src="<?php echo get_template_directory_uri() ?>/library/images/temp/kitchen_adventurer_caramel.jpg" /></li>
                                                                <li><img src="<?php echo get_template_directory_uri() ?>/library/images/temp/kitchen_adventurer_cheesecake_brownie.jpg" /></li>
                                                            </ul>
                                                        </div>

                                                    </section>                                                    
                                                </div>
                                
				</div>

			</div>
                        
                        <div id="bg-dim"></div>

<?php get_footer(); ?>
