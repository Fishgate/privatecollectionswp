<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap cf">

                                        <div id="gallery-images" class="d-img-gallery">
                                            
                                        <?php pc_gallery_render($post); ?>
                                            
                                        </div><!-- close #gallery-images -->
                                    
					<div id="main" class="m-main t-main d-main-gallery cf" role="main">

						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                                                        <?php $this_post_id = get_the_ID(); ?>
                                            
                                                        <section data-state="closed" class="category-dropdown cf">
                                                            <div>
                                                                <h2>
                                                                    <?php
                                                                    
                                                                    $category = get_the_category(); 

                                                                    foreach($category as $cat) {
                                                                        if($cat->name !== 'New Collection'){
                                                                            echo $cat->name;
                                                                            $this_cat_term_id = $cat->term_id;
                                                                            break;
                                                                        }
                                                                    }
                                                                    
                                                                    ?>
                                                                </h2>
                                                            </div>
                                                        </section>
                                            
                                                        <?php if($post->post_content != "") : //do not display any post details (title, footer, other meta) if the post is empty ?>
                                            
                                                                <article id="post-<?php the_ID(); ?>" <?php post_class('cf'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

                                                                    <header class="article-header">

                                                                        <h2 class="entry-title single-title" itemprop="headline"><?php the_title(); ?></h2>

                                                                        <p class="byline vcard">
                                                                            <?php printf( __( 'Posted <time class="updated" datetime="%1$s" pubdate>%2$s</time> by <span class="author">%3$s</span>', 'bonestheme' ), get_the_time('Y-m-j'), get_the_time(get_option('date_format')), get_the_author_link( get_the_author_meta( 'ID' ) )); ?>
                                                                        </p>

                                                                    </header> <!--end article header-->

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
                                                                    </section> <!--end article section-->

                                                                    <footer class="article-footer">

                                                                        <?php printf( __( 'Filed under: %1$s', 'bonestheme' ), get_the_category_list(', ') ); ?>

                                                                        <?php the_tags( '<p class="tags"><span class="tags-title">' . __( 'Tags:', 'bonestheme' ) . '</span> ', ', ', '</p>' ); ?>

                                                                    </footer> <!--end article footer-->

                                                                    <?php //comments_template(); ?>

                                                                </article> <!--end article-->
                                            
                                                        <?php endif; ?>
                                            
                                                        <div id="gallery-thumbs" class="m-all t-all d-all cf">
                                                            
                                                            <div id="thumbs-container">
                                                                
                                                                <?php
                                                                
                                                                $related_posts = new WP_Query(array('cat' => $this_cat_term_id));
                                                                
                                                                $post_thumb = new post_thumbnail();
                                                                
                                                                if($related_posts->have_posts()) :
                                                                    while($related_posts->have_posts()) :
                                                                        $related_posts->the_post();
                                                                        
                                                                        if($this_post_id !== get_the_ID()) {
                                                                            echo '<div class="m-gall-thumb-1-of-2 t-gall-thumb-1-of-5 d-gall-thumb-1-of-4"><a href="'.get_permalink(get_the_ID()).'"><img class="flex" src="'.$post_thumb->get_src().'" /></a></div>';
                                                                        }else{
                                                                            echo '<div class="current m-gall-thumb-1-of-2 t-gall-thumb-1-of-5 d-gall-thumb-1-of-4"><a href="'.get_permalink(get_the_ID()).'"><img class="flex" src="'.$post_thumb->get_src().'" /></a></div>';
                                                                        }
                                                                    endwhile;
                                                                endif;
                                                                
                                                                wp_reset_query();
                                                                
                                                                ?>
                                                                
                                                                <!--<div class="current m-gall-thumb-1-of-2 t-gall-thumb-1-of-5 d-gall-thumb-1-of-4"><a href="#"><img class="flex" src="http://placehold.it/145x145&text=hello" /></a></div>
                                                                
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
                                                                <div class="m-gall-thumb-1-of-2 t-gall-thumb-1-of-5 d-gall-thumb-1-of-4"><a href="#"><img class="flex" src="http://placehold.it/145x145&text=hello" /></a></div>-->
                                                                
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
