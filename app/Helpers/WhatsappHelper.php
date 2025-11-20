<?php

namespace App\Helpers;

class WhatsappHelper

{
    public static function send($target, $message)
    {
        $token = "3d7MTKGWEKuFdYPcbThS"; // simpan dulu di sini, nanti bisa pindah ke .env

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => 'https://api.fonnte.com/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => [
                'target' => $target,
                'message' => $message,
            ],
            CURLOPT_HTTPHEADER => [
                "Authorization: $token"
            ],
        ]);

        // Jika localhost SSL belum fix → biarkan on/off otomatis:
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);

        $response = curl_exec($curl);

        if (curl_errno($curl)) {
            return "CURL ERROR: " . curl_error($curl);
        }

        curl_close($curl);

        return $response;
    }
}
