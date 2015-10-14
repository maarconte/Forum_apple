require_once __DIR__ . '/path/to/facebook-php-sdk-v4/src/Facebook/autoload.php';

 function fblogout() {    
          FB.logout(function () {    
     window.location.reload(); });    
    }    
      window.fbAsyncInit = function() {    
        FB.init({    
          appId   : '<?php echo $facebook->getAppId(1506494756332119); ?>',    
          session : <?php echo json_encode($session); ?>,    
          status  : true,    
          cookie  : true,    
          xfbml   : true    
        });    

        FB.Event.subscribe('auth.login', function() {    
          window.location.reload();    
        });    
      };    

      (function() {    
        var e = document.createElement('script');    
        e.src = document.location.protocol + '//connect.facebook.net/fr_FR/all.js';    
        e.async = true;    
        document.getElementById('fb-root').appendChild(e);    
      }());    
          //your fb login function    
          function fblogin() {    
     FB.login(function(response) {    
              //...    
            }, {perms:'read_stream,publish_stream,offline_access'});    
   redir();    
          }    



