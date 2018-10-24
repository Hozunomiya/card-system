<?php
namespace App; use Illuminate\Database\Eloquent\Model; class System extends Model { protected $guarded = array(); private static $systems = array(); public static function _init() { \Log::debug('SystemSetting._init'); static::$systems = \Cache::rememberForever('settings.all', function () { \Log::debug('SystemSetting._init.fetch from database'); $sp1d87df = System::query()->get()->toArray(); foreach ($sp1d87df as $sp38d941) { static::$systems[$sp38d941['name']] = $sp38d941['value']; } return static::$systems; }); static::$systems['_initialized'] = true; } public static function _get($spb44bf2, $spe18287 = NULL) { if (!isset(static::$systems['_initialized'])) { static::_init(); } if (isset(static::$systems[$spb44bf2])) { return static::$systems[$spb44bf2]; } return $spe18287; } public static function _getInt($spb44bf2, $spe18287 = NULL) { return (int) static::_get($spb44bf2, $spe18287); } public static function _set($spb44bf2, $spb66e06) { static::$systems[$spb44bf2] = $spb66e06; $sp651922 = System::query()->where('name', $spb44bf2)->first(); if ($sp651922) { $sp651922->value = $spb66e06; $sp651922->save(); } else { try { System::query()->insert(array('name' => $spb44bf2, 'value' => $spb66e06)); } catch (\Exception $sp2a4a9a) { } } self::flushCache(); } public static function flushCache() { \Log::debug('SystemSetting.flushCache'); \Cache::forget('settings.all'); } protected static function boot() { parent::boot(); static::updated(function () { self::flushCache(); }); static::created(function () { self::flushCache(); }); } }