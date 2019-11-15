<?php

/**
 * Created by PhpStorm
 * User: hdd
 * Date: 2019-07-24
 * Time: 10:03
 */

namespace App\Http\Response;

/**
 *
 * http://
 *
 * Trait ResponseJson
 * @package App\Http\Response
 */
trait ResponseJson
{
    /**
     * 当App接口出现业务异常时的返回
     * @param $code
     * @param $message
     * @param array $data
     * @return false|string
     */
    public function jsonData($code, $message, $data = [])
    {
        return $this->jsonResponse($code, $message, $data);
    }

    /**
     * App接口请求成功时的返回
     * @param array $data
     * @return false|string
     */
    public function jsonSuccessData($data = [])
    {
        return $this->jsonResponse(0, 'Success', $data);
    }

    /**
     * 返回一个json
     * @param $code
     * @param $message
     * @param $data
     * @return false|string
     */
    private function jsonResponse($code, $message, $data)
    {
        $content = [
            'code' => $code,
            'msg' => $message,
            'data' => $data,
        ];

        return json_encode($content);
    }
}

