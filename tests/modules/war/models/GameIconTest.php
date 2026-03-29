<?php

/**
 * @copyright Ilch 2
 * @package ilch_phpunit
 */

namespace Modules\War\Models;

use PHPUnit\Ilch\TestCase;
use Modules\War\Models\GameIcon;

/**
 * Tests the GameIcon model class.
 *
 * @package ilch_phpunit
 */
class GameIconTest extends TestCase
{
    public function testDefaultValues(): void
    {
        $model = new GameIcon();

        self::assertEquals(0, $model->getId());
        self::assertSame('', $model->getTitle());
        self::assertSame('', $model->getIcon());
    }

    public function testSetGetId(): void
    {
        $model = new GameIcon();
        $result = $model->setId(42);

        self::assertEquals(42, $model->getId());
        self::assertInstanceOf(GameIcon::class, $result);
    }

    public function testSetGetTitle(): void
    {
        $model = new GameIcon();
        $result = $model->setTitle('CS:GO');

        self::assertSame('CS:GO', $model->getTitle());
        self::assertInstanceOf(GameIcon::class, $result);
    }

    public function testSetGetIcon(): void
    {
        $model = new GameIcon();
        $result = $model->setIcon('icon_abc123def');

        self::assertSame('icon_abc123def', $model->getIcon());
        self::assertInstanceOf(GameIcon::class, $result);
    }

    public function testFluentInterface(): void
    {
        $model = (new GameIcon())
            ->setId(5)
            ->setTitle('Dota 2')
            ->setIcon('icon_dota789xyz');

        self::assertEquals(5, $model->getId());
        self::assertSame('Dota 2', $model->getTitle());
        self::assertSame('icon_dota789xyz', $model->getIcon());
    }

    public function testSetByArrayWithAllFields(): void
    {
        $model = new GameIcon();
        $result = $model->setByArray([
            'id'    => 3,
            'title' => 'League of Legends',
            'icon'  => 'icon_lol_xyz123',
        ]);

        self::assertEquals(3, $model->getId());
        self::assertSame('League of Legends', $model->getTitle());
        self::assertSame('icon_lol_xyz123', $model->getIcon());
        self::assertInstanceOf(GameIcon::class, $result);
    }

    public function testSetByArrayWithPartialFields(): void
    {
        $model = new GameIcon();
        $model->setId(10);
        $model->setIcon('icon_existing');
        $model->setByArray(['title' => 'StarCraft 2']);

        // Only title changes; id and icon keep their previous values
        self::assertEquals(10, $model->getId());
        self::assertSame('StarCraft 2', $model->getTitle());
        self::assertSame('icon_existing', $model->getIcon());
    }

    public function testSetByArrayWithEmptyArray(): void
    {
        $model = (new GameIcon())
            ->setId(7)
            ->setTitle('Fortnite')
            ->setIcon('icon_fn001');

        $model->setByArray([]);

        // Nothing changes
        self::assertEquals(7, $model->getId());
        self::assertSame('Fortnite', $model->getTitle());
        self::assertSame('icon_fn001', $model->getIcon());
    }

    public function testGetArrayWithId(): void
    {
        $model = (new GameIcon())
            ->setId(7)
            ->setTitle('Fortnite')
            ->setIcon('icon_fn001xyz');

        $array = $model->getArray(true);

        self::assertArrayHasKey('id', $array);
        self::assertArrayHasKey('title', $array);
        self::assertArrayHasKey('icon', $array);
        self::assertEquals(7, $array['id']);
        self::assertSame('Fortnite', $array['title']);
        self::assertSame('icon_fn001xyz', $array['icon']);
    }

    public function testGetArrayWithoutId(): void
    {
        $model = (new GameIcon())
            ->setId(7)
            ->setTitle('Fortnite')
            ->setIcon('icon_fn001xyz');

        $array = $model->getArray(false);

        self::assertArrayNotHasKey('id', $array);
        self::assertArrayHasKey('title', $array);
        self::assertArrayHasKey('icon', $array);
        self::assertSame('Fortnite', $array['title']);
        self::assertSame('icon_fn001xyz', $array['icon']);
    }

    public function testGetArrayDefaultIncludesId(): void
    {
        $model = (new GameIcon())->setId(3)->setTitle('Test')->setIcon('icon_test');

        // Default parameter is true → id should be present
        $array = $model->getArray();

        self::assertArrayHasKey('id', $array);
    }
}
