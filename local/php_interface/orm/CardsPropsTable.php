<?php
namespace BrightRich\Iblock;

use Bitrix\Main\Localization\Loc,
    Bitrix\Main\ORM\Data\DataManager,
    Bitrix\Main\ORM\Fields\FloatField,
    Bitrix\Main\ORM\Fields\IntegerField,
    Bitrix\Main\ORM\Fields\TextField;

Loc::loadMessages(__FILE__);

class CardsPropsTable extends DataManager
{
    /**
     * Returns DB table name for entity.
     *
     * @return string
     */
    public static function getTableName()
    {
        return 'b_iblock_element_prop_s1';
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
                    'title' => Loc::getMessage('ELEMENT_PROP_S1_ENTITY_IBLOCK_ELEMENT_ID_FIELD')
                ]
            ),
            new TextField(
                'ADDRESS',
                [
                    'title' => Loc::getMessage('ELEMENT_PROP_S1_ENTITY_PROPERTY_1_FIELD'),
                    'column_name' => 'PROPERTY_1'
                ]
            ),
            new TextField(
                'SQUARE',
                [
                    'title' => Loc::getMessage('ELEMENT_PROP_S1_ENTITY_PROPERTY_2_FIELD'),
                    'column_name' => 'PROPERTY_2'
                ]
            ),
            new FloatField(
                'LAT',
                [
                    'title' => Loc::getMessage('ELEMENT_PROP_S1_ENTITY_PROPERTY_7_FIELD'),
                    'column_name' => 'PROPERTY_7'
                ]
            ),
            new TextField(
                'LON',
                [
                    'title' => Loc::getMessage('ELEMENT_PROP_S1_ENTITY_PROPERTY_8_FIELD'),
                    'column_name' => 'PROPERTY_8'
                ]
            ),
        ];
    }
}