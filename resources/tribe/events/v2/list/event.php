<?php
/**
 * View: List Event
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe/events/v2/list/event.php
 *
 * See more documentation about our views templating system.
 *
 * @link http://evnt.is/1aiy
 *
 * @version 5.0.0
 *
 * @var WP_Post $event The event post object with properties added by the `tribe_get_event` function.
 *
 * @see tribe_get_event() For the format of the event object.
 */

$container_classes = [ 'tribe-common-g-row', 'tribe-events-calendar-list__event-row'];
$container_classes['tribe-events-calendar-list__event-row--featured'] = $event->featured;

$event_classes = tribe_get_post_class( [ 'tribe-events-calendar-list__event', 'tribe-common-g-row', 'tribe-common-g-row--gutters' ], $event->ID );
?>
<div <?php tribe_classes( $container_classes ); ?>>
		<article <?php tribe_classes( $event_classes ) ?>>
      <div class="event-box-wrap">
  			<div class="sji_event_details lg:w-1/2 lg:pr-10">

  				<header class="tribe-events-calendar-list__event-header">
            <?php $this->template( 'list/event/title', [ 'event' => $event ] ); ?>
  					<?php $this->template( 'list/event/date', [ 'event' => $event ] ); ?>
  				</header>

  				<?php $this->template( 'list/event/description', [ 'event' => $event ] ); ?>

          <a href="<?php echo esc_url( tribe_get_event_link() ); ?>" class="tribe-events-read-more btn text-white mt-10 inline-block" rel="bookmark"><?php esc_html_e( 'Find out more', 'the-events-calendar' ) ?></a>
  			</div>
        <div class='sji_event_picture w-full lg:w-1/2 hidden lg:block'>
          <?php $this->template( 'list/event/featured-image', [ 'event' => $event ] ); ?>
        </div>
      </div>
		</article>
</div>
