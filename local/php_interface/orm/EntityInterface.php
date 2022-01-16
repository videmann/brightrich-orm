<?php

namespace BrightRich\Iblock;

use Bitrix\Main\ORM\Query\Filter\ConditionTree;
use BrightRich\Http\Request;
use BrightRich\Iblock\PageNavigation;

interface EntityInterface
{
    public function __construct($entity, Request $request, PageNavigation $nav, $options = Entity::OPTIONS);
    public function setFilter();
    public function modifyFilter(ConditionTree $filter);
    public function getOrder();
    public function getSelect();
    public function modifyFetchData(array &$data);
    public function getCollection();
}