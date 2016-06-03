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
        <link rel="stylesheet" href="css/b2b.css"/>
   <!--     <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script> -->
        <script src="js/jquery-1.6.2.min.js"></script>
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
            <div class="header">
                <img src="img/seasonsale_header.png">
                <div class="text-section">
                    <h1>Discover B2B</h1>
                    <p>You Save - You Earn - We Give</p>
                </div>
                <div class="header-form col-sm-8 hidden-xs">
                    <div class="form form-inline">

                        <div class="form-group">
                            <span class="glyphicon glyphicon-search"></span>
                            <input type="text" placeholder="What are you Looking for?" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" placeholder="Las Vegas, NV" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" placeholder="Categories" class="form-control">
                            <span class="glyphicon glyphicon-search"></span>

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="featured-businesses">
            <div class="container">
                <h1 class="text-center">Featured Businesses</h1>
                <p class="text-center"> <img src="img/border.png"/></p>
            <hr>
            <div class="container">

                <script>

                    $(document).ready(function(){

                        // Display "Loading"
                        $('#business-listing').html('<div class="col-md-12" style="margin-left:45%;"><img src="img/loading-icon.gif" style="height:25px;width:25px;"></div>');

                        // Set variables to isolate search options
                        var searchTerm = "real estate";
                        var searchLocation = "las vegas";
                        var searchSort = "distance";
                        var searchRadius = "20";
                        var searchListingCount = "10";
                        var apiKey = "mssp53w72h";
 
                        // Get JSON object array and assign to json variable
                        $.getJSON("http://pubapi.yp.com/search-api/search/devapi/search?term=" + searchTerm + "%2C&searchloc=" + searchLocation + "&format=json&sort=" + searchSort + "&radius=" + searchRadius + "&listingcount=" + searchListingCount + "&key=" + apiKey + "&callback=?", function(json) {

                            // Log json object for easy access
                            console.log(json);

                            // Create an empty array to store listings
                            var listings = [];
                 
                            // Loop through the listing array and add html to new array for business listings
                            for(var x=0; x < json.searchResult.searchListings.searchListing.length; x++) {

                                // Set display variables for json business listing
                                var listingCategory = json.searchResult.searchListings.searchListing[x].categories.split('|')[0];
                                var listingBusinessName = json.searchResult.searchListings.searchListing[x].businessName.substring(0,26);
                                var listingPhoneNumber = "+1 " + json.searchResult.searchListings.searchListing[x].phone;
                                var listingAddress = json.searchResult.searchListings.searchListing[x].street.substring(0,23) + " " + json.searchResult.searchListings.searchListing[x].city + " " + json.searchResult.searchListings.searchListing[x].state + " " + json.searchResult.searchListings.searchListing[x].zip;
                                var listingRating = json.searchResult.searchListings.searchListing[x].averageRating;

                                // Use hr tag only if listing is not first of list
                                if (x != 0) { listings.push('<hr>'); }

                                // Push listing image
                                if (json.searchResult.searchListings.searchListing[x].adImage == "") { listings.push('<div class="col-lg-4" id="listing-image"><img src="img/list-image.png"></div>'); } else { listings.push('<div class="col-lg-4" id="listing-image"><img src="' + json.searchResult.searchListings.searchListing[x].adImage + '" style="width: 209px;"></div>'); }

                                // Push listing info
                                listings.push('<div class="col-md-7" id="listing-info"><a href="#" style="padding-left:8px;">' + listingCategory + '</a><h3 style="padding-left:7px;">' + (x + 1) + '. ' + listingBusinessName + '</h3><p><img src="img/phone-large.png" style="width:21px;height:21px;"> ' + listingPhoneNumber + '</p>');
                                
                                // If address contains PO BOX then dont display location icon, else display icon
                                if (listingAddress.toString().toUpperCase().includes('PO') || listingAddress.toString().toUpperCase().includes('BOX') || listingAddress.toString().toUpperCase().includes('P.O')) { listings.push('<p style="padding-left:5px">'); } else { listings.push('<p><img src="img/location-large.png" style="height:14px;padding-left:6px;padding-right:6px"> '); }
                                
                                // Star-rating Div
                                listings.push(listingAddress + '</p><div id="star-rating" style="padding-left:6px;padding-top:1px;">');
                              
                                // Push star rating
                                for(var y=0; y < 5; y++) {
                                    if (y < listingRating) { listings.push('<img src="img/star-gold-large.png" style="width:17px;height:17px;">'); } else { listings.push('<img src="img/star-grey-large.png" style="width:17px;height:17px;">'); }
                                }

                                // Push rating value, or "no rating" if rating == 0
                                if (listingRating != 0) { listings.push('<span id="ratings" style="font-style:italic;color:#CCCCCC"> (' + json.searchResult.searchListings.searchListing[x].ratingCount + ')</span>'); } else { listings.push(' <span id="no-ratings" style="font-style:italic;color:#CCCCCC">no ratings</span>'); }
                                listings.push('</div></div><div class="clearfix"></div>');
                            }
                 
                            // Display the listings on the page
                            $('#business-listing').html(listings.join(''));
                         }); 
                    });
                </script>

                <div class="container">
                    <div class="col-md-7" id="business-listing">
 
                    </div>

                    <div class="col-md-3" id="listing-sidebar">
                        Blablabla map!
                    </div>

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
