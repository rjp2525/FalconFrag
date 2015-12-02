<?php

namespace Falcon\Console\Commands;

use Falcon\Models\Admin\Tweet as CacheStore;
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
    public function __construct(CacheStore $twitter)
    {
        $this->twitter = $twitter;
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
            if (!CacheStore::where('tweet_id', $mention->id_str)->get()) {
                $this->info('Tweet ' . $mention->id_str . ' not found in cache, adding..');

                $item = new CacheStore([
                    'tweet_id' => $mention->id_str,
                    'data'     => $mention,
                    'mention'  => true
                ]);
                $item->save();

                $this->info('Tweet ' . $mention->id_str . ' has been added to cache.');
            }
        }
    }
}
