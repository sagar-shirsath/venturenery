<?php


class CurlComponent extends Object {
    public $controller = '';

    public function initialize($controller) {

    }

    public function startup() {

    }

    public function beforeRender() {

    }

    public function shutdown() {

    }

    public function beforeRedirect() {

    }


    public function curl_post($url, $params = array()) {
        //url-ify the data for the POST
        $fields_string = "";
        foreach ($params as $key => $value) {
            $fields_string .= $key . '=' . $value . '&';
        }
        rtrim($fields_string, '&');

        //open connection
        $ch = curl_init();

        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, count($params));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        //execute post
        $result = curl_exec($ch);

        //close connection
        curl_close($ch);
        return $result;
    }

    public function curl_get($url){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        $result=curl_exec($ch);
        $curlerrno = curl_errno($ch);
        curl_close(json_decode($ch));
}

}