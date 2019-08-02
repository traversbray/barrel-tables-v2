<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Custom Theme
 */
?>

<footer id="colophon" class="site-footer" role="contentinfo">
<nav class="navbar navbar-default" role="navigation">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
   
  
        <div class="nav-list">
            <?php
                wp_nav_menu( array(
                    'menu'              => 'primary',
                    'theme_location'    => 'primary',
                    'depth'             => 2,
                    'container'         => 'div',
                    'container_class'   => 'collapse navbar-collapse',
                    'container_id'      => 'bs-example-navbar-collapse-1',
                    'menu_class'        => 'nav navbar-nav',
                    'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                    'walker'            => new WP_Bootstrap_Navwalker())
                );
            ?>
        </div>
   </div>
</nav>
<div class="col-md-12 col-lg-12 designed-by">
    <p>Website designed and built by <a target="_blank" href="https://heat-index.com/">Heat Index</a></p>
</div>
</footer><!-- #colophon -->

<a id="back2Top" title="Back to top" href="#">&#10148;</a>

<?php wp_footer(); ?>
<script>
jQuery(document).ready(function($){

//instagram api 

var token = '7160271310.54b8c57.2a47dac866c94f9eb75896b144181742', // learn how to obtain it below
    userid = 7160271310, // User ID - get it in source HTML of your Instagram profile or look at the next example :)
    num_photos = 6; // how much photos do you want to get

$.ajax({
	url: 'https://api.instagram.com/v1/users/' + userid + '/media/recent', // or /users/self/media/recent for Sandbox
	dataType: 'jsonp',
	type: 'GET',
	data: {access_token: token, count: num_photos},
	success: function(data){
 		// console.log(data);
		for( x in data.data ){
			$('#socialSectionWrapper').append( 
    '<div class="social-block col-md-4 col-lg-4"><div class="social-content" style="background-image:url(' + data.data[x].images.low_resolution.url + ');">' + '</div></div>' ); // data.data[x].images.low_resolution.url - URL of image, 306х306
            
            
            
            
            // data.data[x].images.thumbnail.url - URL of image 150х150
			// data.data[x].images.standard_resolution.url - URL of image 612х612
            // data.data[x].link - Instagram post URL
            // console.log(data.data[x].images.low_resolution.url);
		}
	},
	error: function(data){
		console.log(data); // send the error notifications to console
	}
});


    //scroll to navigation
    $(document).ready(function(){
        $('.menu-item a[href^="#"]').on('click',function (e) {
            e.preventDefault();
            var target = this.hash;
            $target = $(target);
            $('html, body').stop().animate({
                'scrollTop':  $target.offset().top 
            }, 900, 'swing', function () {
                window.location.hash = target;
            });
        });

        $('.gn-menu-main a[href^="#"]').on('click',function (e) {
            e.preventDefault();
            var target = this.hash;
            $target = $(target);
            $('html, body').stop().animate({
                'scrollTop':  $target.offset().top 
            }, 900, 'swing', function () {
                window.location.hash = target;
            });
        });
    });
    //back to top button
    $(window).scroll(function() {
        var height = $(window).scrollTop();
        if (height > 100) {
            $('#back2Top').fadeIn();
        } else {
            $('#back2Top').fadeOut();
        }
    });
    $(document).ready(function() {
        $("#back2Top").click(function(event) {
            event.preventDefault();
            $("html, body").animate({ scrollTop: 0 }, "slow");
            return false;
        });

    });
});
new gnMenu( document.getElementById( 'gn-menu' ) );

</script>
</body>
</html>
