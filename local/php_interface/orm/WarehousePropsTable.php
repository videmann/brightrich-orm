<?php
namespace Bitrix\Iblock;

use Bitrix\Main\Localization\Loc,
    Bitrix\Main\ORM\Data\DataManager,
    Bitrix\Main\ORM\Fields\FloatField,
    Bitrix\Main\ORM\Fields\IntegerField;

Loc::loadMessages(__FILE__);

class ElementPropS3Table extends DataManager
{
    /**
     * Returns DB table name for entity.
     *
     * @return string
     */
    public static function getTableName()
    {
        return 'b_iblock_element_prop_s3';
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
                    'title' => Loc::getMessage('ELEMENT_PROP_S3_ENTITY_IBLOCK_ELEMENT_ID_FIELD')
                ]
            ),
            new IntegerField(
                'PROPERTY_12',
                [
                    'title' => Loc::getMessage('ELEMENT_PROP_S3_ENTITY_PROPERTY_12_FIELD')
                ]
            ),
            new IntegerField(
                'PROPERTY_13',
                [
                    'title' => Loc::getMessage('ELEMENT_PROP_S3_ENTITY_PROPERTY_13_FIELD')
                ]
            ),
            new IntegerField(
                'PROPERTY_14',
                [
                    'title' => Loc::getMessage('ELEMENT_PROP_S3_ENTITY_PROPERTY_14_FIELD')
                ]
            ),
            new FloatField(
                'PROPERTY_15',
                [
                    'title' => Loc::getMessage('ELEMENT_PROP_S3_ENTITY_PROPERTY_15_FIELD')
                ]
            ),
            new FloatField(
                'PROPERTY_16',
                [
                    'title' => Loc::getMessage('ELEMENT_PROP_S3_ENTITY_PROPERTY_16_FIELD')
                ]
            ),
            new FloatField(
                'PROPERTY_17',
                [
                    'title' => Loc::getMessage('ELEMENT_PROP_S3_ENTITY_PROPERTY_17_FIELD')
                ]
            ),
        ];
    }
}