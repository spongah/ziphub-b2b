                    $(document).ready(function(){
                        $.getJSON("http://pubapi.yp.com/search-api/search/devapi/search?term=real%2Cestate%2Clas%2Cvegas&format=json&sort=distance&radius=20&listingcount=10&key=mssp53w72h", function(json) {
                            console.log(json);
                         });
                    });