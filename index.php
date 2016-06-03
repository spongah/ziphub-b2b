<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>ziphub </title>
        <link rel="stylesheet" href="css/bootstrap.min.css"/>
        <link rel="stylesheet" href="css/mystyle.css"/>
        <link rel="stylesheet" href="css/flashsales.css"/>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
        <script src="js/jquery.imagemapster.js"></script>
    </head>
    <body>
        <div class="menu">
            <div class="container">
                <div class="col-sm-5 col-xs-12">
                    <div class="logo-section col-sm-6">
                        <img src="img/logo.png"/>
                    </div>
                    <div class="col-sm-6">
                        <p class="logo-text"> <span>|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="green">Love one another</span></p>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-12">
                    <ul class="nav nav-pills">
                        <li><a>Stores</a></li>
                        <li><a>Merchants</a></li>
                        <li><a>Watch the Video</a></li>
                    </ul>
                </div>
                <div class="col-sm-3 col-xs-12">
                    <button class="btn login-btn col-xs-6">Sign up</button>
                    <button class="btn  green-btn col-xs-6">Login</button>
                </div>
            </div>        
        </div>


 <!--       <div id="wheel" class="hidden-xs">
            <div class="container wheel">
                
                <div>
                    <img src="img/left-arrow.png" id="left-arrow"/>
                    <img src="img/wh.png" border="0"  usemap="#planetmap" alt="Planet Map" id="" />
                    <img src="img/right-arro.png" id="right-arrow"/>
                </div>

                <script>
                    $(document).ready(function ()
                    {
                        $('#planetmap').mapster({
                            singleSelect: true,
                            render_highlight: {altImage: 'img/wh_1.png'},
                            mapKey: 'color',
                            fill: true, altImage: 'img/wh_1.png',
                            fillOpacity: 1,
                        });
                    });
                </script>
                <map name="planetmap" id="Map">
                    <area shape="poly" coords="319,620,347,619,378,613,419,601,442,592,430,565,413,526,385,468,370,440,351,446,332,451,318,452" href="games.html" color="1">
                    <area shape="poly" coords="378,437,396,424,410,411,419,403,460,436,510,476,549,508,525,534,491,562,458,585,452,587" href="gifts.html">
                    <area shape="poly" coords="424,396,436,376,444,359,446,350,529,368,611,387,597,430,576,471,557,501" href="free_trials.html">
                    <area shape="poly" coords="447,341,449,316,447,291,498,279,555,265,599,257,613,253,618,330,611,378" href="group.html">
                    <area shape="poly" coords="81,508,111,542,153,574,179,588,234,474,252,438,237,427,217,412,213,404" href="health.html">
                    <area shape="poly" coords="74,501,46,459,24,405,21,388,94,371,155,356,183,350,191,369,205,396" href="news.html">
                    <area shape="poly" coords="19,378,73,366,163,347,182,342,180,318,182,293,136,279,53,260,30,256,19,253,12,299,13,330,15,353" href="music.html">
                    <area shape="poly" coords="183,282,193,258,207,235,136,178,75,131,50,168,29,212,20,243" href="travel.html">
                    <area shape="poly" coords="211,228,233,210,254,197,179,45,140,68,101,99,79,125" href="social.html">
                    <area shape="poly" coords="261,192,284,184,310,179,311,68,312,13,274,16,224,25,189,37,186,40" href="local.html">
                    <area shape="poly" coords="321,13,381,20,432,37,442,41,386,157,369,192,338,183,319,180" href="webret.html">
                    <area shape="poly" coords="446,282,437,258,423,236,469,199,527,153,555,131,575,161,600,214,610,244" href="foods.html">
                    <area shape="poly" coords="419,228,378,197,450,44,496,73,535,106,550,123" href="seasonal.html">
                    <area shape="poly" coords="187,593,222,606,264,617,305,623,314,619,313,504,313,449,281,445,261,438,258,436" onclick="location.href = 'b2b.php'" href="b2b.php" />
                </map>
            </div>
            <div>
                <h1 class="text-center">A cause Based Community</h1>
                <p class="text-center"> <img src="img/border.png"/></p>
            </div>

        </div>
        <div class="clearfix"></div>
  -->

  <div id="wheel" class="hidden-xs">
    <div class="container">

        <div>
            <span class="left-arrow" > <img src="img/left-arrow.png" id="left-arrow"/></span>
            <span class="wheel" ><img src="img/wh_h.png" border="0"  usemap="#planetmap" alt="Planet Map" id="planetmap" /></span>
            <span class="right-arrow" ><img src="img/right-arro.png" id="right-arrow"/></span>
            <div class="clearfix" ></div>
        </div>

        <script>
            $(window).bind("load", function () {
                $(document).ready(function ()
                {
                    $('#planetmap').mapster({
                        singleSelect: true,
                        render_highlight: {altImage: 'img/wh.png'},
                        mapKey: 'color',
                        fill: true, altImage: 'img/wh.png',
                        fillOpacity: 1,
                    });
                });

            });

        </script>
        <map name="planetmap" id="planetmap">
            <area color="1" shape="poly" coords="322,622,375,616,425,602,446,592,432,564,403,502,373,440,354,443,329,448,317,450,313,449,317,581,317,599,315,614" onclick="location.href = '../sub/games.html'"  href = "../sub/games.html" >
            <area color="2" shape="poly" coords="419,403,469,440,469,440,505,469,536,493,552,507,525,540,482,573,451,587,420,526,389,466,376,434" onclick="location.href = '../sub/gifts.html'" href = "../sub/gifts.html" >
            <area color="3" shape="poly" coords="424,396,437,371,444,350,493,359,573,376,612,385,602,423,584,461,558,502,553,503" onclick="location.href = '../sub/trials.html'" href = "../sub/trials.html" >
            <area color="4" shape="poly" coords="447,341,449,316,447,291,498,279,555,265,599,257,613,253,618,330,611,378" onclick="location.href = '../sub/group_saving.html'" href = "../sub/group_saving.html" >

            <area color="5" shape="poly" coords="212,402,228,418,251,432,255,438,220,507,183,588,180,590,139,565,95,529,78,510" onclick="location.href = '../sub/health.html'" href = "../sub/health.html" >
            <area color="6" shape="poly" coords="73,504,36,443,15,388,44,378,77,373,133,358,173,351,183,349,192,367,203,389,207,398" onclick="location.href = '../sub/news.html'" href = "../sub/news.html">
            <area color="7" shape="poly" coords="17,380,103,361,166,348,186,345,184,288,82,264,24,252,14,250,8,316" onclick="location.href = '../sub/music.html'" href = "../sub/music.html" >
            <area color="8" shape="poly" coords="73,128,43,173,21,226,17,245,78,260,148,276,187,283,200,250,210,236" onclick="location.href = '../sub/travel.html'" href = "../sub/travel.html" >
            <area color="9" shape="poly" coords="81,120,117,83,161,51,180,43,206,95,240,162,256,195,230,214,211,232,78,127" onclick="location.href = '../sub/social.html'" href = "../sub/social.html">
            <area color="10" shape="poly" coords="187,37,241,18,299,10,314,10,314,98,315,181,291,186,260,194,258,194,186,43" onclick="location.href = '../sub/local.html'" href = "../sub/local.html" >
            <area color="11" shape="poly" coords="320,11,373,15,373,15,407,24,431,32,446,39,410,113,373,192,344,185,319,181" onclick="location.href = '../sub/web_retailers.html'" href = "../sub/web_retailers.html" >
            <area color="12" shape="poly" coords="423,233,433,253,433,253,440,266,444,282,564,255,610,244,601,206,571,147,571,147,555,130" onclick="location.href = '../sub/foods.html'" href = "../sub/foods.html" >
            <area color="13" shape="poly" coords="452,44,490,65,490,65,521,89,547,116,551,123,483,179,421,229,394,206,381,196,379,193,377,193" onclick="location.href = '../sub/flash_sales.html'" href = "../sub/flash_sales.html">
            <area color="14" shape="poly" coords="187,593,222,606,264,617,305,623,314,619,313,504,313,449,281,445,261,438,258,436" onclick="location.href = 'b2b.php'" href="b2b.php" />

        </map>
    </div>
    <div class="container">
        <h1 class="text-center">A cause Based Community</h1>
        <p class="text-center"> <img src="img/border.png"/></p>
    </div>

