<?php function my_acf_admin_head() {
?>
    <style type="text/css">

        .inside.acf-fields>.acf-field:first-child {
            margin-bottom: 25px;
        }

        .inside.acf-fields>.acf-field {
            background-color: #F5F9FF;
            margin: 25px 0;
        }

        .acf-repeater.-row > table > tbody > tr > td,
        .acf-repeater.-block > table > tbody > tr > td {
            border-top: 2px solid #000;
        }

        .acf-repeater .acf-row-handle {
            vertical-align: top !important;
            padding-top: 16px;
        }

        .acf-repeater .acf-row-handle span {
            font-size: 20px;
            font-weight: bold;
            color: #000;
        }

        .acf-repeater .acf-row-handle .acf-icon.-minus {
            top: 30px;
        }

        .acf-label {
            color: #25477b;
            padding: 10px;
        }

        .acf-label .description{
            color: #000;
        }

        .acf-field-object .acf-label {
            color: #000;
        }

        #acf-field-group-locations .acf-label,
        #acf-field-group-options .acf-label {
            color:  #000;
            background-color: transparent;
        }
        
    </style>

<?php

}

add_action('acf/input/admin_head', 'my_acf_admin_head');
