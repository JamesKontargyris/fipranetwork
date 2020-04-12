<?php

class Twitter {
	private $settings = array(
		'oauth_access_token'        => "480275907-2FXzlXF0wQFo252nxK2vuxXKfyL931bSVgcAaFwq",
		'oauth_access_token_secret' => "MAOSFRGqYtTa9gZOWLVtytaAtLcFteYdR1hLhAsoIfBvT",
		'consumer_key'              => "1CMpVDed9ygWsVsERJCHeatD7",
		'consumer_secret'           => "pkdy3ttUEXNIDL9II1R6kqqUQilYF30kOvKXv1Pw1VBMeAFozX"
	);

	private $screen_name = 'FIPRA_Network';

	function get_latest_tweets( $count = 3, $include_retweets = false ) {
		$url           = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
		$getfield      = "?screen_name=" . get_theme_mod( 'twitter_handle', $this->screen_name ) . "&count=$count&include_rts=$include_retweets";
		$requestMethod = 'GET';

		$twitter = new TwitterAPIExchange( $this->settings );
		$tweets  = json_decode( $twitter->setGetfield( $getfield )
		                                ->buildOauth( $url, $requestMethod )
		                                ->performRequest(), true );

		return $tweets;
	}

	public function linkify_twitter_status( $status_text ) {
		// linkify URLs
		$status_text = preg_replace(
			'/(https?:\/\/\S+)/',
			'<a target="_blank" href="\1">\1</a>',
			$status_text
		);

		// linkify twitter users
		$status_text = preg_replace(
			'/(^|\s)@(\w+)/',
			'\1@<a target="_blank" href="http://twitter.com/\2">\2</a>',
			$status_text
		);

		// linkify tags
		$status_text = preg_replace(
			'/(^|\s)#(\w+)/',
			'\1#<a target="_blank" href="http://twitter.com/search?q=%23\2">\2</a>',
			$status_text
		);

		return $status_text;
	}


}
