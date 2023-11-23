<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\SaleModel;
use App\Models\OutletModel;
use App\Models\OutletUpdateItem;

class Home extends BaseController
{
    
    public function index()
    {
        if($this->session->get('logined')) {
            $userModel = model('UserModel');
            $saleModel = model('SaleModel');
            $data['sales']=$saleModel->getSales(7,0);
            $data['sales_count']=$saleModel->countAll();
            
            $data['header']=view('header',['email'=>$this->session->get('user_id')]);
            $data['footer']=view('footer');
        
            return view('welcome',$data);
        }
        // else redirect()->to("/signin");
        else return $this->signin();

    }
    public function account_setting()
    {
        if($this->session->get('logined')) {
            $userModel = model('UserModel');
            
            
            $data['header']=view('header',['email'=>$this->session->get('user_id')]);
            $data['footer']=view('footer');
        
            $query=$userModel->where('email',$this->session->get('user_id'))->find();
            $data['user']=$query[0];

            return view('account_setting',$data);
        }
        // else redirect()->to("/signin");
        else return $this->signin();

    }
    public function changePassword(){
        $request = service('request');
        $userModel = model('UserModel');
        $data=$request->getPost();
        if ($userModel->where("email",$this->session->get('user_id'))->where("password",$data["old_pass"])->delete()){
            $temp=[];
            $temp['email']=$this->session->get('user_id');
            $temp['password']=$data["new_pass"];

            if($userModel->insert($temp,false))
             echo "success";
           else echo "error";
        }
        else echo "incorrect old password";
        
    }

