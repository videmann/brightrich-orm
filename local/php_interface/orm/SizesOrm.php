<?php

namespace BrightRich\Iblock;

use Bitrix\Iblock\Iblock;

class SizesOrm
{
    function collection()
    {
        $class = Iblock::wakeUp(2);
        $query = $class->getEntityDataClass()::query();

        $query
            ->setSelect([
                'ID',
                'NAME',
                'PRICE_' => 'PRICE.*',
                'SQUARE' => 'SQUARE.*',
                'BUSINESS_CENTER_' => 'BUSINESS_CENTER.*'
            ]);

        return $query->fetchAll();
    }
}