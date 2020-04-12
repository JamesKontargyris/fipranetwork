<?php
// Register and load the widget
function tweets_load_widget() {
	register_widget( 'tweets_widget' );
}

add_action( 'widgets_init', 'tweets_load_widget' );

// Creating the widget
class tweets_widget extends WP_Widget {

	function __construct() {
		parent::__construct(

// Base ID of your widget
			'tweets_widget',

// Widget name will appear in UI
			__( 'Show Tweets', 'tweets_widget_domain' ),

// Widget description
			array( 'description' => __( 'Display tweets from @FIPRA_Network', 'tweets_widget_domain' ), )
		);
	}

// Creating widget front-end

	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );

// before and after widget arguments are defined by themes
		echo $args['before_widget'];
		if ( ! empty( $title ) ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}

// This is where you run the code and display the output
		?>
        <div class="tweet__group">

			<?php $twitter = new Twitter; ?>

			<?php foreach ( $twitter->get_latest_tweets( $instance['no_of_tweets_to_show'], true ) as $tweet ) : ?>
				<div class="tweet">
					<?php echo $twitter->linkify_twitter_status($tweet['text']); ?>
					<div class="tweet__meta"><?php echo date('d M \a\t H:i', strtotime($tweet['created_at'])); ?> <div class="tweet__buttons"><a href="https://twitter.com/intent/tweet?in_reply_to=<?php echo $tweet['id']; ?>" target="_blank"><i class="fa fa-lg fa-reply" alt="Reply" title="Reply"></i></a> <a href="https://twitter.com/intent/retweet?tweet_id=<?php echo $tweet['id']; ?>" target="_blank"><i class="fa fa-lg fa-retweet" alt="Retweet" title="Retweet"></i></a> <a href="https://twitter.com/intent/like?tweet_id=<?php echo $tweet['id']; ?>" target="_blank"><i class="fa fa-lg fa-heart" alt="Like" title="Like"></i></a></div></div>
				</div>
			<?php endforeach; ?>

        </div>

        <a href="http://twitter.com/FIPRA_Network" target="_blank" class="btn btn--x-small btn--primary">More Tweets</a>
		<?php
	}

// Widget Backend
	public function form( $instance ) {
		if ( isset( $instance['title'] ) ) {
			$title = $instance['title'];
		} else {
			$title = __( '', 'tweets_widget_domain' );
		}

		if ( isset( $instance['no_of_tweets_to_show'] ) ) {
			$no_of_tweets_to_show = $instance['no_of_tweets_to_show'];
		} else {
			$no_of_tweets_to_show = __( '3', 'tweets_widget_domain' );
		}
// Widget admin form
		?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>"
                   name="<?php echo $this->get_field_name( 'title' ); ?>" type="text"
                   value="<?php echo esc_attr( $title ); ?>"/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'no_of_tweets_to_show' ); ?>"><?php _e( 'Number of tweets to show:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'no_of_tweets_to_show' ); ?>"
                   name="<?php echo $this->get_field_name( 'no_of_tweets_to_show' ); ?>" type="text"
                   value="<?php echo esc_attr( $no_of_tweets_to_show ); ?>"/>
        </p>
		<?php
	}

// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance          = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		if ( ! empty( $new_instance['no_of_tweets_to_show'] ) ) {
			$new_instance['no_of_tweets_to_show'] = (int) strip_tags( preg_replace( '/[^0-9]/', '', $new_instance['no_of_tweets_to_show'] ) );

			if ( $new_instance['no_of_tweets_to_show'] > 5 ) {
				$new_instance['no_of_tweets_to_show'] = 5;
			}

			if ( $new_instance['no_of_tweets_to_show'] < 1 ) {
				$new_instance['no_of_tweets_to_show'] = 1;
			}
		} else {
			$new_instance['no_of_tweets_to_show'] = 1;
		}

		$instance['no_of_tweets_to_show'] = $new_instance['no_of_tweets_to_show'];

		return $instance;
	}
}