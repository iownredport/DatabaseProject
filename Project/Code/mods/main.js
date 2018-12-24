
var name;

$("#drinkerDropdown").change(function($eventData){
    //console.log($("#drinkerDropdown option:selected").val());
 
 
    $.ajax({
        type: 'POST',
        url: './drinker_results.php',
        data:{
            'name': $("#drinkerDropdown option:selected").val()
        },
        success: function(data){
            //console.log(data);
            $("#drinkerResults").html(data);
            name=$("#bongo1").attr("name");
            



        }


    });
    

      
    });
