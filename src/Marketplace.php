<?php

namespace Ebay;

class Marketplace
{
    public static $supportedMarketplaces = [
        'EBAY_US',
        'EBAY_AT',
        'EBAY_AU',
        'EBAY_BE',
        'EBAY_CA',
        'EBAY_CH',
        'EBAY_DE',
        'EBAY_ES',
        'EBAY_FR',
        'EBAY_GB',
        'EBAY_HK',
        'EBAY_IE',
        'EBAY_IN',
        'EBAY_IT',
        'EBAY_MY',
        'EBAY_NL',
        'EBAY_PH',
        'EBAY_PL',
        'EBAY_SG',
        'EBAY_TH',
        'EBAY_TW',
        'EBAY_VN',
        'EBAY_MOTORS_US',
    ];

    public static function isSupported(string $marketplaceId): bool
    {
        return in_array($marketplaceId, self::$supportedMarketplaces);
    }
}
