<?php

namespace Phones4Moo\StoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Phones4Moo\StoreBundle\Entity\Product;
use Phones4Moo\StoreBundle\Form\ProductType;

/**
 * Product controller.
 *
 */
class ProductController extends Controller
{

    /**
     * Lists all Product entities.
     *
     * @Route("/", name="product")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $products = $em->getRepository('Phones4MooStoreBundle:Product')->findAll();

        return array(
            'products' => $products,
        );
    }

    /**
     * Finds and displays a Product entity.
     *
     * @Route("/product/{id}", name="product_show")
     * @Method("GET")
     * @Template()
     * @ParamConverter("product", class="Phones4MooStoreBundle:Product")
     */
    public function showAction(Product $product)
    {
        return array(
            'product'      => $product,
        );
    }

}
