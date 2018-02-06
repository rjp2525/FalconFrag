<?php

namespace Falcon\Http\Controllers\Admin;

use Auth;
use Falcon\Http\Controllers\Controller;
use Falcon\Models\Admin\Tweet;
use Illuminate\Http\Request;
use Twitter;

class TwitterController extends Controller
{
    /**
     * Render the Twitter index page with a list of mentions.
     *
     * @return response
     */
    public function getIndex(Tweet $tweets)
    {
        $mentions = $tweets->get();
        return view('admin.twitter.index', compact('mentions'));
    }

    public function getTweet(Tweet $tweets, $id)
    {
        $tweet = $tweets->find($id);
        if ($tweet) {
            return view('admin.twitter.tweet', compact('tweet'));
        }

        return '404 Not Found';
    }

    public function replyTweet(Request $request, Auth $auth, Tweet $tweets, $id)
    {
        $tweet = $tweets->find($id);
        if ($tweet) {
            $reply_to_username = '@' . $tweet->data->user->screen_name . ' ';
            $username_length = strlen($reply_to_username);
            $max_message_length = (140 - ($username_length + 4));
            $split_username = explode(' ', Auth::user()->name);
            $initials = ' ^' . strtoupper(substr($split_username[0], 0, 1)) . strtoupper(substr($split_username[1], 0, 1));
            $status = $request->input('message');
            if (strlen($status) > $max_message_length) {
                $status = substr($status, 0, $max_message_length);
            }

            $status = $reply_to_username . $status . $initials;
            $reply = Twitter::postTweet([
                'status'                => $status,
                'in_reply_to_status_id' => $tweet->data->id
            ]);

            return redirect()->route('admin.social.twitter.tweet.view', $tweet->id)->with('tweet', $tweet); //view('admin.twitter.tweet', compact('tweet'));
        }

        return '404 Not Found';
    }
}
