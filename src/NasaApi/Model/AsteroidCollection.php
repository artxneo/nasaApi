<?php

declare(strict_types=1);

namespace App\NasaApi\Model;

use Doctrine\Common\Collections\ArrayCollection;

class AsteroidCollection extends ArrayCollection implements \JsonSerializable
{
    public function add($element)
    {
        if (!($element instanceof Asteroid)) {
            throw new \InvalidArgumentException('Element should be Asteroid type');
        }

        return parent::add($element);
    }

    public function jsonSerialize()
    {
      // do serialize
    }
}