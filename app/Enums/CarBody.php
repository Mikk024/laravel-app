<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class CarBody extends Enum
{
    const WAGON = 'Wagon';
    const COUPE = 'Coupe';
    const COMPACT = 'Compact';
    const SEDAN = 'Sedan';
    const SUV = 'SUV';
}
