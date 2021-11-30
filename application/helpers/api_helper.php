<?php

function returnAPI($data, $string, $status, $type = '')
{
    $ci = get_instance();

    if ($type == '') {
        if (count($data) < 1) {
            $response = array(
                'Status' => $status,
                'Message' => $string,
            );
        } else {
            $response = array(
                'Status' => $status,
                'Message' => $string,
                'data' => $data
            );
        }
    } else {
        $response = $data;
    }


    $ci->output
        ->set_status_header(200)
        ->set_content_type('application/json', 'utf-8')
        ->set_output(json_encode($response, JSON_PRETTY_PRINT))
        ->_display();
    exit;
}
