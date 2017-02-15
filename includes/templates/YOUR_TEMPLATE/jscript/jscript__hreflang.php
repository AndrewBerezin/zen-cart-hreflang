<?php
/**
 * @package hreflang
 * @copyright Copyright 2005-2017 Andrew Berezin eCommerce-Service.com
 * @copyright Copyright 2003-2017 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @link https://support.google.com/webmasters/answer/189077
 * @link https://support.google.com/webmasters/answer/182192?hl=ru&topic=2370587&ctx=topic
 * @link http://googlerussiablog.blogspot.ru/2013/04/hreflang-update.html
 * @link http://help.yandex.ru/webmaster/yandex-indexing/locale-pages.xml
 * @link http://webmaster.ya.ru/replies.xml?item_no=15326
 * @version $Id: jscript__hreflang.php 1.1.1 02.02.2017 14:48:46 AndrewBerezin $
 */

if (!isset($hrefLangGenerated)) {
  global $lng;
  if (!isset($lng) || !is_object($lng)) {
    if (!class_exists('language')) {
      include_once(DIR_FS_CATALOG . DIR_WS_CLASSES . 'language.php');
    }
    $lng = new language();
  }
  if (sizeof($lng->catalog_languages) > 1) {
    reset($lng->catalog_languages);
    foreach ($lng->catalog_languages as $language) {
      $hreflang_link = zen_href_link($_GET['main_page'], zen_get_all_get_params(array('main_page', 'language', )) . 'language=' . $language['code'], 'NONSSL', false);
      echo '<link rel="alternate" hreflang="' . $language['code'] . '" href="' . $hreflang_link . '" />' . "\n";
      if ($language['code'] == DEFAULT_LANGUAGE) {
        $hreflang_link_default = $hreflang_link;
      }
    }
    echo '<link rel="alternate" hreflang="x-default" href="' . $hreflang_link_default . '" />' . "\n";
  }
  $hrefLangGenerated = true;
}

// EOF