<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Interfaces\AdminRepositoryInterface;
use App\Interfaces\DosenRepositoryInterface;
use App\Models\AdminModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __construct(AdminRepositoryInterface $adminRepository, DosenRepositoryInterface $dosenRepository)
    {
        $this->adminRepository = $adminRepository;
        $this->dosenRepository = $dosenRepository;
    }

    public function index()
    {
        $user = array(
            'user' => User::role(array('user', 'dosen'))->get(),
            'profile' => AdminModel::all()
        );
        return view('Auth.regisAkun')->with('user', $user);
    }

    public function getByAdmin()
    {
        $admin = $this->adminRepository->getAllAdmin();
        return response()->json($admin);
    }

    public function getByDosen()
    {
        $dosen = $this->dosenRepository->getAllDosen();
        return response()->json($dosen);
    }

    public function createAkun(Request $request)
    {
        try {
            $dbResult = User::create([
                'id_profile' => $request->id_profile,
                'username' => $request->username,
                'password' => Hash::make($request->password)
            ]);
            $dbResult->assignRole('dosen');
            $akun = array(
                'data' => $dbResult,
                'response' => array(
                    'icon' => 'success',
                    'title' => 'Tersimpan',
                    'message' => 'Data berhasil disimpan',
                ),
                'code' => 201
            );
        } catch (\Throwable $th) {
            $akun = array(
                'data' => null,
                'response' => array(
                    'icon' => 'error',
                    'title' => 'Gagal',
                    'message' => $th->getMessage(),
                ),
                'code' => 500
            );
        }

        return response()->json($akun, $akun['code']);
    }

    public function deleteAkun($id)
    {
        try {
            $dbResult = User::whereId($id);
                $akun = array(
                    'data' => $dbResult->delete(),
                    'response' => array(
                        'icon' => 'success',
                        'title' => 'Terhapus',
                        'message' => 'Data berhasil dihapus',
                    ),
                    'code' => 200
                );
        } catch (\Throwable $th) {
            $akun = array(
                'data' => null,
                'response' => array(
                    'icon' => 'error',
                    'title' => 'Gagal',
                    'message' => $th->getMessage(),
                ),
                'code' => 500
            );
        }

        return response()->json($akun, $akun['code']);
    }
}
