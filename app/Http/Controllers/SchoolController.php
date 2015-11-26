<?php namespace Platform\Http\Controllers;

use Platform\Http\Controllers\BaseController;
use Platform\Models\School;
use Theme;
use Illuminate\Http\Request;

class SchoolController extends BaseController
{
    public function __construct()
    {
        $this->theme = Theme::uses($this->theme_name)->layout($this->layout);
    }

    public function SchoolForm($id)
    {
        if($id == 0){
            return redirect('/');
        }

        $data = array();
        $school = School::find($id);
        $data['school'] = $school;
        $data['fields'] = $school->fields;

        foreach($data['fields'] as $field){
            if($field->validation != ''){
                $ruleItem = explode('|', $field->validation);

                foreach($ruleItem as $item){
                    $fineRule = array();
                    $explodedItem = explode(':', $item);
                    $fineRule[$explodedItem[0]] = $explodedItem[1];
                    $rule[$field->slug] = $fineRule;
                }

            }
        }


        $data['validation'] = json_encode($rule);

        return $this->theme->scope('school.detail', $data)->render();
    }

    public function schoolPost(Request $request)
    {
        $data = $request->all();

        $request = [
            'url' => 'http://webservices.keypathpartners.com/ILM/default.ashx?IsTestLead=true',
            'params' => $data,
        ];

        $response = HttpClient::post($request);
        dd($response);
    }


    public function test($id){
        echo "test".$id;
    }
}

