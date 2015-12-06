<?php

namespace Falcon\Console\Commands;

use Carbon\Carbon;
use Falcon\Models\Admin\Tweet;
use Illuminate\Console\Command;
use Twitter;

class CacheTweets extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cache:tweets';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update the database with any new Tweets.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Tweet $tweets)
    {
        $this->tweets = $tweets;
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $mentions = Twitter::getMentionsTimeline();

        foreach ($mentions as $mention) {
            if (!($this->tweets->tweetExists($mention->id))) {
                $this->tweets->create([
                    'tweet_id' => $mention->id_str,
                    'data'     => json_encode($mention),
                    'mention'  => true
                ]);

                $this->info('[' . Carbon::now()->toDateTimeString() . '] Tweet ' . $mention->id_str . ' has been cached.');
            }
        }
    }
}
