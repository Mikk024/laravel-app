<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class CarColor extends Enum
{
    const WHITE = 'White';
    const BLACK = 'Black';
    const GREEN = 'Green';
    const VIOLET = 'Violet';
    const BLUE = 'Blue';
    const GRAY = 'Gray';
    const SILVER = 'Silver';
    
}
