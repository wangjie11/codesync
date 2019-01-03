<?php

include_once "wxBizDataCrypt.php";


$appid = 'wxaab82e75fb44efa9';
$sessionKey = 'y3fpIXuhz8dE3ymwCXOnNw==';

$encryptedData="FRNEwzFVxFYO/eB56K/2S0/dEc9Bj2n+h9fucc65IrS633fA42lBLPo+kjUtDZTGrVt9JxYXUrj8jIQRzzCY7mYhVI4yjRuy05IscpyVQkytWhVyAGdSBhdsKcNtIwloTMV8cy1XQSogaKGPMw3yJ5mJZ4Tv+XclZ4KUXjzQl5fZxB0K1DF93UoNUTK+OOjJhS2kCz5DuN18f8P/ld1WxP7PudCW30VBj4imLNmSKBb9LvS/gktDm+uZdJKuTfZAmMrVaZ6xaTW8tja3PqtZzz7vV/+d0JcSJv8drKJ/lXlxTs/T9l3QTzhJ1FAYiIdjhfYXpdA0QV9xRiqIpYh6lSCmCCO5lPYMSxl+1jF+ul2PKhPsq3sMaJjoBvbuMbLxWFR1Il0CHf84bj1lKSBHvdRaiZDIeg4Xa7km/e2EUu8VzZDUK7in85Qu9x+WTU3JGIN3PP+phfl5j7JL8qUNKlRBK74sTXeypWbIDlwHDVvdWWUI+9zii31K9GW70GhiNZj/FwLe1zIfawV6nZ56rQ==";

$iv = 'fypIsbhiuQN12f++KNOqRw==';

$pc = new WXBizDataCrypt($appid, $sessionKey);
$errCode = $pc->decryptData($encryptedData, $iv, $data );

if ($errCode == 0) {
    print($data . "\n");
} else {
    print($errCode . "\n");
}
