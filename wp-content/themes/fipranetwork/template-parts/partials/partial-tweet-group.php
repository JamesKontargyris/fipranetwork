<div class="tweet__group">

	<?php $twitter = new Twitter; ?>

	<?php $no_of_tweets_to_show = (isset($instance['no_of_tweets_to_show'])) ? $instance['no_of_tweets_to_show'] : 3; ?>

	<?php foreach($twitter->get_latest_tweets($no_of_tweets_to_show, true) as $tweet) : ?>
		<div class="tweet">
			<?php echo $twitter->linkify_twitter_status($tweet['text']); ?>
			<div class="tweet__meta"><?php echo date('d M \a\t H:i', strtotime($tweet['created_at'])); ?> <div class="tweet__buttons"><a href="https://twitter.com/intent/tweet?in_reply_to=<?php echo $tweet['id']; ?>" target="_blank"><i class="fa fa-lg fa-reply" alt="Reply" title="Reply"></i></a> <a href="https://twitter.com/intent/retweet?tweet_id=<?php echo $tweet['id']; ?>" target="_blank"><i class="fa fa-lg fa-retweet" alt="Retweet" title="Retweet"></i></a> <a href="https://twitter.com/intent/like?tweet_id=<?php echo $tweet['id']; ?>" target="_blank"><i class="fa fa-lg fa-heart" alt="Like" title="Like"></i></a></div></div>
		</div>
	<?php endforeach; ?>

</div>

<a href="http://twitter.com/FIPRA_Network" target="_blank" class="btn btn--x-small btn--primary">More Tweets</a>