
var getItems = function(category, placeholder){
    $.get( "Api/?category=" + category + '&q=' + $('#q').val(), function( data ) {
        $( "#" + placeholder ).html( data );
    });
};

$(document).ready(function(){
    getItems('social-media', 'social-media');
    getItems('news', 'news');
    getItems('celebrities', 'celebrities');
    getItems('movies', 'movies');
});