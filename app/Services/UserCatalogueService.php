<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\Interfaces\UserCatalogueRepositoryInterface as UserCatalogueRepository;
use App\Repositories\Interfaces\UserRepositoryInterface as UserRepository;
use App\Services\Interfaces\UserCatalogueServiceInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Stmt\TryCatch;

/**
 * Class UserService
 * @package App\Services
 */
class UserCatalogueService implements UserCatalogueServiceInterface
{
    protected $userCatalogueRepository;
    protected $userRepository;

    public function __construct(
        UserCatalogueRepository $userCatalogueRepository,
        UserRepository $userRepository
        ){
            $this->userCatalogueRepository = $userCatalogueRepository;
            $this->userRepository = $userRepository;
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
        $users = $this->userCatalogueRepository->paginate($this->select(),$conditions,[],$perpage,['users']);
        return $users;
    }

    public function create($request){
        DB::beginTransaction();
        try {
            $payload = $request->except('_token','send');
            $user = $this->userCatalogueRepository->create($payload);
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
            $user = $this->userCatalogueRepository->update($id,$payload);
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
            $user = $this->userCatalogueRepository->delete($id);
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
            $user = $this->userCatalogueRepository->update($post['modelId'],$payload);
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
            $this->userRepository->updateByWhereIn('user_catalogue_id',$array,$payload);
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