</div>
<div class="clearfix"></div>

     
        <div class="middle-body">
            <div class="container">
                <h2><span>Featured Charities</span></h2>
                <hr>
                <div class="col-sm-2 col-xs-6">
                    <img class="img-thumbnail" src="img/unicef.png"/>
                    <p>United Nations 
                        Children's Fund</p>

                </div>
                <div class="col-sm-2 col-xs-6">
                    <img class="img-thumbnail" src="img/charity12.png"/>
                    <p>Red Cross</p>

                </div>
                <div class="col-sm-2 col-xs-6">
                    <img class="img-thumbnail" src="img/charity3.png"/>
                    <p>Habibat for Humanity</p>

                </div>
                <div class="col-sm-2 col-xs-6">
                    <img class="img-thumbnail" src="img/charity3.png"/>
                    <p>Habibat for Humanity</p>

                </div>
                <div class="col-sm-2 col-xs-6">
                    <img class="img-thumbnail" src="img/charity5.png"/>
                    <p>Hispanic Colledge fund</p>

                </div>
                <div class="col-sm-2 col-xs-6">
                    <img class="img-thumbnail" src="img/charity6.png"/>
                    <p>American Center Society</p>
                </div>
                <hr>
                <div class="col-sm-12 text-center">
                    <button class="btn all-btn">All Charities                         <span class="glyphicon glyphicon-play-circle"></span>
                    </button>
                </div>
            </div>
        </div>
      <div id="more-flash">
            <div class="container" >
            <h2 class="text-center">More Flash Sale</h2>
            <p class="text-center"> <img src="img/border.png"></p>
            <div class="col-sm-12">
                <div class="col-sm-3">
                  <div class="thumbnail seasonal-thumb">
                            <img src="img/subpage/popublar-web.png">
                            <p class="text-center" id="capt">
                                <span class="glyphicon glyphicon-time"></span> 05d : 03h : 50m
                            </p>
                            <div class="caption">
                                <p>Spa Bath and Body Minted Jasmine Scent Gift Basket</p>
                                <div class="col-sm-5">
                                    <h2>$133</h2>
                                    <span id="off">75% off</span>
                                </div>
                                <div class="col-sm-7">
                                    <h3><span>was</span> $300</h3>
                                </div>
                                <div class="clearfix"></div>
                                <p class="buttons">
                                    <button class="btn save-btn">Save</button>
                                    <button class="btn view-btn">View</button>
                                </p>
                            </div>
                        </div>
                </div>
                <div class="col-sm-3">
                   <div class="thumbnail seasonal-thumb">
                            <img src="img/subpage/popublar-web.png">
                            <p class="text-center" id="capt">
                                <span class="glyphicon glyphicon-time"></span> 05d : 03h : 50m
                            </p>
                            <div class="caption">
                                <p>Spa Bath and Body Minted Jasmine Scent Gift Basket</p>
                                <div class="col-sm-5">
                                    <h2>$133</h2>
                                    <span id="off">75% off</span>
                                </div>
                                <div class="col-sm-7">
                                    <h3><span>was</span> $300</h3>
                                </div>
                                <div class="clearfix"></div>
                                <p class="buttons">
                                    <button class="btn save-btn">Save</button>
                                    <button class="btn view-btn">View</button>
                                </p>
                            </div>
                        </div>
                </div>
                <div class="col-sm-3">
                 <div class="thumbnail seasonal-thumb">
                            <img src="img/subpage/popublar-web.png">
                            <p class="text-center" id="capt">
                                <span class="glyphicon glyphicon-time"></span> 05d : 03h : 50m
                            </p>
                            <div class="caption">
                                <p>Spa Bath and Body Minted Jasmine Scent Gift Basket</p>
                                <div class="col-sm-5">
                                    <h2>$133</h2>
                                    <span id="off">75% off</span>
                                </div>
                                <div class="col-sm-7">
                                    <h3><span>was</span> $300</h3>
                                </div>
                                <div class="clearfix"></div>
                                <p class="buttons">
                                    <button class="btn save-btn">Save</button>
                                    <button class="btn view-btn">View</button>
                                </p>
                            </div>
                        </div>
                </div>
                <div class="col-sm-3">
                     <div class="thumbnail seasonal-thumb">
                            <img src="img/subpage/popublar-web.png">
                            <p class="text-center" id="capt">
                                <span class="glyphicon glyphicon-time"></span> 05d : 03h : 50m
                            </p>
                            <div class="caption">
                                <p>Spa Bath and Body Minted Jasmine Scent Gift Basket</p>
                                <div class="col-sm-5">
                                    <h2>$133</h2>
                                    <span id="off">75% off</span>
                                </div>
                                <div class="col-sm-7">
                                    <h3><span>was</span> $300</h3>
                                </div>
                                <div class="clearfix"></div>
                                <p class="buttons">
                                    <button class="btn save-btn">Save</button>
                                    <button class="btn view-btn">View</button>
                                </p>
                            </div>
                        </div>
                </div>
            </div>
           <div class="col-sm-12">
                <div class="col-sm-3">
                  <div class="thumbnail seasonal-thumb">
                            <img src="img/subpage/popublar-web.png">
                            <p class="text-center" id="capt">
                                <span class="glyphicon glyphicon-time"></span> 05d : 03h : 50m
                            </p>
                            <div class="caption">
                                <p>Spa Bath and Body Minted Jasmine Scent Gift Basket</p>
                                <div class="col-sm-5">
                                    <h2>$133</h2>
                                    <span id="off">75% off</span>
                                </div>
                                <div class="col-sm-7">
                                    <h3><span>was</span> $300</h3>
                                </div>
                                <div class="clearfix"></div>
                                <p class="buttons">
                                    <button class="btn save-btn">Save</button>
                                    <button class="btn view-btn">View</button>
                                </p>
                            </div>
                        </div>
                </div>
                <div class="col-sm-3">
                   <div class="thumbnail seasonal-thumb">
                            <img src="img/subpage/popublar-web.png">
                            <p class="text-center" id="capt">
                                <span class="glyphicon glyphicon-time"></span> 05d : 03h : 50m
                            </p>
                            <div class="caption">
                                <p>Spa Bath and Body Minted Jasmine Scent Gift Basket</p>
                                <div class="col-sm-5">
                                    <h2>$133</h2>
                                    <span id="off">75% off</span>
                                </div>
                                <div class="col-sm-7">
                                    <h3><span>was</span> $300</h3>
                                </div>
                                <div class="clearfix"></div>
                                <p class="buttons">
                                    <button class="btn save-btn">Save</button>
                                    <button class="btn view-btn">View</button>
                                </p>
                            </div>
                        </div>
                </div>
                <div class="col-sm-3">
                 <div class="thumbnail seasonal-thumb">
                            <img src="img/subpage/popublar-web.png">
                            <p class="text-center" id="capt">
                                <span class="glyphicon glyphicon-time"></span> 05d : 03h : 50m
                            </p>
                            <div class="caption">
                                <p>Spa Bath and Body Minted Jasmine Scent Gift Basket</p>
                                <div class="col-sm-5">
                                    <h2>$133</h2>
                                    <span id="off">75% off</span>
                                </div>
                                <div class="col-sm-7">
                                    <h3><span>was</span> $300</h3>
                                </div>
                                <div class="clearfix"></div>
                                <p class="buttons">
                                    <button class="btn save-btn">Save</button>
                                    <button class="btn view-btn">View</button>
                                </p>
                            </div>
                        </div>
                </div>
                <div class="col-sm-3">
                     <div class="thumbnail seasonal-thumb">
                            <img src="img/subpage/popublar-web.png">
                            <p class="text-center" id="capt">
                                <span class="glyphicon glyphicon-time"></span> 05d : 03h : 50m
                            </p>
                            <div class="caption">
                                <p>Spa Bath and Body Minted Jasmine Scent Gift Basket</p>
                                <div class="col-sm-5">
                                    <h2>$133</h2>
                                    <span id="off">75% off</span>
                                </div>
                                <div class="col-sm-7">
                                    <h3><span>was</span> $300</h3>
                                </div>
                                <div class="clearfix"></div>
                                <p class="buttons">
                                    <button class="btn save-btn">Save</button>
                                    <button class="btn view-btn">View</button>
                                </p>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        </div>
        <div class="new-bottom">
            <div class="container">
                <div class="col-sm-3">
                    <img src="img/play_icons.png"/>
                </div>
                <div class="col-sm-6">
                    <img src="img/track.png"/>
                </div>
                <div class="col-sm-3">
                    <img src="img/repeat-shuffle.png"/>
                </div>
            </div>
        </div>
        <div class="footer">
            <div class="container">
                <div class="col-sm-3 col-xs-6">
                    <div class="logo-section col-sm-2">
                        <img src="img/logo.png"/>
                    </div>
                    <div class="col-sm-10">
                        <p>ZIPHUB  | love one </p>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-6">
                    <h5>About</h5>
                    <ul class="list-unstyled">
                        <li><a>Zip Hub</a></li>
                        <li><a>Privacy Policy</a></li>
                        <li><a>Investor Relations</a></li>
                        <li><a>Mission Statement</a></li>
                        <li><a>The Team</a></li>
                        <li><a>Zip hub charities</a></li>
                    </ul>
                </div>
                <div class="col-sm-3 col-xs-6">
                    <h5>Join Zib Hub</h5>
                    <ul class="list-unstyled">
                        <li><a>Join as Merchant</a></li>
                        <li><a>Join as Consumer</a></li>
                        <li><a>Join as Non-Profit organization</a></li>
                        <li><a>Advertise With us</a></li>
                    </ul>
                </div>
                <div class="col-sm-3 col-xs-6">
                    <h5>Contact</h5>
                    <ul class="list-unstyled">
                        <li><a>Contact us</a></li>
                        <li><a>Carrer opportunities</a></li>
                        <li><a>Become a sponsor</a></li>
                    </ul>
                </div>
            </div>

        </div>
        <div class="bottom-form">
            <div class="container">
                <p>Home. Stores . My Account . FAQs.  Terms and Conditions</p>
            </div>

        </div>
    </body>
</html>
