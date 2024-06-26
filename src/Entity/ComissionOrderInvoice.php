<?php

namespace ControleOnline\Entity;

use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\ApiProperty;
use ApiPlatform\Metadata\ApiFilter;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
/**
 * ComissionOrderInvoice
 *
 * @ORM\EntityListeners ({ControleOnline\Listener\LogListener::class})
 * @ORM\Table (name="order_invoice", uniqueConstraints={@ORM\UniqueConstraint (name="order_id", columns={"order_id", "invoice_id"})}, indexes={@ORM\Index (name="invoice_id", columns={"invoice_id"})})
 * @ORM\Entity
 */
#[ApiResource(operations: [new Get(security: 'is_granted(\'ROLE_CLIENT\')')], formats: ['jsonld', 'json', 'html', 'jsonhal', 'csv' => ['text/csv']], normalizationContext: ['groups' => ['order_invoice_read']], denormalizationContext: ['groups' => ['order_invoice_write']])]
class ComissionOrderInvoice
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;
    /**
     * @var \ControleOnline\Entity\ComissionInvoice
     *
     * @ORM\ManyToOne(targetEntity="ControleOnline\Entity\ComissionInvoice", inversedBy="order")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="invoice_id", referencedColumnName="id")
     * })
     */
    private $invoice;
    /**
     * @var \ControleOnline\Entity\ComissionOrder
     *
     * @ORM\ManyToOne(targetEntity="ControleOnline\Entity\ComissionOrder", inversedBy="invoice")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="order_id", referencedColumnName="id")
     * })
     * @Groups({"invoice_read"})
     */
    private $order;
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
     * Set invoice
     *
     * @param \ControleOnline\Entity\ComissionInvoice $invoice
     * @return ComissionOrderInvoice
     */
    public function setInvoice(\ControleOnline\Entity\ComissionInvoice $invoice = null)
    {
        $this->invoice = $invoice;
        return $this;
    }
    /**
     * Get invoice
     *
     * @return \ControleOnline\Entity\ComissionInvoice
     */
    public function getInvoice()
    {
        return $this->invoice;
    }
    /**
     * Set order
     *
     * @param \ControleOnline\Entity\ComissionOrder $order
     * @return ComissionOrderInvoice
     */
    public function setOrder(\ControleOnline\Entity\ComissionOrder $order = null)
    {
        $this->order = $order;
        return $this;
    }
    /**
     * Get order
     *
     * @return \ControleOnline\Entity\ComissionOrder
     */
    public function getOrder()
    {
        return $this->order;
    }
}
