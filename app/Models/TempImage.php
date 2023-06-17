<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempImage extends Model
{
    use HasFactory;

    protected $table = "temp_image";
    protected $primaryKey = 'id_temp_img';
    public $timestamps = false;

    protected $fillable = ['filename', 'temp_life'];

    public static function nextDay()
    {
        return now()->addDay()->toDateTimeString();
    }

    public static function check_timelife($life)
    {
        $lifeTime = DateTime::createFromFormat('Y-m-d H:i:s', $life);
        $now = new DateTime();

        return $lifeTime < $now;
    }

    public static function destroy_temp()
    {
        $fNames = TempImage::whereDate('temp_life', '<', now()->toDateTime())->get();

        foreach ($fNames as $f){
            $path = 'images/upload/temp/' . $f->filename;
            unlink(public_path($path));
        }
        TempImage::whereDate('temp_life', '<', now()->toDateTime())->delete();
    }
}
