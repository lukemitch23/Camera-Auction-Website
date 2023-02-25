<?php
class VariableEncryption {
    public function get_key() {
        $key = "28153827306309179850661632816633";
        return $key;
    }

    public function get_nonce() {
        $nonce = "352832976873348097971797";
        return $nonce;
    }

    public function encrypt($string) {
        ## create sodium key encryption
        $key = $this->get_key();
        $nonce = $this->get_nonce();
        $ciphertext = sodium_crypto_secretbox($string, $nonce, $key);
        $encrypted = base64_encode($ciphertext);
        return $encrypted;
    }

    public function decrypt($string) {
        ## create sodium key decryption
        $key = $this->get_key();
        $nonce = $this->get_nonce();
        $ciphertext_dec = base64_decode($string);
        $plaintext = sodium_crypto_secretbox_open($ciphertext_dec, $nonce, $key);
        return $plaintext;
    }
}
?>