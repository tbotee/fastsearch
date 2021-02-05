
var getItems = function(category, placeholder){
    $.get( "Api/?category=" + category + '&q=' + $('#q').val(), function( data ) {
        $( "#" + placeholder ).html( data );
    });
};

var loadData = function () {
    getItems('social-media', 'social-media');
    getItems('news', 'news');
    getItems('celebrities', 'celebrities');
    getItems('movies', 'movies');
};

var setupFilter = function (checkbox, container) {
    $('#' + checkbox).click(function(){
        $('#' + container).toggle("fast");
    });
}

var setupFilters = function() {
    setupFilter('social-media-toggle', 'social-media-container');
    setupFilter('news-toggle', 'news-container');
    setupFilter('celebrities-toggle', 'celebrities-container');
    setupFilter('movies-toggle', 'movies-container');
};

$(document).ready(function(){

    loadData();

    setupFilters();

});