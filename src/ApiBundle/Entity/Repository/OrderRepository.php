<?php

namespace ApiBundle\Entity\Repository;

use Doctrine\Common\Collections\Criteria;

/**
 * OrderRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class OrderRepository extends \Doctrine\ORM\EntityRepository
{
    public function orderExportExcelByIds($parameters)
    {
        $query = $this->createQueryBuilder('q');
        $query
            ->select('
            partial q.{id, deliveryType, name, telephone, email, comment, userComment, promoCode, summ, discount, status, createdAt, deadLine, updatedAt, orderAt}, 
            partial orderHasCovers.{id}, 
            partial cover.{id}, 
            partial phone.{id, title}, 
            partial pattern.{id, title}, 
            partial customCover.{id}, 
            partial customCoverPhone.{id, title}, 
            partial vendor.{id, title},
            partial novaPoshtaData.{id, invoiceId, isTrackNewPostState, newPostState }')
            ->leftJoin('q.novaPoshtaData', 'novaPoshtaData')
            ->leftJoin('q.orderHasCovers', 'orderHasCovers')
            ->leftJoin('orderHasCovers.cover', 'cover')
            ->leftJoin('cover.phone', 'phone')
            ->leftJoin('phone.vendor', 'vendor')
            ->leftJoin('cover.pattern', 'pattern')
            ->leftJoin('orderHasCovers.customCover', 'customCover')
            ->leftJoin('customCover.phone', 'customCoverPhone');

        $query
            ->andWhere("novaPoshtaData.invoiceId IN(:ids)")
            ->setParameter('ids', array_values($parameters));

        return $query->getQuery()->getArrayResult();
    }

    public function getOrderPhonesGroupByPhone($filter)
    {
        $phones = $this->createQueryBuilder('o')
            ->select('p.id as p_id,p.title as p_title,v.title as v_title,Sum(ohc.number) as number')
            ->leftJoin('o.orderHasCovers', 'ohc')
            ->leftJoin('ohc.cover', 'c')
            ->leftJoin('c.phone', 'p')
            ->leftJoin('p.vendor', 'v')
            ->andWhere('o.status IN (:states)')
            ->andWhere('ohc.cover IS NOT NULL')
            ->groupBy('p.id');

        $customCoverPhones = $this->createQueryBuilder('o')
            ->select('p.id as p_id,p.title as p_title,v.title as v_title,Sum(ohc.number) as number')
            ->leftJoin('o.orderHasCovers', 'ohc')
            ->leftJoin('ohc.customCover', 'c')
            ->leftJoin('c.phone', 'p')
            ->leftJoin('p.vendor', 'v')
            ->andWhere('o.status IN (:states)')
            ->andWhere('ohc.customCover IS NOT NULL')
            ->groupBy('p.id');

        $states = array();
        if (isset($filter['order_states']) && $filter['order_states']) {
            if (in_array('verified', $filter['order_states'])) $states[] = 'verified';
            if (in_array('fabricated', $filter['order_states'])) $states[] = 'fabricated';
        }
        if (!$states) $states = array('verified', 'fabricated');
        $phones->setParameter('states', $states);
        $customCoverPhones->setParameter('states', $states);

        if (isset($filter['order_id']) && $filter['order_id']) {
            $phones
                ->andWhere('o.id =:id')
                ->setParameter('id', $filter['order_id']);
            $customCoverPhones
                ->andWhere('o.id =:id')
                ->setParameter('id', $filter['order_id']);
        }
        if (isset($filter['order_min_date']) && $filter['order_min_date']) {
            $date = \DateTime::createFromFormat("d-m-Y", $filter['order_min_date']);
            $phones
                ->andWhere('o.deadLine > :min_date')
                ->setParameter('min_date', date("Y-m-d H:i:s", $date->getTimestamp()));
            $customCoverPhones
                ->andWhere('o.deadLine > :min_date')
                ->setParameter('min_date', date("Y-m-d H:i:s", $date->getTimestamp()));
        }
        if (isset($filter['order_max_date']) && $filter['order_max_date']) {
            $date = \DateTime::createFromFormat("d-m-Y", $filter['order_max_date']);
            $phones
                ->andWhere('o.deadLine < :max_date')
                ->setParameter('max_date', date("Y-m-d H:i:s", $date->getTimestamp()));
            $customCoverPhones
                ->andWhere('o.deadLine < :max_date')
                ->setParameter('max_date', date("Y-m-d H:i:s", $date->getTimestamp()));
        }
        $phones = $phones->getQuery()->getResult();
        $customCoverPhones = $customCoverPhones->getQuery()->getResult();

        $result = [];
        $names = [];
        if (count($phones)) {
            foreach ($phones as $phone) {
                $result[$phone['p_id']] = $phone['number'];
                $names[$phone['p_id']] = $phone['v_title'] . ' ' . $phone['p_title'];
            }
        }
        if (count($customCoverPhones)) {
            foreach ($customCoverPhones as $phone) {
                (isset($result[$phone['p_id']])) ? $result[$phone['p_id']] += $phone['number'] : $result[$phone['p_id']] = $phone['number'];
                if (!isset($names[$phone['p_id']])) $names[$phone['p_id']] = $phone['v_title'] . ' ' . $phone['p_title'];
            }
        }
        $choices = [];
        asort($result);
        $result = array_reverse($result, true);
        foreach ($result as $k => $item) {
            $name = $names[$k] . '(' . $item . ')';
            $choices[$k] = $name;
        }
        return $choices;
    }

    public function getManufacturerOrderListQuery($filter, $phonesList)
    {
        $q = $this->createQueryBuilder('q', 'q.id')
            ->select('q,np,Sum(ohc.number) as number')
            ->leftJoin('q.orderHasCovers', 'ohc')
            ->leftJoin('q.novaPoshtaData', 'np')
        ;
        $states = array();
        if (isset($filter['order_states']) && $filter['order_states']) {
            if (in_array('verified', $filter['order_states'])) $states[] = 'verified';
            if (in_array('fabricated', $filter['order_states'])) $states[] = 'fabricated';
        }
        if (!$states) $states = array('verified', 'fabricated');
        $q
            ->andWhere('q.status IN (:states)')
            ->setParameter('states', $states);
        if (isset($filter['order_id']) && $filter['order_id']) {
            $q
                ->andWhere('q.id =:id')
                ->setParameter('id', $filter['order_id']);
        }
        if (isset($filter['order_min_date']) && $filter['order_min_date']) {
            $date = \DateTime::createFromFormat("d-m-Y", $filter['order_min_date']);
            $q
                ->andWhere('q.deadLine > :min_date')
                ->setParameter('min_date', date("Y-m-d H:i:s", $date->getTimestamp()));
        }
        if (isset($filter['order_max_date']) && $filter['order_max_date']) {
            $date = \DateTime::createFromFormat("d-m-Y", $filter['order_max_date']);
            $q
                ->andWhere('q.deadLine < :max_date')
                ->setParameter('max_date', date("Y-m-d H:i:s", $date->getTimestamp()));
        }
        if (isset($filter['phone_ids']) && $filter['phone_ids']) {
            $q
                ->leftJoin('ohc.cover', 'c')
                ->leftJoin('c.phone', 'p')
                ->leftJoin('p.vendor', 'v')
                ->leftJoin('ohc.customCover', 'cc')
                ->leftJoin('cc.phone', 'cp')
                ->leftJoin('cp.vendor', 'cv')
                ->andWhere(
                    $q->expr()->orX(
                        $q->expr()->in('p.id', $filter['phone_ids']),
                        $q->expr()->in('cp.id', $filter['phone_ids'])
                    )
                );
        }
        $q
            ->groupBy('q.id')
            ->orderBy('number', 'DESC')
        ;
        $ids = array_keys($q->getQuery()->getResult());
        $result = null;
        if($ids){
            $stringIds = implode(',',$ids);
            $resultQuery = $this->createQueryBuilder('o', 'o.id')
                ->select("o,np,ohc,c,p,pt,v,cc,cp,cv,FIELD(o.id,{$stringIds}) as HIDDEN position")
                ->leftJoin('o.orderHasCovers', 'ohc')
                ->leftJoin('o.novaPoshtaData', 'np')
                ->leftJoin('ohc.cover', 'c')
                ->leftJoin('c.pattern', 'pt')
                ->leftJoin('c.phone', 'p')
                ->leftJoin('p.vendor', 'v')
                ->leftJoin('ohc.customCover', 'cc')
                ->leftJoin('cc.phone', 'cp')
                ->leftJoin('cp.vendor', 'cv')
            ;
            $resultQuery
                ->add('where',$resultQuery->expr()->in('o.id',$ids))
                ->orderBy("position")
            ;
            $result = $resultQuery->getQuery()->getResult();
        }
//******************below is list of orders sorted by number of covers******/
//*****************now we should sort by phone title***********************//
        $orderIds = [];
        if (count($result)) {
            foreach ($result as $res) {
                $ohc = $res->getOrderHasCovers();
                if (count($ohc)) {
                    $phones = [];
                    foreach ($ohc as $item) {
                        $cover = ($item->getCover()) ? $item->getCover() : $item->getCustomCover();
                        $phones[] = $cover->getPhone()->getVendor()->getTitle() . ' ' . $cover->getPhone()->getTitle();
                    }
                    asort($phones);
                    $name = reset($phones);
                    if (isset($phonesList[$name])) {
                        $key = $phonesList[$name];
                        $orderIds[$key][] = $res;
                    }
                }
            }
        }
        ksort($orderIds);
        $orders = [];
        foreach ($orderIds as $item) {
            foreach ($item as $v) {
                $orders[] = $v;
            }
        }
        return $orders;
    }

    public function findByIdsAndStatusFabricated($ids)
    {
        return $this->createQueryBuilder('q')
            ->andWhere("q.id IN(:ids)")
            ->setParameter('ids', array_values($ids))
            ->andWhere('q.status = :status')
            ->setParameter('status', 'on-delivery')
            ->getQuery()
            ->getResult();
    }

    public function orderExportExcel($parameters)
    {
        $query = $this->createQueryBuilder('q');
        $query
            ->select('
            partial q.{id, deliveryType, name, telephone, email, comment, userComment, promoCode, summ, discount, status, createdAt, deadLine, updatedAt, orderAt}, 
            partial orderHasCovers.{id}, 
            partial payType.{id, title}, 
            partial cover.{id}, 
            partial phone.{id, title}, 
            partial pattern.{id, title}, 
            partial customCover.{id}, 
            partial customCoverPhone.{id, title}, 
            partial vendor.{id, title},
            partial novaPoshtaData.{id, invoiceId, isTrackNewPostState, newPostState, codState, codTransactionDate, recipientDateTime, isTrackError },
            partial ukrPoshtaData.{id, invoiceId, invoice, state, deliveryDate }')
            ->orderBy('q.' . $parameters->_sort_by, $parameters->_sort_order)
            ->leftJoin('q.novaPoshtaData', 'novaPoshtaData')
            ->leftJoin('q.ukrPoshtaData', 'ukrPoshtaData')
            ->leftJoin('q.orderHasCovers', 'orderHasCovers')
            ->leftJoin('orderHasCovers.cover', 'cover')
            ->leftJoin('cover.phone', 'phone')
            ->leftJoin('phone.vendor', 'vendor')
            ->leftJoin('cover.pattern', 'pattern')
            ->leftJoin('orderHasCovers.customCover', 'customCover')
            ->leftJoin('q.payType', 'payType')
            ->leftJoin('customCover.phone', 'customCoverPhone');

        if (!empty($parameters->id->value)) {
            $query
                ->andWhere('q.id = :id')
                ->setParameter('id', $parameters->id->value);
        }
        if (!empty($parameters->name->value)) {
            $query
                ->andWhere('q.name = :name')
                ->setParameter('name', $parameters->name->value);
        }
        if (!empty($parameters->telephone->value)) {
            $query
                ->andWhere('q.telephone = :telephone')
                ->setParameter('telephone', $parameters->telephone->value);
        }
        if (!empty($parameters->deadLine->value->start) and !empty($parameters->deadLine->value->end)) {
            $from = new \DateTime($parameters->deadLine->value->start . " 00:00:00");
            $to = new \DateTime($parameters->deadLine->value->end . " 23:59:59");

            $query
                ->andWhere('q.deadLine BETWEEN :from AND :to')
                ->setParameter('from', $from)
                ->setParameter('to', $to);
        }
        if (!empty($parameters->createdAt->value->start) and !empty($parameters->createdAt->value->end)) {
            $from = new \DateTime($parameters->createdAt->value->start . " 00:00:00");
            $to = new \DateTime($parameters->createdAt->value->end . " 23:59:59");

            $query
                ->andWhere('q.createdAt BETWEEN :from AND :to')
                ->setParameter('from', $from)
                ->setParameter('to', $to);
        }
        if (!empty($parameters->orderAt->value->start) and !empty($parameters->orderAt->value->end)) {
            $from = new \DateTime($parameters->orderAt->value->start . " 00:00:00");
            $to = new \DateTime($parameters->orderAt->value->end . " 23:59:59");

            $query
                ->andWhere('q.orderAt BETWEEN :from AND :to')
                ->setParameter('from', $from)
                ->setParameter('to', $to);
        }
        $query
            ->andWhere('q.status != :status_un')
            ->setParameter('status_un', 'un-confirmed');

        if (!empty($parameters->status->value)) {
            foreach ($parameters->status->value as $key => $parameter) {
                $query
                    ->andWhere('q.status != :status' . $key)
                    ->setParameter('status' . $key, $parameter);
            }
        }

        if (!empty($parameters->novaPoshtaData__invoiceId->value)) {
            $query
                ->andWhere('novaPoshtaData.invoiceId = :invoiceId')
                ->setParameter('invoiceId', $parameters->novaPoshtaData__invoiceId->value);
        }
        return $query->getQuery()->getArrayResult();
    }

    public function findLastOrderByUserId($id)
    {
        $query = $this->createQueryBuilder('q');
        $query
            ->select('q')
            ->where('q.user = :id')
            ->setParameter('id', $id)
            ->andWhere('q.deliveryType = :type')
            ->setParameter('type', 'nova-poshta')
            ->orderBy('q.id', 'DESC')
            ->andWhere($query->expr()->orX(
                $query->expr()->eq('q.status', "'accomplished'"),
                $query->expr()->eq('q.status', "'verified'"),
                $query->expr()->eq('q.status', "'on-delivery'")
            ))
            ->setMaxResults(1);

        return $query->getQuery()->getOneOrNullResult();
    }

    public function getLastOnDeliveryOrder($id)
    {
        return $this->createQueryBuilder('q')
            ->leftJoin('q.user', 'u')
            ->where('u.id = :id')
            ->setParameter('id', $id)
            ->andWhere('q.status = :state')
            ->setParameter('state', 'on-delivery')
            ->orderBy('q.updatedAt', 'DESC')
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function getLastActiveOrder($id)
    {
        $states = ['refused', 'delete', 'un-confirmed'];
        return $this->createQueryBuilder('q')
            ->select('q,ohc,ohp,ohns,np,pt')
            ->leftJoin('q.orderHasCovers','ohc')
            ->leftJoin('q.orderHasProducts','ohp')
            ->leftJoin('q.orderHasNonStandartCovers','ohns')
            ->leftJoin('q.novaPoshtaData','np')
            ->leftJoin('q.payType','pt')
            ->where('q.user = :id')
            ->setParameter('id', $id)
            ->andWhere('q.status NOT IN (:states)')
            ->setParameter('states', $states)
            ->orderBy('q.createdAt', 'DESC')
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function findLastOrderForCabinetByUserId($user)
    {
        return $this->createQueryBuilder('q')
            ->where('q.user = :user')
            ->andWhere('q.status != :param')
            ->setParameter('param', 'un-confirmed')
            ->setParameter('user', $user)
            ->orderBy('q.id', 'DESC')
            ->getQuery()
            ->setMaxResults(1)
            ->getOneOrNullResult();
    }

    public function getCountOrdersByType($type)
    {
        $query = $this->createQueryBuilder('q')
            ->select('count(q.id)')
            ->where('q.status = :type')
            ->setParameter('type', $type);

        return $query->getQuery()->getOneOrNullResult();
    }


    public function getOrdersForBlock()
    {
        return $this->createQueryBuilder('o')
            ->where('o.status != :param')
            ->setParameter('param', 'un-confirmed')
            ->orderBy('o.createdAt', 'DESC')
            ->setMaxResults(7)
            ->getQuery()
            ->getResult();
    }

    public function getOrdersForCabinet($user)
    {
        return $this->createQueryBuilder('o')
            ->select('o,ohc,ohp,ohns,np,pt,c,cc,p,ns,pattern,phone,vendor,cphone,cvendor,ohp_phone,ohp_vendor')
            ->leftJoin('o.orderHasCovers','ohc')
            ->leftJoin('ohc.cover','c')
            ->leftJoin('c.pattern','pattern')
            ->leftJoin('c.phone','phone')
            ->leftJoin('phone.vendor','vendor')
            ->leftJoin('ohc.customCover','cc')
            ->leftJoin('cc.phone','cphone')
            ->leftJoin('cphone.vendor','cvendor')
            ->leftJoin('o.orderHasProducts','ohp')
            ->leftJoin('ohp.product','p')
            ->leftJoin('ohp.phone','ohp_phone')
            ->leftJoin('ohp_phone.vendor','ohp_vendor')
            ->leftJoin('o.orderHasNonStandartCovers','ohns')
            ->leftJoin('ohns.cover','ns')
            ->leftJoin('o.novaPoshtaData','np')
            ->leftJoin('o.payType','pt')
            ->where('o.status != :param')
            ->andWhere('o.user = :user')
            ->setParameter('param', 'un-confirmed')
            ->setParameter('user', $user)
            ->orderBy('o.createdAt', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function getIdFilterQuery()
    {
        return $this->createQueryBuilder('o')
            ->where('o.status != :param')
            ->setParameter('param', 'un-confirmed')
            ->orderBy('o.createdAt', 'ASC');
    }

    public function getOrderById($id)
    {
        return $this->createQueryBuilder('o')
            ->select('o,hc,hp,c,cc,p,hns,nsc,ph,v,hp_phone,hp_vendor')
            ->leftJoin('o.orderHasCovers', 'hc')
            ->leftJoin('o.orderHasProducts', 'hp')
            ->leftJoin('o.orderHasNonStandartCovers', 'hns')
            ->leftJoin('hns.cover', 'nsc')
            ->leftJoin('hc.cover', 'c')
            ->leftJoin('c.phone', 'ph')
            ->leftJoin('ph.vendor', 'v')
            ->leftJoin('hp.product', 'p')
            ->leftJoin('hp.phone', 'hp_phone')
            ->leftJoin('hp_phone.vendor', 'hp_vendor')
            ->leftJoin('hc.customCover', 'cc')
            ->where('o.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getOneOrNullResult();
    }
}
