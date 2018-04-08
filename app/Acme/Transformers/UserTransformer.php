<?php
/**
 * Created by PhpStorm.
 * User: Sovon
 * Date: 7/19/2017
 * Time: 4:58 PM
 */

namespace App\Acme\Transformers;


class UserTransformer extends Transformer
{
    /**
     * @param array $item
     * @return array
     */
    public function transform(array $item)
    {
        $transformedItem = [
            'id' => $item['id'],
            'name' => $item['name'],
            'phone' => array_key_exists('phone', $item) ? $item['phone'] : null,
            'photo' => null,
        ];

        if (array_key_exists('photo', $item)) {
            $photo = $item['photo'];

            if (is_null($photo)) {
                $photo = asset('images/avatars/user-'. ($item['id'] % 12) .'.png');
            }

            $transformedItem['photo'] = $photo;
        }

        if (array_key_exists('token', $item)) {
            $transformedItem['token'] = $item['token'];
        }

        if (array_key_exists('is_registered', $item)) {
            $transformedItem['is_registered'] = (boolean) $item['is_registered'];
        }

        return $transformedItem;
    }
}