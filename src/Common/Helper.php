<?php

namespace Sylapi\Erp\Common;

/**
 * Class Helper.
 */
class Helper
{
    /**
     * @return bool|string
     */
    public static function guid()
    {
        mt_srand((float) microtime() * 10000);
        $charid = strtoupper(md5(uniqid(rand(), true)));
        $retval = substr($charid, 0, 32);

        return $retval;
    }

    /**
     * @param $data
     *
     * @return mixed
     */
    public static function toArray($data)
    {
        $json = json_encode($data);

        return json_decode($json, true);
    }

    /**
     * @param $xml
     *
     * @return mixed
     */
    public static function xmlToArray($xml)
    {
        $xml_debug = simplexml_load_string($xml, null, LIBXML_NOCDATA);
        $xml_debug = json_encode($xml_debug);
        $array = json_decode($xml_debug, true);

        return $array;
    }

    /**
     * @param $number
     *
     * @return mixed
     */
    public static function toNumber($number)
    {
        return str_replace([',', ' '], ['.', ''], $number);
    }

    /**
     * @param $address
     *
     * @return mixed
     */
    public static function validateAddress($address)
    {
        $fields = ['name', 'nip', 'street', 'postcode', 'city', 'country', 'phone', 'email'];

        foreach ($fields as $field) {
            if (!isset($address[$field])) {
                $address[$field] = '';
            }
        }

        return $address;
    }

    /**
     * @param $item
     *
     * @return mixed
     */
    public static function validateItem($item)
    {
        $fields = ['id', 'warehouse_id', 'ean', 'serial_number', 'model', 'tax', 'name', 'quantity', 'price_gross'];

        foreach ($fields as $field) {
            if (!in_array($field, $item)) {
                $item[$field] = '';
            }
        }

        return $item;
    }
}
