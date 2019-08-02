<?php
/**
 * Template Name: Pricing Page
 *
 * Template for a pricing page
 *
 * @package Custom Theme
 */

get_header(); ?>
<div id="pagePricing">
<section class="pricing-overlay overlay" id="home" style="background-image:url('<?php echo get_template_directory_uri(); ?>/img/overlay-hero.png')">
        
        <div class="container">
            <div class="hero-container">
                <div class="hero-wrapper">
                    <h1 class="hero-header"><?php the_title();?></h1>
                </div>
            </div>
        </div><!-- .container -->
        
        </section>
    <section class="pricing-section" >
        <div class="container">
            <div class="product-section">
            
                <?php 
                    $i=1;
                    // The Query
                    $args = array(
                        'category_name'  => 'Pricing Item' ,
                        'post_type' => 'post',
                        'order' => 'ASC'
                        );
                    $the_query = new WP_Query( $args );
                    
                // The Loop
                if ( $the_query->have_posts() ) {
                    while ( $the_query->have_posts() ) {
                        $the_query->the_post();
                        ?>
                    
                        <div class="product-block" >
                            <div id="post-<?php the_ID(); ?>" class="post-block-container">
                                <div class="img-block">
                                <a class="perma-link" href="<?php the_permalink();?>">
                                    <div class="img-wrapper grid-item <?php the_field('activate_extended_height_for_image');?>" style="background-image:url('<?php echo the_post_thumbnail_url(); ?>')"></div>
                                </a>
                                </div>
                                <div class="content-wrapper">
                                    <div class="title-wrapper">
                                        <a class="perma-link" href="<?php the_permalink();?>">
                                            <h1><?php the_title(); ?></h1>
                                            <div class="custom-hr-wrapper">
                                                <div class="custom-hr-1"></div>
                                                <div class="custom-hr-2"></div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="text-wrapper">
                                        <?php the_excerpt(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                        <?php
                        $i++;
                        
                    }
                } else {
                    
                    echo'<h1 style="margin: auto; text-align: center;">Sorry No Pricing Items Exist</h1>';
                }
                /* Restore original Post Data */
                wp_reset_postdata();
                ?>
            </div>
        </div>
     
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
