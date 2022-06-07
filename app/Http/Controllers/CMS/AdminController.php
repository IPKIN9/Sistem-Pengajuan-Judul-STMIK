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

        return response()->json($admin);
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
}
