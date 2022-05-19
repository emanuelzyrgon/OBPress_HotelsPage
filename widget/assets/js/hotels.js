jQuery(window).on("elementor/frontend/init", function () {
    //hook name is 'frontend/element_ready/{widget-name}.{skin} - i dont know how skins work yet, so for now presume it will
    //always be 'default', so for example 'frontend/element_ready/slick-slider.default'
    //$scope is a jquery wrapped parent element
    elementorFrontend.hooks.addAction("frontend/element_ready/HotelsPage.default", function ($scope, $) {
        function filterText(text){
            text = ''+text;
            return text.replace(/\s{2,}/g, ' ');
        
        }

        function searchText(query){	
            var x = document.getElementsByClassName("obpress-hotels-wrapper");
            for (var i = 0; i < x.length; i++) {  			
                var locationName = filterText(x[i].getElementsByClassName("obpress-hotels-title")[0].textContent);
                var everythingText = filterText(x[i].textContent);
                var hotel = x[i].getElementsByClassName("obpress-hotels-results-roomrate");
        
                x[i].style.display = "none"; /* hide all locations */
        
                /* if location matches show all hotels for that location */
                if( locationName.toLowerCase().indexOf( query.toLowerCase() ) >= 0 || query==""){ 
                    x[i].style.display = "block";
                }else{
        
                    /* display only locations that match search */
                    if( everythingText.toLowerCase().indexOf(query.toLowerCase()) >= 0 || query==""){ 
                        /* display that location that was found */
                        x[i].style.display = "block";					
                    }
                }
                
                for (var j = 0; j < hotel.length; j++) {
                    hotel[j].style.display = "none" /* hide all hotels */
                    var hotelStr = hotel[j].textContent;
                    hotelStr = '' + hotelStr.replace(/\s{2,}/g, ' ');
                    if( hotelStr.toLowerCase().indexOf(query.toLowerCase()) >= 0 || query=="" || locationName.toLowerCase().indexOf( query.toLowerCase() ) >= 0){ /* show only that match */
                        if(resolution == 1) {
                            hotel[j].style.display = "flex";
                        } else {
                            hotel[j].style.display = "block";
                        }
                        								
                    }
                }
            }	
        
            if($(".obpress-hotels-results-roomrate:visible").length==0){
                $(".s-none").show();
            }else{
                $(".s-none").hide();
            }
        }			
        
        $(document).ready(function() {
            $( "#search-input" ).keyup( function(){
                searchText($(this).val());
            });	
        });	
    }
);
});
