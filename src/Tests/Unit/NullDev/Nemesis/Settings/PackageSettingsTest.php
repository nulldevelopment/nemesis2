<?php
namespace NullDev\Nemesis\Tests\Unit\Settings;

use NullDev\Nemesis\Settings\PackageSettings;

/**
 * Class PackageSettingsTest.
 */
class PackageSettingsTest extends \PHPUnit_Framework_TestCase
{
    public function testNothing()
    {
        $obj = new PackageSettings();
        $this->assertNotNull($obj);
    }
}
