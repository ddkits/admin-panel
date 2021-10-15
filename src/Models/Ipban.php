<?php


namespace Ddkits\Adminpanel\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Ddkits\Adminpanel\Models\Ipban;
use Auth;

class Ipban extends Model
{
    //
    protected $guarded = ['id', 'ip'];

    public static function addIp($ip, $status = 0){
        $check = Ipban::where('ip', $ip)->first();
        if (empty($check)) {
            $new = new Ipban;
            $new->ip = $ip;
            $new->status = $status;
            $new->save();
        }else{
            $checkStatus = Ipban::checkIp($ip);
            if ($checkStatus) {
                return true;
            }
        }
        return false;
    }
    protected static function checkIp($ip){
        $check = Ipban::where('ip', $ip)->where('status', 1)->first();
        if (!empty($check)) {
            return true;
        }else{
            return false;
        }
    }
    public static function blockIp($ip){
        Ipban::where('ip', $ip)->update([
            'status' => 1,
        ]);
        return true;
    }
    public static function unBlockIp($ip){
        Ipban::where('ip', $ip)->update([
            'status' => 0,
        ]);
        return true;
    }
}
