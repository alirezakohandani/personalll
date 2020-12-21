<?php

if(isset($_COOKIE["type"])):
    setcookie("type", '', time()-7000000, '/');
    Header('Location: http://localhost/meetme/ela-admin-rtl/');
endif;


