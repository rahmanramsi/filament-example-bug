<?php

namespace App\Models;

use Spatie\Permission\Models\Role as Models;

class Role extends Models
{

  public const SUPER_ADMIN = 'Super Admin';
  public const MANAGER = 'Manager';
  public const KADIS = 'Kepala Dinas';
  public const KABID = 'Kepala Bidang';
  public const SEKRETARIS = 'Sekretaris';
  public const KASI = 'Kepala Seksi';
  public const PENGAWAS = 'Pengawas';
  public const ADMIN_BIDANG = 'Admin Bidang';
  public const BENDAHARA = 'Bendahara';
  public const PENYEDIA_JASA = 'Penyedia Jasa';

  public static function getRoles(): array
  {
    try {
      return array_values(static::lastConstants());
    } catch (\ReflectionException $exception) {
      return [];
    }
  }

  static function lastConstants()
  {
    $parentConstants = static::getParentConstants();

    $allConstants = static::getConstants();

    return array_diff($allConstants, $parentConstants);
  }

  static function getConstants()
  {
    $rc = new \ReflectionClass(get_called_class());

    return $rc->getConstants();
  }

  static function getParentConstants()
  {
    $rc = new \ReflectionClass(get_parent_class(static::class));
    return $rc->getConstants();
  }
}
