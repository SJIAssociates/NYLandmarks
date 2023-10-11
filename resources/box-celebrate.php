<?php

$i = 0;
while (have_posts() ): the_post();


$genre = get_field('building_type');
$borough = get_field('borough' );
$thumbnail = get_the_post_thumbnail_url($post->ID,'location_thumb') ?: \App\asset_path('images/location-placeholder.jpg');


?>
<div class='celebrate-card' data-loop='<?php echo $i; ?>'>
  <a href="<?php the_permalink(); ?>" class='pre-hover' title="Read more about <?php the_title(); ?>">
    <img src="<?php echo $thumbnail; ?>" alt="<?php the_title(); ?>"/>
    <div class="card-content w-100 bg-red bottom-0 p-5">
      <h3 class='text-white mb-0 text-lg'><?php the_title(); ?></h3>
      <p class='mb-0 capitalize'><?php echo $borough; ?></p>
    </div>
    <span><?php echo $genre; ?></span>
  </a>
  <div class='hover-state'>
    <h3 class='text-black mb-0'><?php the_title(); ?>, <span><?php echo $borough; ?></span></h3>
    <p><?php echo get_the_excerpt(); ?></p>
    <a href="<?php the_permalink(); ?>" class=''>Learn More <i class="fas fa-chevron-right"></i></a>
  </div>
</div>
<?php $i++; endwhile; ?>
