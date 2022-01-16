<?php

namespace BrightRich\Iblock;

use Bitrix\Main\ORM\Query\Query;
use Bitrix\Main\Request;
use Bitrix\Main\UI\PageNavigation;
use BrightRich\Iblock\SizesTable;

/**
 * Пока что неактуальный класс.
 * Будет дописывать по аналогии с классом Cards
 */
class Sizes
{
    const DEFAULT_OPTIONS = [
        'page_size' => 30,
        'cache_ttl' => 86400
    ];

    public $nav = null;
    public $request = null;
    public $options = null;
    public $query = null;
    public $collection = null;

    public static $instance = null;

    private function __construct($request, $nav, $options)
    {
        $this->request = $request;
        $this->options = $options;

        $this->nav = $nav;
        $this->nav->allowAllRecords(true)
            ->setPageSize($this->options['page_size'])
            ->initFromUri();

        $this->query = new Query(SizesTable::getEntity());
    }

    public static function createInstance(Request $request, PageNavigation $nav, array $options = self::DEFAULT_OPTIONS)
    {
        if(is_null(self::$instance))
            self::$instance = new self($request, $nav, $options);

        return self::$instance;
    }

    private static function modifier(&$data)
    {
        foreach ($data as $key => $value)
        {
            $nkey = preg_replace('/CARD_/', '', $key);
            $data[$nkey] = $value;
            unset($data[$key]);
        }

        $data = array_change_key_case($data, CASE_LOWER);
    }

    public function collection(array $filter, array $order)
    {
        //select
        $this->query->setSelect([
            'PROP_' => 'PROP.*',
            'CARD_' => 'CARD.*',
            'CARD_PROP_' => 'CARD.PROP.*',
        ]);

        $this->query->setOrder($order);
        $this->query->setFilter($filter);

        $this->query->setOffset($this->nav->getOffset());
        $this->query->setLimit($this->nav->getLimit());
        $this->query->countTotal(true);

        $this->query->cacheJoins(true);
        $this->query->setCacheTtl($this->options['cache_ttl']);

        $this->collection = $this->query->exec();
        $this->collection->addFetchDataModifier(array($this, 'modifier'));

        //setNavCount
        $this->nav->setRecordCount($this->collection->getCount());

        return $this->collection;
    }
}