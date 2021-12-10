<?php
get_header();
?>

<div class='hero'>
        <div class='heropics'>
            <div class='brandy1'></div>
            <div class='brandy2'></div>
            
        </div>

        <div class='heading'>
            <h1>Branda Stewart</h1>
            <h3>Portfolio and Blog</h3>
        </div>
</div>



<section style='text-align: center;'>
<h1>Photography</h1>

<div class='cardswrapper'>
    <div class='card portrait'>
        <div class='cardhover port'>
            <h3>Portraits</h3>
            <p>Captures an idea of a person or what they stand for. Portraits can also tell us how a person wants to be seen, and capture a particular mood that the sitter is experiencing.</p> 
        </div>
    </div>


    <div class='card scenery'>
    <div class='cardhover scene'><h3>Scenery</h3>
        <p> Transmits the splendor of our most magnificent natural environments, nature and national parks, and the creatures who live in them.</p>
</div>
    </div>

    <div class='card family'>
        <div class='cardhover fam'><h3>Family</h3>
            <p>Connects us to those who came before. By letting your kids see your photos from the past and the present, they become connected to their own story.</p>
    </div>
    </div>
</div>

<p>
<a href='#' class='button'>View Gallery</a>
</p>

</section>

<section class='redsec blogsec'>

<h1>Recent Posts</h1>
<div class='cardswrapper'>
<?php


$args = array(
    'post_type' => 'post',
    'posts_per_page' => 3
);

$query = new WP_Query($args);

while($query->have_posts()): $query->the_post();
?>

<div class='card'>

<div class='bloglink'>
    <?php echo '<a href="' . get_the_permalink() . '" style="color: white; text-decoration: none;">' ?>
        Read More
    </a>
    </div>
    <?php echo '<a href="' . get_the_permalink() . '" style="color: white; text-decoration: none;">' ?>
    <h3><?php the_title(); ?></h3>
    <small>Posted on: <?php the_time('F j, Y'); ?></small>
    
    <p><?php the_content(); ?></p>
</a>
</div>
<?php
endwhile;
wp_reset_query();


?>
</div>
</section>

<section>
<h1 style='display: inline'>Tamara and Her Journey</h1>

<img src='<?php echo get_template_directory_uri(); ?>/images/tamragraphic.png' align='left' /> 
<p style='padding-right: 60px;'>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi in libero eu mauris efficitur consectetur. Duis ac magna vestibulum, pharetra lectus pellentesque, semper magna. Nullam consectetur dolor aliquet, vulputate augue quis, condimentum leo. Fusce interdum velit a ligula finibus tincidunt vitae a mauris. Ut tempus augue neque, ut semper tortor eleifend ac. Pellentesque at ante libero. Maecenas elit lorem, ultricies et hendrerit nec, malesuada ut odio. In eu lacinia lorem. Etiam ornare et magna at accumsan. Donec eu felis vel lorem porta ultrices vitae ac lorem. Nam nec mauris euismod, dictum metus sed, sodales ligula.</p>

</section>


<?php


get_footer();

?>