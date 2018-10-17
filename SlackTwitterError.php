<?php
require_once "AppConf.php";
require_once "SlackBot.php";

class SlackTwitterError {
    // コンストラクタ
    public function __construct() {
    }

    /**
     * slackにメッセージをpost
     */
    public static function postSlack($message) {
        // messageロジック

        // slack post
        $slackBot = new SlackBot(AppConf::$SLACK_ERROR_WEBHOOK, $message);
        $slackBot->postSlack();
    }
}