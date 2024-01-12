<?php

namespace App\Entity;

use ApiPlatform\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Metadata\ApiFilter;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Post;
use App\Repository\CartePersoRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: CartePersoRepository::class)]
#[ApiResource(
    operations: [
        new GetCollection(
            normalizationContext: ['groups'=> ['getCollection:carte']]
        ),
        new Get(
            normalizationContext: ['groups'=> ['get:carte']]
        ),
        new Patch(),
        new Post(),
        new Delete()
    ],
    )]
#[ApiFilter(SearchFilter::class, properties: [
    'name' => 'partial',
    'type' => 'partial',
    'atk' => 'partial',
    'def' => 'partial',
    'level' => 'partial',
    'race' => 'partial',
    'price' => 'partial',
    'archetype' => 'partial',
    'description' => 'partial',
    ]
)]
class CartePerso
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['get:carte', 'getCollection:carte'])]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['get:carte', 'getCollection:carte'])]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    #[Groups(['get:carte'])]
    private ?string $type = null;

    #[ORM\Column]
    #[Groups(['get:carte'])]
    private ?int $atk = null;

    #[ORM\Column]
    #[Groups(['get:carte'])]
    private ?int $def = null;

    #[ORM\Column]
    #[Groups(['get:carte'])]
    private ?int $level = null;

    #[ORM\Column(length: 255)]
    #[Groups(['get:carte'])]
    private ?string $race = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['get:carte'])]
    private ?string $price = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['get:carte'])]
    private ?string $archetype = null;

    #[ORM\Column(length: 255)]
    #[Groups(['get:carte', 'getCollection:carte'])]
    private ?string $image_url = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['get:carte'])]
    private ?string $description = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getAtk(): ?int
    {
        return $this->atk;
    }

    public function setAtk(int $atk): static
    {
        $this->atk = $atk;

        return $this;
    }

    public function getDef(): ?int
    {
        return $this->def;
    }

    public function setDef(int $def): static
    {
        $this->def = $def;

        return $this;
    }

    public function getLevel(): ?int
    {
        return $this->level;
    }

    public function setLevel(int $level): static
    {
        $this->level = $level;

        return $this;
    }

    public function getRace(): ?string
    {
        return $this->race;
    }

    public function setRace(string $race): static
    {
        $this->race = $race;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(?string $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getArchetype(): ?string
    {
        return $this->archetype;
    }

    public function setArchetype(?string $archetype): static
    {
        $this->archetype = $archetype;

        return $this;
    }

    public function getImageUrl(): ?string
    {
        return $this->image_url;
    }

    public function setImageUrl(string $image_url): static
    {
        $this->image_url = $image_url;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }
}
