<?php

namespace App\Helpers;

use File;
use Intervention\Image\Facades\Image;
use Str;

class General {
	
	/**
       * menampilkan nomer urut dalam tabel walaupun dalam bentuk pagination
      *
      * @param [integer] $paginationNumber
      * @return void
      */
	public static function numberPagination($paginationNumber)
	{
		$number = 1;

		if (request()->has('page') && request()->get('page') > 1) {
			$number += (request()->get('page') - 1) * $paginationNumber;
		}

		return $number;
	}

	/**
		* Upload gambar dengan ukuran custom (width dan height nya dapat ditentukan)
		*
		* @param [string] $file
		* @param [int] $width
		* @param [int] $height
		* @param [string] $name
		* @param [string] $location
		* @return void
	*/
	public static function uploadImage($file, $width, $height, $name, $location)
	{
		$images = Str::slug($name) . time() . '.' . $file->getClientOriginalExtension();
		$path = storage_path('app/public/' . $location); // otomatis masuk ke folder storage

		if (!File::isDirectory($path))
		{
			File::makeDirectory($path, 0777, true, true);
		}

		Image::make($file)->resize($width, $height)->save($path . '/' . $images);
		
		return $location . '/' . $images;
	}

	/**
		* Upload gambar dengan ukuran original/sesuai file yang diupload
		*
		* @param [string] $file
		* @param [string] $name
		* @param [string] $location
		* @return void
	*/
	public static function uploadOriginalImage($file, $name, $location)
	{
		$images = Str::slug($name) . time() . '.' . $file->getClientOriginalExtension();
		$path = storage_path('app/public/' . $location); // otomatis masuk ke folder storage

		if (!File::isDirectory($path))	
		{
			File::makeDirectory($path, 0777, true, true);
		}
		Image::make($file)->save($path . '/' . $images);

		return $location . '/' . $images;
	}

	/**
	 * Digunakan untuk upload file secara general
	 *
	 * @param [type] $file_upload
	 * @param [type] $name
	 * @param [type] $location
	 * @return void
	 */
	public static function uploadFile($file_upload, $name, $location, $disk = 'public')
	{
		$file = Str::slug($name) . time() . '.' . $file_upload->getClientOriginalExtension();

		$path = storage_path('app/public/' . $location); // otomatis masuk ke folder storage

		if (!File::isDirectory($path))	
		{
			File::makeDirectory($path, 0777, true, true);
		}

		// Process and store the uploaded file
		if ($file_upload) {
			$file_location = $file_upload->storeAs($location, $file, $disk);
		}

		return [
			'file_location'  		=> $file_location,
			'origin_file_save_name' => $file
		];
	}
}