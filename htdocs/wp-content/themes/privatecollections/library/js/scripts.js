/*
 * Bones Scripts File
 * Author: Eddie Machado
 *
 * This file should contain any js scripts you want to add to the site.
 * Instead of calling it in the header or throwing it inside wp_head()
 * this file will be called automatically in the footer so as not to
 * slow the page load.
 *
 * There are a lot of example functions and tools in here. If you don't
 * need any of it, just remove it. They are meant to be helpers and are
 * not required. It's your world baby, you can do whatever you want.
*/


/*
 * Get Viewport Dimensions
 * returns object with viewport dimensions to match css in width and height properties
 * ( source: http://andylangton.co.uk/blog/development/get-viewport-size-width-and-height-javascript )
*/
function updateViewportDimensions() {
	var w=window,d=document,e=d.documentElement,g=d.getElementsByTagName('body')[0],x=w.innerWidth||e.clientWidth||g.clientWidth,y=w.innerHeight||e.clientHeight||g.clientHeight;
	return { width:x,height:y }
}
// setting the viewport width
var viewport = updateViewportDimensions();


/*
 * Throttle Resize-triggered Events
 * Wrap your actions in this function to throttle the frequency of firing them off, for better performance, esp. on mobile.
 * ( source: http://stackoverflow.com/questions/2854407/javascript-jquery-window-resize-how-to-fire-after-the-resize-is-completed )
*/
var waitForFinalEvent = (function () {
	var timers = {};
	return function (callback, ms, uniqueId) {
		if (!uniqueId) { uniqueId = "Don't call this twice without a uniqueId"; }
		if (timers[uniqueId]) { clearTimeout (timers[uniqueId]); }
		timers[uniqueId] = setTimeout(callback, ms);
	};
})();

// how long to wait before deciding the resize has stopped, in ms. Around 50-100 should work ok.
var timeToWaitForLast = 100;


/*
 * Here's an example so you can see how we're using the above function
 *
 * This is commented out so it won't work, but you can copy it and
 * remove the comments.
 *
 *
 *
 * If we want to only do it on a certain page, we can setup checks so we do it
 * as efficient as possible.
 *
 * if( typeof is_home === "undefined" ) var is_home = $('body').hasClass('home');
 *
 * This once checks to see if you're on the home page based on the body class
 * We can then use that check to perform actions on the home page only
 *
 * When the window is resized, we perform this function
 * $(window).resize(function () {
 *
 *    // if we're on the home page, we wait the set amount (in function above) then fire the function
 *    if( is_home ) { waitForFinalEvent( function() {
 *
 *      // if we're above or equal to 768 fire this off
 *      if( viewport.width >= 768 ) {
 *        console.log('On home page and window sized to 768 width or more.');
 *      } else {
 *        // otherwise, let's do this instead
 *        console.log('Not on home page, or window sized to less than 768.');
 *      }
 *
 *    }, timeToWaitForLast, "your-function-identifier-string"); }
 * });
 *
 * Pretty cool huh? You can create functions like this to conditionally load
 * content and other stuff dependent on the viewport.
 * Remember that mobile devices and javascript aren't the best of friends.
 * Keep it light and always make sure the larger viewports are doing the heavy lifting.
 *
*/

/*
 * We're going to swap out the gravatars.
 * In the functions.php file, you can see we're not loading the gravatar
 * images on mobile to save bandwidth. Once we hit an acceptable viewport
 * then we can swap out those images since they are located in a data attribute.
*/
function loadGravatars() {
  // set the viewport using the function above
  viewport = updateViewportDimensions();
  // if the viewport is tablet or larger, we load in the gravatars
  if (viewport.width >= 768) {
  jQuery('.comment img[data-gravatar]').each(function(){
    jQuery(this).attr('src',jQuery(this).attr('data-gravatar'));
  });
	}
} // end function

/*
* Kyle's functions
 */


