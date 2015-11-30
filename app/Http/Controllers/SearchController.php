<?php

namespace Platform\Http\Controllers;

use Platform\Http\Controllers\BaseController;
use Platform\Models\School;
use Postcode;
use Input;
use Validator;
use Illuminate\Http\Request;

class SearchController extends BaseController
{

    public function DoSearch()
    {
        return $this->theme->scope('search.form')->render();
    }

    public function PostSearch(PostCode $postcode, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'zipcode' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect('/search')
                ->withErrors($validator)
                ->withInput();
        }

        $data = array();
        $zipcode = Input::get('zipcode');
        $location = $postcode::lookup($zipcode);
        if(empty($location)) return $this->theme->scope('search.result', $data)->render();
        $schools = School::within(200, 'miles', $location['latitude'], $location['longitude'])->get()->toArray();

        $data['schools'] = $schools;
        return $this->theme->scope('search.result', $data)->render();
    }

    public function SchoolForm($school_id = 0)
    {
        if($school_id == 0){
            return redirect('/search');
        }

        return $this->theme->scope('school.detail', $data)->render();
    }
}
