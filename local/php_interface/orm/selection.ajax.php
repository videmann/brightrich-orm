<?php
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');

header('Access-Control-Allow-Origin: *');
header("Content-type: application/json; charset=utf-8");

/**
 * Для формирования xml и для других внутренних нужд можно использовать фильтр, на основе массива.
 * $request = \BrightRich\Http\Request::array(['sort' => 'price_asc', 'price' => 400, 'nav' => 'page-1']);
 * А для фильтра по параметрам запроса вот так:
 * $request = \BrightRich\Http\Request::url();
 * По сути это то же самое, просто в параметры передается Context()->getCurrent()->getRequest()->toArray()
 */
$request            = \BrightRich\Http\Request::url();
/**
 * ORM сущность
 */
$entity             = \BrightRich\Iblock\CardsTable::getEntity();
/**
 * Класс для определения лимита, офсета, кол-ва элементов на странице из параметров запроса
 */
$navigation         = new \BrightRich\Iblock\PageNavigation('nav');
/**
 * Класс для работы с ORM сущностью
 */
$cards              = new \BrightRich\Iblock\Cards($entity, $request, $navigation);
/**
 * Сформированная коллекция. Может подвергаться модификациям. Внутри объект Query
 */
$collection         = $cards->getCollection();

$result = [
    'data' => $collection->fetchAll(),
    'count' => $collection->getCount()
];

die(\Bitrix\Main\Web\Json::encode($result));