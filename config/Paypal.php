<?php
return array(
    // set your paypal credential
    'client_id' => 'AYANDxC1IIWbw-QLYv86EA767gyEc7aYj8rVoDQDrbaD3U6gW3c77UGt1emx8eNhZReQnYiAO897ogAW',
    'secret' => 'EG9NkqF3xDRZNIYk59adzjOVMfmw7AT2jw-P7VuEgThxG6IvF1Be_8Bb952ylXkSA6-XgHiQifz9lmks',

    /**
     * SDK configuration
     */
    'settings' => array(
        /**
         * Available option 'sandbox' or 'live'
         */
        'mode' => 'sandbox',

        /**
         * Specify the max request time in seconds
         */
        'http.ConnectionTimeOut' => 60,

        /**
         * Whether want to log to a file
         */
        'log.LogEnabled' => true,

        /**
         * Specify the file that want to write on
         */
        'log.FileName' => storage_path() . '/logs/paypal.log',

        /**
         * Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
         *
         * Logging is most verbose in the 'FINE' level and decreases as you
         * proceed towards ERROR
         */
        'log.LogLevel' => 'FINE'
    ),
);