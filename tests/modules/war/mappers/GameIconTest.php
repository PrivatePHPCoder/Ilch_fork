<?php

/**
 * @copyright Ilch 2
 * @package ilch_phpunit
 */

namespace Modules\War\Mappers;

use PHPUnit\Ilch\DatabaseTestCase;
use PHPUnit\Ilch\PhpunitDataset;
use Modules\War\Config\Config as ModuleConfig;
use Modules\User\Config\Config as UserConfig;
use Modules\Admin\Config\Config as AdminConfig;
use Modules\War\Mappers\GameIcon as GameIconMapper;
use Modules\War\Models\GameIcon as GameIconModel;

/**
 * @package ilch_phpunit
 */
class GameIconTest extends DatabaseTestCase
{
    protected $phpunitDataset;
    private $mapper;

    public function setUp(): void
    {
        parent::setUp();
        $this->phpunitDataset = new PhpunitDataset($this->db);
        $this->phpunitDataset->loadFromFile(__DIR__ . '/../_files/mysql_database.yml');

        $this->mapper = new GameIconMapper();
    }

    public function testGetGameIconsAllRows(): void
    {
        $entries = $this->mapper->getGameIcons();

        self::assertCount(2, $entries);
    }

    public function testGetGameIcons(): void
    {
        $entries = $this->mapper->getGameIcons();

        self::assertCount(2, $entries);

        // Ordered by title ASC: "CSS" before "Dota 2"
        $i = 0;
        self::assertEquals(1, $entries[$i]->getId());
        self::assertSame('CSS', $entries[$i]->getTitle());
        self::assertSame('icon_css123456', $entries[$i]->getIcon());

        $i++;
        self::assertEquals(2, $entries[$i]->getId());
        self::assertSame('Dota 2', $entries[$i]->getTitle());
        self::assertSame('icon_dota789012', $entries[$i]->getIcon());
    }

    public function testGetGameIconById(): void
    {
        $entry = $this->mapper->getGameIconById(1);

        self::assertNotNull($entry);
        self::assertEquals(1, $entry->getId());
        self::assertSame('CSS', $entry->getTitle());
        self::assertSame('icon_css123456', $entry->getIcon());
    }

    public function testGetGameIconByIdNotFound(): void
    {
        $entry = $this->mapper->getGameIconById(999);

        self::assertNull($entry);
    }

    public function testGetGameIconMap(): void
    {
        $map = $this->mapper->getGameIconMap();

        self::assertIsArray($map);
        self::assertCount(2, $map);
        self::assertArrayHasKey('CSS', $map);
        self::assertArrayHasKey('Dota 2', $map);
        self::assertSame('icon_css123456', $map['CSS']);
        self::assertSame('icon_dota789012', $map['Dota 2']);
    }

    public function testGetGameIconMapReturnsEmptyArrayWhenNoIcons(): void
    {
        $this->mapper->delete(1);
        $this->mapper->delete(2);

        $map = $this->mapper->getGameIconMap();

        self::assertIsArray($map);
        self::assertCount(0, $map);
    }

    public function testCheckDB(): void
    {
        self::assertTrue($this->mapper->checkDB());
    }

    public function testSaveNewGameIcon(): void
    {
        $model = new GameIconModel();
        $model->setTitle('StarCraft 2');
        $model->setIcon('icon_sc2test01');
        $id = $this->mapper->save($model);

        $entry = $this->mapper->getGameIconById($id);

        self::assertNotNull($entry);
        self::assertEquals($id, $entry->getId());
        self::assertSame('StarCraft 2', $entry->getTitle());
        self::assertSame('icon_sc2test01', $entry->getIcon());
    }

    public function testSaveNewGameIconReturnsPositiveId(): void
    {
        $model = new GameIconModel();
        $model->setTitle('League of Legends');
        $model->setIcon('icon_loltest01');
        $id = $this->mapper->save($model);

        self::assertGreaterThan(0, $id);
    }

    public function testSaveUpdateExistingGameIcon(): void
    {
        $model = new GameIconModel();
        $model->setId(1);
        $model->setTitle('Counter-Strike: Source');
        $model->setIcon('icon_css_updated');
        $id = $this->mapper->save($model);

        $entry = $this->mapper->getGameIconById($id);

        self::assertNotNull($entry);
        self::assertEquals(1, $id);
        self::assertEquals(1, $entry->getId());
        self::assertSame('Counter-Strike: Source', $entry->getTitle());
        self::assertSame('icon_css_updated', $entry->getIcon());
    }

    public function testSaveUpdateReturnsExistingId(): void
    {
        $model = new GameIconModel();
        $model->setId(2);
        $model->setTitle('Dota 2 Updated');
        $model->setIcon('icon_dota_updated');
        $id = $this->mapper->save($model);

        self::assertEquals(2, $id);
    }

    public function testDeleteGameIcon(): void
    {
        $result = $this->mapper->delete(1);
        self::assertTrue($result);

        $entry = $this->mapper->getGameIconById(1);
        self::assertNull($entry);
    }

    /**
     * Returns database schema sql statements to initialize database
     */
    protected static function getSchemaSQLQueries(): string
    {
        $config = new ModuleConfig();
        $configUser = new UserConfig();
        $configAdmin = new AdminConfig();

        return $configAdmin->getInstallSql() . $configUser->getInstallSql() . $config->getInstallSql();
    }
}
