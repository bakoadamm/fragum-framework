<?php
/**
 * Created by PhpStorm.
 * User: lapos
 * Date: 2020.03.22.
 * Time: 20:17
 */

namespace App\Http\Header;


abstract class ClientHints
{
    const ACCEPT_CH = 'Accept-CH';

    const ACCEPT_CH_LIFETIME = 'Accept-CH-Lifetime';

    const EARLY_DATA = 'Early-Data';

    const CONTENT_DPR = 'Content-DPR';

    const DPR = 'DPR';

    const DEVICE_MEMORY = 'Device-Memory';

    const SAVE_DATA = 'Save-Data';

    const VIEWPORT_WIDTH = 'Viewport-Width';

    const WIDTH = 'Width';
}