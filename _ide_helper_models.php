<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models\Master{
/**
 * App\Models\Master\Jurusan
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \App\Models\PengajuanMagang|null $pengajuanMagang
 * @method static \Illuminate\Database\Eloquent\Builder|Jurusan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Jurusan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Jurusan query()
 * @method static \Illuminate\Database\Eloquent\Builder|Jurusan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Jurusan whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Jurusan whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Jurusan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Jurusan whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Jurusan whereUpdatedAt($value)
 */
	class Jurusan extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PengajuanMagang
 *
 * @property int $id
 * @property string $name
 * @property string $nim
 * @property string $instansi
 * @property int $jurusan_id
 * @property int $user_id
 * @property string $jenjang_pendidikan
 * @property string|null $rekomendasi
 * @property int $jumlah_total_kelompok
 * @property mixed $nama_anggota_kelompok
 * @property string|null $tujuan
 * @property string|null $ajuan_topik
 * @property string $periode_awal
 * @property string $periode_akhir
 * @property int $lama_bulan_pelaksanaan ini dimasukan dalam bentuk bulan, ex: 1 = 1 bulan
 * @property string|null $cv_upload_path
 * @property string|null $cv_origin_filename
 * @property string|null $cv_file_name
 * @property string|null $proposal_upload_path
 * @property string|null $proposal_origin_filename
 * @property string|null $proposal_file_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \App\Models\Master\Jurusan $jurusan
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|PengajuanMagang newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PengajuanMagang newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PengajuanMagang query()
 * @method static \Illuminate\Database\Eloquent\Builder|PengajuanMagang whereAjuanTopik($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PengajuanMagang whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PengajuanMagang whereCvFileName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PengajuanMagang whereCvOriginFilename($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PengajuanMagang whereCvUploadPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PengajuanMagang whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PengajuanMagang whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PengajuanMagang whereInstansi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PengajuanMagang whereJenjangPendidikan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PengajuanMagang whereJumlahTotalKelompok($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PengajuanMagang whereJurusanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PengajuanMagang whereLamaBulanPelaksanaan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PengajuanMagang whereNamaAnggotaKelompok($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PengajuanMagang whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PengajuanMagang whereNim($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PengajuanMagang wherePeriodeAkhir($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PengajuanMagang wherePeriodeAwal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PengajuanMagang whereProposalFileName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PengajuanMagang whereProposalOriginFilename($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PengajuanMagang whereProposalUploadPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PengajuanMagang whereRekomendasi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PengajuanMagang whereTujuan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PengajuanMagang whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PengajuanMagang whereUserId($value)
 */
	class PengajuanMagang extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $fullname
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $role
 * @property string|null $photo_upload_path
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \App\Models\PengajuanMagang|null $pengajuanMagang
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFullname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhotoUploadPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

