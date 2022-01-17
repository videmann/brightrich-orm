<?php

namespace BrightRich\Iblock;

use Bitrix\Main\Entity\DataManager;
use Bitrix\Main\Entity\IntegerField;
use Bitrix\Main\Entity\StringField;
use Bitrix\Main\ORM\Fields\Relations\Reference;

class OfficesTable extends DataManager
{
    public static function getTableName()
    {
        return 'b_iblock_element';
    }

    public static function getMap()
    {
        return [
            new IntegerField(
                'ID',
                [
                    'required' => true,
                    'autoincrement' => true,
                    'primary' => true
                ]
            ),
            new StringField('NAME'),
            new StringField('ACTIVE'),
            new IntegerField('IBLOCK_ID'),
            new Reference(
                'PROP',
                OfficesPropsTable::getEntity(),
                [
                    '=this.ID' => 'ref.IBLOCK_ELEMENT_ID'
                ]
            ),
            new Reference(
                'CARD',
                CardsTable::getEntity(),
                [
                    '=this.PROP.CARD.ID' => 'ref.ID'
                ]
            )
        ];
    }
}