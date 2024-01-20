<?php

namespace App\Services;

use App\Repositories\Interfaces\PostCatalogueRepositoryInterface as PostCatalogueRepository;
use App\Repositories\Interfaces\PostRepositoryInterface as PostRepository;
use App\Services\Interfaces\PostCatalogueServiceInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Stmt\TryCatch;

/**
 * Class PostService
 * @package App\Services
 */
class PostCatalogueService implements PostCatalogueServiceInterface
{
    protected $postCatalogueRepository;
    protected $postRepository;

    public function __construct(
        PostCatalogueRepository $postCatalogueRepository,
        // PostRepository $postRepository
        ){
            $this->postCatalogueRepository = $postCatalogueRepository;
            // $this->postRepository = $postRepository;
        }
    public function paginate($request){
        $conditions['keywords'] = addslashes($request->get('keywords'));
        $perpage =  20;
        if($request->get('perpage')!=null){
            $perpage = $request->integer('perpage');
        }
        if($request->integer('publish')>=0){
            $conditions['publish'] = $request->integer('publish');
        }
        $posts = $this->postCatalogueRepository->paginate($this->select(),$conditions,[],$perpage,[]);
        return $posts;
    }

    public function create($request){
        DB::beginTransaction();
        try {
            $payload = $request->except('_token','send');
            $postCatalogue = $this->postCatalogueRepository->create($payload);
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            echo $e->getMessage();die();
            return false;
        }
    }

     public function update($id,$request){
        DB::beginTransaction();
        try {
            $payload = $request->except('_token','send');
            $postCatalogue = $this->postCatalogueRepository->update($id,$payload);
            DB::commit();
            return true;
        } catch (\Exception $e) {
            //throw $th;
            DB::rollBack();
            echo $e->getMessage();die();
            return false;
        }
    }

    public function delete($id){
        DB::beginTransaction();
        try {
            $postCatalogue = $this->postCatalogueRepository->delete($id);
            DB::commit();
            return true;
        } catch (\Exception $e) {
            //throw $th;
            DB::rollBack();
            echo $e->getMessage();die();
            return false;
        }
    }
    public function updateStatus($post){
        DB::beginTransaction();
        try {
            $payload[$post['field']] = (($post['value']==1)?2:1);
            $postCatalogue = $this->postCatalogueRepository->update($post['modelId'],$payload);
            $this->changeUserStatus($post, $payload[$post['field']]);
            DB::commit();
            return true;
        } catch (\Exception $e) {
            //throw $th;
            DB::rollBack();
            echo $e->getMessage();die();
            return false;
        }

    }
    public function updateStatusAll($post){
       DB::beginTransaction();
        try {
            $payload[$post['field']]= $post['value'];
            $flag = $this->userCatalogueRepository->updateByWhereIn('id',$post['id'],$payload);
            $this->changeUserStatus($post,$post['value']);
            DB::commit();
            return true;
        } catch (\Exception $e) {
            //throw $th;
            DB::rollBack();
            echo $e->getMessage();die();
            return false;
        }
    }
    private function changeUserStatus($post,$value){
             DB::beginTransaction();
        try {
            if(isset($post['modelId'])){
                $array[] = $post['modelId'];
            }else{
                $array = $post['id'];
            }
             $payload[$post['field']]= $value;
            $this->postRepository->updateByWhereIn('user_catalogue_id',$array,$payload);
            DB::commit();
            return true;
        } catch (\Exception $e) {
            //throw $th;
            DB::rollBack();
            echo $e->getMessage();die();
            return false;
        }
    }

    private function select(){
        return [
            'id',
            'name',
            'description',
            'publish'
        ];
    }
}
