<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Interfaces\AdminRepositoryInterface;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct(AdminRepositoryInterface $adminRepository)
    {
        $this->adminRepository = $adminRepository;
    }

    public function index()
    {
        $admin = $this->adminRepository->getAllAdmin();

        return view('CMS.admin')->with('admin', $admin);
    }

    public function getById($id)
    {
        $admin = $this->adminRepository->getAdminById($id);

        return response()->json($admin, $admin['code']);
    }

    public function createData(AdminRequest $request)
    {
        $adminDetails = $request->only([
            'nama',
            'jabatan',
            'nidn',
        ]);

        $admin = $this->adminRepository->createAdmin($adminDetails);
        return response()->json($admin, $admin['code']);
    }

    public function updateData(AdminRequest $request, $id)
    {
        $newDetails = $request->only([
            'nama',
            'jabatan',
            'nidn',
        ]);

        $admin = $this->adminRepository->updateAdmin($id, $newDetails);
        return response()->json($admin, $admin['code']);
    }

    public function deleteData($id)
    {
        $admin = $this->adminRepository->deleteAdmin($id);

        return response()->json($admin, $admin['code']);
    }
}