    public function signin()
    {
        return view('Signin');
    }
    public function signup()
    {
        return view('Signup');
    }
    public function signup_insert(){
        $request = service('request');
        $userModel = model('UserModel');
        $data=$request->getPost();
        if (count($userModel->where("email",$data['email'])->find()) ==0){
            if($userModel->insert($data,false))
            echo "success";
           else echo "error";
        }
        else echo "double";
        
    }
    public function signin_check(){
        $request = service('request');
        $userModel = model('UserModel');
        $data=$request->getPost();
        if (count($userModel->where("email",$data['email'])->where("password",$data["password"])->find()) ==1){
            $this->session->set('user_id', $data['email']);
            $this->session->set('logined', true);
            echo "success";
        }
    }
    public function signout(){
        $this->session->set('user_id', "");
        $this->session->set('logined', false);
        $this->session->remove(["logined", "user_id"]);
        return $this->signin();
    }
    public function report(){
        if($this->session->get('logined')) {
            $data['header']=view('header',['email'=>$this->session->get('user_id')]);
            // $data['header']=view('report');
            $data['footer']=view('footer');
            return  view('report',$data);
        }
        else return $this->signin();
    }
    public function data_input(){
        if($this->session->get('logined')) {
            $data['header']=view('header',['email'=>$this->session->get('user_id')]);
            // $data['header']=view('report');
            $data['footer']=view('footer');
            return  view('data_input',$data);
        }
        else return $this->signin();
    }
    public function sales_performance(){
        if($this->session->get('logined')) {
            $data['header']=view('header',['email'=>$this->session->get('user_id')]);
            // $data['header']=view('report');
            $data['footer']=view('footer');

            $outletModel = model('OutletModel');
            $data['outlets']=$outletModel->getOutlets();

            $userModel = model('UserModel');
            $query=$userModel->where('email',$this->session->get('user_id'))->find();
            $data['user']=$query[0];
            return  view('sales_performance',$data);
            // echo $query[0]['email'];
        }
        else return $this->signin();
    }
    public function get_sales_by_year(){
        if($this->session->get('logined')) {
            $request = service('request');
            $saleModel = model('SaleModel');
            $data=$request->getPost();
            
            echo json_encode($saleModel->getSales_by_year($data['year']),JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        }
        else return $this->signin();
    }
    public function get_sales(){
        if($this->session->get('logined')) {
            // $request = service('request');
            $saleModel = model('SaleModel');
            // $data=$request->getPost();
            $data=$saleModel->getSales(0,0);
            $result=[
                // "draw"=>1,
                "data"=>$data,
                "recordsTotal"=>count($data),
                "recordsFiltered"=>count($data)
            ];
            echo json_encode($result);
        }
        else return $this->signin();
    }
    public function get_sales_monthly_total(){
        if($this->session->get('logined')) {
            // $request = service('request');
            $saleModel = model('SaleModel');
            // $data=$request->getPost();
            
            echo json_encode($saleModel->get_sales_monthly_total(),JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        }
        else return $this->signin();
    }
    public function get_outlets(){
        $outletModel = model('OutletModel');
        echo json_encode($outletModel->getOutlets());
    }
    public function add_salepage()
    {
        if($this->session->get('logined')) {
            $userModel = model('UserModel');
            $query=$userModel->where('email',$this->session->get('user_id'))->find();
           
            if($query[0]['permission'] =="Admin"){
                $data['header']=view('header',['email'=>$this->session->get('user_id')]);
                $data['footer']=view('footer');
                $outletModel = model('OutletModel');
                $data['outlets']=$outletModel->getOutlets();

                
                $data['user']=$userModel->where('email',$this->session->get('user_id'))->find();
                return view('add_sale',$data);
            }
            else{
                return redirect()->to('/');
            }
        }
        // else redirect()->to("/signin");
        else return $this->signin();

    }
    public function sale_insert(){
        if($this->session->get('logined')) {
            $request = service('request');
            $saleModel = model('SaleModel');
            $data=$request->getPost();
            
            
            if($saleModel->insert($data,false))
                echo "success";
            else echo "error";
            // echo $data['Gross'];
            
        }
        else return $this->signin();

    }
    public function get_users(){
        if($this->session->get('logined')) {
            
            $userModel = model('UserModel');
            
            $data=$userModel->findAll();

            $result=[
                // "draw"=>1,
                "data"=>$data,
                "recordsTotal"=>count($data),
                "recordsFiltered"=>count($data)
            ];
            echo json_encode($result);
            
        }
        else return $this->signin();

    }
    
    public function delete_user(){
        $request = service('request');
        $userModel = model('UserModel');
        $data=$request->getPost();
        if ($userModel->where("id",$data['id'])->delete()){
            echo "success";
        }
        
    }
    public function change_user_permission(){
        $request = service('request');
        $userModel = model('UserModel');
        $data=$request->getPost();
        if ($userModel->update($data['id'],["permission"=>$data['permission']])){
            echo "success";
        }
    }
    public function outlet_promotion(){
        if($this->session->get('logined')) {
            $data['header']=view('header',['email'=>$this->session->get('user_id')]);
            // $data['header']=view('report');
            $data['footer']=view('footer');
            $userModel = model('UserModel');
            $query=$userModel->where('email',$this->session->get('user_id'))->find();
            $data['user']=$query[0];
            
            $outletPromotionModel = model('OutletPromotionItem');
            $data['items']=$outletPromotionModel->findAll();

            return  view('outlet_performance',$data);
        }
        else return $this->signin();
    }
    public function outlet_update(){
        if($this->session->get('logined')) {
            $data['header']=view('header',['email'=>$this->session->get('user_id')]);
            // $data['header']=view('report');
            $data['footer']=view('footer');
            $userModel = model('UserModel');
            $query=$userModel->where('email',$this->session->get('user_id'))->find();
            $data['user']=$query[0];
            
            $outletUpdateModel = model('OutletUpdateItem');
            $data['items']=$outletUpdateModel->findAll();

            return  view('outlet_update',$data);
        }
        else return $this->signin();
    }
    public function add_outlet_update_item(){
        if($this->session->get('logined')) {
            $data['header']=view('header',['email'=>$this->session->get('user_id')]);
            // $data['header']=view('report');
            $data['footer']=view('footer');
            $userModel = model('UserModel');
            $query=$userModel->where('email',$this->session->get('user_id'))->find();
            $data['user']=$query[0];
            return  view('add_outlet_update_item',$data);
        }
        else return $this->signin();
    }
    public function add_outlet_promotion_item(){
        if($this->session->get('logined')) {
            $data['header']=view('header',['email'=>$this->session->get('user_id')]);
            // $data['header']=view('report');
            $data['footer']=view('footer');
            $userModel = model('UserModel');
            $query=$userModel->where('email',$this->session->get('user_id'))->find();
            $data['user']=$query[0];
            return  view('add_outlet_promotion_item',$data);
        }
        else return $this->signin();
    }
    public function update_item_insert(){
        if($this->session->get('logined')) {
            $request = service('request');
            $outletUpdateModel = model('OutletUpdateItem');
            // $data['name']=$request->getPost('name');
            // $data['status']=$request->getPost('status');
            $data=$request->getPost();
            $image = $request->getFile('avatar');
            if ($image->isValid() && !$image->hasMoved()) {
                // Get the file name
                $data['avatar'] = $image->getName();
    
                // Move the uploaded file to a desired location
                $image->move(ROOTPATH . 'public/uploads', $data['avatar']);
    
                // Perform further processing with the uploaded image
                // ...
            }
    
            if($outletUpdateModel->insert($data,false))
                echo "success";
            else echo "error";
            
        }
        else return $this->signin();

    }


    public function outlet_update_item_edit_view(){
        if($this->session->get('logined')) {
            $data['header']=view('header',['email'=>$this->session->get('user_id')]);
            // $data['header']=view('report');
            $data['footer']=view('footer');
            $userModel = model('UserModel');
            $query=$userModel->where('email',$this->session->get('user_id'))->find();
            $data['user']=$query[0];

            $request = service('request');
            
            $outletUpdateModel = model('OutletUpdateItem');
            $query=$outletUpdateModel->where('id',$request->getGet('item_id'))->find();
            $data['item']=$query[0];

            return  view('edit_outlet_update_item',$data);
        }
        else return $this->signin();
    }
    public function outlet_promotion_item_edit_view(){
        if($this->session->get('logined')) {
            $data['header']=view('header',['email'=>$this->session->get('user_id')]);
            // $data['header']=view('report');
            $data['footer']=view('footer');
            $userModel = model('UserModel');
            $query=$userModel->where('email',$this->session->get('user_id'))->find();
            $data['user']=$query[0];

            $request = service('request');

            $outletPromotionModel = model('OutletPromotionItem');
            $query=$outletPromotionModel->where('id',$request->getGet('item_id'))->find();
            $data['item']=$query[0];

            return  view('edit_outlet_promotion_item',$data);
        }
        else return $this->signin();
    }   


    
    public function edit_outlet_update_item(){
        if($this->session->get('logined')) {
            $request = service('request');
            $outletUpdateModel = model('OutletUpdateItem');
            // $data['name']=$request->getPost('name');
            // $data['status']=$request->getPost('status');
            $data=$request->getPost();
            $image = $request->getFile('avatar');
            if ($image->isValid() && !$image->hasMoved()) {
                // Get the file name
                $data['avatar'] = $image->getName();
    
                // Move the uploaded file to a desired location
                $image->move(ROOTPATH . 'public/uploads', $data['avatar']);
    
                // Perform further processing with the uploaded image
                // ...
            }
           
            if($outletUpdateModel->where('id',$data['id'])->set($data)->update())
                echo "success";
            else echo "error";
            // if($outletUpdateModel->update($data['id'],$temp))
            //     echo "success";
            // else echo "error";

            // if($outletUpdateModel->save($data))
            //     echo "success";
            // else echo "error";
            
        }
        else return $this->signin();

    }
    public function edit_outlet_promotion_item(){
        if($this->session->get('logined')) {
            $request = service('request');
            $outletPromotionModel = model('OutletPromotionItem');
            // $data['name']=$request->getPost('name');
            // $data['status']=$request->getPost('status');
            $data=$request->getPost();
            $image = $request->getFile('avatar');
            if ($image->isValid() && !$image->hasMoved()) {
                // Get the file name
                $data['avatar'] = $image->getName();
    
                // Move the uploaded file to a desired location
                $image->move(ROOTPATH . 'public/uploads', $data['avatar']);
    
                // Perform further processing with the uploaded image
                // ...
            }
    
            if($outletPromotionModel->save($data))
                echo "success";
            else echo "error";
            
        }
        else return $this->signin();

    }

    
    public function promotion_item_insert(){
        if($this->session->get('logined')) {
            $request = service('request');
            $outletPromotionModel = model('OutletPromotionItem');
            // $data['name']=$request->getPost('name');
            // $data['status']=$request->getPost('status');
            $data=$request->getPost();
            $image = $request->getFile('avatar');
            if ($image->isValid() && !$image->hasMoved()) {
                // Get the file name
                $data['avatar'] = $image->getName();
    
                // Move the uploaded file to a desired location
                $image->move(ROOTPATH . 'public/uploads', $data['avatar']);
    
                // Perform further processing with the uploaded image
                // ...
            }
    
            if($outletPromotionModel->insert($data,false))
                echo "success";
            else echo "error";
            
        }
        else return $this->signin();

    }
    public function update_item_delete(){
        if($this->session->get('logined')) {
            $request = service('request');
            $outletUpdateModel = model('outletUpdateItem');
            // $data['name']=$request->getPost('name');
            // $data['status']=$request->getPost('status');
            $data=$request->getPost();
           
            if($outletUpdateModel->delete($data['id']))
                echo "success";
            else echo "error";
            
        }
        else return $this->signin();

    }
    public function promotion_item_delete(){
        if($this->session->get('logined')) {
            $request = service('request');
            $outletPromotionModel = model('outletPromotionItem');
            // $data['name']=$request->getPost('name');
            // $data['status']=$request->getPost('status');
            $data=$request->getPost();
           
            if($outletPromotionModel->delete($data['id']))
                echo "success";
            else echo "error";
            
        }
        else return $this->signin();

    }
}
