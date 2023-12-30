<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use App\Services\Interfaces\UserServiceInterface as UserService;
use App\Repositories\Interfaces\ProvinceRepositoryInterface as ProvinceRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userService;
    protected $provinceService;

    public function __construct(
        UserService $userService,
        ProvinceRepository $provinceService
    ) {
        $this->userService = $userService;
        $this->provinceService = $provinceService;
    }

    public function index(){
        $config = [
            'js' => [
                'js/plugins/switchery/switchery.js',
            ],
            'css'=>[
                'css/plugins/switchery/switchery.css',
            ]
        ];
        $users = $this->userService->paginate();
        $config['seo'] = config('apps.user');

        $template = 'backend.user.index';
        return view('backend.dashboard.layout',compact(
            'template',
            'config',
            'users',
        ));
    }
    public function create(){
        $config = [
            'js' => [
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
                'backend/library/location.js',
            ],
            'css'=>[

                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css',
            ]
        ];
        $config['seo'] = config('apps.user');
        $provinces = $this->provinceService->all();
        $template = 'backend.user.create';
        return view('backend.dashboard.layout',compact(
            'template',
            'config',
            'provinces',
        ));
    }

    public function store(StoreUserRequest $request){
        if($this->userService->create($request)){
            return redirect()->route('users.index')->with('success','Thêm mới người dùng thành công');
        }
        return redirect()->route('users.index')->with('error','Đã có lỗi xảy ra, vui lòng  thử lại');
    }
}