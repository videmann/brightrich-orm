<?php

use Bitrix\Main\Loader;

$classes = [
    'BrightRich\Http\Request' => '/local/php_interface/orm/Request.php',
    'BrightRich\Iblock\EntityInterface' => '/local/php_interface/orm/EntityInterface.php',
    'BrightRich\Iblock\Entity' => '/local/php_interface/orm/Entity.php',
    'BrightRich\Iblock\PageNavigation' => '/local/php_interface/orm/PageNavigation.php',

    /**
     * объекты
     */
    'BrightRich\Iblock\CardsTable' => '/local/php_interface/orm/CardsTable.php',
    'BrightRich\Iblock\CardsPropsTable' => '/local/php_interface/orm/CardsPropsTable.php',
    /**
     * офисы
     */
    'BrightRich\Iblock\OfficesTable' => '/local/php_interface/orm/OfficesTable.php',
    'BrightRich\Iblock\OfficesPropsTable' => '/local/php_interface/orm/OfficesPropsTable.php',

    //Класс для работы с площадями
    'BrightRich\Iblock\Sizes' => '/local/php_interface/orm/Sizes.php',
    //Класс для работы с объектами
    'BrightRich\Iblock\Cards' => '/local/php_interface/orm/Cards.php',
];

Loader::registerAutoLoadClasses(null, $classes);
Loader::includeModule('iblock');