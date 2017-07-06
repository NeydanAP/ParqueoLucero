<?php
return array(
    // set your paypal credential
    'client_id' => 'AY34e3B9dvx2PGkX6k5QxymGYm2pkE8hdHwXPa1JwAdisns3SEdPO734YRXIj_8DCTq_siOb_VNUdPl7',
    'secret' => 'EBuQv0W-p4tt_2ChUHc4IUIuoQe0ceomrgQ9zwEL4P8PGU--cQoRlPJ5ps1sLZgF0-77vcW-vkln6Q_4',
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
        'http.ConnectionTimeOut' => 30,
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