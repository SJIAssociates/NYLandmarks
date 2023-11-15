<?php while ( have_posts() ): the_post();

$location = get_field('location');
// Address, City, State zip
if($location):
  $Fulladdress = $location['address'];

  $splitAddress = array_pad(explode(",", $Fulladdress), 3, null);

  $numberAddress = $splitAddress[0];
  $city = $splitAddress[1];
  $state = $splitAddress[2];
endif;

$neighborhoods = get_the_term_list( $post->ID, 'neighborhood', '', ', ', '' );
if($neighborhoods == ''):

  $neighborhoods = get_field('city') . ", NY";
endif;

$activities = get_field('activities');
?>
</style>
<div class='pbt-box w-full bg-blue-grey mb-10 items-stretch relative'>
  <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('news_thumb') ?></a>
  <div class="p-8 mb-10">
      <?php if($neighborhoods): ?>
      <span class="borough text-primary font-bold uppercase inline-block relative ml-4 text-sm  mb-5">
        <?php echo strip_tags($neighborhoods); ?>
      </span>
      <?php endif; ?>
      <h3 class="entry-title mb-0 text-base text-2xl"><a href="<?php the_permalink(); ?>" class='text-black hover:text-red'><?php the_title(); ?></a></h3>
        <?php if($location): ?>
         <address class='block mt-3 text-lg text-grey-darker font-normal mb-5'>
            <?php echo $numberAddress . ",<br />" . $city . ", " . $state; ?>
         </address>
       <?php endif;

		   
	if(get_field('activity_descrition')): ?>
		<div class="mb-10">
		<?php the_field('activity_descrition');?>
		</div>
	<?php endif; 
  	
  if( get_field('sold_out') ): ?>
    <a class="btn py-5 bg-primary block text-white uppercase text-center w-full mb-5 mt-0 cursor-not-allowed opacity-50 hover:bg-red">Sold Out</a>
  <?php else: ?>
    <a class="btn text-white block text-center w-full mb-5 mt-0" href="<?php the_permalink(); ?>" target="_blank" title="<?php the_title(); ?>">Learn More</a>
  <?php endif; ?>
    
     </div>
</div>
<?php endwhile; ?>
