<?php
	
	function addPluginAdminMenu() {
        $P_name ='CustomPlugin' ;
		//add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
		add_menu_page(  $P_name, 'Custom Plugin', 'administrator', $P_name, 'displayPluginAdminDashboard' , 'dashicons-feedback', 26 );
	
		//add_submenu_page( '$parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function );
		add_submenu_page( $P_name, 'Brands Pagina Settings', 'Settings', 'administrator', $P_name.'-settings', 'displayPluginAdminSettings' );


		add_action( 'admin_init','CP_settings' );


    }
    add_action('admin_menu', 'addPluginAdminMenu', 9);  

    function CP_settings(){
        $P_name ='CustomPlugin' ;
        //Misc Options
        register_setting( 'Misc_Options', 'toggle-brands');
        register_setting( 'Misc_Options', 'order-by');
        register_setting( 'Misc_Options', 'brands-line');


        //misc options (other) header
        add_settings_section( 'CP-brands-settings-misc', 'Misc Options', 'Misc_options',  $P_name );

        add_settings_field( 'CP-brands-toggle', 'Toggle brands', 'CP_toggle',  $P_name ,'CP-brands-settings-misc');
        add_settings_field( 'CP-brands-sort', 'Sorteer Brands', 'CP_Sort',  $P_name ,'CP-brands-settings-misc');
        add_settings_field( 'CP-brands-sort', 'Aantal brands op een rij', 'CP_lijn',  $P_name ,'CP-brands-settings-misc');
      

        //style options
        register_setting( 'Style_Options', 'BrandBoxWidth');
        register_setting( 'Style_Options', 'BrandBoxHeight');
        register_setting( 'Style_Options', 'BrandBoxColor');

        register_setting( 'Style_Options', 'TxtColor');

        // style options header
        add_settings_section( 'CP-brands-settings-style', 'Style options', 'Style_options',  $P_name );

        add_settings_field( 'CP-brands-BBS', 'Brand Box Size', 'CP_BrandBoxSize',  $P_name ,'CP-brands-settings-style');
        add_settings_field( 'CP-brands-BBK', 'Brand Box Kleur', 'CP_BrandBoxColor',  $P_name ,'CP-brands-settings-style');
        add_settings_field( 'CP-brands-Txt', 'Tekst Style', 'CP_Txt',  $P_name ,'CP-brands-settings-style');
        
    }

    function Misc_options(){
        return;
    }
    function Style_options(){
        return;
    }


    function CP_toggle(){
        $toggle =  esc_attr(get_option('toggle-brands')? 'checked':''); 
        echo"<label class='switch'>
                <input type='checkbox' name='toggle-brands' value='true' $toggle>
                 <span class='slider round'></span>
             </label>";
        
        // echo"<input type='text' name='toggle-brands' value='$toggle'> ";


    }
    function CP_sort(){
        $sort_options = ['a-z' => 'A-Z', 'z-a' => 'Z-A'];

        
        echo"<select name='order-by'>";

            foreach ($sort_options as $value => $text) {
                $sort = esc_attr(get_option('order-by')) == $value ? 'selected':'';
             
                echo"<option  $sort value='$value'>$text</option>";
            }


        echo"</select>";
    
    }

    function CP_lijn(){

    }


    function CP_BrandBoxSize(){
        $width = esc_attr(get_option('BrandBoxWidth'));
        $height = esc_attr(get_option('BrandBoxHeight'));
        ?>
        <label for="BrandBoxWidth">Width: </label>
    	<input type="number" name="BrandBoxWidth" value="<?php echo $width;?>">

        <label for="BrandBoxHeigth">Height: </label>
    	<input type="number" name="BrandBoxHeight" value="<?php echo $height;?>">
        <?php
    }
    function CP_BrandBoxColor(){

        $BBColor = esc_attr(get_option('BrandBoxKleur'));
        ?>
        <input type='color' name='BrandBoxKleur' value="<?php echo    $BBColor;?>">
        <?php
    }



    function CP_Txt(){
        $txtcolor = esc_attr(get_option('TxtColor'));
        $txtfont = esc_attr(get_option('TxtFont'));
        ?>
        <label for="TxtColor">Kleur: </label>
        <input type='color' name='TxtColor' value="<?php echo $txtcolor;?>">

        <label for="TxtFont">Font: </label>
        <input type='text' name='TxtFont' value="<?php echo $txtfont;?>">
<?php
    }


	function displayPluginAdminSettings(){
		require_once 'pages/settings/displaySettingsPage.php';	
	}

	function displayPluginAdminDashboard(){
		require_once 'pages/AdminMenuDash.php';		
    }
    

    