/*
 * Put all your regular jQuery in here.
*/
jQuery(document).ready(function($) {

  /*
   * Let's fire off the gravatar function
   * You can remove this if you don't need it
  */
  loadGravatars();
  
  // initiate flowtype.js for to scale text instead of wrapping (sigh designers) in the album blocks
   $('.album-feature .img-overlay-panel .overlay p').flowtype({
      minimum   : 74,
      maximum   : 95,
      fontRatio : 9
  });
  
  /*=============================================================
   * 
   *          Supersized full screen background slideshow    
   * 
   =============================================================*/
  viewport = updateViewportDimensions();
  
  var bg_slideshow_data = $.parseJSON(site_data.bg_slideshow);
  
  if (viewport.width >= 768) {
    $.supersized({
        slide_interval : 10000,     // Length between transitions
        transition : 1,             // 0-None, 1-Fade, 2-Slide Top, 3-Slide Right, 4-Slide Bottom, 5-Slide Left, 6-Carousel Right, 7-Carousel Left
        transition_speed : 1000,    // Speed of transition
        slides : bg_slideshow_data
    });
  }
  
  /*=============================================================
   * 
   *                  Gallery image control
   * 
   =============================================================*/
  
  // overlay toggle ============================================
  $('#gallery-images').bind({
      mouseenter: function(){
          $(this).find('.overlay').stop().fadeIn();
          
      },
      mouseleave: function(){
          $(this).find('.overlay').stop().fadeOut();
      }
  });
   
  // does a bunch of scaling, spacing, and resizing on the gallery  ==========================================
  function align_gallery() {
      // get the current viewport dimensions
      viewport = updateViewportDimensions();
      
      // max width of the gallery should be the entire width of its containing div
      gallery_width = $('#gallery-images').width();
      // mad height of the gallery is a deficiet of the available height of the viewport
      gallery_height = viewport.height - ($('#inner-header').height() + 80); //accomodate for the space taken up by the header with some additional padding
      
      // this should only happen for desktop, the mobile views will be much more simplified
      if(viewport.width >= 1030){
        /* setting max width and height to constrain the image proprtionaly to a defined area only works in IE and firefox if they are set as explicit pixel values
        * it would be ideal to just set this as percentage values in the css but only chrome understands that, so we resort to js to calculate pseudo-percentages
        */
        $('#gallery-images .img-overlay-panel .gallery-image').css({
            'max-width': gallery_width,
            'max-height': gallery_height
            /*,'min-height': 500
             * 
             * this stops the portrait images from scaling too far but it just messes up the landscape images proprtional scaling.
             * this is getting far too bloated so for now im going to leave them scaling verticaly until they arent visible anymore...
             */
        });
      }else{
          // remove the inline styles so the css can take over for the mobile versions
          $('#gallery-images .img-overlay-panel .gallery-image').removeAttr('style');
      }
      
      // get the current dimensions of the image in the gallery (after all of the fluid css and js)
      image_width = $('#gallery-images .img-overlay-panel .gallery-image').width();
      image_height = $('#gallery-images .img-overlay-panel .gallery-image').height();
      
      //adjust the width of the overlay to match the image
      $('#gallery-images .img-overlay-panel .overlay').css({width: image_width});
            
      // position the overly text horizontally centered
      $('#gallery-images .img-overlay-panel .overlay p').css({ 'margin-top': image_height/2 });
      
  }
  
  //once on page load ============================================
  if($('#gallery-images').length > 0){
      align_gallery(); 
  }
  
  /*=============================================================
   * 
   *                  Gallery image switching
   * 
   =============================================================*/
  
  $('.gallery-thumb').each(function(){
      $(this).click(function(){
          this_btn = $(this);
          
          // only load new image, cant click the image already displayed
          if(!this_btn.hasClass('current-img')){
                // show the preloader over the selected image
                this_btn.find('.overlay').removeClass('hidden');

                // get the image name from data attribute of menu item
                image_name = $(this).data('img-id');
                
                // construct the full file path using a few variables
                image_path = site_data.template_dir + '/library/images/temp/' + image_name.toString();

                // change the src attribute of the image to the new selected image (first image of set will be loaded by default)
                $('img.gallery-image').attr('src', image_path).load(function(){
                    /**
                     * use jquery.load() to delay the swapping of the image src until the new resource is ready
                     */
                    
                    // re-align the gallery image overlay text
                    align_gallery();
                    
                    // hide the preloader overlay
                    this_btn.find('.overlay').addClass('hidden');
                    
                    // remove .current-img from all menu items
                    $('.gallery-thumb').removeClass('current-img');
                    
                    // set this menu item as the new current-img
                    this_btn.addClass('current-img');
                });          
          }
      });
  });
  
  /*=============================================================
   * 
   *                  Gallery nav control
   * 
   =============================================================*/
    
  function scroll_down_limit () {
      // the total amount of children elements in the list minus the 3 default visible items.
      total_list_items = $('#gallery-nav .list-holder ul').children().length - 3;
      
      // the amount of y-pos each list item occupies
      spacing_per_item = 123;
      
      scroll_position_limit = (total_list_items * spacing_per_item) * -1; // flip to a negative integer
     
      return scroll_position_limit;
  }
  
  function scrolldown () {
      currentpos = $('#gallery-nav .list-holder ul').position();
      currentpos_top = Math.round(currentpos.top); // jquery is sometimes off by a fraction in IE and Firefox, this makes sure we always hit the whole numbers we are conditionaly checking for
      
      if(currentpos_top !== scroll_down_limit()){
        $(this).unbind('click');

        $('#gallery-nav .list-holder ul').finish().animate({
            top: '-=123'
        }, 300, 'swing', function() {
             // rebind itself in the callback of the animation. prevents funky spam clicking bugs
             $('#gallery-nav .scroll-down').click(scrolldown);
        });
      }
  }
  
  function scrollup () {
    currentpos = $('#gallery-nav .list-holder ul').position();
    currentpos_top = Math.round(currentpos.top);
    
    if(currentpos_top !== 0){
        $(this).unbind('click');

        $('#gallery-nav .list-holder ul').finish().animate({
            top: '+=123'
        }, 300, 'swing', function() {
            $('#gallery-nav .scroll-up').click(scrollup);
        });
    }
  }
  
  $('#gallery-nav .scroll-down').click(scrolldown);
  $('#gallery-nav .scroll-up').click(scrollup);
  
  /*=============================================================
   * 
   *                    Layout and Grid
   * 
   =============================================================*/
    function fullheight_bg() {
        viewport = updateViewportDimensions();
      
        currentHeight = $('#main').height();
        diff = viewport.height - currentHeight;
        headerheight = $('.header').height();
      
        $('#main').css({"height": (currentHeight - headerheight + diff) });
      
        //console.log('vp: ' + viewport.height + ', ch: ' + currentHeight + ', diff: ' + diff + ', wat: ' + (currentHeight+diff) );
    }
  
    fullheight_bg();
  
  /*=============================================================
   * 
   *                    Window resize stuff
   * 
   =============================================================*/
  $(window).resize(function() {
      /*if($('#gallery-images').length > 0){
          align_gallery(); 
      }*/
      
      fullheight_bg();
      
  });

}); /* end of as page load scripts */
