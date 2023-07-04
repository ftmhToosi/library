<?php

namespace App\Http\Controllers\Api\v1\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\user\ProfileRequest;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    public function profile_show($id): JsonResponse
    {
        try {
            $data = Profile::where('user_id', $id)->get();
            if ($data) {
                return response()->json(
                    $data,
                    200
                );
            }
            else
                return response()->json([], 404);
        } catch (\Exception $exception) {
            return response()->json([
                'success' => false,
                'message' => $exception->getMessage()
            ], 500);
        }
    }

    public function profile_update(ProfileRequest $request, $id): JsonResponse
    {
        try {
            if($request->base64Image) {
                $data = explode(',', $request->base64Image);

                $ext = explode('/', $data[0]);
                $image_type = str_replace(';base64', '', $ext[1]);
                $base664Image = Str::random(65) .'.'. $image_type;
                $this->base64_to_jpeg($data[1], storage_path('app/public/'), $base664Image);
            }
            $data = Profile::where('user_id', $id)->first();
            if($data) {
                $data->image = $base664Image ?? $data->image;
                $data->name = $request->name ?? $data->name;
                $data->phone = $request->phone ?? $data->phone;
                $data->username = $request->username ?? $data->username;
                $data->bio = $request->bio ?? $data->bio;
                $data->save();
            }
            else{
                return response()->json([], 404);
            }

            return response()->json([
                'success' => true,
            ], 202);
        }catch (\Exception $exception) {
            return response()->json([
                'message' => $exception->getMessage()
            ], 500);
        }
    }

    function base64_to_jpeg($base64_string, $output_file, $filename)
    {
        $ifp = fopen($output_file . $filename, 'wb');

        fwrite($ifp, base64_decode($base64_string));
        fclose($ifp);

        return $output_file;
    }
}
