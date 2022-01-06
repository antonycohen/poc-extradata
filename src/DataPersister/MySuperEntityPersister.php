<?php

namespace App\DataPersister;

use ApiPlatform\Core\DataPersister\ContextAwareDataPersisterInterface;
use App\Entity\Attributes;
use App\Entity\MySuperEntity;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Constraints\Collection;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Type;
use Symfony\Component\Validator\Constraints\Valid;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class MySuperEntityPersister implements ContextAwareDataPersisterInterface
{

    /**
     * @var EntityManagerInterface
     */
    private $entityManager;
    /**
     * @var ValidatorInterface
     */
    private $validator;

    /**
     * @var SerializerInterface
     */
    private $serializer;

    public function __construct(EntityManagerInterface $entityManager, ValidatorInterface $validator, SerializerInterface $serializer)
    {
        $this->entityManager = $entityManager;
        $this->validator = $validator;
        $this->serializer = $serializer;
    }

    public function supports($data, array $context = []): bool
    {
        return $data instanceof MySuperEntity;
    }

    /**
     * @param $data MySuperEntity
     * @param array $context
     * @return MySuperEntity
     */
    public function persist($data, array $context = []): MySuperEntity
    {

        $constraint = new Collection([
            'fields' => [
                // Fetch field from database, apply validation
                'description' => new NotBlank(),
            ],
        ]);

        $metadata = $this->validator->getMetadataFor(MySuperEntity::class);
        $metadata->addPropertyConstraints('attributes', [$constraint, new Valid()]);

        $violations = $this->validator->validate($data);
        if($violations->count()){
            $errors = [];
            foreach ($violations as $error) {
                $errors[strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $error->getPropertyPath()))][] = $error->getMessage();
            }
            throw new \Exception(print_r($errors, true));
        }

        $this->entityManager->persist($data);
        $this->entityManager->flush();
        return $data;
    }

    public function remove($data, array $context = [])
    {
        // call your persistence layer to delete $data
    }
}
{

}