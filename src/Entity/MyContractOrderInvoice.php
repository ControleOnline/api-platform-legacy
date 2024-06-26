<?php

namespace ControleOnline\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="contract_order_invoice")
 * @ORM\Entity(repositoryClass="ControleOnline\Repository\MyContractOrderInvoiceRepository")
 * @ORM\EntityListeners({ControleOnline\Listener\LogListener::class}) 
 */
class MyContractOrderInvoice
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
     * @ORM\ManyToOne(targetEntity="ControleOnline\Entity\MyContract")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="contract_id", referencedColumnName="id", nullable=false)
     * })
     */
    private $contract;

    /**
     * @ORM\ManyToOne(targetEntity="ControleOnline\Entity\People")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="payer_id", referencedColumnName="id", nullable=false)
     * })
     */
    private $payer;

    /**
     * @ORM\ManyToOne(targetEntity="ControleOnline\Entity\People")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="provider_id", referencedColumnName="id", nullable=false)
     * })
     */
    private $provider;

    /**
     * @var \ControleOnline\Entity\Order
     *
     * @ORM\ManyToOne(targetEntity="ControleOnline\Entity\Order")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="order_id", referencedColumnName="id", nullable=false)
     * })
     */
    private $order;

    /**
     * @var \ControleOnline\Entity\Invoice
     *
     * @ORM\ManyToOne(targetEntity="ControleOnline\Entity\Invoice")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="invoice_id", referencedColumnName="id")
     * })
     */
    private $invoice;

    /**
     * @ORM\Column(name="amount", type="float", nullable=false)
     */
    private $amount;

    /**
     * @ORM\Column(name="duedate", type="date",  nullable=true)
     */
    private $dueDate;

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
     * @return MyContract
     */
    public function getContract(): MyContract
    {
        return $this->contract;
    }

    /**
     * @param MyContract $contract
     * @return MyContractOrderInvoice
     */
    public function setContract(MyContract $contract): self
    {
        $this->contract = $contract;

        return $this;
    }

    /**
     * @return People
     */
    public function getPayer(): People
    {
        return $this->payer;
    }

    /**
     * @param  People $payer
     * @return MyContractOrderInvoice
     */
    public function setPayer(People $payer): self
    {
        $this->payer = $payer;

        return $this;
    }

    /**
     * @return People
     */
    public function getProvider(): People
    {
        return $this->provider;
    }

    /**
     * @param  People $provider
     * @return MyContractOrderInvoice
     */
    public function setProvider(People $provider): self
    {
        $this->provider = $provider;

        return $this;
    }

    /**
     * Set order
     *
     * @param \ControleOnline\Entity\Order $order
     * @return MyContractOrderInvoice
     */
    public function setOrder(Order $order): self
    {
        $this->order = $order;

        return $this;
    }

    /**
     * Get order
     *
     * @return \ControleOnline\Entity\Order
     */
    public function getOrder(): Order
    {
        return $this->order;
    }

    /**
     * Set invoice
     *
     * @param \ControleOnline\Entity\Invoice $invoice
     * @return MyContractOrderInvoice
     */
    public function setInvoice(Invoice $invoice)
    {
        $this->invoice = $invoice;

        return $this;
    }

    /**
     * Get invoice
     *
     * @return \ControleOnline\Entity\Invoice
     */
    public function getInvoice(): Invoice
    {
        return $this->invoice;
    }

    /**
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * @param  float $amount
     * @return MyContractOrderInvoice
     */
    public function setAmount(float $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @return DateTime
     */
    public function getDuedate(): \DateTime
    {
        return $this->dueDate;
    }

    /**
     * @param  DateTime $dueDate
     * @return MyContractOrderInvoice
     */
    public function setDuedate(\DateTime $dueDate): self
    {
        $this->dueDate = $dueDate;

        return $this;
    }
}
