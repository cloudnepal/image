<?php

namespace Intervention\Image\Tests\Colors\Rgb;

use Intervention\Image\Colors\Cmyk\Color as CmykColor;
use Intervention\Image\Colors\Hsv\Color as HsvColor;
use Intervention\Image\Colors\Rgb\Channels\Blue;
use Intervention\Image\Colors\Rgb\Channels\Green;
use Intervention\Image\Colors\Rgb\Channels\Red;
use Intervention\Image\Colors\Rgb\Color as RgbColor;
use Intervention\Image\Colors\Hsl\Color as HslColor;
use Intervention\Image\Colors\Rgb\Colorspace;
use Intervention\Image\Tests\TestCase;

/**
 * @covers \Intervention\Image\Colors\Rgb\Colorspace
 */
class ColorspaceTest extends TestCase
{
    public function testImportCmykColor(): void
    {
        $colorspace = new Colorspace();
        $result = $colorspace->importColor(new CmykColor(0, 100, 0, 0));
        $this->assertInstanceOf(RgbColor::class, $result);
        $this->assertEquals(255, $result->channel(Red::class)->value());
        $this->assertEquals(0, $result->channel(Green::class)->value());
        $this->assertEquals(255, $result->channel(Blue::class)->value());

        $result = $colorspace->importColor(new CmykColor(0, 0, 0, 50));
        $this->assertInstanceOf(RgbColor::class, $result);
        $this->assertEquals(127, $result->channel(Red::class)->value());
        $this->assertEquals(127, $result->channel(Green::class)->value());
        $this->assertEquals(127, $result->channel(Blue::class)->value());
    }

    public function testImportHsvColor(): void
    {
        $colorspace = new Colorspace();

        $result = $colorspace->importColor(new HsvColor(300, 100, 100));
        $this->assertInstanceOf(RgbColor::class, $result);
        $this->assertEquals(255, $result->channel(Red::class)->value());
        $this->assertEquals(0, $result->channel(Green::class)->value());
        $this->assertEquals(255, $result->channel(Blue::class)->value());

        $result = $colorspace->importColor(new HsvColor(0, 0, 50));
        $this->assertInstanceOf(RgbColor::class, $result);
        $this->assertEquals(128, $result->channel(Red::class)->value());
        $this->assertEquals(128, $result->channel(Green::class)->value());
        $this->assertEquals(128, $result->channel(Blue::class)->value());
    }

    public function testImportHslColor(): void
    {
        $colorspace = new Colorspace();

        $result = $colorspace->importColor(new HslColor(300, 100, 50));
        $this->assertInstanceOf(RgbColor::class, $result);
        $this->assertEquals(255, $result->channel(Red::class)->value());
        $this->assertEquals(0, $result->channel(Green::class)->value());
        $this->assertEquals(255, $result->channel(Blue::class)->value());

        $result = $colorspace->importColor(new HslColor(0, 0, 50));
        $this->assertInstanceOf(RgbColor::class, $result);
        $this->assertEquals(128, $result->channel(Red::class)->value());
        $this->assertEquals(128, $result->channel(Green::class)->value());
        $this->assertEquals(128, $result->channel(Blue::class)->value());
    }
}
