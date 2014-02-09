<?php

namespace Phones4Moo\StoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Transaction
 *
 * @ORM\Table(name="transactions")
 * @ORM\Entity(repositoryClass="Phones4Moo\StoreBundle\Entity\TransactionRepository")
 */
class Transaction
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="Customer")
     * @ORM\JoinColumn(name="customer_id", referencedColumnName="id")
     **/
    private $customer;

    /**
     * @ORM\OneToOne(targetEntity="Product")
     * @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     **/
    private $product;    
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
   
    
    

    /**
     * Set customer
     *
     * @param \Phones4Moo\StoreBundle\Entity\Customer $customer
     * @return Transaction
     */
    public function setCustomer(\Phones4Moo\StoreBundle\Entity\Customer $customer = null)
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * Get customer
     *
     * @return \Phones4Moo\StoreBundle\Entity\Customer 
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * Set product
     *
     * @param \Phones4Moo\StoreBundle\Entity\Product $product
     * @return Transaction
     */
    public function setProduct(\Phones4Moo\StoreBundle\Entity\Product $product = null)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Get product
     *
     * @return \Phones4Moo\StoreBundle\Entity\Product 
     */
    public function getProduct()
    {
        return $this->product;
    }
}
