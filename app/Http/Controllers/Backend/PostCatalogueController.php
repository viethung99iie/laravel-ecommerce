<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostCatalogueRequest;
use App\Http\Requests\UpdatePostCatalogueRequest;
use App\Services\Interfaces\PostCatalogueServiceInterface as PostCatalogueService;
use App\Repositories\Interfaces\PostCatalogueRepositoryInterface as PostCatalogueRepository;
use Illuminate\Http\Request;

class PostCatalogueController extends Controller
{
    protected $postCatalogueService;
    protected $postCatalogueRepository;

    public function __construct(
        PostCatalogueService $postCatalogueService,
        PostCatalogueRepository $postCatalogueRepository,
    ) {
        $this->postCatalogueService = $postCatalogueService;
        $this->postCatalogueRepository = $postCatalogueRepository;
    }

    public function index(Request $request){
        $config = [
            'js' => [
                'backend/js/plugins/switchery/switchery.js',
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
            ],
            'css'=>[
                'backend/css/plugins/switchery/switchery.css',
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css',

            ]
        ];
        $config['seo'] = config('apps.postcatalogue');
        $postCatalogues = $this->postCatalogueService->paginate($request);
        $template = 'backend.post.post-catalogue.index';
        return view('backend.dashboard.layout',compact(
            'template',
            'config',
            'postCatalogues',
        ));
    }
    public function create(){
        $config = $this->config();
        $config['seo'] = config('apps.postcatalogue');
        $config['method'] = 'create';
        $template = 'backend.post.post-catalogue.store';
        return view('backend.dashboard.layout',compact(
            'template',
            'config',
        ));
    }

    public function store(StorePostCatalogueRequest $request){
        if($this->postCatalogueService->create($request)){
            return redirect()->route('post.catalogue.index')->with('success','Thêm mới bảng ghi thành công');
        }
        return redirect()->route('post.catalogue.index')->with('error','Đã có lỗi xảy ra, vui lòng  thử lại');
    }

    public function edit($id){
        $postCatalogue = $this->postCatalogueRepository->findById($id);
        $config = $this->config();
        $config['seo'] = config('apps.postcatalogue');
        $config['method'] = 'edit';
        $template = 'backend.post.post.catalogue.store';
        return view('backend.dashboard.layout',compact(
            'template',
            'config',
            'postCatalogue'
        ));
    }

    public function update($id,UpdatePostCatalogueRequest $request){
        if($this->postCatalogueService->update($id,$request)){
            return redirect()->route('post.catalogue.index')->with('success','Cập nhật bảng ghi thành công');
        }
        return redirect()->route('post.catalogue.index')->with('error','Đã có lỗi xảy ra, vui lòng  thử lại');
    }

    public function delete($id){
        $postCatalogue = $this->postCatalogueRepository->findById($id);
        $config['seo'] = config('apps.postcatalogue');
        $template = 'backend.post.post.catalogue.delete';
        return view('backend.dashboard.layout',compact(
            'template',
            'config',
            'postCatalogue'
        ));
    }

    public function destroy($id){
        if($this->postCatalogueService->delete($id)){
            return redirect()->route('post.catalogue.index')->with('success','Xóa người dùng thành công');
        }
        return redirect()->route('post.catalogue.index')->with('error','Đã có lỗi xảy ra, vui lòng  thử lại');
    }
    private function config(){
        return [
            'js' => [
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
                'backend/plugins/ckfinder_2/ckfinder.js',
                'backend/plugins/ckeditor/ckeditor.js',
                'backend/library/seo.js',
                'backend/library/finder.js',
            ],
            'css'=>[
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css',
            ]
        ];
    }
}

