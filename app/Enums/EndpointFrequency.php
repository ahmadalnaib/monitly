<?php

namespace App\Enums;

enum EndpointFrequency: int
{
  case ONE_MINUTE = 1 * 60;
  case FIVE_MINUTES = 5 * 60;
  case THIRTY_MINUTES = 30 * 60;
  case ONE_HOUR = 60 * 60;

  public function label(): string
  {
    return match ($this) {
      self::ONE_MINUTE => '١ دقيقة',
      self::FIVE_MINUTES => '٥ دقائق',
      self::THIRTY_MINUTES => '٣٠ دقيقة',
      self::ONE_HOUR => '١ ساعة',
    };
  }
}
