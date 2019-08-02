<?php
/**
 * Template Name: Home Page
 *
 * Template for a home page
 *
 * @package Custom Theme
 */

get_header(); ?>
<div id="pageHome">
    <section class="section-1 overlay" id="home" style="background-image:url('<?php echo get_template_directory_uri(); ?>/img/overlay-hero.png')">
        
    <div class="container">
        <div class="hero-container">
            <div class="hero-wrapper">
                <img class="hero-logo" src="<?php echo get_template_directory_uri(); ?>/img/site-logo-2.png"/>
                <h1 class="hero-header">Barrel Tables</h1>
                <span>N MORE</span>
                <div class="read-more-wrapper">
                    <p class="read-more-text">READ MORE</p>
                    <object class="read-more-img bounce" data="<?php echo get_template_directory_uri(); ?>/img/scroll-down-icon.svg" type="image/svg+xml"></object>
                </div>
            </div>
            
        </div>
        
    </div><!-- .container -->
    
    </section>
    <section class="section-2" id="our-story">
    <div class="container">
        <div class="content-wrapper">
            <div class="col-md-6 col-lg-6 img-col" >
                <div class="img-wrapper" style="background-image:url('https://barreltablesnmore.flywheelsites.com/wp-content/themes/Barrel-Tables%20/img/DCP_0959_0062_retouched.png');">
                </div>
            </div>
            <div class="col-md-6 col-lg-6 content-col">
                <div class="header-wrapper">
                    <h1 style="background-image:url('<?php echo get_template_directory_uri(); ?>/img/custom-hr.svg')">Our Story</h1>
                    
                </div>
                <?php the_field('our_story_text'); ?>
            </div>

        </div>
    </div><!-- .container -->
    </section>
    <section class="section-3" id="our-products">
    <div class="container">
        <div class="content-wrapper">
            <h1 style="background-image:url('<?php echo get_template_directory_uri(); ?>/img/custom-hr.svg')">Our Products</h1>
            <?php the_field('our_products'); ?>
        </div>
        <div class="icon-block-wrapper">
            <div class="col-md-4 col-lg-4 icon-block">
                <div class="img-wrapper">
                    <img class="icon" style="width: 183px;"id="anchor" src="<?php echo get_template_directory_uri(); ?>/img/BTNM_Mockup_homepagev3_icons_handforged.png')"/>
                </div>
            </div>
            <div class="col-md-4 col-lg-4 icon-block">
                <div class="img-wrapper">
                    <img class="icon" style="width:200px;" id="watch" src="<?php echo get_template_directory_uri(); ?>/img/BTNM_Mockup_homepagev3_icons_longlasting.png')"/>
                </div>
            </div>
            <div class="col-md-4 col-lg-4 icon-block">
                <div class="img-wrapper">
                    <img class="icon" style="width:175px;"id="watch" src="<?php echo get_template_directory_uri(); ?>/img/BTNM_Mockup_homepagev3_icons_highquality.png')"/>
                </div>
            </div>
        </div>
    </div><!-- .container -->
    </section>
    <section class="section-4" >

        <div class="product-section">
        <div id="filters" class="button-group">  
            <span>View Our:</span>
                <div class="filter-wrapper">
                    <button class="filter-btn button is-checked" data-filter="*">All</button>
                    <button class="filter-btn button" data-filter=".Tables">Tables</button>
                    <button class="filter-btn button" data-filter=".Decor">Decor</button>
                    <button class="filter-btn button" data-filter=".Chairs">Chairs</button>
                </div>
            </div>
            <div class="grid-wrapper">
            <div class="grid">
           
            <?php 
                $i=1;
                // The Query
                $args = array(
                    'cat'  => 6,
                    'post_type' => 'post',
                    'order' => 'ASC'
                    );
                $the_query = new WP_Query( $args );
                
            // The Loop
            if ( $the_query->have_posts() ) {
                while ( $the_query->have_posts() ) {
                    $the_query->the_post();
                    ?>
                
                    <div class="post-block <?php foreach((get_the_category()) as $childcat) { if (cat_is_ancestor_of(2, $childcat)) {echo $childcat->cat_name ; }}?>" data-category=".<?php foreach((get_the_category()) as $childcat) { if (cat_is_ancestor_of(2, $childcat)) {echo $childcat->cat_name ; }}?>" >
                        <div id="post-<?php the_ID(); ?>" class="post-block-container">
                            <div class="img-wrapper grid-item <?php the_field('activate_extended_height_for_image');?>" style="background-image:url('<?php echo the_post_thumbnail_url(); ?>')">
                        
                                
                            </div>
                                
                        </div>
                    </div>
                
                    <?php
                    $i++;
                    
                }
            } else {
                // no posts found
            }
            /* Restore original Post Data */
            wp_reset_postdata();
            ?>
            </div>
            </div>
        </div>
           

        <div class="content-wrapper" id="order-contact">
            <div class="col-md-6 col-lg-6 img-col" >
                <div class="img-wrapper" style="background-image:url('<?php echo get_template_directory_uri(); ?>/img/contact-img-2.png');">
                    <div class="header-wrapper">
                    <h1 class="contact-left-header">Contact</h1>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 contact-col">
                <h2>WANT TO PLACE AN ORDER, OR HAVE A QUESTION? </h2>
                <div class="contact-form-wrapper">
                <?php echo do_shortcode("[ninja_form id=2]"); ?>
                </div>
            </div>
        </div>
    </section>
    <section class="section-5" id="social-section">
    <div class="container">
        <div class="content-wrapper">
            <h1>Follow us on social</h1>
            <a style="color:#212121;" target="_blank" href="https://www.instagram.com/barreltablesnmore/"><span>@barreltablesnmore</span></a>
            <div class="social-content-wrapper" id="socialSectionWrapper">
              
            </div>
        </div>
    </div><!-- .container -->
    </section>
    <section class="section-6" id="shipping-returns">
    <div class="container">
        <div class="content-wrapper">
            <h1>Shipping and Returns</h1>
            <?php the_field('shipping_and_returns');?>
        </div>
    </div><!-- .container -->
    </section>
