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
        <link rel="stylesheet" href="css/all.css"/>
        <link rel="stylesheet" href="css/mystyle.css"/>
        <link rel="stylesheet" href="css/b2b.css"/>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
        <script>

            function getSearchResults(callback, options){

                // Set variables to isolate search options
                var searchTerm = options.term || "Real Estate";
                var searchLocation = options.location || "Las Vegas";
                var pageNum = options.page || 1;
                var searchSort = options.sort || "distance";
                var searchRadius = options.radius || 20;
                var searchListingCount = options.listingCount || 10;
                var apiKey = options.apiKey || "mssp53w72h";

                // Set options hash based on input and/or defaults
                options = {term: searchTerm, location: searchLocation, page: pageNum, sort: searchSort, radius: searchRadius, count: searchListingCount, apiKey: apiKey};

                // Get JSON object array and assign to json variable
                var queryString = "//pubapi.yp.com/search-api/search/devapi/search?term=" + searchTerm + "%2C&searchloc=" + searchLocation + "&format=json&pagenum=" + pageNum + "&sort=" + searchSort + "&radius=" + searchRadius + "&listingcount=" + searchListingCount + "&key=" + apiKey + "&callback=?"
                console.log("Query String:");
                console.log(queryString);
                $.getJSON(queryString, function(json) {

                    // Send listing HTML to callback
                    callback(json.searchResult, options); 
                }); 
            };
            
            function mainListings(searchResult, options) {

                // Create an empty array to store listings
                var listings = [];
    
                // Loop through the listing array and add html to new array for business listings
                if (searchResult.searchListings == "") {
                    listings.push('No results found.');
                } else {
                    for(var x=0; x < searchResult.searchListings.searchListing.length; x++) {

                        // Set display variables for json business listing
                        var listingCategory = searchResult.searchListings.searchListing[x].categories.split('|')[0];
                        var listingBusinessName = searchResult.searchListings.searchListing[x].businessName.substring(0,26);
                        var listingPhoneNumber = "+1 " + searchResult.searchListings.searchListing[x].phone;
                        var listingAddress = searchResult.searchListings.searchListing[x].street.substring(0,23) + " " + searchResult.searchListings.searchListing[x].city + " " + searchResult.searchListings.searchListing[x].state + " " + searchResult.searchListings.searchListing[x].zip;
                        var listingRating = searchResult.searchListings.searchListing[x].averageRating;

                        // Use hr tag only if listing is not first of list
                        if (x != 0) { listings.push('<hr>'); }

                        // Push listing image
                        if (searchResult.searchListings.searchListing[x].adImage == "") { listings.push('<div class="col-lg-4" id="listing-image"><img src="img/list-image.png"></div>'); } else { listings.push('<div class="col-lg-4" id="listing-image"><img src="' + searchResult.searchListings.searchListing[x].adImage + '" style="width: 209px;"></div>'); }

                        // Push listing info
                        listings.push('<div class="col-md-7" id="listing-info"><a href="#" style="padding-left:8px;">' + listingCategory + '</a><h3 style="padding-left:7px;">' + ((x + 1) + (options.page * options.count) - options.count) + '. ' + listingBusinessName + '</h3><p><span class="col-lg-5" style="padding-left:0px;padding-right:0px;"><img src="img/phone-large.png" style="width:21px;height:21px;"> ' + listingPhoneNumber + '</span>');

                        // Display "Open 24hrs" if listing is open 24hrs
                        listings.push('<span class="col-6-md" id="open24">');
                        if (searchResult.searchListings.searchListing[x].openHours.includes('24')) { listings.push('Open 24hrs'); }
                        listings.push('</span></p><div class="clearfix"></div>');
                        
                        // If address contains PO BOX then dont display location icon, else display icon
                        if (listingAddress.toString().toUpperCase().includes('PO') || listingAddress.toString().toUpperCase().includes('BOX') || listingAddress.toString().toUpperCase().includes('P.O')) { listings.push('<p style="padding-left:5px">'); } else { listings.push('<p><img src="img/location-large.png" style="height:14px;padding-left:6px;padding-right:6px"> '); }
                        
                        // Star-rating Div
                        listings.push(listingAddress + '</p><div id="star-rating" style="padding-left:6px;padding-top:1px;">');
                      
                        // Push star rating
                        for(var y=0; y < 5; y++) {
                            if (y < listingRating) { listings.push('<img src="img/star-gold-large.png" style="width:17px;height:17px;">'); } else { listings.push('<img src="img/star-grey-large.png" style="width:17px;height:17px;">'); }
                        }

                        // Push number of ratings value, or "no ratings" if ratings == 0
                        if (listingRating != 0) { listings.push('<span id="ratings" style="font-style:italic;color:#CCCCCC"> (' + searchResult.searchListings.searchListing[x].ratingCount + ')</span>'); } else { listings.push(' <span id="no-ratings" style="font-style:italic;color:#CCCCCC">no ratings</span>'); }
                        listings.push('</div></div><div class="clearfix"></div>');
                    }
                }
                $('#business-listing').html(listings.join(''));
            }

            function showSearch(searchResult, options) {

                // Show search criteria
                $('#show-search').html('Searching ' + options.term + ' Listings in ' + searchResult.metaProperties.searchCity + ', ' + searchResult.metaProperties.searchState);
            }

            function bottomCounter(searchResult, options) {
                var firstResult = (options.page * options.count) - options.count + 1;
                var lastResult = Math.min((options.page * options.count), searchResult.metaProperties.totalAvailable);
                var totalResults = searchResult.metaProperties.totalAvailable

                // Show range of results that are being displayed, and total results
                if (totalResults != 0) {
                    $('#listing-counter').html('Showing ' + firstResult + '-' + lastResult + ' of ' + totalResults + ' Results');
                } else {
                    $('#listing-counter').html('Showing 0 Results');
                }
            }

            function displayPages(searchResult, options) {
                var pagesHTML = [];
                var totalPages = Math.ceil(searchResult.metaProperties.totalAvailable / options.count)
                var thisPage = options.page;
                var thisURL = document.location.toString();
                var thisURLnoPage = thisURL.split("&page=")[0].replace("&page=", "");
                var paramChar = "";

                if (document.location.search == "") { paramChar = "?" } else { paramChar = "&" };
                if (thisPage > 1) { pagesHTML.push('<a href="' + thisURLnoPage + paramChar + 'page=' + (thisPage - 1) + '" id="listing-button-link"><img src="img/green-arrow-left.png" height="25px" width="25px" style="margin-bottom:2px"><span id="listing-button-next">Prev</span></a>'); }
                if ((thisPage + 5) < totalPages) { 
                    for (x=-4; x<6; x++) {
                        if ((thisPage + x) > 0) {
                            if (x == 0) { pagesHTML.push('<a href="" id="listing-button-selected"><span id="listing-buttons-selected">' + thisPage + '</span></a>'); } else {
                                if ((thisPage + x) < totalPages) { pagesHTML.push('<a href="' + thisURLnoPage + paramChar + 'page=' + (thisPage + x) + '" id="listing-button-link"><span id="listing-buttons">' + (thisPage + x) + '</span></a>'); }
                            }
                        }
                    }
                } else {
                    for (x=(totalPages-9); x<=totalPages; x++) {
                        if (x > 0) {
                            if (x == thisPage){ pagesHTML.push('<a href="" id="listing-button-selected"><span id="listing-buttons-selected">' + thisPage + '</span></a>');
                                } else { pagesHTML.push('<a href="' + thisURLnoPage + paramChar + 'page=' + x + '" id="listing-button-link"><span id="listing-buttons">' + x + '</span></a>'); 
                            }
                        }
                    }
                }
                

                if (thisPage < totalPages) { pagesHTML.push('<a href="' + thisURLnoPage + paramChar + 'page=' + (thisPage + 1) + '" id="listing-button-link"><span id="listing-button-next">Next</span><img src="img/green-arrow-right.png" height="25px" width="25px" style="margin-bottom:2px"></a>'); }
                $('#listing-pages').html(pagesHTML.join(''));
            }

            function showGoogleMap(searchResults, options) {
                mapHTML = [];
                mapCenter = searchResults.metaProperties.searchLat + "," + searchResults.metaProperties.searchLon;
                mapZoom = "";
                mapMarkerColor = "Red";
                mapSize = "300x250";
                mapType = "roadmap";
                mapAPIKey = "AIzaSyBZQX8qREaPClU_4ej-W7iWCVX5hDV1E5E";

                mapHTML.push('<img src="//maps.googleapis.com/maps/api/staticmap?');
                mapHTML.push('center=' + mapCenter + '&');
                mapHTML.push('zoom=' + mapZoom + '&');
                mapHTML.push('size=' + mapSize + '&');
                mapHTML.push('maptype=' + mapType + '&');
                if (searchResults.searchListings != "") {
                    for (x=0; x<searchResults.searchListings.searchListing.length; x++) {
                        mapHTML.push('&markers=color:' + mapMarkerColor + '|label:' + ((x + 1) + (options.page * options.count) - options.count) + '|' + searchResults.searchListings.searchListing[x].latitude + "," + searchResults.searchListings.searchListing[x].longitude);
                    }
                }
                mapHTML.push('&key=AIzaSyBZQX8qREaPClU_4ej-W7iWCVX5hDV1E5E">')
                console.log(mapHTML.join(''));
                $('#map').html(mapHTML.join(''));
            }

            function processResults(searchResult, options) {
                console.log("searchResult Object:");
                console.log(searchResult);
                console.log("Options Hash:");
                console.log(options);
                showSearch(searchResult, options);
                mainListings(searchResult, options);
                bottomCounter(searchResult, options);
                displayPages(searchResult, options);
                showGoogleMap(searchResult, options);
            }

        </script>

        <script>

            $(function() {
                $('form').each(function() {
                    $(this).find('input').keypress(function(e) {
                        // Enter pressed?
                        if(e.which == 10 || e.which == 13) {
                            this.form.submit();
                        }
                    });

               //     $(this).find('input[type=submit]').hide();
                });
            });


            $(document).ready(function(){
                // Display "Loading"
                $('#business-listing').html('<div class="col-md-12" style="margin-left:45%;"><img src="img/loading-icon.gif" style="height:25px;width:25px;"></div>');

                if (document.location.search != "") {
                    var search = location.search.substring(1);
                    var parameters = JSON.parse('{"' + decodeURI(search).replace(/"/g, '\\"').replace(/&/g, '","').replace(/=/g,'":"') + '"}')
                    var formTerm = "";
                    var formLocation = "";
                    var pageNum = 1;
                    if (parameters.formTerm != undefined || "") { 
                        formTerm = parameters.formTerm.replace(/\+/g, " ").replace(/%2B/g, " ").trim();
                        document.getElementById("form-term").setAttribute('value', formTerm); 
                    }
                    if (parameters.formLocation != undefined || "") { 
                        formLocation = parameters.formLocation.replace(/\+/g, " ").replace(/%2B/g, " ").trim();
                        document.getElementById("form-location").setAttribute('value', formLocation); 
                    }
                    if (parameters.page != "") { pageNum = Number(parameters.page) }
                }

                // Send request to YP.com API and when the results are received, send to processResults function
                getSearchResults(processResults, options = {term: formTerm, location: formLocation, page: pageNum});
            });

        </script>

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
                    <button class="btn green-btn col-xs-6">Login</button>
                </div>
            </div>  
        </div>
            <div class="header">
                <img src="img/b2b_header.png">
                <div class="text-section">
                    <h1>Discover B2B</h1>
                    <p>You Save - You Earn - We Give</p>
                </div>
                <div class="header-form col-sm-8 hidden-xs">
                    <div class="form form-horizontal" id="search-form">
                        <form class="form-group">
                            <div class="col-sm-1">
                                <img src="img/menu-icon-1.png" id="menu-icon"/>
                            </div>
                            <div class="col-sm-3">
                                <input type="text" id="form-term" name="formTerm" placeholder="What are you Looking for?" class="form-control">
                            </div>
                            <div class="col-sm-3">
                                <input type="text" id="form-location" name="formLocation" placeholder="Las Vegas, NV" class="form-control">
                            </div>
                            <div class="col-sm-3">
                                <input type="text" placeholder="Categories" class="form-control">
                            </div>
                            <div class="col-sm-1">
                                <img src="img/search-button.png" id="search-icon" class="pull-right"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div id="whole-page">
            <div class="container">
                <div id="featured-businesses">
                    <h1 class="text-center">Featured Businesses</h1>
                    <p class="text-center"> <img src="img/border.png"/></p>
                    <hr>
                </div>
                <div class="container">
                    <div>
                        <div class="col-md-12" id="show-search"></div>
                        <div class="clearfix"></div>
     <!--                   <div class="col-md-10" id="search-filter"></div>  -->
                        <div class="clearfix"></div>
                        <div class="col-md-8" id="business-listing"></div>
                        <div class="col-md-4" id="side-pane">
                            <div id="map"></div>
                            <div id="featured-listings">
                                Featured Listings
                            </div>
                            <div id="listing-sidebar"></div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-md-12" id="listing-footer">
                            <div class="col-md-5" id="listing-counter"></div>
                            <div class="pull-right" id="listing-pages">
                                
                            </div>
                        </div>
                        <div class="clearfix"></div>
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
