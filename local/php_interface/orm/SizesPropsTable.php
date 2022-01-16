<?php
namespace BrightRich\Iblock;

use Bitrix\Iblock\ElementTable;
use Bitrix\Main\Localization\Loc,
    Bitrix\Main\ORM\Data\DataManager,
    Bitrix\Main\ORM\Fields\FloatField,
    Bitrix\Main\ORM\Fields\IntegerField;
use Bitrix\Main\ORM\Fields\Relations\Reference;

Loc::loadMessages(__FILE__);

class SizesPropsTable extends DataManager
{
    /**
     * Returns DB table name for entity.
     *
     * @return string
     */
    public static function getTableName()
    {
        return 'b_iblock_element_prop_s2';
    }

    /**
     * Returns entity map definition.
     *
     * @return array
     */
    public static function getMap()
    {
        return [
            new IntegerField(
                'IBLOCK_ELEMENT_ID',
                [
                    'primary' => true,
                    'title' => Loc::getMessage('ELEMENT_PROP_S2_ENTITY_IBLOCK_ELEMENT_ID_FIELD')
                ]
            ),
            new IntegerField(
                'CARD_ID',
                [
                    'title' => Loc::getMessage('ELEMENT_PROP_S2_ENTITY_PROPERTY_3_FIELD'),
                    'column_name' => 'PROPERTY_3'
                ]
            ),
            new FloatField(
                'FOOTAGE',
                [
                    'title' => Loc::getMessage('ELEMENT_PROP_S2_ENTITY_PROPERTY_4_FIELD'),
                    'column_name' => 'PROPERTY_4'
                ]
            ),
            new FloatField(
                'PRICE',
                [
                    'title' => Loc::getMessage('ELEMENT_PROP_S2_ENTITY_PROPERTY_5_FIELD'),
                    'column_name' => 'PROPERTY_5'
                ]
            ),
            new Reference(
                'CARD',
                ElementTable::getEntity(),
                ['=this.CARD_ID' => 'ref.ID'],
                ['join_type' => 'LEFT']
            ),
            new FloatField(
                'FLOOR',
                [
                    'title' => Loc::getMessage('ELEMENT_PROP_S2_ENTITY_PROPERTY_6_FIELD'),
                    'column_name' => 'PROPERTY_6'
                ]
            ),
        ];
    }
}