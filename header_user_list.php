 <?php 
         include('includes/forum.php');
      ?>
      <header>
         <!-- Start cssSlider.com -->
         <!--[if lte IE 9]><script type="text/javascript" src="cssslider_files/csss_engine1/ie.js"></script><![endif]-->
         <div class="csslider1 autoplay ">
            <input name="cs_anchor1" id="cs_slide1_0" class="cs_anchor slide" type="radio">
            <input name="cs_anchor1" id="cs_slide1_1" class="cs_anchor slide" type="radio">
            <input name="cs_anchor1" id="cs_slide1_2" class="cs_anchor slide" type="radio">
            <input name="cs_anchor1" id="cs_play1" class="cs_anchor" checked="" type="radio">
            <input name="cs_anchor1" id="cs_pause1_0" class="cs_anchor pause" type="radio">
            <input name="cs_anchor1" id="cs_pause1_1" class="cs_anchor pause" type="radio">
            <input name="cs_anchor1" id="cs_pause1_2" class="cs_anchor pause" type="radio">
            <ul>
               <li class="cs_skeleton"><img src="cssslider_files/csss_images1/21131354.jpg" style="width: 100%;"></li>
               <li class="num0 img slide"> <img src="cssslider_files/csss_images1/21131354.jpg" alt="" title=""></li>
               <li class="num1 img slide"> <img src="cssslider_files/csss_images1/mrrobot_prelinear_aspot.jpg" alt="" title=""></li>
               <li class="num2 img slide"> <img src="cssslider_files/csss_images1/shamelesswallpapershamelessus3715072619201080.jpg" alt="" title=""></li>
            </ul>
            <div class="cs_engine"><a href="http://cssslider.com">html slider</a> by cssSlider.com v2.1</div>
            <div class="cs_description">
               <label class="num0"></label>
               <label class="num1"></label>
               <label class="num2"></label>
            </div>
            <div class="cs_arrowprev">
               <label class="num0" for="cs_slide1_0"><span><i></i><b></b></span></label>
               <label class="num1" for="cs_slide1_1"><span><i></i><b></b></span></label>
               <label class="num2" for="cs_slide1_2"><span><i></i><b></b></span></label>
            </div>
            <div class="cs_arrownext">
               <label class="num0" for="cs_slide1_0"><span><i></i><b></b></span></label>
               <label class="num1" for="cs_slide1_1"><span><i></i><b></b></span></label>
               <label class="num2" for="cs_slide1_2"><span><i></i><b></b></span></label>
            </div>
         </div>
         <!-- End cssSlider.com -->
         <div class="header_content">
          <div class="hello">
               <div class="pp icon">
                  <?php 
                     $forum= new Forum($pdo);
                     $avatar = $forum->selectUser($_SESSION['users']['id']);
                     ?> 
                  <img src="<?=$avatar['0']['avatar']?>" alt="user" >
               </div>
               <ul class="profil_nav" >
                  <li>Bonjour <?= $_SESSION['users']['pseudo']."  ";
                     ?></li>
                  <li class="hvr-underline-from-center">  <a href="profil_page.php?id=<?=$_SESSION['users']['id']?>" >Profil</a></li>
                  <li class="hvr-underline-from-center"> <a href="update_profil.php?id=<?=$_SESSION['users']['id']?>" >Modifier Profil</a></li>
                  <li class="hvr-underline-from-center">  <a href="logout.php"> <i class="fa fa-sign-out"></i> Log out</a></li>
               </ul>
        </div> 
            <div class="episodes">
               <h1 ><a href="accueil.php" >Episodes</a></h1>
            </div>
            <i class="fa fa-bars" id="btn"></i>
            <ul  id="menu">
               <li><a href="accueil.php" class="hvr-underline-from-center">Accueil</a> </li>
               <li><a href="liste.php" class="hvr-underline-from-center">Liste des membres</a></li>
            </ul>
             <form action="search_users.php" method="post"><input type="text" name="search" placeholder="Search" id="search"></form>
         </div>
      </header>

            <script type="text/javascript">
         $(function(){
         
            $('.icon').click(function(e){
               $('.profil_nav').toggle(400);
                  e.stopPropagation();
               });
         });
         
               $(function(e){
                  $('#btn').click(function(){
                     $('#menu').toggle(400);
                  }); 
               });
         
      </script>

           