<?php

namespace BrightRich\Iblock;

use Bitrix\Main\ORM\Query\Query;

class SizesEntity extends Entity implements EntityInterface
{
    //Сопоставление запросов и полей сортировки
    const ORDER = [
        'name_asc' => ['NAME' => 'ASC'],
        'name_desc' => ['NAME' => 'DESC'],
        'price_asc' => ['PROP.PRICE' => 'ASC'],
        'price_desc' => ['PROP.PRICE' => 'DESC'],
    ];

    //Выбор полей для вывода. У каждой сущности select разный
    public function getSelect(): array
    {
        return [
            'PROP_' => 'PROP.*',
            'CARD_' => 'CARD.*',
            'CARD_PROP_' => 'CARD.PROP.*',
        ];
    }

    //Фильтр по параметрам запроса. Модификация
    public function modifyFilter(\Bitrix\Main\ORM\Query\Filter\ConditionTree $filter): void
    {
        $request = $this->request->toArray();

        foreach ($request as $key => $value)
        {
            switch ($key)
            {
                case 'price':
                    $filter->where('PROP.PRICE', '<=', $request['price']);
                    break;
                case 'type':
                    $value = mb_strtoupper($value);
                    $filter->whereNot("PROP.${value}", false);
                    break;

            }
        }
    }

    //Query фильтр. Всегда первый метод после $this. Возвращает Query для селекта и прочих методов.
    public function setFilter(): Query
    {
        $filter = Query::filter()
            ->where('ACTIVE', 'Y')
            ->where('CARD.IBLOCK_ID', 1);

        $this->modifyFilter($filter);

        $this->query->where($filter);
        return $this->query;
    }

    //Сортировка по параметрам запроса. Сопоставление
    public function getOrder(): array
    {
        if($sort = $this->request->get('sort'))
        {
            return self::ORDER[$sort];
        }

        return self::ORDER['price_asc'];
    }

    //Приведение полей к rest-api
    public function modifyFetchData(&$data): void
    {
        /*
        foreach ($data as $key => $value)
        {
            $nkey = preg_replace('/CARDS_/', '', $key);
            $data[$nkey] = $value;
            unset($data[$key]);
        }*/

        $data = array_change_key_case($data, CASE_LOWER);
    }
}

//Финальный класс. Пользоваться только им.
final class Sizes extends SizesEntity
{

}