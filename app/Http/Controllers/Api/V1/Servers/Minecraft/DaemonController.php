<?php

namespace Falcon\Http\Controllers\Api\V1\Servers\Minecraft;

use Falcon\Http\Controllers\Controller;
use File;
use Illuminate\Http\Request;

class DaemonController extends Controller
{
    /**
     * Provides a download a specified JAR file
     *
     * @param  string $file
     * @param  string $version
     * @return mixed
     */
    public function downloadJarFile(Request $request)
    {
        $filename = $request->input('file');
        $version = $request->input('version');
        $file = storage_path('servers/minecraft/' . $filename . '/' . $version . '/' . $filename . '.jar');

        if (!File::exists($file)) {
            return response()->json(['error' => true, 'message' => 'Requested resource does not exist.']);
        }

        return response()->download($file, $filename . '_' . $version . '.jar');
    }

    /**
     * Provides a download a specified config file
     *
     * @param  string $file
     * @param  string $version
     * @return mixed
     */
    public function downloadCfgFile(Request $request)
    {
        $filename = $request->input('file');
        $version = $request->input('version');
        $file = storage_path('servers/minecraft/' . $filename . '/' . $version . '/' . $filename . '.jar.conf');

        if (!File::exists($file)) {
            return response()->json(['error' => true, 'message' => 'Requested resource does not exist.']);
        }

        return response()->download($file, $filename . '.jar.conf');
    }

    public function test()
    {
        $error_num = 0;
        $error_str = '';
        $socket = @pfsockopen(env('MULTICRAFT_TEST_IP', '127.0.0.1'), 25465, $error_num, $error_str, 60);
        fclose($socket);
        return response()->json(['Successfully connected!']);
    }
}
