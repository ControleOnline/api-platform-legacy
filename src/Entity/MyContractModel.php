<?php


namespace ControleOnline\Entity;

use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\ApiProperty;
use ApiPlatform\Metadata\ApiFilter;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
/**
 * @ORM\EntityListeners ({ControleOnline\Listener\LogListener::class})
 * @ORM\Table (name="document_model")
 * @ORM\Entity (repositoryClass="ControleOnline\Repository\MyDocumentModelRepository")
 */
#[ApiResource(operations: [new Get(security: 'is_granted(\'ROLE_CLIENT\')'), new GetCollection(security: 'is_granted(\'ROLE_CLIENT\')')], formats: ['jsonld', 'json', 'html', 'jsonhal', 'csv' => ['text/csv']], normalizationContext: ['groups' => ['mydocument_model_read']], denormalizationContext: ['groups' => ['mydocument_model_write']])]
class MyDocumentModel
{
    /**
     * @ORM\Column(type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;
    /**
     * @ORM\Column(name="document_model", type="string", nullable=false)
     * @Groups({"mydocument_model_read", "my_contract_item_read", "mycontract_put_read", "mycontract_addendum_read"})
     */
    private $contractModel;
    /**
     * @ORM\Column(name="content", type="text", nullable=false)
     * @Groups({"my_contract_item_read", "mycontract_put_read", "mycontract_addendum_read"})
     */
    private $content;
    /**
     * @return int
     */
    public function getId() : int
    {
        return $this->id;
    }
    /**
     * @return string
     */
    public function getDocumentModel() : string
    {
        return $this->contractModel;
    }
    /**
     * @param string $contractModel
     * @return MyDocumentModel
     */
    public function setDocumentModel(string $contractModel) : MyDocumentModel
    {
        $this->contractModel = $contractModel;
        return $this;
    }
    /**
     * @return string
     */
    public function getContent() : string
    {
        return $this->content;
    }
    /**
     * @param string $content
     * @return MyDocumentModel
     */
    public function setContent(string $content) : MyDocumentModel
    {
        $this->content = $content;
        return $this;
    }
}
