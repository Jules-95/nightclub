<?php 

namespace App\Tests\Unit\Entity;


use App\Entity\Soiree;
use App\Entity\Artiste;
use PHPUnit\Framework\TestCase;

class SoireeTest extends TestCase
{
    public function testSetAndGetTitre(): void
    {
        $soiree = new Soiree();
        $soiree->setTitre('Soirée Electro');
        $this->assertSame('Soirée Electro', $soiree->getTitre());
    }

    public function testSetAndGetStatut(): void
    {
        $soiree = new Soiree();
        $soiree->setStatut('Ouvert');
        $this->assertSame('Ouvert', $soiree->getStatut());
    }


    // Test d'ajout d'artiste
    public function testAddArtiste(): void
{
    $soiree = new Soiree();
    $artiste = new Artiste();

    $soiree->addArtiste($artiste);

    $this->assertCount(1, $soiree->getArtistes());
}

// Test de l'abscence de doublon
public function testAddArtisteOnlyOnce(): void
{
    $soiree = new Soiree();
    $artiste = new Artiste();

    $soiree->addArtiste($artiste);
    $soiree->addArtiste($artiste);

    $this->assertCount(1, $soiree->getArtistes());
}


}