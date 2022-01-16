<?php

namespace BrightRich\Iblock;

use Bitrix\Main\ORM\Query\Query;
use BrightRich\Http\Request;
use BrightRich\Iblock\PageNavigation;

abstract class Entity
{
    const OPTIONS = [
        'page_size' => 30,
        'cache_ttl' => 86400
    ];
    /**
     * @var Query
     */
    protected $query = null;
    /**
     * @var PageNavigation
     */
    public $nav = null;
    /**
     * @var Request
     */
    public $request = null;
    /**
     * @var array
     */
    public $options = [];
    /**
     * @var \CDBResult
     */
    public $collection = null;

    public function __construct($entity, Request $request, PageNavigation $nav, $options = Entity::OPTIONS)
    {
        $this->request = $request;
        $this->options = $options;

        $this->nav = $nav;
        $this->nav->allowAllRecords(true)
            ->setPageSize($this->options['page_size'])
            ->initFromUri();

        $this->query = new Query($entity);
    }

    public function getCollection()
    {
        //Выборка
        $this
            ->setFilter()
            ->setOrder($this->getOrder())
            ->setSelect($this->getSelect());

        //Навигация
        $this->query
            ->setOffset($this->nav->getOffset())
            ->setLimit($this->nav->getLimit())
            ->countTotal(true);

        //Кеш
        $this->query
            ->cacheJoins(true)
            ->setCacheTtl($this->options['cache_ttl']);

        //Получение коллекции и модификация выборки
        $this->collection = $this->query->exec();
        $this->collection->addFetchDataModifier([$this, 'modifyFetchData']);

        //Установка кол-ва эл-тов для навигации
        $this->nav->setRecordCount($this->collection->getCount());

        return $this->collection;
    }
}