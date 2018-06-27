<?php
// Agit - Karesoft
Class Youtube {

    public $apiKey;
    private $client ="https://www.googleapis.com/youtube/v3/";

    /* Api Keyi Set Et */

    public function setApiKey($apiKey) {
        $this->apiKey = $apiKey;
    }

    /* Kanal Videolarını Çekme Fonksiyonu */

    public function getCannel($channelId, $max = 50) {
        $url = $this->client."search?key=" . $this->apiKey . "&channelId=" . $channelId . "&part=snippet,id&order=date&maxResults=" . $max . "";

        return $this->curl_get($url);
    }
    
    /* Kullanıcı adı ile tüm kanal listesini çekme */
    
    public function getChannelList($username,$max=50){
        $url = $this->client."channels?key=" . $this->apiKey . "&forUsername=" . $username . "&part=snippet,contentDetails,statistics&order=viewCount&maxResults=" . $max . "";

        return $this->curl_get($url);
    }
    

    /* Videoya ait tüm verileri getirme
     * 
     * Örnek Kullanım Ks-_Mh1QhMc,c0KYU2j0TM4
     * Virgül ile kullanım yapılabilir. 
     */
    public function getVideo($ids) {
        $url = $this->client."videos?key=" . $this->apiKey . "&id=" . $ids . "&part=snippet,contentDetails,statistics";

        return $this->curl_get($url);
        
    }
    
    /*
     * Keyword değişkenine kelime yazıp arama sonuçları çekilebilir.
     */
    public function searchVideo($keyword,$max=50){
        $url = $this->client."search?key=" . $this->apiKey . "&q=" . $keyword . "&part=snippet&order=date&maxResults=".$max;

        return $this->curl_get($url);
    }
    
    /* Get Download Video Link */
    
    public function downloadvideo($id){
        
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
