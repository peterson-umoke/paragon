<?php


namespace App\Library\Avatars;


use Illuminate\Support\Facades\Http;

/**
 * Class UiAvatars
 * @package App\Library\Images
 */
class UiAvatars
{
    /**
     * generate image based on name
     * @param $name
     * @param string $type
     * @param int $size
     * @param bool $rounded
     * @return string
     */
    public function generate($name, $type = "svg", $size = 300, $rounded = true)
    {
        $url = "https://ui-avatars.com/api";
        $params = [
            'name' => $name,
            'format' => $type,
            'size' => $size,
            'rounded' => $rounded,
        ];

        return Http::get($url, $params)->body();
    }
}
