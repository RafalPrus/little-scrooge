<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Cache\LockTimeoutException;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class LotteryController extends Controller
{
    public function show()
    {
        $lock = Cache::lock('process_coupon' . auth()->user()->id, 10);

        try {
            $lock->block(3);
            sleep(2);
            if (!auth()->user()->coupons()->active()->get()->isEmpty())
            {
                return response(['message' => 'Coupon already generated'], 429);
            }

            $coupon = auth()->user()->coupons()->create(['code' => $uuid = Str::uuid()]);
            return response(['coupon_code' => $coupon->code], 201);

        } catch (LockTimeoutException $e) {
            return response(['message' => 'Too many attempts'], 429);
        } finally {
            $lock->release();
        }
    }

}
