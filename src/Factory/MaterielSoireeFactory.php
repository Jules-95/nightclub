<?php

namespace App\Factory;

use App\Entity\MaterielSoiree;
use Zenstruck\Foundry\Persistence\PersistentProxyObjectFactory;
use App\Factory\MaterielFactory;
use App\Factory\SoireeFactory;

/**
 * @extends PersistentProxyObjectFactory<MaterielSoiree>
 */
final class MaterielSoireeFactory extends PersistentProxyObjectFactory
{
    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services
     *
     * @todo inject services if required
     */
    public function __construct() {}

    public static function class(): string
    {
        return MaterielSoiree::class;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    protected function defaults(): array|callable
    {
        return [
            'dateReservationDebut' => \DateTimeImmutable::createFromMutable(self::faker()->dateTime()),
            'dateReservationFin' => \DateTimeImmutable::createFromMutable(self::faker()->dateTime()),
            'materiel' => MaterielFactory::random(),
            'soiree' => SoireeFactory::random(),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): static
    {
        return $this
            // ->afterInstantiate(function(MaterielSoiree $materielSoiree): void {})
        ;
    }
}
