<?php

namespace App\Factory;

use App\Entity\Soiree;
use Zenstruck\Foundry\Persistence\PersistentProxyObjectFactory;

/**
 * @extends PersistentProxyObjectFactory<Soiree>
 */
final class SoireeFactory extends PersistentProxyObjectFactory
{
    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services
     *
     * @todo inject services if required
     */
    public function __construct()
    {
    }

    public static function class(): string
    {
        return Soiree::class;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    protected function defaults(): array|callable
    {
        return [
            'datecreation' => \DateTimeImmutable::createFromMutable(self::faker()->dateTime()),
            'datesoiree' => \DateTimeImmutable::createFromMutable(self::faker()->dateTime()),
            'titre' => self::faker()->text(255),
            'statut' => self::faker()->randomElement(['À venir', 'En préparation', 'Terminée', 'Annulée']),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): static
    {
        return $this
            // ->afterInstantiate(function(Soiree $soiree): void {})
        ;
    }
}
