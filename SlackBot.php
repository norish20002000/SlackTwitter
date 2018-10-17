<?php

class SlackBot {
    private $url = "";
    private $message = "";

    /**
     * コンストラクタ
     * @param string url
     * @param string message
     */
    public function __construct($url, $message) {
        $this->url = $url;
        $this->message = $message;
    }

    public function postSlack() {
        $messageList = array(
            // "channel" => "#general",
            // "username" => "twittererror",
            // "icon_emoji" => ":bangbang:",
            "text" => $this->message
        );

        $messageJson = json_encode($messageList);
        $messagePost = "payload=" . $messageJson;

        $curlSlack = curl_init();
        curl_setopt($curlSlack, CURLOPT_URL, $this->url);
        curl_setopt($curlSlack, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curlSlack, CURLOPT_POST, true);
        curl_setopt($curlSlack, CURLOPT_POSTFIELDS, $messagePost);
        $result = curl_exec($curlSlack);
        curl_close($curlSlack);

        echo $result . "\n";
    }    
}