
<?php
function show_all_brands(){



// $json = json_decode($data ,true);
// var_dump($json[0])
// var_dump(json_decode($json[0] ,true));
?> 
<style>

.container > .product{
/* float: left; */ 
display:grid;

background-color:white;
margin: 22.5px 0px 22.5px 45px;
}
.product{

display:flex;
height:200px;
width:160px;
background-color:rgb(189, 185, 185);
margin: 22.5px  22.5px 22.5px  22.5px;
}
.img_cont{
display:flex;
border-radius: 10px;
align-items: center; 
justify-content:center;
}
.img{
border-radius: 50%;
 box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);

}

.img_a:hover{
    width:100%;
    width:100%;

transform:scale(1.2,1,2);

}
.name_a:hover{
font-size:100%;
transform:scale(1.5,1.5);

}






.img_a{
    height:75%;
width:75%;	 
display:flex;
border-radius: 10px;
align-items: center; 
justify-content:center;
}
.container{
/* color:black; */
display: flex;
flex-wrap: wrap;
justify-content: space-around;
/* display:table-cell; */
font-family: Arial, sans-serif;
font-style: normal;
/* height:0px; */
}
.b_name{
display:flex;
align-items: center; 
justify-content:center;
}
/*
.prod_cont{


}
*/

</style>
<div class='container'>
<?php
$brands =  get_terms( 'pwb-brand',array( 'hide_empty' => false ));
$noImg = [];
$yesImg = [];
foreach( $brands as $brand ){

    $current_brand = array(
    'slug'        =>  $brand->slug,
    'name'        =>  $brand->name,
    'banner_link' =>  get_term_meta( $brand->term_id, 'pwb_brand_banner_link', true ),

    );

    $image = get_term_meta( $brand->term_id, 'pwb_brand_image', true );
    $image = wp_get_attachment_image_src( $image, 'full' );
    if( $image ){
         $current_brand['image'] = $image[0];
 
    } 

    if( !$image ){ 
        $current_brand['image'] = "../wp-content\/uploads\/woocommerce-placeholder.png";

    }

    

    $brands_data = $current_brand;
    
    // echo print_r($brands_data);
    ?>


            <div class='product'>
                
                
                <div class="img_cont">
                            <a   class="img_a" href="../merk/<?php echo $brands_data['slug'] ?>">
                                <img   class="img" src="<?php echo $brands_data['image']?>">
                            </a>
                </div>
                    <div class="b_name">
                        <a class="name_a" href="../merk/<?php echo $brands_data['slug'] ?>">
                        <?php echo $brands_data['name']?>
                        </a>
                    </div>
            </div>       
    




    
    
    
    
<?php

}
echo"</div>";
//  
}
add_shortcode("show_All_Brands","show_all_brands" );
