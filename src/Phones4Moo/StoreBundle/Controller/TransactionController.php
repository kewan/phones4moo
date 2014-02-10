<?php

namespace Phones4Moo\StoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Phones4Moo\StoreBundle\Entity\Transaction;
use Phones4Moo\StoreBundle\Entity\Product;
use Phones4Moo\StoreBundle\Form\TransactionType;

/**
 * Transaction controller.
 *
 * @Route("/transaction")
 */
class TransactionController extends Controller
{

    /**
     * Creates a new Transaction entity.
     *
     * @Route("/", name="transaction_create")
     * @Method("POST")
     * @Template("Phones4MooStoreBundle:Transaction:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Transaction();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            $this->get('session')->getFlashBag()->add(
                'notice', sprintf('Thank you for your purchase %s', $entity->getCustomer()->getFirstname())
            );

            return $this->redirect($this->generateUrl('product'));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Transaction entity.
    *
    * @param Transaction $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Transaction $entity)
    {
        $form = $this->createForm(new TransactionType(), $entity, array(
            'action' => $this->generateUrl('transaction_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Purchase'));

        return $form;
    }

    /**
     * Displays a form to create a new Transaction entity.
     *
     * @Route("/new/{product}", name="transaction_new")
     * @Method("GET")
     * @Template()
     * @ParamConverter("product", class="Phones4MooStoreBundle:Product")
     */
    public function newAction(Product $product)
    {
        $entity = new Transaction();
        $entity->setProduct($product);
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }


}
