<?php

namespace ApiBundle\Controller;

use ApiBundle\Entity\Pattern;
use ApiBundle\Entity\Phone;
use ApiBundle\Entity\ProductCategory;
use ApiBundle\Entity\ProductGalleryImage;
use ApiBundle\Entity\Vendor;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;


class ApiController extends AbstractController
{

    /**
     * @Route("/vendor/list", methods={"GET"})
     */
    public function vendorTableListAction()
    {
        $q = $this->getDoctrine()->getRepository(Vendor::class)->getArr();
//         dump($q->getPhones()); die;
        return $this->formalizeJSONResponse($q, false);
    }


    /**
     * @Route("/phone/list", methods={"GET"})
     */
    public function phoneTableListAction()
    {
        $q = $this->getDoctrine()->getRepository(Phone::class)->getArr();
//         dump($q->getPhones()); die;
        return $this->formalizeJSONResponse($q, false);
    }

    /**
     * @Route("/product-category/list", methods={"GET"})
     */
    public function productCategoryTableListAction()
    {
        $q = $this->getDoctrine()->getRepository(ProductCategory::class)->getArr();
//         dump($q->getPhones()); die;
        return $this->formalizeJSONResponse($q, false);
    }

    /**
     * @Route("/product-gallery/list", methods={"GET"})
     */
    public function productGalleryTableListAction()
    {
        $q = $this->getDoctrine()->getRepository(ProductGalleryImage::class)->getArr();
//         dump($q->getPhones()); die;
        return $this->formalizeJSONResponse($q, false);
    }


    /**
     * @Route("/pattern/list", methods={"GET"})
     */
    public function patternTableListAction()
    {
        $q = $this->getDoctrine()->getRepository(Pattern::class)->getArr();
//         dump($q->getPhones()); die;
        return $this->formalizeJSONResponse($q, false);
    }


    /**
     * @param $data
     * @param $exclude
     * @return Response
     */
    private function formalizeJSONResponse($data, $exclude)
    {
        $normalizer = new ObjectNormalizer();
        if ($exclude){
            $normalizer->setIgnoredAttributes($exclude);
        }
        $normalizer->setCircularReferenceLimit(5);
        $normalizer->setCircularReferenceHandler(function ($object) {
            return $object->getId();
        });

        $serializer = new Serializer([$normalizer], [new JsonEncoder()]);
        $response = new Response($serializer->serialize($data, 'json'), Response::HTTP_OK, ['Content-type' => 'application/json; charset=UTF-8']);

        return $response;
    }
}
