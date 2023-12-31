<?php while (have_posts() ): the_post();


  $location = get_field('location');

  // Address, City, State zip
  if($location['address'] !== ''):
    $Fulladdress = $location['address'];

    $numberAddress = explode(",",$Fulladdress)[0];
    $city = array_pad( explode(",",$Fulladdress, 3), 3, null)[1];
    $state = array_pad( explode(",",$Fulladdress, 3), 3, null)[2];

    $lat = $location['lat'];
    $lng = $location['lng'];
  endif;

//$neighborhoods = get_the_term_list( $post->ID, 'neighborhood', '', ', ', '' );
$neighborhoods = wp_get_post_terms( $post->ID, 'neighborhood', array( 'orderby' => 'term_id','order' => 'DESC' ) );

  switch (count($neighborhoods)){
	  case 0:
	  	$neighborhoods = get_field('city') . ", NY";
	  	break;
	  case 1:
	  	$neighborhoods = $neighborhoods[0]->name;
	  	break;
	  case 2:
	  	$neighbood = $neighborhoods[0]->name;
	  	$borough = ", " . $neighborhoods[1]->name;


	  	$neighborhoods = $neighbood . $borough;
	  	break;
  }


  $activities = get_field('activities');
  ?>

  <article class='w-full pr-5 lg:pr-10' >
    <div class="site-box py-3 lg:py-6">
      <div class="site-box-details">
        <?php if($neighborhoods): ?>
        <span class="borough text-primary font-bold uppercase inline-block relative ml-4 text-sm  mb-5">
          <?php echo strip_tags($neighborhoods); ?>
        </span>
        <?php endif; ?>



        <?php if( $location['address'] !== '' ): ?>
        <div class='marker' data-lat="<?php echo $lat; ?>" data-lng="<?php echo $lng; ?>">
          <h4><a href="<?php the_permalink(); ?>" class='text-black hover:text-red text-lg'><?php the_title(); ?></a></h4>
        </div>
        <?php endif; ?>

        <h3 class="entry-title mb-0 text-base text-2xl"><a href="<?php the_permalink(); ?>" class='text-black hover:text-red'><?php the_title(); ?></a></h3>
        <div class="entry-content lg:block">
          <?php if($location['address'] !== '' ): ?>
           <address class='block mt-3'>
              <?php echo $numberAddress . ",<br />" . $city . ", " . $state; ?>
           </address>
         <?php else: ?>
           <p class='text-primary uppercase mt-5 text-xs font-bold'>
             No Address Found
           </p>
         <?php endif; ?>
        </div>

        <ul class='activities_list block m-0 p-0 mt-5 list-none'>
          <?php
            if($activities):
            foreach($activities as $activity):
              echo "<li class='font-bold inline-block'>" . $activity . '</li>';
            endforeach; endif;?>
        </ul>
      </div>
      <div class="site-box-image">
        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('news_thumb'); ?></a>
      </div>
    </div>
  </article>

<?php endwhile; ?>
