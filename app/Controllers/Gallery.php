<?php

namespace App\Controllers;

use App\Models\GalleryModel;

class Gallery extends BaseController {

    public function index() {

        $data['title'] = "Gallery";
        require APPPATH.'ThirdParty\steamauth\steamauth.php';

        if(isset($_SESSION['steamid'])){

            $auth = new Auth();
            $auth->CheckSteamDataOnDatabase();
        }

        $gallery = new GalleryModel();
        $data['images'] = $gallery->GetGalleryImages();

        return view('gallery_view', $data);
    }

    public function View($id = null){

        if(is_null($id) or $id == 0)
            return redirect()->to('/Gallery');

        $data['title'] = "Gallery";
        require APPPATH.'ThirdParty\steamauth\steamauth.php';

        if(isset($_SESSION['steamid'])){

            $auth = new Auth();
            $auth->CheckSteamDataOnDatabase();
        }

        $gallery = new GalleryModel();
        $data['image'] = $gallery->GetGalleryImage($id);

        if(is_null($data['image']))
            return redirect()->to('/Gallery');
        return view('gallery_individual_view', $data);
    }
}
