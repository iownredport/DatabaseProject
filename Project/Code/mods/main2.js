$("#drinkerDropdown1").change(function($eventData){
    //console.log($("#drinkerDropdown option:selected").val());

    $.ajax({
        type: 'POST',
        url: './drinker_results1.php',
        data:{
            'name2': $("#drinkerDropdown1 option:selected").val()
        },
        success: function(data){
            //console.log(data);
            $("#drinkerResults1").html(data);
            name=$("#bongo2").attr("name2");
            



        }


    });
});