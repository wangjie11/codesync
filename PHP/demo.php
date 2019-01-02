<?php

include_once "wxBizDataCrypt.php";


$appid = 'wxaab82e75fb44efa9';
$sessionKey = 'wM7wrCDZ+9ImJBeUKu6mJw==';

$encryptedData="eoZO9BGhXyoSJztBmOjn8OVyuYtwQK2E7aRmfkVKUvMF/l1vtMh+lWXi7hBT149u7i6NfioIpo6rgHw24ApxAIAKEIikLCpJr+mjfOlHwVQuX2Vv1DrbAFPbyBPSl/rIxzcw0MeWRPhXJbEI4m5Zd7FW8hAfpIBx2bML/LLnjBwD4ER8HND8R01/Crd7zpzmdwIqO61hhkWn74UyMAenJB5WqOvjMP2MW07B9NRbj/J943xeKpFXgeS+1mdTXfU9S6qGK0akXIK1FAXL/pxlEZdH3d4tjy3e16IqFQyzC6754+Cd2qxvyO62jEdLbfhaZdD8h50ieJ9b44+lBu6ambSK4DqwHZTmPM7ghqdBOmjXyd2nDW0Zx1HsH4DXRHXyhLhu4TUtwf1ChIY5RCM28nCNBOubxNOrOa39oH4C02N4J4IyTMPXw8upScGFNHjKt1kKlP54ujIlp76EWwbusg==";

$iv = 'MAfmo4pdeHtRN+WArB6L8A==';

$pc = new WXBizDataCrypt($appid, $sessionKey);
$errCode = $pc->decryptData($encryptedData, $iv, $data );

if ($errCode == 0) {
    print($data . "\n");
} else {
    print($errCode . "\n");
}
