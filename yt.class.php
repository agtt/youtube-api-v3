<?php
// Agit - Karesoft
Class Youtube {

    public $apiKey;

    /* Api Keyi Set Et */

    public function setApiKey($key) {
        $this->apiKey = $key;
    }

    /* Kanal Videolarını Çekme Fonksiyonu */

    public function channels($channelId, $max = 30) {
        $url = "https://www.googleapis.com/youtube/v3/search?key=" . $this->apiKey . "&channelId=" . $channelId . "&part=snippet,id&order=date&maxResults=" . $max . "";

        return $this->curl_get($url);
    }

    /* Videoya ait tüm verileri getirme */

    public function getVideo($url) {
        
    }

    /* CURL ile API bağlantısı */

    private function curl_get($url) {

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $json = curl_exec($ch);
        $result = json_decode($json, true);

        return $result;
    }

}

// Helper DEBUG

function dd($data) {
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}
