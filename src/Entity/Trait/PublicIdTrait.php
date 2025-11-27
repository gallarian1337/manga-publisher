<?php

/**
 * @author gallarian
 * @email gallarian@gmail.com
 */

declare(strict_types=1);

namespace App\Entity\Trait;

use Doctrine\ORM\Mapping as ORM;

trait PublicIdTrait
{
    #[ORM\Column(type: 'integer', unique: true)]
    private ?int $publicId = null;

    public function getPublicId(): ?int
    {
        return $this->publicId;
    }

    public function setPublicId(int $publicId): static
    {
        $this->publicId = $publicId;

        return $this;
    }
}
