<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\BerkasPengajuanMagang
 *
 * @property int $id
 * @property int $pengajuan_magang_id
 * @property string|null $surat_pernyataan_upload_path
 * @property string|null $surat_pernyataan_file_name
 * @property string|null $surat_panggilan_upload_path
 * @property string|null $surat_panggilan_file_name
 * @property string|null $surat_rekomendasi_upload_path untuk kolom ini diganti (Upload Surat Persetujuan yang sudah di Tanda Tangan)
 * @property string|null $surat_rekomendasi_file_name untuk kolom ini diganti (Upload Surat Persetujuan yang sudah di Tanda Tangan)
 * @property string|null $ktm_upload_path
 * @property string|null $ktm_file_name
 * @property string|null $surat_sehat_upload_path
 * @property string|null $surat_sehat_file_name
 * @property string|null $bpjs_upload_path untuk kolom ini diganti (Upload Asuransi Kecelakaan Kerja)
 * @property string|null $bpjs_file_name untuk kolom ini diganti (Upload Asuransi Kecelakaan Kerja)
 * @property string|null $foto_upload_path
 * @property string|null $foto_file_name
 * @property string|null $twibbon_upload_path
 * @property string|null $twibbon_file_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\PengajuanMagang $pengajuanMagang
 * @method static \Illuminate\Database\Eloquent\Builder|BerkasPengajuanMagang newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BerkasPengajuanMagang newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BerkasPengajuanMagang onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|BerkasPengajuanMagang query()
 * @method static \Illuminate\Database\Eloquent\Builder|BerkasPengajuanMagang whereBpjsFileName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BerkasPengajuanMagang whereBpjsUploadPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BerkasPengajuanMagang whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BerkasPengajuanMagang whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BerkasPengajuanMagang whereFotoFileName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BerkasPengajuanMagang whereFotoUploadPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BerkasPengajuanMagang whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BerkasPengajuanMagang whereKtmFileName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BerkasPengajuanMagang whereKtmUploadPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BerkasPengajuanMagang wherePengajuanMagangId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BerkasPengajuanMagang whereSuratPanggilanFileName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BerkasPengajuanMagang whereSuratPanggilanUploadPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BerkasPengajuanMagang whereSuratPernyataanFileName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BerkasPengajuanMagang whereSuratPernyataanUploadPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BerkasPengajuanMagang whereSuratRekomendasiFileName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BerkasPengajuanMagang whereSuratRekomendasiUploadPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BerkasPengajuanMagang whereSuratSehatFileName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BerkasPengajuanMagang whereSuratSehatUploadPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BerkasPengajuanMagang whereTwibbonFileName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BerkasPengajuanMagang whereTwibbonUploadPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BerkasPengajuanMagang whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BerkasPengajuanMagang withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|BerkasPengajuanMagang withoutTrashed()
 */
	class BerkasPengajuanMagang extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\BerkasPesertaMagang
 *
 * @property-read \App\Models\PengajuanMagang $pengajuanMagang
 * @method static \Illuminate\Database\Eloquent\Builder|BerkasPesertaMagang newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BerkasPesertaMagang newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BerkasPesertaMagang onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|BerkasPesertaMagang query()
 * @method static \Illuminate\Database\Eloquent\Builder|BerkasPesertaMagang withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|BerkasPesertaMagang withoutTrashed()
 */
	class BerkasPesertaMagang extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\KuotaMagang
 *
 * @property int $id
 * @property int $jurusan_id
 * @property string $jenjang_pendidikan
 * @property int $kuota
 * @property int $bulan_pelaksanaan Data yang dimasukan adalah data bulan dalam bentuk angka
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Master\Jurusan $jurusan
 * @method static \Illuminate\Database\Eloquent\Builder|KuotaMagang newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|KuotaMagang newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|KuotaMagang onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|KuotaMagang query()
 * @method static \Illuminate\Database\Eloquent\Builder|KuotaMagang whereBulanPelaksanaan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KuotaMagang whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KuotaMagang whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KuotaMagang whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KuotaMagang whereJenjangPendidikan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KuotaMagang whereJurusanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KuotaMagang whereKuota($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KuotaMagang whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KuotaMagang withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|KuotaMagang withoutTrashed()
 */
	class KuotaMagang extends \Eloquent {}
}

namespace App\Models\Master{
/**
 * App\Models\Master\Jurusan
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\KuotaMagang|null $kuotaMagang
 * @property-read \App\Models\PengajuanMagang|null $pengajuanMagang
 * @method static \Illuminate\Database\Eloquent\Builder|Jurusan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Jurusan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Jurusan onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Jurusan query()
 * @method static \Illuminate\Database\Eloquent\Builder|Jurusan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Jurusan whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Jurusan whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Jurusan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Jurusan whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Jurusan whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Jurusan withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Jurusan withoutTrashed()
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
 * @property string|null $telepon
 * @property string|null $rekomendasi
 * @property int $jumlah_total_kelompok
 * @property mixed $nama_anggota_kelompok
 * @property string|null $tujuan
 * @property string|null $ajuan_topik
 * @property string $periode_awal
 * @property string $periode_akhir
 * @property int $lama_bulan_pelaksanaan ini dimasukan dalam bentuk bulan, ex: 1 = 1 bulan
 * @property string|null $cv_upload_path
 * @property string|null $cv_file_name
 * @property string|null $proposal_upload_path
 * @property string|null $proposal_file_name
 * @property string|null $surat_pengantar_upload_path
 * @property string|null $surat_pengantar_file_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string $status 0: pending, 1: disetujui, 2: ditolak
 * @property-read \App\Models\BerkasPengajuanMagang|null $berkasPengajuanMagang
 * @property-read \App\Models\Master\Jurusan $jurusan
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|PengajuanMagang newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PengajuanMagang newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PengajuanMagang onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|PengajuanMagang query()
 * @method static \Illuminate\Database\Eloquent\Builder|PengajuanMagang whereAjuanTopik($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PengajuanMagang whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PengajuanMagang whereCvFileName($value)
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
 * @method static \Illuminate\Database\Eloquent\Builder|PengajuanMagang whereProposalUploadPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PengajuanMagang whereRekomendasi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PengajuanMagang whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PengajuanMagang whereSuratPengantarFileName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PengajuanMagang whereSuratPengantarUploadPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PengajuanMagang whereTelepon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PengajuanMagang whereTujuan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PengajuanMagang whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PengajuanMagang whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PengajuanMagang withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|PengajuanMagang withoutTrashed()
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
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \App\Models\PengajuanMagang|null $pengajuanMagang
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFullname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhotoUploadPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|User withoutTrashed()
 */
	class User extends \Eloquent {}
}

