<?php namespace Platform\Http\Controllers;

use Platform\Http\Controllers\BaseController;
use Platform\Models\School;
use Theme;
use Illuminate\Http\Request;
use HttpClient;

class SchoolController extends BaseController
{
    public function __construct()
    {
        $this->theme = Theme::uses($this->theme_name)->layout($this->layout);
    }

    public function SchoolForm($id)
    {
        if ($id == 0) {
            return redirect('/');
        }

        $data = array();
        $school = School::find($id);
        $data['school'] = $school;
        $data['fields'] = $school->fields;

        foreach ($data['fields'] as $field) {
            if ($field->validation != '') {
                $ruleItem = explode('|', $field->validation);

                foreach ($ruleItem as $item) {
                    $fineRule = array();
                    if ($item) {
                        $explodedItem = explode(':', $item);
                    }
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
        $response = json_decode(json_encode(simplexml_load_string($response->content())), true);
        $response_array = $response['response'];
        //dd($response_array);
        $errors_root = array();
        $mapping_errors = array();
        $campaign_formvalidation_errors = array();
        $campaign_preprocessing_errors = array();
        $campaign_standardization_errors = array();
        $campaign_validation_errors = array();
        $billing_result_errors = array();

        if (isset($response_array['Errors']['Message'])) {
            $errors_root[] = $response_array['Errors']['Message'];
        }
        if (isset($response_array['MappingResult']['Errors']['Message'])) {
            $mapping_errors = $response_array['MappingResult']['Errors']['Message'];
        }
        if (isset($response_array['CampaignResults']['CampaignResult']['FormValidationResult']['Errors']['Message'])) {
            $campaign_formvalidation_errors = $response_array['CampaignResults']['CampaignResult']['FormValidationResult']['Errors']['Message'];
        }
        if (isset($response_array['CampaignResults']['CampaignResult']['ValidationResult']['Errors']['Message'])) {
            $campaign_validation_errors = $response_array['CampaignResults']['CampaignResult']['ValidationResult']['Errors']['Message'];
        }
        if (isset($response_array['CampaignResults']['CampaignResult']['StandardizationResult']['Errors']['Message'])) {
            $campaign_standardization_errors = $response_array['CampaignResults']['CampaignResult']['StandardizationResult']['Errors']['Message'];
        }
        if (isset($response_array['CampaignResults']['CampaignResult']['PreProcessingResult']['Errors']['Message'])) {
            $campaign_preprocessing_errors = $response_array['CampaignResults']['CampaignResult']['PreProcessingResult']['Errors']['Message'];
        }
        if (isset($response_array['BillingResult']['Errors']['Message'])) {
            $billing_result_errors = $response_array['BillingResult']['Errors']['Message'];
        }

        $errors_merge = array_merge($errors_root,
            $mapping_errors,
            $campaign_formvalidation_errors,
            $campaign_validation_errors,
            $campaign_standardization_errors,
            $campaign_preprocessing_errors,
            $billing_result_errors
        );

        //dd($response_array);
        $error_string = "<h3>Submission Invalid. Please review the error Message below and try again.</h3>";
        $error_string .= "<ul>";

        foreach ($errors_merge as $msg) {
            if ($msg) {
                $error_string .= "<li>" . $msg . "</li>";
            }
        }
        $error_string .= "</ul>";

        if ($response_array['@attributes']['status'] == 'Invalid' || $response_array['@attributes']['status'] == 'Error') {
            return redirect('school/' . $data['id'])->with('alert-danger',
                "<div class='error-wrap'>" . $error_string . "</div>");
        } else {
            return redirect('school/' . $data['id'])->with('alert-succcess',
                "School inquiry submitted.");
        }
    }


    public function test($id)
    {
        echo "test" . $id;
    }
}

