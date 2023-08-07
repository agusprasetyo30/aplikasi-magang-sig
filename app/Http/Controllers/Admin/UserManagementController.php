<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\General;
use App\Http\Controllers\Controller;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Validator;

class UserManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $jumlah_halaman = 5;
        $number = General::numberPagination($jumlah_halaman);
        
        $user = User::query();

        if ($request->get('user_name')) {
            $user = $user->where('fullname', 'like', '%' . $request->get('user_name') . '%');
        }

        if ($request->get('user_type')) {
            $user = $user->where('role', $request->get('user_type'));
        }

        if (!is_null($request->get('user_name')) && !is_null($request->get('user_type'))) {
            $user = $user->where('fullname', '%' . $request->get('user_name') . '%')
                ->where('role', $request->get('user_type'));
        }

        return view('admin.user-management.index', [
            'users' => $user->paginate($jumlah_halaman),
            'number' => $number
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user-management.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi
        $validation_input = $this->checkValidationInput($request);

        if ($validation_input->fails()) {
            return redirect()->back()->withErrors($validation_input)->withInput();
        }

        User::create([
            'fullname' => $request->fullname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role'     => $request->user_role
        ]);

        return redirect()
            ->route('admin.user-management.index')
            ->with('alert_type', 'success')
            ->with('message', 'Pengguna berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::where('id', $id)->first();

        return view('admin.user-management.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::where('id', $id)->first();
        
        if (!is_null($request->password)) {
            $user->update([
                'password' => Hash::make($request->password)
            ]);
        }

        $user->update([
            'fullname' => $request->fullname,
            'role'     => $request->user_role
        ]);

        return redirect()
            ->route('admin.user-management.index')
            ->with('alert_type', 'success')
            ->with('message', 'Pengguna berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id', $id)->delete();

        return redirect()
            ->route('admin.user-management.index')
            ->with('alert_type', 'success')
            ->with('message', 'User berhasil dihapus');
    }

    /**
     * Validation for checking input in form
     *
     * @param [type] $request
     * @return object
     */
    private function checkValidationInput($request)
    {
        $validation = [
            'fullname' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password'              => 'confirmed|min:6',
        ];

        return Validator::make($request->all(), $validation);
    }
}
