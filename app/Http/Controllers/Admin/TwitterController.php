<?php

namespace Falcon\Http\Controllers\Admin;

use Falcon\Http\Controllers\Controller;
use Twitter;

class TwitterController extends Controller
{
    /**
     * Render the Twitter index page with a list of mentions.
     *
     * @return response
     */
    public function getIndex()
    {
        $mentions = Twitter::getMentionsTimeline();
        return view('admin.twitter.index', compact('mentions'));
    }

    public function getTweet($id)
    {
        $mentions = Twitter::getMentionsTimeline();
        if (!empty($mentions)) {
            foreach ($mentions as $mention) {
                if ($mention->id == $id) {
                    $tweet = $mention;
                    return view('admin.twitter.tweet', compact('tweet'));
                }
            }

            return '404 Not Found';
        }

        return '404 Not Found';
    }
}
