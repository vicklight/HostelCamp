/**
 * Created by VICTOR on 11/4/2017.
 */
$(document).ready(function(){
    $('#signup').on('change','#uploadPhoto',function(){
        var f=document.getElementById('uploadPhoto').files[0];
        var image_name=f.name;
        image_extension=image_name.split('.').pop().toLowerCase();

        if (jQuery.inArray(image_extension,['gif','png','jpg','jpeg'])==-1){
            alert ("invalid image file selected");
            $('#photo').val("");
        }

        var image_size=f.size;
        if (image_size>2000000){
            alert ("image size  is very big");
            $('#photo').val("");
        }
        else{
            var form_data= new FormData();
            form_data.append("file",f);
            $.ajax({
                url:"upload.php",
                method:"POST",
                data:form_data,
                contentType:false,
                cache:false,
                processData:false,
                beforeSend:function(){
                    $('#uploaded').html("<label>image uploading...</label>");
                },
                success:function(data){
                    $('#uploaded').html(data);
                }
            });
        }
    });

    $('#profile').click(function(){
        alert ('i have been clicked');
    });
});