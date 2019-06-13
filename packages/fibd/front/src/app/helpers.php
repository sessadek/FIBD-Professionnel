<?php
if (! function_exists('media_url_if_not_null')) {
    /**
     * Get the url of the media
     *
     * @param $media
     * @param string $key
     * @return string
     */
    function media_url_if_not_null($media, $key = 'url_media', $crops= 'nocrops', $use_default = true) {

        if(is_null($media)){
          if($use_default){
            return 'fibd-46.jpg';
          } else {
            return 'blank.png';
          }

        } else {
          if($key !== 'url_media') {
            $media->format_image = [0=>$key, 1=>$crops];
            return $media->{'format_image'};
          } else {
              return $media->{$key};
          }
        }
    }
}

if (! function_exists('media_alt_if_not_null')) {
    /**
     * Get the media alt title
     *
     * @param $media
     * @param string $title
     * @return string
     * @internal param string $key
     */
    function media_alt_if_not_null($media, $title = 'title') {

        if(is_null($media))
            return $title;

        $name = explode('.', $media);
        $value = str_replace('_', ' ', $name[0]);
        $treatment = str_replace('-', ' ', $value);
        return $treatment;
    }
}
if (!function_exists('stripTags')) {

    function stripTags($bloc) {
        $tag = explode("[...]", $bloc);
        return $tag[0];
    }
}
if(!function_exists('removeTags')) {

  function removeTags($body) {
    $tag = str_replace("[...]", "", $body);
    return $tag;
  }
}

if (!function_exists('firstQuestion')) {
    function firstQuestion($key)  {
        if($key === 0) {
          return 'true';
        } else {
          return 'false';
        }
    }
}

if (!function_exists('showQuestion')) {
    function showQuestion($key)  {
        if($key === 0) {
          return 'show';
        } else {
          return '';
        }
    }

}

if (!function_exists('textLink')) {
    function textLink($url)  {
      $arrayUrl = explode('/', $url);
      $text = $arrayUrl[count($arrayUrl)-1];
      return $text;
    }

}
