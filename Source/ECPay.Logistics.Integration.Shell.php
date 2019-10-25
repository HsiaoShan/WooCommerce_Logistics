<?php
// SDK外殼，用來處理WooCommerce相容性問題

include_once(ECPAY_PLUGIN_PATH.'ECPay.Logistics.Integration.php');

final class EcpayWooLogistics extends EcpayLogistics
{
    public static function ServerPost($Params ,$ServiceURL)
    {
        return EcpayWooIo::ServerPost($Params ,$ServiceURL);
    }
}

if (!class_exists('EcpayWooIo', true)) {
	final class EcpayWooIo extends EcpayIo
	{
        /**
         * Server Post
         *
         * @param     array    $Params        Post 參數
         * @param     string   $ServiceURL    Post URL
         * @return    void
         */
        public static function ServerPost($Params ,$ServiceURL)
        {
            $fields_string = http_build_query($Params);
            $rs = wp_remote_post($ServiceURL, array(
                'method'      => 'POST',
                'headers'     => array(),
                'httpversion' => '1.0',
                'sslverify'   => true,
                'body'        => $fields_string
            ));

            if ( is_wp_error($rs) ) {
                throw new Exception($rs->get_error_message());
            }

            return $rs['body'];
		}
	}
}