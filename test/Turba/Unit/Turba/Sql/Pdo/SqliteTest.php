<?php
/**
 * Test the core Turba driver with a sqlite DB.
 *
 * PHP version 5
 *
 * @category   Horde
 * @package    Turba
 * @subpackage UnitTests
 * @author     Gunnar Wrobel <wrobel@pardus.de>
 * @link       http://www.horde.org/apps/turba
 * @license    http://www.horde.org/licenses/apache Apache-like
 */

/**
 * Prepare the test setup.
 */
require_once __DIR__ . '/../Base.php';

/**
 * Test the core Turba driver with a sqlite DB.
 *
 * Copyright 2011-2017 Horde LLC (http://www.horde.org/)
 *
 * See the enclosed file LICENSE for license information (ASL). If you
 * did not receive this file, see http://www.horde.org/licenses/apache.
 *
 * @category   Horde
 * @package    Turba
 * @subpackage UnitTests
 * @author     Gunnar Wrobel <wrobel@pardus.de>
 * @link       http://www.horde.org/apps/turba
 * @license    http://www.horde.org/licenses/apache Apache-like
 */
class Turba_Unit_Turba_Sql_Pdo_SqliteTest extends Turba_Unit_Turba_Sql_Base
{
    protected $backupGlobals = false;

    public static function setUpBeforeClass()
    {
        self::$setup = new Horde_Test_Setup();
        self::createSqlPdoSqlite(self::$setup);
        parent::setUpBeforeClass();
    }
}