</div>
<?php get_footer(); ?>
<script>
jQuery(document).ready(function($){
    


$('#gnTrigger').on( 'click', function() {
    console.log("trigger clicked")
    $('nav.gn-menu-wrapper').addClass('gn-open-all')
});
 



// external js: isotope.pkgd.js


    // init Isotope JS
    var $grid = $('.grid').isotope({
    itemSelector: '.post-block',
    layoutMode: 'masonry',
    getSortData: {
        name: '.name',
        symbol: '.symbol',
        number: '.number parseInt',
        category: '[data-category]',
        weight: function( itemElem ) {
        var weight = $( itemElem ).find('.weight').text();
        return parseFloat( weight.replace( /[\(\)]/g, '') );
        }
    }
    });

// filter functions
var filterFns = {
// show if number is greater than 50
numberGreaterThan50: function() {
var number = $(this).find('.number').text();
return parseInt( number, 10 ) > 50;
},
// show if name ends with -ium
ium: function() {
var name = $(this).find('.name').text();
return name.match( /ium$/ );
}
};

// bind filter button click
$('#filters').on( 'click', 'button', function() {
var filterValue = $( this ).attr('data-filter');
// use filterFn if matches value
filterValue = filterFns[ filterValue ] || filterValue;
$grid.isotope({ filter: filterValue });
});

// $(window).load(function(){

// $grid.isotope({ filter: '.Tables' });
// });

// change is-checked class on buttons
$('.button-group').each( function( i, buttonGroup ) {
    var $buttonGroup = $( buttonGroup );
    $buttonGroup.on( 'click', 'button', function() {
    $buttonGroup.find('.is-checked').removeClass('is-checked');
    $( this ).addClass('is-checked');
    });
});



});

// eliminate right border on last menu item
const menuItem = document.getElementsByClassName('menu-item');

for (let i =0; i < menuItem.length;i++) {
    
  
    if (i == menuItem.length - 1) {
       
        menuItem[i].childNodes[0].style.borderRight = "none";
    }
    if (i == (menuItem.length / 2) - 1) {

        menuItem[i].childNodes[0].style.borderRight = "none";
    }
}




</script>
