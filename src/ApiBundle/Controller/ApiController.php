<?php

namespace ApiBundle\Controller;

use ApiBundle\Entity\AnkorsInPageTable;
use ApiBundle\Entity\AnkorTable;
use ApiBundle\Entity\Cover;
use ApiBundle\Entity\CoverType;
use ApiBundle\Entity\Pattern;
use ApiBundle\Entity\PatternGalleryImage;
use ApiBundle\Entity\PatternTags;
use ApiBundle\Entity\Phone;
use ApiBundle\Entity\PhoneBackground;
use ApiBundle\Entity\PhoneCoverTypeDescription;
use ApiBundle\Entity\Product;
use ApiBundle\Entity\ProductCategory;
use ApiBundle\Entity\ProductGalleryImage;
use ApiBundle\Entity\Vendor;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonDecode;
use Symfony\Component\Serializer\Encoder\JsonEncode;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;


/**
 * Class ApiController
 * @package ApiBundle\Controller
 */
class ApiController extends AbstractController
{


                                /*   MAIN TABLES   */


    /**
     * @Route("/vendor/list", methods={"GET"})
     */
    public function vendorTableListAction()
    {
        $q = $this->getDoctrine()->getRepository(Vendor::class)->getArr_2();
        return $this->formalizeJSONResponse($q, false);
    }

    /**
         * @Route("/cover/type/list", methods={"GET"})
     */
    public function coverTypeTableListAction()
    {
        $q = $this->getDoctrine()->getRepository(CoverType::class)->getArr();
        return $this->formalizeJSONResponse($q, false);
    }

    /**
     * @Route("/cover/list", methods={"GET"})
     */
    public function coverTableListAction()
    {
        $q = $this->getDoctrine()->getRepository(Cover::class)->getArr();
        return $this->formalizeJSONResponse($q, false);
    }

    /**
     * @Route("/phone/list", methods={"GET"})
     */
    public function phoneTableListAction()
    {
        $q = $this->getDoctrine()->getRepository(Phone::class)->getArr();
        return $this->formalizeJSONResponse($q, false);
    }

    /**
     * @Route("/product/category/list", methods={"GET"})
     */
    public function productCategoryTableListAction()
    {
        $q = $this->getDoctrine()->getRepository(ProductCategory::class)->getArr();
        return $this->formalizeJSONResponse($q, false);
    }

    /**
     * @Route("/pattern/list", methods={"GET"})
     */
    public function patternTableListAction()
    {
        $q = $this->getDoctrine()->getRepository(Pattern::class)->getArr();
        return $this->formalizeJSONResponse($q, false);
    }

    /**
     * @Route("/anchor/list", methods={"GET"})
     */
    public function anchorTableListAction()
    {
        $q = $this->getDoctrine()->getRepository(AnkorTable::class)->getArr();
        return $this->formalizeJSONResponse($q, false);
    }



                                /*   CHILD TABLES   */


    /**
     * @Route("/product/list", methods={"GET"})
     */
    public function productTableListAction()
    {
        $q = $this->getDoctrine()->getRepository(Product::class)->getArr();
        return $this->formalizeJSONResponse($q, false);
    }

    /**
     * @Route("/product/gallery/list", methods={"GET"})
     */
    public function productGalleryTableListAction()
    {
        $q = $this->getDoctrine()->getRepository(ProductGalleryImage::class)->getArr();
        return $this->formalizeJSONResponse($q, false);
    }

    /**
     * @Route("/pattern/image/list", methods={"GET"})
     */
    public function patternImageTableListAction()
    {
        $q = $this->getDoctrine()->getRepository(PatternGalleryImage::class)->getArr();
        return $this->formalizeJSONResponse($q, false);
    }

    /**
     * @Route("/phone/background/list", methods={"GET"})
     */
    public function phoneBackgroundTableListAction()
    {
        $q = $this->getDoctrine()->getRepository(PhoneBackground::class)->getArr();
        return $this->formalizeJSONResponse($q, false);
    }

    /**
     * @Route("/phone/cover/description/list", methods={"GET"})
     */
    public function phoneCoverDescriptionTableListAction()
    {
        $q = $this->getDoctrine()->getRepository(PhoneCoverTypeDescription::class)->getArr();
        return $this->formalizeJSONResponse($q, false);
    }

    /**
     * @Route("/phone/product/list", methods={"GET"})
     */
    public function phoneHasProductTableListAction()
    {
        $q = $this->getDoctrine()->getRepository(PhoneBackground::class)->getArr();
        return $this->formalizeJSONResponse($q, false);
    }

    /**
     * @Route("/pattern/tags/list", methods={"GET"})
     */
    public function patternTagsTableListAction()
    {
        $q = $this->getDoctrine()->getRepository(PatternTags::class)->getArr();
        return $this->formalizeJSONResponse($q, false);
    }

    /**
     * @Route("/anchor/page/list", methods={"GET"})
     */
    public function anchorPageTableListAction()
    {
        $q = $this->getDoctrine()->getRepository(AnkorsInPageTable::class)->getArr();
        return $this->formalizeJSONResponse($q, false);
    }






















    /**
     * @param $data
     * @param $exclude
     * @return Response
     */
    private function formalizeJSONResponse($data, $exclude)
    {
        $normalizer = [new DateTimeNormalizer(), new ObjectNormalizer()];;
        if ($exclude){
            $normalizer[1]->setIgnoredAttributes($exclude);
        }
//        $normalizer->setCircularReferenceLimit(5);
//        $normalizer->setCircularReferenceHandler(function ($object) {
//            return $object->getId();
//        });

        $serializer = new Serializer([$normalizer, new DateTimeNormalizer()], [new JsonEncoder(new JsonEncode(JSON_UNESCAPED_UNICODE), new JsonDecode(false))]);
        $response = new Response($serializer->serialize($data, 'json'), Response::HTTP_OK, ['Content-type' => 'application/json; charset=UTF-8']);

        return $response;
    }
}
