let stories = [];
if(localStorage.getItem("stories"))
stories = localStorage.getItem("stories").split(',');
function like_count(like_id,token){
    if (localStorage.getItem("latitude") && localStorage.getItem("longitude")) {
        navigator.geolocation.getCurrentPosition((position) => {
            let lat = position.coords.latitude;
            let long = position.coords.longitude;
            localStorage.setItem("latitude", lat);
            localStorage.setItem("longitude", long);
            if(localStorage.getItem("stories"))
            stories = localStorage.getItem("stories").split(',');
        if(stories.includes(like_id)==false)
        {
            
            console.log(stories);
            stories.push(like_id);
            localStorage.setItem("stories", stories);
            $.ajax({
                url:base_url+"/like_save",
                type: "POST",
                data: {
                    story_id:like_id,
                    latitude:localStorage.getItem("latitude"),
                    longitude:localStorage.getItem("longitude"),
                    _token: token
                },
                dataType: 'json',
                success: function (result) {
                    $("#cheers_count_"+like_id).html(result+" People loved this");
                }
            });
        }
        });
    }else{
        navigator.geolocation.watchPosition(function(position) {
            let lat = position.coords.latitude;
            let long = position.coords.longitude;
            localStorage.setItem("latitude", lat);
            localStorage.setItem("longitude", long);
            if(localStorage.getItem("stories"))
            stories = localStorage.getItem("stories").split(',');
        if(stories.includes(like_id)==false)
        {
            
            stories.push(like_id);
            localStorage.setItem("stories", stories);
            $.ajax({
                url:base_url+"/like_save",
                type: "POST",
                data: {
                    story_id:like_id,
                    latitude:localStorage.getItem("latitude"),
                    longitude:localStorage.getItem("longitude"),
                    _token: token
                },
                dataType: 'json',
                success: function (result) {
                    $("#cheers_count_"+like_id).html(result+" People loved this");
                }
            });
        }
        },
        function(error) {
            if (error.code == error.PERMISSION_DENIED)
                alert('We need your location permission');
        });
    }
    if(localStorage.getItem("latitude") && localStorage.getItem("longitude")){
        if(localStorage.getItem("stories"))
            stories = localStorage.getItem("stories").split(',');
        if(stories.includes(like_id)==false)
        {
            
            console.log(stories);
            stories.push(like_id);
            localStorage.setItem("stories", stories);
            $.ajax({
                url:base_url+"/like_save",
                type: "POST",
                data: {
                    story_id:like_id,
                    latitude:localStorage.getItem("latitude"),
                    longitude:localStorage.getItem("longitude"),
                    _token: token
                },
                dataType: 'json',
                success: function (result) {
                    $("#cheers_count_"+like_id).html(result+" People loved this");
                }
            });
        }else{
            alert('you already loved the story once');
        }        
    }
}